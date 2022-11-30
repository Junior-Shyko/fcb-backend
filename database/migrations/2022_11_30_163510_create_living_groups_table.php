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
        Schema::create('living_groups', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time_start', $precision = 0);
            $table->time('time_end', $precision = 0);
            $table->integer('total_people_present');
            $table->integer('total_members');
            $table->integer('total_visitant');
            $table->integer('total_visitant_permanent');
            $table->longText('obs_intercurrence');
            $table->longText('obs_evangelism');
            $table->longText('obs_faulty');
            $table->boolean('ice_breakers');
            $table->boolean('praise');
            $table->boolean('fellowship');
            $table->boolean('evangelism');
            $table->boolean('edification');

            $table->unsignedBigInteger('group_id'); 
            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('living_groups');
    }
};
