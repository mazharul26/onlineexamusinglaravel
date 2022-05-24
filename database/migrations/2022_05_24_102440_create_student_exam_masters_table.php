<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentExamMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_exam_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_id')->nullable();
            $table->integer('student_user_id')->nullable();
            $table->date('exam_attend_date')->nullable();
            $table->string('st_total_score')->nullable();
            $table->string('total_score')->nullable();
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
        Schema::dropIfExists('student_exam_masters');
    }
}
