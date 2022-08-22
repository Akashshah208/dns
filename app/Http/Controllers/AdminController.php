<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\PrivacyPolicy;
use App\Models\Services;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            /*$blogs = Blog::where('title', 'like', '%'.$keyword.'%')
                ->get();*/
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
        //return redirect()->route('admin.blog');
    }


    public function addCategory()
    {
        $categories = Category::all();
        return view('admin.add_category', ['categories' => $categories]);
    }

    public function storeCategory(Request $request)
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

    public function categoryDelete($id)
    {
        try {
            $category = Category::findOrFail($id);
            $result = $category->delete();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Category Delete Successfully..!',
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

    public function authorDelete($id)
    {
        try {
            $author = Author::findOrFail($id);
            $result = $author->delete();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Author Delete Successfully..!',
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

    public function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('privacy_policy', ['privacyPolicy' => $privacyPolicy]);
    }

    public function addPrivacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('admin.privacy_policy', ['privacyPolicy' => $privacyPolicy]);
    }

    public function storePrivacyPolicy(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'policy' => 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }
        try {
            $privacyPolicy = new PrivacyPolicy();
            $privacyPolicy->policy = $request->policy;
            $result = $privacyPolicy->save();
            if ($result) {
                session()->flash('result', [
                    'message' => 'Privacy Policy Add Successfully..!',
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

    public function privacyPolicyDelete($id)
    {
        try {
            $privacyPolicy = PrivacyPolicy::findOrFail($id);
            $result = $privacyPolicy->delete();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Privacy Policy Delete Successfully..!',
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

    public function services()
    {
        $services = Services::first();
        return view('terms_of_services', ['services' => $services]);
    }

    public function addServices()
    {
        $services = Services::first();
        return view('admin.terms_of_services', ['services' => $services]);
    }

    public function storeServices(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'services' => 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }
        try {
            $services = new Services();
            $services->services = $request->services;
            $result = $services->save();
            if ($result) {
                session()->flash('result', [
                    'message' => 'Services Add Successfully..!',
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

    public function servicesDelete($id)
    {
        try {
            $services = Services::findOrFail($id);
            $result = $services->delete();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Terms Of Services Delete Successfully..!',
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


    public function contactUs()
    {
        $contacts = Contact::paginate(10);
        return view('admin.contact_us', ['contacts' => $contacts]);
    }

    public function userData()
    {
        $users = User::where('user_type', 'user')->paginate(10);
        return view('admin.user_data', ['users' => $users]);
    }

    public function contactUsDelete($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $result = $contact->delete();

            if ($result) {
                session()->flash('result', [
                    'message' => 'Contact Delete Successfully..!',
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


    public function storeContact(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone_no' => 'required|max:10|min:10',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'All Fields Are Required..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }
        $contact = new Contact();
        $contact->first_name = $request->input('firstName');
        $contact->last_name = $request->input('lastName');
        $contact->email = $request->input('email');
        $contact->phone_no = $request->input('phone_no');
        $contact->state = $request->input('state');
        $contact->city = $request->input('city');
        $contact->zip_code = $request->input('zip_code');
        $contact->message = $request->input('message');
        $result = $contact->save();
        if ($result) {

            Mail::to($request->input('email'))->send(new \App\Mail\ContactUsMail($contact));

            session()->flash('result', [
                'message' => 'Contact Save Successfully..!',
                'type' => 'success',
            ]);
            return redirect()->back();
        }

    }

    public function contactUsGeneratePdf()
    {
        $contacts = Contact::all();
        view()->share('contacts', $contacts);
        $pdf = PDF::loadView('admin.contact_list_pdf');
        return $pdf->download('dnsmastertools_contact_us.pdf');
    }

    public function userDataGeneratePdf()
    {
        $users = User::where('user_type', 'user')->get();
        view()->share('users', $users);
        $pdf = PDF::loadView('admin.user_data_list_pdf');
        return $pdf->download('dnsmastertools_user_data.pdf');
    }


}
