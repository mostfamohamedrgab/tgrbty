<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('admin.admins.index', compact('admins'));
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
        ]);

        // hundel image
      if($request->hasFile('img')){
       $data['img'] = uplode_img($request->img);
      }

      // hash Password
      $data['password'] = password_hash($request->password,PASSWORD_DEFAULT);

      Admin::create($data);
      return back()->withSuccess('تم الاضافة بنجاح ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $admin = Admin::findOrFail($id);
        $data = $request->validate([
          'name' => 'required|min:4',
          'email' => 'required|email',
          'password' => 'nullable|min:8',
        ]);

      // check passowrd
      $data['password'] = $admin->password;

      if(! empty($request->password))
      {
        $data['password'] = password_hash($request->password,PASSWORD_DEFAULT);
      }

     // set old imag
      $data['img'] = $admin->img;
      // hundel image
      if($request->hasFile('img')){
       $data['img'] = uplode_img($request->img); // set new iamge to update
       // remove Old Image
       if($admin->img != 'avatar.png')
        Storage::disk('imgs')->delete($admin->img);
      }


      $admin->update($data);
      return back()->withSuccess('تم التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        /// delete admin image
        if($admin->img != 'avatar.png')
         Storage::disk('imgs')->delete($admin->img);

        $admin->delete();
        return back()->withSuccess('تم الحذف ');
    }
}
