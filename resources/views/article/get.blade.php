<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div class="flex flex-col justify-center items-center bg-black">
        <h1 class="text-white text-center">Welcome to laravel cms <br> Hello {{ Auth::user()->name }} you are logged in as {{ Auth::user()->role->role_name }}</h1>
        <div class="flex justify-between py-3 px-6  w-full">
            <div class="flex flex-row gap-3">
                <a href="{{route('logout')}}"><h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">Logout</h3></a>
                <a href="{{route('home')}}"><h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">Home</h3></a>
            </div>
            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) 
            <a href="{{route('article.store')}}"><h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">Add Article</h3"></a>
                @endif
        </div>
    </div>
    <div class="px-6 flex py-4  flex-wrap gap-y-2">
        @if($article)
            <div class="shadow p-1 w-full content-center justify-center items-center">
                <div class="flex justify-center content-center item-center">
                    <h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">{{$article->slug}}</h3>
                    {{-- @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) 
                    <div class="flex gap-2">
                        <a href="{{route('article.edit', ['id' => $article->id])}}"><h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">Edit</h3></a>
                        <a onclick="return confirm('Are you sure?')" href="{{route('article.delete', ['id' => $article->id])}}"><h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">Delete</h3></a>
                    </div>
                    @endif --}}
                </div>
                <h1 class="font-bold text-2xl mt-1">{{$article->title}}</h1>
                <p class="text-base mt-1">{{$article->content}}</p>
                <p class="text-sm mt-1 text-gray-500">May 2019 written by, {{$article->user->name}}</p>
            </div>
        @endif
    </div>
</body>
</html>