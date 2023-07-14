@extends('layouts.app')

@section('sidebar')
@endsection

@section('main-content')
<section>
    <div>
        <h3 class="text-4xl font-bold">
            Edit post.
        </h3>
    </div>
    <div>
        <form class="flex flex-col" action="" method="post">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <input placeholder="{{ $post->title }}" value="{{ $post->title }}" class="p-2 w-2/3 text-black " type="text" name="title" id="form-article-title">
            <label for="content">Message</label>
            <textarea class="p-2 w-2/3 text-black" name="content" id="form-article-content" cols="40" rows="10">{{ $post->content }}
            </textarea>

            <button class="w-1/6 border-2 border-green-900 border-solid bg-green-800">Post.</button>
        </form>
    </div>
</section>
@endsection