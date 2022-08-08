<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        return view('admin.index', compact('blogs', 'keyword'));
    }

    public function details($id)
    {
        $blog = Blog::findOrFail($id);
        $strTags = implode(',', json_decode($blog->tag));
        $tags = Category::findMany($strTags);
        $allTags = Category::all();
        return view('admin.blog_detail', compact('blog', 'tags', 'allTags'));
    }


    public function addBlog()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.add_blog', compact('categories', 'authors'));
    }

    public function storeBlog(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'auth' => 'required',
            'banner' => 'mimes:jpeg,jpg,png,gif|required',
        ]);
        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }
        try {
            $title = $request->input('title');
            $tags = $request->input('tags');
            $description = $request->input('description');
            $auth = $request->input('auth');
            $banner = $request->file('banner');

            $blog = new Blog();
            $blog->title = $title;
            $blog->tag = json_encode($tags);
            $blog->description = $description;
            $blog->auth_id = $auth;

            if ($banner) {
                $destinationPath = public_path() . '/uploadFile/blogBanner/';
                $fileName = $title . '_' . $banner->getClientOriginalName();
                $blog->banner = $fileName;
                $banner->move($destinationPath, $fileName);
            }

            $result = $blog->save();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Blog Add Successfully..!',
                    'type' => 'success',
                ]);
                return redirect()->back();
            }

        } catch (\Exception $e) {
            session()->flash('result', [
                'message' => 'Operation Failed..!',
                'type' => 'danger',
            ]);
            Log::info($e->getMessage());
            return redirect()->back();
        }
        dd('storeBlog', $request->all());
    }

    public function blogDelete($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $result = $blog->delete();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Blog Delete Successfully..!',
                    'type' => 'danger',
                ]);
                return redirect()->route('admin.blog');
            }
        } catch (\Exception $e) {
            session()->flash('result', [
                'message' => 'Operation Failed..!',
                'type' => 'danger',
            ]);
            Log::info($e->getMessage());
            return redirect()->route('admin.blog');
        }
    }


}
