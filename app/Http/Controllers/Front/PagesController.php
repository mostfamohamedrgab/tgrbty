<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Section;

class PagesController extends Controller
{
    //@ blogPage
    public function blog(){
      $experience = Experience::activeExp()->limit(20)->paginate(20);
      $pageTitle = 'التجارب';
      return view('pages.experiences', \compact('pageTitle','experience'));
    }
    // @showpost
    public function showpost($slug)
    {
      $exp = Experience::where('slug', $slug)->first();
      $pageTitle = $exp->title;
      $sections = Section::select('id','name')->get();
      return view('pages.showexp', \compact('sections','pageTitle','exp'));
    }
}
