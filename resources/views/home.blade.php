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
    <div class="px-6 flex py-4  flex-wrap gap-y-2">
        @foreach ($articles as $article)
            <div class="shadow p-1 w-1/2">
                <h3 class="text-sm font-bold bg-gray-300 p-1 w-fit rounded">{{$article->slug}}</h3>
                <h1 class="font-bold text-2xl mt-1">{{$article->title}}</h1>
                <p class="text-base mt-1">{{$article->content}}</p>
                <p class="text-sm mt-1 text-gray-500">May 2019</p>
            </div>
        @endforeach
    </div>
</body>
</html>