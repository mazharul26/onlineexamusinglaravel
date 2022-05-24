<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_name',
        'exam_subject',
        'exam_time',
        'status',
    ];


    public function authattendexamuser()
    {
        return $this->hasMany(StudentExam::class,'exam_id')->where('student_id',Auth()->user()->id);
    }
}
