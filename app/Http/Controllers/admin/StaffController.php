<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input as input;
use App\Admin;

class StaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function changeprofile()
    {
        return view('admin.auth.changepass');
    }

    public function updateprofile(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = Auth::guard('admin')->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        $user->save();

        return back()->with('success', 'Profile Updated');

    }

    public function validator(array $data)
    {
        $messages = [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Already used email',
            'username.required' => 'Username is required',
            'username.unique' => 'Already used username'
        ];

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('admins')->ignore(Auth::guard('admin')->user()->id),
            ],
            'username' => [
                'required',
                'max:255',
                Rule::unique('admins')->ignore(Auth::guard('admin')->user()->id),
            ]
        ],$messages);
    }

    public function updatepass()
    {
        $user = Auth::guard('admin')->user();

        if(Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('password_confirmation'))
        {
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            return back()->with('success', 'Password Changed');
        }
        else {
            {
                return back()->with('alert', 'Password Not Changed');
            }
        }
    }

    public function stuffManagement()
    {
        $admins = Admin::where('id', '!=', 1)->paginate(10);
        return view('admin.stuff.stuff', compact('admins'));
    }

    public function deleteAdmin(Request $request)
    {
        $aid = $request->aid;
        $admin = Admin::find($aid);
        $admin->delete($aid);
        return back()->with('success', 'Admin Deleted');
    }
}
