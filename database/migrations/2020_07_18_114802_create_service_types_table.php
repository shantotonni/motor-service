<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('service_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('service_master_id');
            $table->string('name',191)->unique();
            $table->string('name_bn',191)->unique();
            $table->string('code',191)->unique();
            $table->timestamps();


            $table->foreign('service_master_id')->references('id')->on('service_masters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_types');
    }
}
