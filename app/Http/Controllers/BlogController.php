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
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'content' => 'required',
            'author' => 'required'
        ]);

        $filename = 'postImage.jpeg';

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/postImage/';
            $file->move($path, $filename);
        }

        // dd($filename);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->image = $filename;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->save();

        return redirect(route('blog.view'))->with('success','The blog is successfully added!');
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
        // $data = $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'author' => 'required'
        // ]);
        // Blog::where('id', $blog->id)->update($data);
        // return redirect(route('blog.view'))->with('success','The blog is successfully updated!');

        $data = $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'content' => 'required',
            'author' => 'required'
        ]);

        $filename = "postImage.jpeg";

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/postImage/';
            $file->move($path, $filename);
        } else {
            $filename = $request->missingImage;
        }


        // dd($filename);
        // $blog = Blog::where('id', $blog->id)->update($data);
        $blog->title = $request->title;
        $blog->image = $filename;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->save();

        return redirect(route('blog.view'))->with('success','The blog is successfully updated!');

    }

    public function blogDelete(Blog $blog) {
        // dd($blog->id);
        Blog::where('id', $blog->id)->delete();
        return redirect(route('blog.view'))->with('success','The blog is successfully updated!');
    }

    public function getBlog(Blog $blog) {
        return view('blog_operaions.singleBlog',['blog'=> $blog]);
    }
}
