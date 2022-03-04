<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Blog::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'detail'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);

        $imageName=time().'_'.$request->title.'.'.$request->image->extension();

        $request->image->move(public_path('Images'), $imageName);

        $data = Blog::create([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'detail'=>$request->get('detail'),
            'image_path'=> $imageName
        ]);

        return $data;

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
        return Blog::find($id);
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
        $data =Blog::find($id);
        $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'detail'=>'required|string',
            'image'=>'mimes:png,jpg,jpeg'
        ]);

        // $imageName=time().'_'.$request->title.'.'.$request->image->extension();

        // $request->image->move(public_path('Images'), $imageName);

        $data->update([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'detail'=>$request->get('detail'),
            //'image_path'=> $imageName
        ]);

        return $data;

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
}
