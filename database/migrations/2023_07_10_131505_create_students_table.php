<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('lecturer_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('reg_no')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('course');

            $table->timestamps();

            $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
