<?php

namespace App\Http\Controllers;

use App\Zadacha;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitemap()
    {
      	/*
        'pagetitle',
        'longtitle',
        'description',
        'alias',
        'published',
        'parent',
        'introtext',
        'content',
        'menuindex'
        */
        //$post = Zadacha::approved()->orderBy('updated_at', 'desc')->first();
    }

  	public function index()
	{
	  $geodesy = Zadacha::select('id','updated_at')
          ->where('parent',2)
          ->where('published',1)
          ->get();
      $geology = Zadacha::select('id','updated_at')
          ->where('parent',3)
          ->where('published',1)
          ->get();
      $hydraulics = Zadacha::select('id','updated_at')
          ->where('parent',4)
          ->where('published',1)
          ->get();

	  return response()->view('sitemap.index',compact('geodesy','geology','hydraulics'))->header('Content-Type', 'text/xml');
	}
}
