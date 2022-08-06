<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'auth' => 'required',
            'banner' => 'required|mimes:jpg,jpeg,png',
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

}
