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
        $experience = Experience::activeExp()->paginate(20);
        $sections = Section::select('id','name')->get();
        $pageTitle = 'الرئيسية';
        return view('home', \compact('pageTitle','experience','sections'));
    }
}
