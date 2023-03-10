<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("district")->nullable();
            $table->string("city")->nullable();
            $table->string("gender")->nullable();
            $table->string("age")->nullable();
            $table->string("about_us")->nullable();
            $table->string("photo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['district','city' , 'gender' , 'age' , 'about_us' , 'photo']);
        });
    }
};
