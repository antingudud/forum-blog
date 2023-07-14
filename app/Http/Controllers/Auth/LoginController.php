<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show login page
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Log out
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return [
            'status' => true,
            'message' => 'Logout success'
        ];
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect('/');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:16'],
            'password' => ['required', 'string','min:8']
        ]);

        if($validator->fails())
        {
            return $validator->errors()->all();
        }

        // $request->session()->regenerate();
        if(Auth::attempt($request->except(['_token'])))
        {
            $user = User::where('username', $request->username)->first();
            $token = $user->createToken("access_token")->plainTextToken;
            return response()->json([
                'status' => true,
                'message' => 'Login success',
                'user' => $user,
                'token' => $token
            ], 201)->header('Authorization', 'Bearer ' . $token);
        }
        
        return response()->json([
            'status' => false,
            'message' => 'Bad credentials.'
        ], 401);
    }
}
