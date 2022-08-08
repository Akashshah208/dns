<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'required',
            'name' => 'required|max:100',
            'email' => 'required|max:100',
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

    }
}
