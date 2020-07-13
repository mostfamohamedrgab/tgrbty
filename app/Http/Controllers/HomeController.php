<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Experience;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $experience = Experience::activeExp()->limit(20)->get();
        $sections = Section::select('id','name')->get();
        $pageTitle = 'الرئيسية';
        // Best Likes
        $bestExp = Experience::activeExp()->limit(20)->get();
        foreach($bestExp as $exp)
        {
            $exp->setAttribute('likesCount',$exp->likes->count());
        }
        $bestExp = $bestExp->sortByDesc(function ($exp){
            return $exp->likesCount;
        });

        return view('home', \compact('bestExp','pageTitle','experience','sections'));
    }
}
