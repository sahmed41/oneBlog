<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Blog</title>
</head>
<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Blog Post') }}
            </h2>
        </x-slot>

        <div class="py-12 w-75 m-auto">
            @if (session('success'))
                <script>
                    alert({{session('success')}});
                </script>
            @endif
            <div class="bg-secondary-subtle p-4 rounded my-3">
                <h4 class="fs-5">Instruction</h4>
                <ul>
                    <li class="fs-6">Retype either post title or post content to edit the post</li>
                </ul>
            </div>

            <form method="post" action="{{route('blog.update',['blog'=>$blog])}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="input-group mb-3 w-100">
                    <span class="input-group-text" id="basic-addon1">Post Title</span>
                    <input type="text" name="title" id="title" value="{{$blog->title}}" class="form-control" required/>
                </div>
                <div class="form-floating">
                    <span class="input-group-text" id="basic-addon1">Post Content</span>
                    <textarea class="form-control" name="content" placeholder="Post Content" id="floatingTextarea2" style="height: 100px" cols="100" required>{{$blog->content}}</textarea>
                    {{-- <label for="floatingTextarea2">Post Content</label> --}}
                </div>

                <div class="input-group">
                    <input type="file" name="image" class="form-control rounded border p-2 my-2 border-opacity-50 block w-100" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
                <input type="hidden" name="missingImage" value="{{$blog->image}}">
                <input type="hidden" name="author" value="{{Auth::user()->name}}">
                <input type="submit" value="Update" type="button" class="btn btn-dark bg-dark my-3">
            </form>
        </div>
    </x-app-layout>
</body>
</html>
