<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('weights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kpi_type_id')->unique();
            $table->integer('service_ratio_ws_weight')->default(0);
            $table->integer('service_ratio_pws_weight')->default(0);
            $table->integer('satisfaction_index_six_weight')->default(0);
            $table->integer('satisfaction_index_csi_weight')->default(0);
            $table->integer('service_income_weight')->default(0);
            $table->integer('report_submission_weight')->default(0);
            $table->integer('app_monitor_weight')->default(0);
            $table->integer('team_co_weight')->default(0);
            $table->integer('sp_tractor_weight')->default(0);
            $table->integer('sp_nmpt_weight')->default(0);
            $table->integer('sp_tractor_plus_nmpt_weight')->default(0);
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
        Schema::dropIfExists('weights');
    }
}
