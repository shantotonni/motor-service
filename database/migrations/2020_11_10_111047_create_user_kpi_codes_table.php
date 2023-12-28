<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKpiCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kpi_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('service_income_code',191)->nullable();
            $table->string('tractor_spare_parts_code',191)->nullable();
            $table->string('tractor_sonalika_lub_code',191)->nullable();
            $table->string('tractor_power_oil_code',191)->nullable();
            $table->string('nm_spare_parts_code',191)->nullable();
            $table->string('nm_power_oil_code',191)->nullable();
            $table->string('pt_spare_parts_code',191)->nullable();
            $table->string('pt_power_oil_code',191)->nullable();
            $table->timestamps();



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
        Schema::dropIfExists('user_kpi_codes');
    }
}
