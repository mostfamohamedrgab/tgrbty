<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use App\User;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Mail\ExpApproved;
use Mail;
use Storage;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::paginate(20);
        return view('admin.experiences.index' ,compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $sections = Section::all();
        return view('admin.experiences.create' ,compact('sections','users'));
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
          'title' => 'required|min:5|max:255',
          'img'   => 'required',
          'content' => 'required|min:10',
          'user_id' => 'required',
          'section_id' => 'required',
          'anonymous' => 'nullable',
          'approved' => 'required'
        ]);
        $data['slug'] = Str::slug($request->title);
        $data['img'] = uplode_img($request->img);

        Experience::create($data);
        return back()->withSuccess('تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        $users = User::all();
        $sections = Section::all();

        return view('admin.experiences.edit' ,compact('experience','sections','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
      $experience = Experience::findOrFail($id);

      $data = $request->validate([
        'title' => 'required|min:5|max:255',
        'img'   => 'nullable',
        'content' => 'required|min:10',
        'user_id' => 'required',
        'section_id' => 'required',
        'anonymous' => 'nullable',
        'approved' => 'required'
      ]);

      $data['slug'] = Str::slug($request->title);
      $data['img'] = $experience->img;
      // check if uploed new image update image and remove old one
      if($request->hasFile('img')){
        $data['img'] = uplode_img($request->img);
        Storage::disk('imgs')->delete($experience->img);
      }

      $experience->update($data);
      return back()->withSuccess('تم الاضافة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        //
    }

    // chnage experiences stutes
    // @ 0 => disacrive
    // @ 1 => active

    public function changestuts($id)
    {
        $experience = Experience::where('id',$id)->first();

        if($experience->approved == 1)
        {
          $experience->update([
            'approved' => 0
          ]);
        // send Approved Mail
        Mail::to($experience->user->email)
          ->send(new ExpApproved($experience->title));

          return 0;
        }else
        {
          $experience->update([
            'approved' => 1
          ]);
          return 1;
        }
    }
}
