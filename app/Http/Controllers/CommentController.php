<?php

namespace App\Http\Controllers;

use App\Models\Author;
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

    public function replyCommentPopup(Request $request)
    {
        # Request params
        $blog_id = $request->input('blog_id');
        $comment_id = $request->input('comment_id');
        $reply_id = $request->input('reply_id');
        $user = $request->input('user');
        $authors = Author::all();

        if ($user == 'user') {
            return view('components.reply-comment-user', ['comment_id' => $comment_id, 'blog_id' => $blog_id, 'authors' => $authors, 'reply_id' => $reply_id, 'user' => $user]);
        }

        return view('components.reply-comment', ['comment_id' => $comment_id, 'blog_id' => $blog_id, 'authors' => $authors, 'reply_id' => $reply_id]);
    }


    public function replyComment(Request $request)
    {
        try {
            $input = $request->all();
            if ($request->input('user')) {
                $validator = Validator::make($input, [
                    'blog_id' => 'required',
                    'parent_id' => 'required',
                    'reply_id' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'comment' => 'required',
                ]);
        } else {
            $validator = Validator::make($input, [
                'blog_id' => 'required',
                'parent_id' => 'required',
                'reply_id' => 'required',
                'auth' => 'required',
                'comment' => 'required',
            ]);
        }


        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }

        $comment = new Comment();
        $comment->blog_id = $request->blog_id;
        $comment->parent_id = $request->parent_id;
        $comment->reply_id = $request->reply_id;
        if ($request->input('user')) {
            $comment->name = $request->name;
            $comment->email = $request->email;
        } else {
            $authData = Author::findOrFail($request->auth);
            $comment->name = $authData->name;
            $comment->email = Auth::user()->email;
        }
        $comment->comment = $request->comment;
        $result = $comment->save();
        if ($result) {
            session()->flash('result', [
                'message' => 'Comment Reply Post Successfully..!',
                'type' => 'success',
            ]);
            if ($request->input('user')) {
                return redirect()->route('blogDetails', $request->input('blog_id'));
            }
            return redirect()->back();
        }


        } catch (\Exception $e) {
            session()->flash('result', [
                'message' => 'Operation Failed..!',
                'type' => 'danger',
            ]);
            Log::info($e->getMessage());
            if ($request->input('user')) {
                return redirect()->route('blogDetails', $request->input('blog_id'));
            }
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
