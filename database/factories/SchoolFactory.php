<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ownership=['PRIVATE', 'GOVERNMENT', 'INTERNATIONAL'];

        $image=['banners\imagesthree.jfif','banners\downloadtwo.jfif','banners\downloadone.jfif'];

        $I=intval(rand(0,2));

        $l=intval(rand(0,2));
        
        $foreign_id=intval(rand(1,10));

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'website' => 'https://web.whatsapp.com/',
            'address' => fake()->unique()->address(),
            'postal_code' => '07989',
            'longitude' => fake()->unique()->longitude(),
            'latitude' => fake()->unique()->latitude(),
            'mission' => fake()->unique()->sentence(),
            'vision' => fake()->unique()->sentence(),
            //'religious_affiliation' => fake()->unique()->safeEmail(),
            'phone_numbers' => fake()->unique()->phoneNumber(),
            'region' => fake()->unique()->city(),
            'district' => fake()->unique()->state(),
            'barge_image' => 'banners\Capture1.PNG',
            'main_banner' => $image[$l],
            'secondary_banner' => 'banners\TRIPART_0002_BURST20220903130043720~2.JPG',
            'background' => 'banners\Capture1.PNG',
            'parent_school_id' => $foreign_id,
            'category_id' =>$foreign_id,
            'ownership' => $ownership[$I],
            'year_started' => '2012',
            'bank_name' => fake()->sentence(3),
            'commission' => 7,
            'application_fees' => 50000,
            'center_number' => '20p0oo',
            'commission_method'=>'percentage',
            
        ];
    }
}
