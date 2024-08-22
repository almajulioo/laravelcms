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
    
         <div id="sidebar" class="fixed z-10 inset-y-0 left-0 w-64 bg-gray-800 text-white transform -translate-x-full transition-transform duration-300">
        <div class="flex items-center justify-between p-4 bg-gray-900">
            <span class="text-xl font-semibold">My Sidebar</span>
            <button id="closeSidebar" class="text-gray-400 hover:text-white focus:outline-none">
                &#10005;
            </button>
        </div>
        <nav class="mt-5">
            @foreach ($roles as $role)
                <a href={{route('dashboard.aturrole', ['role' => $role->role_name])}} class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Atur {{$role->role_name}}</a>
            @endforeach
            <a href={{route("dashboard.tambahuser")}} class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Tambah User</a>
           
        </nav>
    </div>

    <div class="flex-1 p-8 content-center">
        <button id="openSidebar" class="bg-blue-500 text-white py-2 px-4 rounded absolute top-1">
            Open Sidebar
        </button>
        <form class="p-5" action="{{route('article.store')}}" method="POST">@csrf 
            <div>
                <label for="title">Title</label>
            </div>
            <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/5" type="text" name="title">
            <div>
                <label for="slug">Slug</label>
            </div>
            <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/5" type="text" name="slug">
            <div>
                <label for="content">Content</label>
                </div>
                <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/5" type="text" name="content">
            <div>
                <label for="category_id">Id Category</label>
            </div>
            <select class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/5" type="text" name="category_id">
                @foreach ($categories as $category) 
                <option value={{$category->id}}>{{$category->name}}</option>
                @endforeach
            </select>
            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        </form>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        openSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>


    
</body>
</html>