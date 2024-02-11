<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneBlog</title>
</head>
<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create A Blog Post') }}
            </h2>
        </x-slot>

        <div class="py-12">
        @if (session('success'))
            <script>
                alert({{session('success')}});
            </script>
        @endif

    <form method="post" action="{{route('blog.add')}}">
        @csrf
        @method('post')
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="content">Title</label>
        <textarea name="content" id="content" cols="150" rows="30"></textarea>
        <input type="hidden" name="author" value="{{Auth::user()->name}}">
        <input type="submit" value="Add">
    </form>
        </div>
    </x-app-layout>
</body>
</html>
