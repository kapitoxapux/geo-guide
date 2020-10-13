<?php

namespace App\Http\Controllers;

use App\Images;
use App\Zadacha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZadachaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $zadacha=Zadacha::findOrFail($id);
        //dd($zadacha);
        return view('zadacha',compact('zadacha'));
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
        $collection=Zadacha::where('parent',intval(request('parent')))->get();
        return response()->json($collection);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function geodesy()
    {
        $collection=Zadacha::where('parent',2)->paginate(15);
        //dd($collection);
        return view('geodesy',compact('collection'));
    }

    public function geology()
    {
        $collection=Zadacha::where('parent',3)->paginate(15);
        //dd($collection);
        return view('geology',compact('collection'));
    }

    public function hydraulics()
    {
        $collection=Zadacha::where('parent',4)->paginate(15);
        //dd($collection);
        return view('hydraulics',compact('collection'));
    }

    public function basket()
    {
        //$collection=Zadacha::where('parent',4)->paginate(10);
        //dd($collection);
        return view('basket');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function image(Request  $request)
    {
        $path = $request->file('images')->store('vault','public');
        $image=new Images();
        $image->zadacha_id=request('id');
        $image->path=$path;
        $image->save();
        return back();
    }
}
