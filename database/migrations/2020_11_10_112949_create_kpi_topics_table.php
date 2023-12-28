<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('kpi_topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',191);
            $table->unsignedBigInteger('kpi_type_id');
            $table->unsignedBigInteger('kpi_group_id');
            $table->string('sl',191)->nullable();
            $table->float('mark',8,2)->nullable();
            $table->integer('ach_from')->nullable();
            $table->integer('ach_to')->nullable();
            $table->integer('weight')->nullable();
            $table->float('multiplication_factor',8,2)->nullable();
            $table->timestamps();



            $table->foreign('kpi_type_id')->references('id')->on('kpi_types');
            $table->foreign('kpi_group_id')->references('id')->on('kpi_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpi_topics');
    }
}
