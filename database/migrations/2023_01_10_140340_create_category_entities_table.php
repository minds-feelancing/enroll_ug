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
        Schema::create('category_entities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('school_categories')->cascadeOnUpdate();
            $table->softDeletes();
            $table->string('entity_type',100)->nullable();
            $table->string('entity_name',100)->nullable();
            $table->text("entity_description")->nullable();
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
        Schema::dropIfExists('category_entities');
    }
};
