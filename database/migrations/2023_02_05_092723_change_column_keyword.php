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
        Schema::table('school_searches', function (Blueprint $table) {
            $table->string("key_word")->nullable();
            $table->dropColumn('keyword');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_searches', function (Blueprint $table) {
            $table->dropColumn('key_word');
            $table->string("keyword");
        });
    }
};
