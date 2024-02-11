<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index() {

        if (Auth::id()) {
            $userRole = Auth()->user()->role;
            if ($userRole == 'user') {
                $blogs = Blog::all();
                return view('user.userHome',['blogs'=> $blogs]);
            } else if ($userRole == 'admin') {
                return view('dashboard');
            } else {
                return redirect()->back();
            }
        }
    }
}
