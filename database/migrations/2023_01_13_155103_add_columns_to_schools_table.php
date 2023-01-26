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
        Schema::table('schools', function (Blueprint $table) {
            //

            $table->string("bank_name")->nullable();
            $table->string("account_number")->nullable();
            $table->string("account_name")->nullable();
            $table->decimal("commission",15,3);
            $table->decimal("application_fees",15,3);
            $table->string("commission_method");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            //
            $table->dropColumn(['bank_name','account_number' , 'account_name' , 'commission' , 'application_fees' , 'commission_method']);
        });
    }
};
