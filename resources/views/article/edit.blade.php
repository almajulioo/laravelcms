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
      @if(Session::has('success'))
        <div class="py-2 px-3 mx-3 mt-2 rounded bg-green-300 w-fit">
            <h1>{{ Session::get('success') }}</h1>
        </div>
      @endif
    <form class="p-5" action={{route('article.edit', ['id' => $article->id])}} method="POST">@csrf 
        <div>
            <label for="title">Title</label>
        </div>
        <input value={{ $article->title }} class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/5" type="text" name="title">
        <div>
            <label for="slug">Slug</label>
        </div>
        <input value={{ $article->slug }} class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/5" type="text" name="slug">
        <div>
             <label for="content">Content</label>
            </div>
            <input value="{{ $article->content }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/5" type="text" name="content">
        <div>
            <label for="category_id">Id Category</label>
        </div>
        <select class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/5" type="text" name="category_id">
            @foreach ($categories as $category) 
            <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
        </select>
        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"" type="submit">
    </form>
</body>
</html>