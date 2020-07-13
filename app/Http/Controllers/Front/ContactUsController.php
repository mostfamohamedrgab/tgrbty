<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Mail\NewContactMsg;
use Mail;

class ContactUsController extends Controller
{
    // # Contact msg
    public function send(Request $req)
    {
      $data = $req->validate([
        'name' => 'required|min:5|max:100',
        'email' => 'required|email',
        'msg' => 'required|min:5|max:255',
      ],[
        'msg.max' => "يجب ان لاتكون الرساله اكبر من 255",
        'msg.min' => 'يجب الا تكون الرساله اقل من 5',
        'msg.required' => 'الرسالة مطلوبة'
      ]);

      Mail::to('mostfamohmed361@gmail.com')
        ->send(new NewContactMsg($data));
      Contact::create($data);
      return back()->withSuccess('شكرا لك تم استلام رسالتك .');
    }
}
