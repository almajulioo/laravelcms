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
</body>
</html>