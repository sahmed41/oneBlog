<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('You\'re logged in as admin!') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-secondary-subtle p-4 rounded">
                    <h4 class="fs-5">Instruction</h4>
                    <p class="fs-6">Click on an option you want</p>
                </div>
                <div>
                    <div class="bg-white p-6 text-gray-900 my-3 rounded">
                        <a href="{{route('blog.view')}}" class="">My Blogs</a>
                    </div>
                    <div class="bg-white p-6 text-gray-900 my-3 rounded">
                        <a href="{{route('blog.create')}}" class="">Add New Post</a>
                    </div>
                </div>

            </div>
        </div>
    </x-app-layout>

</body>
</html>
