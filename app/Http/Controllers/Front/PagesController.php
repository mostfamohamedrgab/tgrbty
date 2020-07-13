<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Section;
use App\User;

class PagesController extends Controller
{
    //@ blogPage
    public function blog(Request $req){

      $experience = Experience::activeExp()->where(function ($q) use ($req){
          $q->where('section_id',$req->section_id)
            ->Orwhere('title','LIKE','%'.$req->title.'%');
      })->limit(20)->paginate(20);

      $pageTitle = 'التجارب';
      $sections = Section::all();
      return view('pages.experiences', \compact('sections','pageTitle','experience'));
    }
    // @showpost
    public function showpost($id,$slug)
    {
      $exp = Experience::where('id', $id)->first();
      $exp->likesCount = $exp->likes->count();
      $exp->dislikesCount = $exp->dislikes->count();
      $keywords = $exp->keywords;
      // Related Experiences
      $relatedexp = Experience::where('section_id',$exp->section_id)
                                ->where('id','!=',$exp->id)
                                ->get();
      $pageTitle = $exp->title;
      $sections = Section::select('id','name')->get();
      $user = $exp->user;
      $subpath = true; // if the link position will not be in the public
      return view('pages.showexp', \compact('keywords','relatedexp','subpath','user','sections','pageTitle','exp'));
    }
    // # contactPage
    public function contact(){
      $pageTitle = 'أتصل بنا';
      return view('pages.contact', \compact('pageTitle'));
    }
    // # showuser
    public function showuser(User $user)
    {
      $pageTitle = $user->name;
      $sections = Section::select('id','name')->get();
      $subpath = true; // if the link position will not be in the public
      return view('pages.showuser', \compact('subpath','sections','pageTitle','user'));
    }

}
