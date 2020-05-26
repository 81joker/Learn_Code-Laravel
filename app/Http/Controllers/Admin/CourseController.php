<?php

namespace App\Http\Controllers\Admin;


use App\Cource;
use App\Photo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses = Cource::orderBy('id' , 'desc')->paginate(20);
        return view('admin.courses.index', compact('courses'));
    }

  
    public function create()
    {
        return view('admin.courses.create');
    }

    


    public function store(Request $request)
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
      
        return redirect('/admin/courses')->withStatus('Course Successfuly Ceated');

        }


        

      
   
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cource $course)
    {
        return view('admin.courses.show' ,compact('course'));
    }



    public function edit(Cource $course)
    {

    //   $course = Cource::finde($id);
      return  view('admin.courses.edit',compact('course'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cource $course)
    {
        $rules = [
            'title'    => 'required|min:10|max:350',
            'status'   => 'required|integer|in:0,1',
            'link'     => 'required|url',
           'track_id'  => 'required|integer'
    ];
    $this->validate($request , $rules);

    $course->update($request->all());
    
        if ($file = $request->file('image')) {
            $filename = $file->getClientOriginalName();
            $fileextension= $file->getClientOriginalExtension();
            $file_to_store = time().'_'.explode('.' , $filename)[0].'_.'.$fileextension;

          
            if ($file->move('images' , $file_to_store)){
                if($course->photo){

                    $photo = $course->photo;  
                    // remove photo from server
                    $filename = $photo->filename;
                    unlink('images/'.$filename);

                    $photo->filename = $file_to_store;
                    $photo->save();
                } else{
                    Photo::create([
                        'filename'       => $file_to_store,
                        'photoable_id'   =>  $course->id,
                        'photoable_type' =>  'App\Cource',
                    ]);
                }
                    
    }
}
    return redirect('/admin/courses')->withStatus('Course Successfuly Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cource $course)
    {
        if($course->photo){
            $filename = $course->photo->filename;
            unlink('images/'.$filename);
        }
        if ($course != null) {
        $course->photo->delete();
        $course->delete();

        return redirect('/admin/courses')->withStatus(__('Courses successfully deleted.'));
    }
}
}
