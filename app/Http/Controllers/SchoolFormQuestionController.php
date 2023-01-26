<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolFormQuestion;
use App\Models\SchoolFormSection;
use Illuminate\Http\Request;

class SchoolFormQuestionController extends Controller
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
        $data = $request->validate([
            'question' => 'required|min:3|max:255',
            'question_type' => 'required',
            'numbering' => 'required',
            'school_id' => 'required|exists:schools,id',
            'form_section' => 'required'

        ]);

        $data['question'] = htmlspecialchars(trim($request->question)); 
        $data['numbering'] = htmlspecialchars(trim($request->numbering)); 

        if($request->question_type != "open-ended"){

            $data['answers'] = [];


            foreach($request->options as $option){
                $data['answers'][] = htmlspecialchars(trim($option));
            }

            $data['answers']= json_encode($data['answers']);
            unset($data['options']);
        }

        if(SchoolFormQuestion::create($data)){

            return redirect()->to("schools/$request->school_id/form")->with('success','School was updated successfully');
        }else{
            return redirect()->to("schools/$request->school_id/form")->with('error','operation was unsuccessful');
 
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolFormQuestion  $schoolFormQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolFormQuestion $schoolFormQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolFormQuestion  $schoolFormQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolFormQuestion $schoolFormQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolFormQuestion  $schoolFormQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolFormQuestion $question)
    {
        $data = $request->all();
        $school = School::find($question->school_id);
        if(isset($data['question'])){
            $data['question'] = htmlspecialchars(trim($request->question)); 
            $data['numbering'] = htmlspecialchars(trim($request->numbering)); 
            if($request->question_type != "open-ended"){

                $data['answers'] = [];
    
    
                foreach($request->options as $option){
                    $data['answers'][] = htmlspecialchars(trim($option));
                }
    
                $data['answers']= json_encode($data['answers']);
                unset($data['options']);
            }

        }
        
    
        unset($data['_method']);
        unset($data['_token']);
        if($question->update($data)){
            return redirect()->to("schools/$school->id/form")->with('success','School was updated successfully');
        }else{
            return redirect()->to("schools/$school->id/form")->with('error','operation was unsuccessful');
 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolFormQuestion  $schoolFormQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolFormQuestion $question)
    {
        $school = School::find($question->school_id);

        if($question->delete()){
            return redirect()->to("schools/$school->id/form")->with('success','School was updated successfully');
        }else{
            return redirect()->to("schools/$school->id/form")->with('error','operation was unsuccessful');
 
        }
    }



    public function section_create(Request $request){

        $data = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required',
            'ordering' => 'required',
            'school_id' => 'required|exists:schools,id'
        ]);

        $data['title'] = htmlspecialchars(trim($request->title)); 
        $data['description'] = htmlspecialchars(trim($request->description)); 

        if(SchoolFormSection::create($data)){

            return redirect()->to("schools/$request->school_id/form")->with('success','School Form was updated successfully');
        }else{
            return redirect()->to("schools/$request->school_id/form")->with('error','operation was unsuccessful');
 
        }

    }


    public function section_destroy(SchoolFormSection $section){

        $school = School::find($section->school_id);

        if($section->delete()){
            return redirect()->to("schools/$school->id/form")->with('success','School was updated successfully');
        }else{
            return redirect()->to("schools/$school->id/form")->with('error','operation was unsuccessful');
 
        }
    }
}
