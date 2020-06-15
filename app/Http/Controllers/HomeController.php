<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DataVoice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empdata = DataVoice::all();
        return view('home', compact('empdata'));
        //return view('home');
    }
}
