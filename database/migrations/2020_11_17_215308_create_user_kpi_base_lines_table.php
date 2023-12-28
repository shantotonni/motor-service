<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKpiBaseLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kpi_base_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_kpi_id');
            $table->unsignedBigInteger('kpi_group_id');
            $table->integer('amount');
            $table->timestamps();



            $table->foreign('user_kpi_id')->references('id')->on('user_kpis');
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
        Schema::dropIfExists('user_kpi_base_lines');
    }
}
