<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kpi_type_id')->unique();
            $table->integer('service_income_base_line')->default(0);
            $table->integer('sp_tractor_base_line')->default(0);
            $table->integer('sp_nmpt_base_line')->default(0);
            $table->integer('sp_tractor_plus_nmpt_base_line')->default(0);
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
        Schema::dropIfExists('base_lines');
    }
}
