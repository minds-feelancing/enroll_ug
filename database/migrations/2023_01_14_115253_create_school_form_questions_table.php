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
        Schema::create('school_form_questions', function (Blueprint $table) {
            $table->id();
            $table->text("question");
            $table->string("question_type",100);
            $table->string("numbering",100);
            $table->text("answers")->nullable();
            $table->softDeletes();
            $table->foreignId('school_id')->references('id')->on('schools')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('school_form_questions');
    }
};
