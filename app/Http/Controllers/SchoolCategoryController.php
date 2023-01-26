<?php

namespace App\Http\Controllers;

use App\Models\SchoolCategory;
use Illuminate\Http\Request;

class SchoolCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');

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
        $data = $request->validate(['name' => 'required|unique:school_categories,name','courses' => 'required' , 'levels' => 'required']);

        // dd($data);

        if(SchoolCategory::create($data)){

           return  redirect()->route('categories.create')->with('success','School category was added successfully');
        }


        return  redirect()->route('categories.create')->with('error','School category was added successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolCategory  $schoolCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolCategory $category)
    {
        return view('categories.show' , ['category' => $category]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolCategory  $schoolCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolCategory $category)
    {
        //
        return view('categories.edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolCategory  $schoolCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolCategory $category)
    {
               //
               $data = $request->validate(['name' => 'required','courses' => 'required' , 'levels' => 'required']);

               // dd($data);
       
               if($category->update($data)){
       
                  return  redirect()->route('categories.index')->with('success','School category was updated successfully');
               }
       
       
               return  redirect()->route('categories.index')->with('error','School category was not  updated ');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolCategory  $schoolCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolCategory $schoolCategory)
    {
        //
    }


    public function schoolCategories(){

        $response = SchoolCategory::paginate(50);

        return response()->json($response,'200');;



    }
}
