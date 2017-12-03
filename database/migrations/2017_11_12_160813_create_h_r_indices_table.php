<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHRIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_r_indices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_index');
            $table->integer('to_index');
            $table->integer('from_age');
            $table->integer('to_age');
            $table->boolean('sex');
            $table->integer('diagnose_id')->unsigned()->index();
            $table->foreign('diagnose_id')->references('id')->on('h_r_diagnoses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_r_indices');
    }
}
