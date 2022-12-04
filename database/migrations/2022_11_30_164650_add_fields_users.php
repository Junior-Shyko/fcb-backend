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
           $table->string('address' , 100)->nullable();
           $table->string('number' , 10)->nullable();
           $table->string('complement' , 50)->nullable();
           $table->string('district' , 50)->nullable();
           $table->string('city' , 50)->nullable();
           $table->string('state' , 25)->nullable();
           $table->string('phone' , 25)->nullable();
           $table->string('situation' , 25)->nullable();
           $table->date('birthday')->nullable();
           $table->string('marital_status')->nullable();
           $table->boolean('batizado')->nullable();
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
            //
        });
    }
};
