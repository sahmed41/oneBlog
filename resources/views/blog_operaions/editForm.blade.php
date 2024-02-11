<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>One Blog</title>
</head>
<body>
    <h1>Edit Form</h1>
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
</body>
</html>
