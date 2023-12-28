<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCardsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        
        Schema::create('job_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_card_no',20);
            $table->unsignedBigInteger('territory_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('engineer_id');
            $table->unsignedBigInteger('technitian_id');
            $table->unsignedBigInteger('participant_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('call_type_id');
            $table->unsignedBigInteger('service_type_id');
            $table->string('customer_name',100);
            $table->string('customer_moblie',11);
            $table->date('buy_date')->nullable();
            $table->date('installation_date')->nullable();
            $table->date('visited_date')->nullable();
            $table->dateTime('service_wanted_at')->nullable();
            $table->dateTime('service_start_at')->nullable();
            $table->dateTime('service_end_at')->nullable();
            $table->float('hour',8,2);
            $table->float('service_income',8,2)->default(0);
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_six_hour')->default(0);
            $table->integer('rating')->default(0);
            $table->unsignedBigInteger('approver_id')->nullable(); 
            $table->string('time_app',100);
            $table->float('csi',8,2);
            $table->date('service_date');
            $table->timestamps();


            $table->foreign('territory_id')->references('id')->on('territories');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('engineer_id')->references('id')->on('users');
            $table->foreign('technitian_id')->references('id')->on('users');
            $table->foreign('participant_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('call_type_id')->references('id')->on('call_types');
            $table->foreign('service_type_id')->references('id')->on('service_types');
            $table->foreign('approver_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_cards');
    }
}
