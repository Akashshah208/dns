<?php

namespace App\Http\Controllers\Clint;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $blogs = Blog::whereHas('author', function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%');
            })
                ->with(['author' => function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                }])->get();
        } else {
            $blogs = Blog::all();
        }
        return view('blog', compact('blogs', 'keyword'));
    }

    public function details($id)
    {
        $blog = Blog::findOrFail($id);
        /*$strTags = implode(',', json_decode($blog->tag));
        $tags = Category::findMany($strTags);*/
        $tags = json_decode($blog->tag);
        $allTags = Category::all();
        $related_blogs = Blog::where('auth_id', '=', $blog->auth_id)->where('id', '!=', $blog->id)->get();
        return view('blog_detail', compact('blog', 'tags', 'allTags', 'related_blogs'));
    }

}
