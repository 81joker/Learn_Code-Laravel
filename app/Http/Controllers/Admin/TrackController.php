<?php

namespace App\Http\Controllers\Admin;


use App\Track;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::orderBy('id', 'desc')->paginate(9);
        return view('admin.tracks.index' , compact('tracks'));
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
        $rules =[
            'name' => 'required|min:3|max:50'
        ];
        $this->validate($request , $rules);

        if(Track::create($request->all())){
            return redirect('admin/tracks')->withStatus('Track Successfuly Created');
        }else{
            return redirect('admin/tracks')->withSatuts('Something Wrong Tray again');
        }

    }

  
    public function show(Track $track)
    {
        return view('admin.tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
    
        return view('admin.tracks.edit', compact('track'));
    }


    
    public function update(Request $request,Track $track)
    {
        $rules = [
            'name' => 'required|min:3|max:10'
        ];
        $this->validate($request , $rules);
        
        if($request->has('name')){
        
            $track->name = $request->name;
        }

        if($track->isDirty()){
            $track->save();
            return redirect('/admin/tracks')->withStatus('Track successfully ');
        } else{
            return redirect('/admin/'.$track->id.'/edit')->withStatus('Nothing Change');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();

        return redirect()->route('tracks.index', compact('track'))->withStatus(__('Track successfully deleted.'));
    }
}
