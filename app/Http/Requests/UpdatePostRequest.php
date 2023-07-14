<?php

namespace App\Http\Requests;

use App\Repositories\PostRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->id() === PostRepository::getUIDByUrl($this->route('url')))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:4', 'max:150'],
            'content' => ['required', 'string', 'min:8']
        ];
    }
}
