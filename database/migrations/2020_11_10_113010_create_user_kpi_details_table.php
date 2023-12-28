<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKpiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kpi_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_kpi_id');
            $table->unsignedBigInteger('kpi_topic_id');
            $table->float('target',8,2)->default(0);
            $table->float('actual',8,2)->default(0);
            $table->float('weight',8,2)->default(0);
            $table->float('score',8,2)->default(0);
            $table->float('f_score',8,2)->default(0);
            $table->timestamps();



            $table->foreign('user_kpi_id')->references('id')->on('user_kpis');
            $table->foreign('kpi_topic_id')->references('id')->on('kpi_topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_kpi_details');
    }
}
