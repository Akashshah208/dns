<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function addCategory(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }
        try {
            $category = new Category();
            $category->name = $request->name;
            $result = $category->save();
            if ($result) {
                session()->flash('result', [
                    'message' => 'Category Add Successfully..!',
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
    }


    public function addAuthor()
    {
        $authors = Author::all();
        return view('admin.add_author', ['authors' => $authors]);
    }

    public function storeAuthor(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nameAuth' => 'required',
            'workAuth' => 'required',
            'discAuth' => 'required',
            'profileAuth' => 'required|mimes:jpg,jpeg,png',
        ]);
        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }
        try {
            $nameAuth = $request->input('nameAuth');
            $workAuth = $request->input('workAuth');
            $discAuth = $request->input('discAuth');
            $profileAuth = $request->file('profileAuth');

            $auth = new Author();
            $auth->name = $nameAuth;
            $auth->work = $workAuth;
            $auth->description = $discAuth;

            if ($profileAuth) {
                $destinationPath = public_path() . '/uploadFile/author/';
                $fileName = $nameAuth . '_' . $profileAuth->getClientOriginalName();
                $auth->profile = $fileName;
                $profileAuth->move($destinationPath, $fileName);
            }

            $result = $auth->save();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Author Add Successfully..!',
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
    }


}
