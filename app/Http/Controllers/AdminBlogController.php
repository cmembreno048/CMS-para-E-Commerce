<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('adminUser');
    }

    public function getBlog($value){

        if ($value == 'all') {
            return view('blog.crud', ['blogs' => Blog::all()]);
        }
        return view('blog.crud', ['blogs' => Blog::where('blog_state', $value)->get()]);

    }

    public function getBlogEdit($id){

        return view('blog.edit', ['blog' => Blog::find( $id)]);

    }
}
