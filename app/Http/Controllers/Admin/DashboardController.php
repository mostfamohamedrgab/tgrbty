<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\User;
use App\Models\Experience;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // index
    public function index(){
      $msgsCount = Contact::count();
      $usersCount = User::count();
      $experienceCount = Experience::count();

      $users = User::all();

      foreach($users as $user)
      {
        $user->created = Carbon::parse($user->created_at)->timestamp;
      }

      return view('admin.index',\compact('users','msgsCount','usersCount','experienceCount'));
    }
}
