<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>{{$blog->title}}</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $blog->title}}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="meda-data d-flex justify-content-between">
                    <p class="text-md">By: {{$blog->author}}</p>
                    <p class="text-md">Posted On: {{$blog->created_at}}</p>
                </div>
                <hr class="border-black my-3">
                <div class="text-lg my-5 text-start">
                    {{$blog->content}}
                </div>
                <hr class="border-black my-3">
                @if (Auth()->user()->role == 'admin')
                <div class="operations flex my-2">
                    <a href="{{route('blog.editForm',['blog'=>$blog])}}" type="button" class="btn btn-dark bg-dark me-2">Edit</a>
                    <form method="post" action="{{route('blog.delete',['blog'=>$blog])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" type="button" class="btn btn-danger bg-danger">
                    </form>
                </div>
                @endif
            </div>
        </div>
    </x-app-layout>


</body>
</html>
