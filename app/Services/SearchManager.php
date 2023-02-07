<?php 


namespace App\Services;

use Illuminate\Http\Request;
use App\Models\School;

class SearchManager {


    public  static function SearchSchoolAll($request){

        //Keword +  category + school_type

            $schools = School::query()
            ->where(function($query)use($request){
                $query->where('name','LIKE',"%$request->school_name%")
                ->where('category_id','=', $request->school_category)
                    ->where('ownership', '=',$request->school_check);     
            })
            ->paginate(25);
            //dd($schools);
        
        return $schools;
        
    }

    public  static function SearchSchoolType($request){

        //Keywords  + category  + NULL

            $schoolsOne = School::query()
            ->where(function($query)use($request){
                $query->where('name', 'LIKE',"%$request->school_name%")
                ->where('category_id','=', $request->school_category);                   
            })
            ->paginate(25);       

        return $schoolsOne;
        
    }

    public  static function SearchSchoolCategory($request){

        //Keywords  + Null  + school_type

            $schoolsTwo = School::query()
            ->where(function($query)use($request){
                $query->where('name', 'LIKE',"%$request->school_name%")
                ->where('ownersihip', '=',$request->school_check);                    
            })
            ->paginate(25);        

            return $schoolsTwo;
        
    }

    public  static function SearchSchoolName($request){

        //Keywords  + Null + NULL

            $schoolsThree = School::where('name', 'LIKE',"%$request->school_name%")
            ->paginate(25);      

        return $schoolsThree;
        
    }

    public  static function ShowSchoolType($request){

        //Null  + school_type + NULL

            $schoolsfour = School::where('ownership', '=',$request->school_check)
            ->paginate(25);      

        return $schoolsfour;
        
    }

    public  static function ShowSchoolCategory($request){

        //Null  + school category + NULL

            $schoolsfive = School::where('category_id','=', $request->school_category)
            ->paginate(25);      

        return $schoolsfive;
        
    }

    public  static function ShowSchoolCategoryAndType($request){

        //Null  + school category + NULL

        $schoolsSix = School::query()
        ->where(function($query)use($request){
            $query->where('ownership', '=',$request->school_check)
            ->where('category_id','=', $request->school_category);                   
        })
        ->paginate(25);           

        return $schoolsSix;
        
    }




}