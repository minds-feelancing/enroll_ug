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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal("amount",25,3);
            $table->string("reason",100);
            $table->string("reference",100);
            $table->string("channel",100)->default("MM");
            $table->string("channel_reference",200);
            $table->integer("status",0);
            $table->string("phone_number",100);
            $table->string("paid_by",100);
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
        Schema::dropIfExists('payments');
    }
};
