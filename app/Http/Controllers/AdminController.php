<?php

namespace App\Http\Controllers;

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
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            if ($category) {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back();
        }
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
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            dd($request->all());
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back();
        }
    }


}
