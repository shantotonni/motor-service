<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicianKpiAdjustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technician_kpi_adjusts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->float('service_ratio_ws_actual',8,2)->default(0);
            $table->float('service_ratio_pws_actual',8,2)->default(0);
            $table->float('satisfaction_index_six_actual',8,2)->default(0);
            $table->float('satisfaction_index_six_target',8,2)->default(0);
            $table->float('satisfaction_index_csi_actual',8,2)->default(0);
            $table->float('satisfaction_index_csi_target',8,2)->default(0);
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
        Schema::dropIfExists('technician_kpi_adjusts');
    }
}
