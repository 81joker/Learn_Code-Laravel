<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Track;
use App\Cource;
use App\Photo;

class TrackCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Track $track)
    {
        return view('admin.tracks.trackscourses' , compact('track'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Track $track)
    {
        $rules = [
            'title'    => 'required|min:10|max:150',
            'status'   => 'required|integer|in:0,1',
            'link'     => 'required|url',
           'track_id'  =>'required|integer'
    ];
    $this->validate($request , $rules);

    $course = Cource::create($request->all());
    if($course){
        if ($file = $request->file('image')) {
            $filename = $file->getClientOriginalName();
            $fileextension= $file->getClientOriginalExtension();
            $file_to_store = time().'_'.explode('.' , $filename)[0].'_.'.$fileextension;

            if ($file->move('images' , $file_to_store)){

                Photo::create([
                    'filename'       => $file_to_store,
                    'photoable_id'   =>  $course->id,
                    'photoable_type' =>  'App\Cource',
                ]);
            }

    }
  
    return redirect('/admin/tracks')->withStatus('Course Successfuly Ceated');

    }


    }

    
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
}
