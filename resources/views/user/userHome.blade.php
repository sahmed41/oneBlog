<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>OneTravelBlog</title>
</head>
<body>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recent Blog Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary-subtle p-4 rounded my-3">
                <h4 class="fs-5">Instruction</h4>
                <p class="fs-6">Click on the title of the post you want to view</p>
            </div>
            @foreach ($blogs as $blog )
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                    <div class="p-6 text-gray-900">
                        <a href="{{route('blog.singleBlog',['blog'=>$blog])}}">
                            {{$blog->title}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

</body>
</html>
