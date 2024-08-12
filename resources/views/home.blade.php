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
   @foreach ($articles as $article)
    <div class="px-10 mt-12">
        <h1>{{$article->title}}</h1>
        <h2>{{$article->slug}}</h2>
        <p>{{$article->content}}</p>
    </div>
    @endforeach
</body>
</html>