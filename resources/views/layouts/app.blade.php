<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('/css/tailwind.css'); }}">
    {{-- <script src="{{ mix('/resources/js/app.js') }}"></script> --}}
    <title>{{ config('app.name') }}</title>
</head>
<body id="app" class="w-screen h-screen max-h-screen flex flex-col bg-neutral-900 p-2">
    {{-- <div id="app"> --}}
        <router-view></router-view>
    {{-- </div> --}}
    {{-- <nav class="text-white shrink-0 top-0 z-50 flex flex-col items-center justify-center h-32 max-h-24 w-full p-3 bg-zinc-800 border-2 border-solid border-zinc-700">
        <div class="pl-2 pr-2 flex-1 flex bg-neutral-700 justify-between items-center w-full mr-8 ml-8 mb-2">
            <h2 class="flex-grow">
                Home
            </h2>
            <ul class="flex list-none flex-grow justify-end mr-3 m-0">
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="{{ url('/') }}">Home</a></button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="{{ url('/articles/list') }}">Blog</a></button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="/spreadsheet">Gallery</a></button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="/spreadsheet">Explore</a></button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="/spreadsheet">About Me</a></button>
                </li>
                <li class="mr-1">
                    @guest
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="/login">Log In</a></button>
                    @endguest

                    @auth
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="/logout">Log Out</a></button>
                    @endauth
                </li>
            </ul>
            <ul class="flex list-none m-0 w-1/12 justify-end">
                <li class="mr-6">
                    @guest
                        <a class="text-white hover:text-red-300" href="/devices">Guest</a>
                    @endguest
                </li>
            </ul>
        </div>
        <div class="flex items-center pl-2 pr-2 flex-1 bg-neutral-700 w-full">
            <img class="border-2 border-solid border-zinc-600 mr-3" src="{{ URL::asset('images/avatar.png') }}" width="40px" height="40px" alt="">
            <ul>
                <li>
                    Recent article: <a class="text-white hover:text-gray visited:text-purple-500 visited:decoration-solid" href="#">README.md</a>
                </li>
            </ul>
        </div>
    </nav> --}}

    {{-- <div id="app" class="text-white flex-1 h-full flex flex-row p-4 items-center justify-center bg-zinc-800 mt-2 border-2 border-solid border-zinc-700" style="height: calc(100% - 8rem);">

        <router-view></router-view> --}}
        
        {{-- <div class="w-1/3 grow flex flex-col overflow-y-scroll overflow-x-scroll h-full max-h-full border-2 border-solid border-zinc-700 mr-3">
            <div class="mb-3 p-6 flex-1 bg-zinc-800">
                    @yield('sidebar')
            </div>
        </div>
        <div class="w-2/3 grow flex flex-col overflow-y-scroll overflow-x-scroll h-full max-h-full border-2 border-solid border-zinc-700">

            <div class="mb-3 p-6 flex-1 bg-zinc-800">
                @yield('main-content')
            </div>
            
        </div> --}}
    {{-- </div> --}}
</body>

<script src="{{ mix('/js/app.js') }}"></script>

</html>