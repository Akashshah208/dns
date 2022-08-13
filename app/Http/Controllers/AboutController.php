<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{

    public function about()
    {
        $about = About::first();
        $founders = Founder::all();
        return view('about', compact('about', 'founders'));
    }

    public function addAbout()
    {
        $about = About::first();
        $founders = Founder::all();
        return view('admin.add_about', compact('about', 'founders'));
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

    public function storeFounder(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'work' => 'required',
            'description' => 'required',
            'profile' => 'required|mimes:jpg,jpeg,png',
        ]);
        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }
        try {
            $name = $request->input('name');
            $work = $request->input('work');
            $description = $request->input('description');
            $profile = $request->file('profile');

            $founder = new Founder();
            $founder->name = $name;
            $founder->work = $work;
            $founder->description = $description;

            if ($profile) {
                $destinationPath = public_path() . '/uploadFile/founder/';
                $fileName = $name . '_' . $profile->getClientOriginalName();
                $profile->move($destinationPath, $fileName);
                $founder->profile = $fileName;
            }

            $result = $founder->save();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Founder Add Successfully..!',
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

    public function founderDelete($id)
    {
        try {
            $author = Founder::findOrFail($id);
            $result = $author->delete();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Founder Delete Successfully..!',
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
            return redirect()->back();
        }
    }


}
