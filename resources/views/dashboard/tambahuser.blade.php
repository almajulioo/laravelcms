<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <h1 class="text-3xl text-center mt-10">Tambah User</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

    <!-- Content -->
    <div class="flex-1 p-8 content-center">
        <button id="openSidebar" class="bg-blue-500 text-white py-2 px-4 rounded absolute">
            Open Sidebar
        </button>
        <form method="POST" action="{{ route('dashboard.tambahuser') }}" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                <input type="email" id="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama:</label>
                <input type="text" id="name" name="name" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password:</label>
                <input type="password" id="password" name="password" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-semibold mb-2">Role:</label>
                <select name="role_id" id="role" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Tambah</button>
            </div>
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