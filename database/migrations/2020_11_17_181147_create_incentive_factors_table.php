<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncentiveFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentive_factors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kpi_type_id');
            $table->string('name',191)->unique();
            $table->integer('from');
            $table->integer('to');
            $table->float('multiplication_factor',8,2);
            $table->timestamps();



            $table->foreign('kpi_type_id')->references('id')->on('kpi_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incentive_factors');
    }
}
