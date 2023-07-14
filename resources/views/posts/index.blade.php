@extends('layouts.app')

@section('sidebar')
<div id="app">
    <article-list-component></article-list-component>
</div>
@endsection

@section('main-content')
@if(isset($post))
<section>
    <div>
        <h1 class="text-4xl font-bold">{{ $post['title'] }}</h1>
    </div>
    <div class="p-3 w-full max-h-72 min-h-[20rem]">
        <p>
            Created: {{ $post['create_time'] }}
        </p>
        <p>
            Updated: {{ $post['update_time'] }}
        </p>
        <p>{{ $post->content }}</p>
    </div>

    @if($isOwner == true)
    <div>
        <a href="{{ url("/articles/post/{$post->url}/edit") }}">
            <button class="">Edit</button>
        </a>
        <form action="/api/posts/delete" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-400 border-2 border-solid border-stone-500">
                Delete
            </button>
        </form>
    </div>
    @endif
</section>
@else
<section>
    <div>
        <h1 class="text-2xl font-bold">Nimble's Notoriously Nefarious Network</h1>
    </div>
    <div>
        <p>...this is where the zone's disorganized chatterings are compiled...</p>
    </div>
</section>
@endif
@endsection
