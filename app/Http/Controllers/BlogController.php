<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.add_blog', compact('categories', 'authors'));
    }

    public function storeBlog(Request $request)
    {
        dd('storeBlog', $request->all());
    }

}
