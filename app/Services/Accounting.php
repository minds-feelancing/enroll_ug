<?php 


namespace App\Services;

use App\Models\Account;
use App\Models\School;

class Accounting {


    public const RANGE = "1020000900";

    public const SCHOOL = 'SCHOOL';

    public const GATEWAY = 'GATEWAY';


    public  static function generateAccountNumber($type = Accounting::SCHOOL){

        $result = Account::where('account_type', "=",$type)->count();
        
        return $result + self::RANGE + 1;
        
    }




    public static function createAccount($data){

            return account::create($data);
    }



}