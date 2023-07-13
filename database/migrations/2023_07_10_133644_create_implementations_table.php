<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImplementationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implementations', function (Blueprint $table) {
            $table->id();

            // $table->bigInteger('task_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();

            $table->string('title');
            $table->string('file'); // doc file
            $table->string('github_repo');
            $table->longText('description');
            $table->string('status')->default('Pending');
            $table->longText('remarks')->nullable();
            $table->timestamps();

            // $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('implementations');
    }
}
