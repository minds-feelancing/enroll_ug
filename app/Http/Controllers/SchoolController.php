<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolCategory;
use App\Models\SchoolFormQuestion;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('schools.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('schools.create',['categories' => SchoolCategory::all(['id', 'name'])]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone_number' => 'required',
            'category_id' => 'required|exists:school_categories,id',
            'ownership' => 'required',
            'address' => 'required',
            'district' => 'required',
            'region' => 'required',
            'religious_affiliation' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'background' => 'required',
            'barge' => 'required|mimes:png,jpeg,svg',
            'main_banner'=> 'required|mimes:png,jpeg,svg',
            'secondary_banner'=> 'required|mimes:png,jpeg,svg',
            'bank_name' => 'required|min:3',
            'account_number' => 'required|min:3',
            'account_name'=> 'required|min:3',
            'commission'=> 'required|numeric',
            'application_fees' => 'required|numeric',
            'commission_method' => 'required'
        ]);

        $data = $request->all();

        $data['main_banner'] = $request->file('main_banner')->store('banners','public'); 
        $data['barge_image'] = $request->file('barge')->store('barges','public'); 
        $data['secondary_banner'] = $request->file('secondary_banner')->store('banners','public'); 
        $data['phone_numbers'] = json_encode($data['phone_number']);
        $data['mission'] = htmlspecialchars($data['mission']);
        $data['vision'] = htmlspecialchars($data['vision']);
        $data['background'] = htmlspecialchars($data['background']);
        $data['name'] = htmlspecialchars(trim($data['name']));
        $data['parent_school_id'] = 0;

         unset($data['_token']);
         unset($data['_method']);
         unset($data['phone_number']);
         unset($data['barge']);


        if(School::create($data)){

            return redirect()->to('schools')->with('success','School was added successfully');
        }else{
            return redirect()->to('schools/create')->with('error','operation was unsuccessful');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        
        return view('schools.show',['school' => $school  ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('schools.edit',['school' => $school, 'categories' => SchoolCategory::all(['id', 'name'])]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'phone_number' => 'required',
        //     'category_id' => 'required|exists:school_categories,id',
        //     'ownership' => 'required',
        //     'address' => 'required',
        //     'district' => 'required',
        //     'region' => 'required',
        //     'religious_affiliation' => 'required',
        //     'mission' => 'required',
        //     'vision' => 'required',
        //     'background' => 'required',
        // ]);

        $data = $request->all();

        $data['phone_numbers'] = json_encode($data['phone_number']);
        $data['mission'] = htmlspecialchars($data['mission']);
        $data['vision'] = htmlspecialchars($data['vision']);
        $data['background'] = htmlspecialchars($data['background']);
        $data['name'] = htmlspecialchars(trim($data['name']));

        if($request->hasFile('barge')){
            $data['barge_image'] = $request->file('barge')->store('barges','public'); 
        }

        if($request->hasFile('main_banner')){
            $data['main_banner'] = $request->file('main_banner')->store('banners','public'); 
        } 
        
        if($request->hasFile('secondary_banner')){
            $data['secondary_banner'] = $request->file('secondary_banner')->store('banners','public'); 
        }

        unset($data['_token']);
        unset($data['phone_number']);
        unset($data['barge']);
        unset($data['_method']);



        // dd($data);


       if($school->update($data)){

           return redirect()->to('schools')->with('success','School was updated successfully');
       }else{
           return redirect()->to("schools/$school->id/edit")->with('error','operation was unsuccessful');

       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }


    public function schools(){

        $response = School::paginate(50);

        return response()->json($response,'200');;

    }


    public function form(School $school){

        $questions=$school->questions()->get();
        $sections=$school->sections()->get();

        return view('schools.form',['school' =>$school  ,'questions'=> $questions , 'sections' => $sections]);
    }


    public function staff(School $school){

        $response = $school->staff()->paginate(50);

        return response()->json($response,'200');;

    }
}
