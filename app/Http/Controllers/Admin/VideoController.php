<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vadio;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Vadio::orderBy('id' ,'desc')->paginate(9);
        return view('admin.videos.index' , compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
    }

 
    public function store(Request $request , Vadio  $videos)
    {
        $rules = [
            'title'     => 'required|min:10|max:100',
            'link'      => 'required|url',
            'course_id' => 'required|integer'
        ];

        $this->validate($request , $rules);


        $video = Vadio::create($request->all());
        if($video){
            return redirect('admin/videos')->withStatus('Video Successfuly Created');
        } else {
            return redirect('/admin/videos/create')->withStatus('Sothing ');
        }
    }

 
    public function show(Vadio  $video)
    {
        return view('admin.videos.show' , compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vadio $video )
    {
        return view('admin.videos.edit' , compact('video'));
    }


    public function update(Request $request,Vadio $video)
    {
        $rules = [
            'title'     => 'required|min:10|max:100',
            'link'      => 'required|url',
            'course_id' => 'required|integer'
        ];
        $this->validate($request , $rules);
        
        if($video->update($request->all())){

            return redirect('/admin/videos')->withStatus('Video Successfuly Updeted');
        } else {
    
            return redirect('admin/videos'.$video->id.'/edit')->withStatus('Somthong wrong Trav Again');
        }
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
   
        return redirect('/admin/videos')->withStatus__('Video successfully deleted.');
    }
}
