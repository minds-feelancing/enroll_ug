<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\School;
use App\Models\SchoolCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'username' => 'Admin',
        //     'email' => 'superuser@example.com',
        //     'password' => Hash::make("admin123"),
        //     'firstName' => 'Management',
        //     'lastName' => 'Enroll',
        //     'type'=>'ADMIN',
        //     'phone_number' =>'0770691484'
        // ]);



            SchoolCategory::insert([
                ['name' =>  'College'],
                ['name' => 'Day Care'],
                ['name' => 'Nursery'],
                ['name' => 'International School'],
                ['name' => 'Primary'],
                ['name' => 'Secondary'],
                ['name'  => 'Technical Institute'],
                ['name' => 'Nursing School'],
                ['name' => "University"]
            ]);
    }
}

