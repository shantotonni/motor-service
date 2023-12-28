<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiaIncentivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpia_incentives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kpia_id');
            $table->unsignedBigInteger('incentive_factor_id');
            $table->float('multiplier',8,2)->default(0);
            $table->float('tractor',8,2)->default(0);
            $table->float('nmpt',8,2)->default(0);
            $table->float('tractor_and_nmpt',8,2)->default(0);
            $table->timestamps();



            $table->foreign('kpia_id')->references('id')->on('kpias');
            $table->foreign('incentive_factor_id')->references('id')->on('incentive_factors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpia_incentives');
    }
}
