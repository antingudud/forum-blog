@extends('layouts.app')

@section('sidebar')
<ul>
    <li><a href="{{ url('/login') }}">Login</a></li>
    <li><a href="{{ url('/register') }}">Register</a></li>
</ul>
@endsection

@section('main-content')
<section>
    <login-page csrf="{{ csrf_token() }}"></login-page>
</section>
@endsection