<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name',50);
            $table->string('l_name',50);
            $table->string('gender',10);
            $table->string('bloodgroup',5);
            $table->string('nidno',20)->unique();
            $table->text('about');
            $table->string('image');
            $table->string('medical_reg_no',20);
            $table->string('p_job',300);
            $table->string('medical_speciality');
            $table->integer('mobile');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role',60);
            $table->boolean('status');
            $table->boolean('trash');
            $table->boolean('mailconfirm');
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
