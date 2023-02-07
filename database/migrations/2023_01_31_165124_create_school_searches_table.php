<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

return new class extends Migration
{
    /**
     * Run the migrations.
     * $clientip = request()->ip();
     * @return void
     */
    public function up()
    {
        Schema::create('school_searches', function (Blueprint $table) {
            $table->id();
            $table->string('keyword')->unique();
            $table->string('category',30)->nullable();
            $table->string('school_type',30)->nullable();
            $table->string("ip_address");
            $table->string("user",30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_searches');
    }
};
