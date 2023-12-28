<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('territory_id');
            $table->unsignedBigInteger('technitian_id');
            $table->float('warranty_service',8,2)->default(0);
            $table->float('post_warranty_service',8,2)->default(0);
            $table->float('installation',8,2)->default(0);
            $table->float('warranty_master_total',8,2)->default(0);
            $table->float('preodic_service',8,2)->default(0);
            $table->float('post_warranty_visit',8,2)->default(0);
            $table->float('post_warranty_master_total',8,2)->default(0);
            $table->float('total',8,2)->default(0);

            $table->float('service_income',8,2)->default(0);
            $table->float('tractor_spare_parts_lubricants',8,2)->default(0);
            $table->float('nm_pt_spare_parts_lubricants',8,2)->default(0);

            $table->text('note')->nullable();
            $table->unsignedBigInteger('engineer_id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('updater_id');
            $table->timestamps();



            $table->foreign('territory_id')->references('id')->on('territories');
            $table->foreign('technitian_id')->references('id')->on('users');
            $table->foreign('engineer_id')->references('id')->on('users');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('updater_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('targets');
    }
}
