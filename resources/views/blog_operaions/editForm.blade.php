<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>One Blog</title>
</head>
<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Blog Post') }}
            </h2>
        </x-slot>

        <div class="py-12">
            @if (session('success'))
                <script>
                    alert({{session('success')}});
                </script>
            @endif

            <form method="post" action="{{route('blog.update',['blog'=>$blog])}}">
                @csrf
                @method('put')
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$blog->title}}"/>
                <label for="content">Content</label>
                <textarea type="text" name="content" id="content">{{$blog->content}}</textarea>
                <input type="hidden" name="author" value="{{Auth::user()->name}}">
                <input type="submit" value="Update">
            </form>
        </div>
    </x-app-layout>
</body>
</html>
