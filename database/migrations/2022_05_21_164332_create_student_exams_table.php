<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_id')->nullable();
            $table->integer('st_xm_master_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('exam_question_id')->nullable();
            $table->string('question_name')->nullable();
            $table->string('st_question_answer')->nullable();
            $table->string('correct_answer')->nullable();
            $table->integer('addedby')->nullable();
            $table->integer('editedby')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('student_exams');
    }
}
