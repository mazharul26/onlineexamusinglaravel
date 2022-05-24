<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExamMaster extends Model
{
    use HasFactory;

    public function exam()
    {
     return $this->belongsTo(Exam::class, 'exam_id');
    }
    public function user()
    {
     return $this->belongsTo(User::class, 'student_user_id');
    }
}
