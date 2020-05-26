<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cource;
use App\Vadio;

class CourseVideo extends Controller
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

  

    public function create(Cource $course)
    { 
        return view('admin.courses.coursevideo' ,compact('course'));
    }



    
    public function store(Request $request)
    {
        $rules = [
            'title'     => 'required|min:10|max:100',
            'link'      => 'required|url',
            'course_id' => 'required|integer'
        ];

        $this->validate($request , $rules);


        $video = Vadio::create($request->all());
        if($video){
            return redirect('/admin/courses')->withStatus('Video Successfuly Created');
            // return redirect()->back()->withStatus('Video Successfuly Created');

        } else {
            return redirect('/admin/videos/create')->withStatus('Sothing ');
        }    }

   

    public function show($id)
    {
        //
    }



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
    public function destroy(Vadio $video)
    {
        $video->delete();
   
        return redirect('/admin/courses')->withStatus__('Video successfully deleted.');
    }
}
