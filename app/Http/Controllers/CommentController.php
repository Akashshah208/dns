<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'comment' => 'required',
            ]);

            if ($validator->fails()) {
                session()->flash('result', [
                    'message' => 'All Fields Are Required..!',
                    'type' => 'danger',
                ]);
                return redirect()->back();
            }

            $comment = new Comment();
            $comment->blog_id = $request->id;
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->comment = $request->comment;
            $result = $comment->save();
            if ($result) {
                session()->flash('result', [
                    'message' => 'Comment Post Successfully..!',
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
            return redirect()->route('admin.blog');
        }

    }

    public function replyComment(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'blog_id' => 'required',
                'parent_id' => 'required',
                'auth' => 'required',
                'comment' => 'required',
            ]);

            if ($validator->fails()) {
                session()->flash('result', [
                    'message' => 'All Fields Are Required..!',
                    'type' => 'danger',
                ]);
                return redirect()->back();
            }

            $authData = Author::findOrFail($request->auth);

            $comment = new Comment();
            $comment->blog_id = $request->blog_id;
            $comment->parent_id = $request->parent_id;
            $comment->name = $authData->name;
            $comment->email = Auth::user()->email;
            $comment->comment = $request->comment;
            $result = $comment->save();
            if ($result) {
                session()->flash('result', [
                    'message' => 'Comment Reply Post Successfully..!',
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
            return redirect()->route('admin.blog');
        }
    }


    public function commentDelete($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $subComment = Comment::where('parent_id', '=', $id)->get();

            foreach ($subComment as $item) {
                $item->delete();
            }

            $result = $comment->delete();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Comment Delete Successfully..!',
                    'type' => 'danger',
                ]);
                return redirect()->back();
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
