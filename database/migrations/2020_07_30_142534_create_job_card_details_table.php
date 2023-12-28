<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_card_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_card_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();



            $table->foreign('job_card_id')->references('id')->on('job_cards');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_card_details');
    }
}
