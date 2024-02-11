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
                {{ __('My Blogs') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-secondary-subtle p-4 rounded my-3">
                    <h4 class="fs-5">Instruction</h4>
                    <ul>
                        <li class="fs-6">Click on the blog title to open and read it.</li>
                        <li class="fs-6">Click on the edit button to edit and update the post</li>
                        <li class="fs-6">Click on the delete button to delete the post</li>
                    </ul>
                </div>
                @foreach ($blogs as $blog )
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                        <div class="p-6 text-gray-900">
                            <a href="{{route('blog.singleBlog',['blog'=>$blog])}}" class="block fs-5 my-3">
                                {{$blog->title}}
                            </a>
                            <div class="operations flex my-2">
                                <a href="{{route('blog.editForm',['blog'=>$blog])}}" type="button" class="btn btn-dark bg-dark me-2">Edit</a>
                                <form method="post" action="{{route('blog.delete',['blog'=>$blog])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" type="button" class="btn btn-danger bg-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-app-layout>
</body>
</html>
{{--
    <ul>
            <li>{{$blog->title}}</li>
            <li>{{$blog->content}}</li>
            <li><a href="{{route('blog.editForm',['blog'=>$blog])}}">Edit</a></li>
            <form method="post" action="{{route('blog.delete',['blog'=>$blog])}}">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </ul> --}}
