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
       <div id="sidebar" class="fixed z-10 inset-y-0 left-0 w-64 bg-gray-800 text-white transform -translate-x-full transition-transform duration-300">
        <div class="flex items-center justify-between p-4 bg-gray-900">
            <span class="text-xl font-semibold">My Sidebar</span>
            <button id="closeSidebar" class="text-gray-400 hover:text-white focus:outline-none">
                &#10005;
            </button>
        </div>
        <nav class="mt-5">
            @foreach ($allrole as $role)
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
         <div class="container mx-auto">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-3 px-4 border-b">Nama</th>
                            <th class="py-3 px-4 border-b">Email</th>
                            <th class="py-3 px-4 border-b">Password</th>
                            <th class="py-3 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-gray-700">
                                <td class="py-3 px-4 border-b">{{$user->name}}</td>
                                <td class="py-3 px-4 border-b">{{$user->email}}</td>
                                <td class="py-3 px-4 border-b">{{$user->password}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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