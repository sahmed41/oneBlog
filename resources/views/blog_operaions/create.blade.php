<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneBlog</title>
</head>
<body>
    <h1>Crate A Post</h1>
    {{Auth::user()->name}}
    @if (Session::has('success'))
    <script>
        alert(Session('success'));
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
</body>
</html>
