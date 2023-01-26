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
        Schema::table('school_form_questions', function (Blueprint $table) {
            //
            $table->string("value_type")->default("TEXT");
            $table->string("form_section")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_form_questions', function (Blueprint $table) {
            //
            $table->dropColumn(['value_type','form_selection']);
        });
    }
};
