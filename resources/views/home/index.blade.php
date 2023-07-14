<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/tailwind.css'); }}">
    <title>{{ config('app.name') }}</title>
</head>
<body class="w-screen h-screen max-h-screen flex flex-col bg-neutral-900 p-2">
    <nav class="text-white shrink-0 top-0 z-50 flex flex-col items-center justify-center h-32 max-h-24 w-full p-3 bg-zinc-800 border-2 border-solid border-zinc-700">
        <div class="pl-2 pr-2 flex-1 flex bg-neutral-700 justify-between items-center w-full mr-8 ml-8 mb-2">
            <h2 class="flex-grow">
                Home
            </h2>
            <ul class="flex list-none flex-grow justify-end mr-3 m-0">
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="/spreadsheet">Home</a></button>
                </li>
                <li class="mr-1">
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="/spreadsheet">Blog</a></button>
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
                    <button class="border-2 w-32 border-solid border-zinc-500"><a class="hover:text-red-300" href="/spreadsheet">Log In</a></button>
                </li>
            </ul>
            <ul class="flex list-none m-0 w-1/12 justify-end">
                <li class="mr-6">
                    <a class="text-white hover:text-red-300" href="/devices">Guest</a>
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
    </nav>

    <div class="text-white flex-1 h-full flex flex-row p-4 items-center justify-center bg-zinc-800 mt-2 border-2 border-solid border-zinc-700" style="height: calc(100% - 8rem);">
        <div class="w-1/3 grow flex flex-col overflow-y-scroll overflow-x-scroll h-full max-h-full border-2 border-solid border-zinc-700 mr-3">
            <div class="mb-3 p-6 flex-1 bg-zinc-800">
                <ul class="list-disc ml-3">
                    <li>
                        <p>04/01/2023: <a class="text-white hover:text-gray visited:text-purple-500 visited:decoration-solid" href="#">README.md</a></p>
                    </li>
                    <li>
                        <p>06/23/2012: <a class="text-white hover:text-gray visited:text-purple-500 visited:decoration-solid" href="peni">Legends</a></p>
                    </li>
                    <li>
                        <p>06/12/2012: <a class="text-white hover:text-gray visited:text-purple-500 visited:decoration-solid" href="peni">Folklore</a></p>
                    </li>
                    <li>
                        <p>06/18/2012: <a class="text-white hover:text-gray visited:text-purple-500 visited:decoration-solid" href="peni">Encyclopedia</a></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-2/3 grow flex flex-col overflow-y-scroll overflow-x-scroll h-full max-h-full border-2 border-solid border-zinc-700">

            <div class="mb-3 p-6 flex-1 bg-zinc-800">
                <section>
                    <h1 class="text-4xl font-bold">README.md</h1>
                </section>
                <div class="p-3 w-full max-h-72 min-h-[20rem]">
                    <p class="p-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac suscipit mauris. Proin commodo mattis scelerisque. Nulla fermentum varius eros, at scelerisque elit ornare a. Quisque blandit elit at lacus tristique, eu facilisis arcu lacinia. Donec porttitor vehicula pulvinar. Donec hendrerit vitae neque sed dapibus. Sed feugiat fringilla tellus, nec porta ex hendrerit id.
                        Nulla facilisi. Fusce dictum congue urna ut egestas. Aliquam purus ex, faucibus eget egestas nec, congue et nunc. Vivamus eu metus at neque convallis sodales eget eu ligula. Pellentesque mauris arcu, tincidunt id auctor quis, pellentesque ut magna. Donec maximus elementum est eu varius. Curabitur pulvinar ante non lacinia malesuada. Nam convallis nulla eget odio semper, in tristique lacus efficitur. Praesent venenatis nisi urna, vel fermentum ex viverra fermentum. Quisque a justo malesuada ante ultrices imperdiet in et dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc sollicitudin tellus turpis, nec gravida augue sodales sed. Integer viverra elementum malesuada.
                        In maximus urna vel lectus euismod, vitae sollicitudin metus rhoncus. Integer est nulla, pulvinar a vulputate vitae, euismod in neque. Donec ac dolor ante. Donec tellus leo, consectetur vitae imperdiet in, dictum id mi. Aliquam eget nulla vulputate, lobortis nunc et, placerat justo. Vivamus ullamcorper tincidunt tortor, euismod pharetra augue malesuada quis. Suspendisse eu mattis mauris. Integer vulputate sagittis nisi. Etiam urna erat, pharetra id tristique at, mattis ac augue. Mauris condimentum ipsum elit. Mauris interdum, mauris ac hendrerit tincidunt, diam nisl condimentum lacus, eu malesuada metus dui id felis.
                        Proin auctor arcu ut massa gravida, aliquet mattis tortor tincidunt. Maecenas at risus vel est condimentum sodales. Mauris nec sem elementum leo feugiat vehicula et vitae orci. Cras euismod, dui ut dictum bibendum, nulla eros feugiat orci, vitae sagittis purus velit eu nisl. Nullam sit amet elementum dui, at lacinia lectus. Nullam id convallis arcu, eget molestie velit. Cras tincidunt venenatis arcu, quis pellentesque eros sagittis in.
                        Mauris consequat turpis eu auctor malesuada. Curabitur nibh lectus, vehicula ut laoreet sit amet, dignissim et dolor. Aenean venenatis sollicitudin lacus, sed blandit nulla cursus sit amet. In id leo hendrerit, consectetur est vel, gravida magna. Morbi nulla justo, porttitor id rhoncus sit amet, facilisis nec ipsum. Duis sit amet nibh non nisl malesuada porta. Suspendisse metus eros, viverra nec facilisis et, convallis in mi. Aenean vitae blandit sem. Donec bibendum ut massa eget lobortis. Mauris fringilla, ipsum sed lobortis fringilla, elit ligula malesuada diam, sed ultricies magna lectus sed justo. Nam vulputate est a maximus aliquet. Proin id semper ante, et finibus diam. Praesent eget erat sit amet odio volutpat fringilla in mollis lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>