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
    <div class="flex justify-between py-3 px-6">
        <a href="{{route('logout')}}"><h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">Logout</h3></a>
        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) 
            <a href="{{route('article.store')}}"><h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">Add Article</h3"></a>
        @endif
    </div>
    <div class="px-6 flex py-4  flex-wrap gap-y-2">
        @foreach ($articles as $article)
            <div class="shadow p-1 w-1/2">
                <div class="flex justify-between">
                    <h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">{{$article->slug}}</h3>
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) 
                        <a href="{{route('article.edit', ['id' => $article->id])}}"><h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">Edit</h3></a>
                    @endif
                </div>
                <h1 class="font-bold text-2xl mt-1">{{$article->title}}</h1>
                <p class="text-base mt-1">{{$article->content}}</p>
                <p class="text-sm mt-1 text-gray-500">May 2019</p>
            </div>
        @endforeach
    </div>
</body>
</html>