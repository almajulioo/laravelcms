<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('article.store')}}" method="POST">@csrf 
        <input type="text" name="title">
        <input type="text" name="slug">
        <input type="text" name="content">
        <input type="text" name="user_id">
        <input type="text" name="category_id">
        <input type="submit">
    </form>
</body>
</html>