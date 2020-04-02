<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->dateTime('consultation_date');
            $table->foreignId('patients_id');
            $table->foreign('patients_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreignId('doctors_id');
            $table->foreign('doctors_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->text('descriptions');
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
        Schema::dropIfExists('schedules');
    }
}
