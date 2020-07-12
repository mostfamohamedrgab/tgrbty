<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLogin;

class AuthController extends Controller
{

    public function showlogin(){
      return view('admin.login');
    }
    // login
    public function login(AdminLogin $req){
      // $remember_me = ! empty($req->remember_me); // checkbox remmeber
      // get admin data
      $data = [
        'email' => $req->email,
        'password' => $req->password
      ];
      // check data
      if(auth()->guard('admin')->attempt($data))
      {
        return redirect()->route('admin.');
      }
      // back if notfound
      return back()->with('danger','البينات غير موجود !');
    }

    // logout
    public function logout(){
      auth()->guard('admin')->logout();
      return redirect()->route('admin.login');
    }

}
