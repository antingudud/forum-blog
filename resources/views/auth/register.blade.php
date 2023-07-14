@extends('layouts.app')

@section('sidebar')
<ul>
    <li><a href="{{ url('/login') }}">Login</a></li>
    <li><a href="{{ url('/register') }}">Register</a></li>
</ul>
@endsection

@section('main-content')
<section>
    <form action="" method="POST" class="flex flex-col">
        @csrf
        <label for="username">Username</label>
        <input class="text-black" type="text" name="username" id="form-login-username">

        <label for="email">Email</label>
        <input class="text-black" type="text" name="email" id="form-login-email">

        <label for="password">Password</label>
        <input class="text-black" type="password" name="password" id="form-login-password">

        <button class="bg-green-300" type="submit">Login</button>
    </form>
</section>
@endsection