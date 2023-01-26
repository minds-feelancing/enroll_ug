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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->string("email",100);
            $table->string("website",150)->nullable();
            $table->string("address",150);
            $table->string("postal_code",20)->nullable();
            $table->decimal('longitude',13,4)->nullable();
            $table->decimal('latitude',13,4)->nullable();
            $table->text("mission")->nullable();
            $table->text("vision")->nullable();
            $table->string("religious_affiliation",100)->default('NONE');
            $table->text("phone_numbers");
            $table->string("region",100);
            $table->string("district",100);
            $table->string("barge_image")->nullable();
            $table->string("main_banner")->nullable();
            $table->string("secondary_banner")->nullable();
            $table->text("background")->nullable();
            $table->integer('parent_school_id');
            $table->foreignId('category_id')->references('id')->on('school_categories')->cascadeOnUpdate();
            $table->string('ownership',100);
            $table->softDeletes();
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
        Schema::dropIfExists('schools');
    }
};
