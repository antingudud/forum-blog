@extends('layouts.app')

@section('sidebar')
@endsection

@section('main-content')
<section>
    <post-page csrf="{{ csrf_token() }}"></post-page>
    {{-- <div>
        <h3 class="text-4xl font-bold">
            New post
        </h3>
    </div>
    <div>
        <form class="flex flex-col" action="" method="post">
            @csrf
            <label for="title">Title</label>
            <input placeholder="Title" class="p-2 w-2/3 text-black " type="text" name="title" id="form-article-title">
            <label for="content">Message</label>
            <textarea class="p-2 w-2/3 text-black" name="content" id="form-article-content" cols="40" rows="10"></textarea>

            <button class="w-1/6 border-2 border-green-900 border-solid bg-green-800">Post.</button>
        </form>
    </div> --}}
</section>
@endsection