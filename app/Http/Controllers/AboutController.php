<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{

    public function about()
    {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function addAbout()
    {
        $about = About::first();
        return view('admin.add_about', compact('about'));
    }

    public function storeAbout(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }
        try {
            $about = About::findOrFail($request->input('id'));
            $about->title = $request->input('title');
            $about->description = $request->input('description');
            $result = $about->save();
            if ($result) {
                session()->flash('result', [
                    'message' => 'About Update Successfully..!',
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
