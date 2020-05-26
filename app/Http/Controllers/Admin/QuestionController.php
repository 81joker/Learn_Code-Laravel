<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::orderBy('id' , 'desc')->paginate(10);
     return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question)
    {
        return view('admin.questions.create' , compact('question'));
    }
 
    public function store(Request $request)
    {
      
        $rules = [
            'title'        => 'required|min:20|max:1000',
            'answers'      => 'required|min:10|max:1000',
            'right_answer' => 'required|min:5|max:100',
            'score'        => 'required|integer|in:5,10,15,20,25,30',
            'quiz_id'      => 'required|integer'
        ];
        $this->validate($request , $rules);
        if(Question::create($request->all())){
            return redirect('/admin/questions')->withStatus('Questions Successfuly Created');
        } else {
            return redirect('/admin/questions/ceate')->withStatus('Questions Successfuly Created');

        }
        
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


    public function edit(Question $question)
    {
        return view('admin.questions.edit' , compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $rules = [
            'title'        => 'required|min:20|max:1000',
            'answers'      => 'required|min:10|max:1000',
            'right_answer' => 'required|min:5|max:100',
            'score'        => 'required|integer|in:5,10,15,20,25,30',
            'quiz_id'      => 'required|integer'
        ];
        $this->validate($request , $rules);
        if($question->update($request->all())){
            return redirect('/admin/questions')->withStatus('Questions Successfuly Updeted');
        } else {
            return redirect('/admin/questions/'.$question->id.'/edit')->withStatus('Questions Sothing wrong');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
       if($question->delete()){
           return redirect('/admin/questions')->withStatus('Question Successfuly Deleted');
       }
        
    }
}
