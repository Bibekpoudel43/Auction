<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
   public function profile($username){

   		$users = User::where('username', $username)->first();

   		return view('user.profile', ['users' => $users]);
   }
}
