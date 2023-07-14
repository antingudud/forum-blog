@extends('layouts.app')

@section('sidebar')
<h3 class="text-2xl font-bold">Pinned articles:</h3>
<div id="sidebar">
    <ul>
        @if(isset($pinned))
        @foreach($pinned as $pin)
        <li class="list-disc ml-3">
            <p>{{ $pin['date'] }} <a class="text-green-500 hover:text-green-400 visited:text-stone-400 visited:decoration-solid" href="/articles/post/{{ $pin['url'] }}">{{ $pin['title'] }}</a></p>
        </li>
        @endforeach
        @endif
    </ul>
</div>
@endsection

@section('main-content')
<div id="app">
    <router-view></router-view>
    {{-- <div>
        <h1 class="text-2xl font-bold">Nimble's Notoriously Nefarious Network</h1>
    </div>
    <div>
        <p>
            Welcome to <span>Nimble's Notoriously Nefarious Network</span>. <br>
            Make yourself at home!
        </p>
    </div> --}}
</div>
@endsection