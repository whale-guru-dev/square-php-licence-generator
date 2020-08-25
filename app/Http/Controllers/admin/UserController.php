<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin.user.users', compact('users'));
    }

    public function userSearch(Request $request)
    {
        $this->validate($request,
            [
                'search' => 'required',
            ]);

        $users = User::where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->get();
        if(!$users)
            $users = [];
        return view('admin.user.search', compact('users'));

    }

    public function single($id)
    {
        $user = User::findorFail($id);

        return view('admin.user.single', compact('user'));
    }

    public function statupdate(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request,
            [
                'name' => 'required|string|max:255'
            ]);

        $user['name'] = $request->name;

        $user->save();


        return back()->withSuccess('User Profile Updated Successfuly');
    }
}
