<?php

namespace App\Http\Controllers;

use App\Zadacha;
use Illuminate\Http\Request;

class CabinetController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection=Zadacha::select('id','pagetitle','content')->get();

        return view('home',compact('collection'));
    }
}
