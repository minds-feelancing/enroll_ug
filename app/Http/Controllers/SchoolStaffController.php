<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SchoolStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(School $school)
    {
        //
        return view('schools.staff' , ['school' => $school]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(School $school)
    {
        return view('schools.addStaff' , ['school' => $school]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , School $school)
    {
        //
        
        $data = $request->validate([
            'lastName' => 'required',
            'firstName' => 'required',
            'email' => 'required|unique:school_staff,email',
            'phone_number' => 'required|numeric'
        ]);


        $data['role'] = 'admin';
        $data['school_id'] = $school->id;
        $data['password'] = Hash::make('enroll123');


        if(SchoolStaff::create($data)){
            return redirect()->to("schools/$school->id/staff/create")->with('success','School Staff Form was registered successfully');
        }else{
            return redirect()->to("schools/$school->id/staff/create")->with('error','operation was unsuccessful');
 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolStaff  $schoolStaff
     * @return \Illuminate\Http\Response
     */
    public function show( School $school, SchoolStaff $staff)
    {
        return view('schools.user' , ['school' => $school , 'user' =>$staff]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolStaff  $schoolStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolStaff $schoolStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolStaff  $schoolStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolStaff $schoolStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolStaff  $schoolStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolStaff $schoolStaff)
    {
        //
    }


    public function login(){
        return view('schools.login');
    }



    public function authenticate(){

        $data =  request()->validate([
            'email'=>'required|email',
            'password' => 'required'
        ]);

        // dd($data);

        if(auth('staff')->attempt($data)){

            // dd($data);

            request()->session()->regenerate();

            return redirect()->route('school.dashboard');
        }

        return back()->withErrors([
            'email' => 'The credentials you provided do not match any account'
        ]);
    }



    public function dashboard(){

        $school = School::find(auth('staff')->user()->school_id); 
        return view('schools.dashboard.index',['school' =>  $school]);
    }


    public function applications(){

        $school = School::find(auth('staff')->user()->school_id); 
        return view('schools.dashboard.applications',['school' =>  $school]);
    }

    public function settings(){

        $school = School::find(auth('staff')->user()->school_id); 
        return view('schools.dashboard.settings',['school' =>  $school]);
    }


}
