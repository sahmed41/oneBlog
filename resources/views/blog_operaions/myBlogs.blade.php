<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>One Blog</title>
</head>
<body>
    <h1>My Blogs</h1>
    @foreach ($blogs as $blog )
        <ul>
            <li>{{$blog->title}}</li>
            <li>{{$blog->content}}</li>
            <li><a href="{{route('blog.editForm',['blog'=>$blog])}}">Edit</a></li>
            <form method="post" action="{{route('blog.delete',['blog'=>$blog])}}">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </ul>

    @endforeach
</body>
</html>
