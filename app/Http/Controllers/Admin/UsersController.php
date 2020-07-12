<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
          'name' => 'required|min:4',
          'email' => 'required|email',
          'password' => 'required|min:8',
          'about' => 'nullable'
        ]);
      // hundel image
      if($request->hasFile('img')){
       $data['img'] = uplode_img($request->img);
      }
      // hash Password
      $data['password'] = password_hash($request->password,PASSWORD_DEFAULT);

      User::create($data);
      return back()->withSuccess('تم الاضافة بنجاح ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
      $user = User::findOrFail($id);
      $data = $request->validate([
        'name' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'nullable|min:8',
        'about' => 'nullable'
      ]);

    // check passowrd
    $data['password'] = $user->password;

    if(! empty($request->password))
    {
      $data['password'] = password_hash($request->password,PASSWORD_DEFAULT);
    }

   // set old imag
    $data['img'] = $user->img;
    // hundel image
    if($request->hasFile('img')){
     $data['img'] = uplode_img($request->img); // set new iamge to update
     // remove Old Image
     if($user->img != 'avatar.png')
      Storage::disk('imgs')->delete($user->img);
    }

    $user->update($data);
    return back()->withSuccess('تم التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      /// delete admin image
      if($user->img != 'avatar.png')
       Storage::disk('imgs')->delete($user->img);

      $user->delete();
      return back()->withSuccess('تم الحذف ');
    }
}
