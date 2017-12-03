<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBPNutritionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_p_nutritions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diagnose_id')->unsigned()->index();
            $table->foreign('diagnose_id')->references('id')->on('b_p_diagnoses')->onDelete('cascade');
            $table->text('nutrition');
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
        Schema::dropIfExists('b_p_nutritions');
    }
}
