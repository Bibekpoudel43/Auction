<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function settings()
    {
        return view('admin.profile.settings');
    }

    public function checkPassword(Request $request)
    {

        $userid = auth()->user()['id'];
        $data = $request->all();
        $current_password = $data['current_pwd'];

        $check_password = Admin::where(['id' => $userid])->first();

        if(Hash::check($current_password, $check_password->password)){
            echo 'true'; die;
        }
        else
        {
             echo 'false'; die;
        }
    }

    public function updatePassword(Request $request)
    {
        if($request->isMethod('post'))
        {
            $userid = auth()->user()['id'];
            $data = $request->all();
            $current_password = $data['current_password'];

            $check_password = Admin::where(['id' => $userid])->first();

            if(Hash::check($current_password, $check_password->password)){

                $password = bcrypt($data['new_password']);
                Admin::where('id' , $userid)->update(['password' => $password]);
                Session::flash('flash_success_message', 'Password updated Successfully');
                return redirect('/admin/settings');            }
            else
            {
                Session::flash('flash_error_message', 'Incorrect current Password');
                return redirect('/admin/settings');

            }
        }
    }
}
