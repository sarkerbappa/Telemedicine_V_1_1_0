<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('appoint_id');
            $table->Integer('doctor_id');
            $table->Integer('patient_id');
            $table->longText('problem');
            $table->longText('doctor_advise');
            $table->string('communication_type',50);
            $table->string('appointment_type', 50);
            $table->dateTime('patient_time');
            $table->dateTime('doctor_time');
            $table->boolean('status');
            $table->boolean('doctor_response');
            $table->boolean('patient_respons');
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
        Schema::drop('appointment');
    }
}
