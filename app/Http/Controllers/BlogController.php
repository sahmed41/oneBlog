<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function createBlog() {
        return view('blog_operaions.create');
    }

    public function addBlog(Request $request) {

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);
        $newBlog = Blog::create($data);
        return redirect(route('blog.create'))->with('success','The blog is successfully added!');
    }

    public function viewBlog() {
        $blogs = Blog::where('author', Auth::user()->name)->get();
        return view('blog_operaions.myBlogs',['blogs'=> $blogs]);
    }

    public function editBlog() {
        $blogs = Blog::where('author', Auth::user()->name)->get();
        return view('blog_operaions.myBlogs',['blogs'=> $blogs]);
    }

    public function editForm(Blog $blog) {
        return view('blog_operaions.editForm',['blog'=> $blog]);
    }

    public function blogUpdate(Blog $blog, Request $request) {
        // dd($blog->id);
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);
        Blog::where('id', $blog->id)->update($data);
        return redirect(route('blog.view'))->with('success','The blog is successfully updated!');
    }

    public function blogDelete(Blog $blog) {
        // dd($blog->id);
        Blog::where('id', $blog->id)->delete();
        return redirect(route('blog.view'))->with('success','The blog is successfully updated!');
    }
}
