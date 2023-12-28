<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kpis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kpi_type_id');
            $table->float('total_kpi_target',8,2);
            $table->float('total_kpi_ach',8,2);
            $table->timestamps();



            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_kpis');
    }
}
