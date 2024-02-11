<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add New Post</title>
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

            <form method="post" action="{{route('blog.add')}}" class="w-75 m-auto">
                @csrf
                @method('post')
                {{-- <input type="text" name="title" id="title" class="rounded border border-success p-2 mb-2 border-opacity-50 block w-100" placeholder="Post Title"> --}}

                {{-- <textarea name="content" id="content" class="w-100 h-75"></textarea> --}}
                <div class="form-floating">
                    <input type="text" name="title" id="title" class="form-control rounded border p-2 mb-2 border-opacity-50 block w-100" placeholder="Post Title">
                    <label for="title">Post Title</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" name="content" placeholder="Post Content" id="floatingTextarea2" style="height: 100px" cols="100"></textarea>
                    <label for="floatingTextarea2">Post Content</label>
                  </div>
                <input type="hidden" name="author" value="{{Auth::user()->name}}">
                <input type="submit" value="Add Post" type="button" class="btn btn-dark bg-dark my-3">
            </form>
        </div>
    </x-app-layout>
</body>
</html>
