<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kpi_type_id');
            $table->float('total_incentive_bonus',8,2);
            $table->float('total_kpi_mark',8,2);
            $table->float('total_incentive_amount',8,2);
            $table->float('service_ratio_ws_target',8,2)->default(0);
            $table->float('service_ratio_ws_actual',8,2)->default(0);
            $table->integer('service_ratio_ws_weight')->default(0);
            $table->float('service_ratio_ws_score',8,2)->default(0);
            $table->float('service_ratio_ws_f_score',8,2)->default(0);
            $table->float('service_ratio_pws_target',8,2)->default(0);
            $table->float('service_ratio_pws_actual',8,2)->default(0);
            $table->integer('service_ratio_pws_weight')->default(0);
            $table->float('service_ratio_pws_score',8,2)->default(0);
            $table->float('service_ratio_pws_f_score',8,2)->default(0);
            $table->float('satisfaction_index_six_target',8,2)->default(0);
            $table->float('satisfaction_index_six_actual',8,2)->default(0);
            $table->integer('satisfaction_index_six_weight')->default(0);
            $table->float('satisfaction_index_six_score',8,2)->default(0);
            $table->float('satisfaction_index_six_f_score',8,2)->default(0);
            $table->float('satisfaction_index_csi_target',8,2)->default(0);
            $table->float('satisfaction_index_csi_actual',8,2)->default(0);
            $table->integer('satisfaction_index_csi_weight')->default(0);
            $table->float('satisfaction_index_csi_score',8,2)->default(0);
            $table->float('satisfaction_index_csi_f_score',8,2)->default(0);
            $table->float('service_income_target',8,2)->default(0);
            $table->float('service_income_actual',8,2)->default(0);
            $table->integer('service_income_weight')->default(0);
            $table->float('service_income_score',8,2)->default(0);
            $table->float('service_income_f_score',8,2)->default(0);
            $table->integer('report_submission_target')->default(0);
            $table->integer('report_submission_actual')->default(0);
            $table->integer('report_submission_weight')->default(0);
            $table->float('report_submission_score',8,2)->default(0);
            $table->float('report_submission_f_score',8,2)->default(0);
            $table->integer('app_monitor_target')->default(0);
            $table->integer('app_monitor_actual')->default(0);
            $table->integer('app_monitor_weight')->default(0);
            $table->float('app_monitor_score',8,2)->default(0);
            $table->float('app_monitor_f_score',8,2)->default(0);
            $table->integer('team_co_target')->default(0);
            $table->integer('team_co_actual')->default(0);
            $table->integer('team_co_weight')->default(0);
            $table->float('team_co_score',8,2)->default(0);
            $table->float('team_co_f_score',8,2)->default(0);
            $table->integer('service_income_base_line')->default(0);
            $table->float('service_f_score_total',8,2)->default(0);
            $table->float('service_f_score_percent',8,2)->default(0);
            $table->float('service_income_total_incentive',8,2)->default(0);
            $table->float('sp_tractor_target',8,2)->default(0);
            $table->float('sp_tractor_actual',8,2)->default(0);
            $table->integer('sp_tractor_weight')->default(0);
            $table->float('sp_tractor_score',8,2)->default(0);
            $table->float('sp_tractor_f_score',8,2)->default(0);
            $table->integer('sp_tractor_base_line')->default(0);
            $table->float('sp_tractor_f_score_total',8,2)->default(0);
            $table->float('sp_tractor_f_score_percent',8,2)->default(0);
            $table->float('sp_tractor_total_incentive',8,2)->default(0);
            $table->float('sp_nmpt_target',8,2)->default(0);
            $table->float('sp_nmpt_actual',8,2)->default(0);
            $table->integer('sp_nmpt_weight')->default(0);
            $table->float('sp_nmpt_score',8,2)->default(0);
            $table->float('sp_nmpt_f_score',8,2)->default(0);
            $table->integer('sp_nmpt_base_line')->default(0);
            $table->float('sp_nmpt_f_score_total',8,2)->default(0);
            $table->float('sp_nmpt_f_score_percent',8,2)->default(0);
            $table->float('sp_nmpt_total_incentive',8,2)->default(0);
            $table->float('sp_tractor_plus_nmpt_target',8,2)->default(0);
            $table->float('sp_tractor_plus_nmpt_actual',8,2)->default(0);
            $table->integer('sp_tractor_plus_nmpt_weight')->default(0);
            $table->float('sp_tractor_plus_nmpt_score',8,2)->default(0);
            $table->float('sp_tractor_plus_nmpt_f_score',8,2)->default(0);
            $table->integer('sp_tractor_plus_nmpt_base_line')->default(0);
            $table->float('sp_tractor_plus_nmpt_f_score_total',8,2)->default(0);
            $table->float('sp_tractor_plus_nmpt_f_score_percent',8,2)->default(0);
            $table->float('sp_tractor_plus_nmpt_total_incentive',8,2)->default(0);
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
        Schema::dropIfExists('kpias');
    }
}
