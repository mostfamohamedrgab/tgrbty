<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Section;
use App\Models\Experience;
use Storage;

class ProfileController extends Controller
{
  // #profilRequest
    public function profile(){
      $user = auth()->user();
      $pageTitle = $user->name;
      $sections = Section::select('id','name')->get();
      return view('pages.profile', compact('sections','user','pageTitle'));
    }
      /*** # editprofile ####**/
      public function editprofile(Request $request)
      {
        $user = User::findOrFail(auth()->id());

        $data = $request->validate([
          'name' => 'required|min:5|max:255',
          'email' => 'required|email|unique:users,email,'.auth()->id(),
          'password' => 'nullable|min:8|max:20',
          'about' => 'nullable|min:5|max:250',
          'img' => 'nullable',
        ],[
            'about.min' => 'النبذة لايمكن ان تكون اقل من 5',
            'about.max' => 'النبذة لايمكن ان تكون اكبر من 250',
        ]);

        // check passowrd
        $data['password'] = $user->password;
        if(! empty($request->password))
          $data['password'] = password_hash($request->password,PASSWORD_DEFAULT);
       // set old imag
        $data['img'] = $user->img;
        // hundel image
        if($request->hasFile('img')){
         $data['img'] = uplode_img($request->img); // set new iamge to update
         $data['uplodeImg'] = true;
         // remove Old Image
         if($user->img != 'avatar.png')
          Storage::disk('imgs')->delete($user->img);
        }
        $user->update($data);
        return back()->withSuccess('تم تعديل بيناتك بنجاح');
      }

      // # addexp
      public function addexp(Request $request){

        $data = $request->validate([
          'content' => 'required|min:100|max:5000',
          'section_id' => 'required'
        ],[
          'section_id.required' => 'القسم مطلوب',
          'content.required' => 'التجربه مطلوبة',
          'content.min' => 'لايمكن ان تكون التجربة اقل من 100 كلمه',
          'content.max' => 'لايمكن ان تكون التجربة اكثر من 5000 كلمة',
        ]);
        $data['user_id'] = auth()->id();

        Experience::create($data);
        return back()->withSuccess("سيتم مراجعة التجربه قبل نشرها واعلامك عن طريق البريد");
      }


}
