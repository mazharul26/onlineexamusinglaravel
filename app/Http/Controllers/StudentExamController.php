<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\StudentExam;
use App\Models\StudentExamMaster;
use Illuminate\Http\Request;

class StudentExamController extends Controller
{
    public function examwisequestion($id)
    {
        $data = [];
        $data['exam'] = Exam::find($id);
        $data['examquestions'] = ExamQuestion::where('exam_id',$id)->where('status',1)->paginate(1);
        $data['total_exam_question'] = ExamQuestion::where('exam_id',$id)->count();
        $data['tota_quest_done'] = StudentExam::where('exam_id',$id)->where('student_id',Auth()->user()->id)->count();
       return view('studentexamtest.exam_test',$data);

    }


    public function examstudentattend(Request $request)
    {
      
      // return "ok";
        $exam_id = $request->exam_id;
        $question_id = $request->question_id;
        $correctans = $request->correctans;
        $value = $request->value;
        $check_quest = StudentExam::where(['exam_id'=>$exam_id,'exam_question_id'=>$question_id])->where('student_id',Auth()->user()->id)->first();
        $stexammaster = StudentExamMaster::orderBy('id',"DESC")->first();
        $st_xm_master_id = 0;
        if(!empty($stexammaster))
        {
            $st_xm_master_id += ($stexammaster->id + 1);
        }else{
            $st_xm_master_id +=1;
        }
        if(!empty($check_quest)){
            $check_quest->st_question_answer = $value;
            $check_quest->save();
        }

        if(empty($check_quest)){

            ExamQuestion::where(['exam_id'=>$exam_id,'id'=>$question_id])->update(['status'=>0]);
            $studentexam = new StudentExam();
            $studentexam->exam_id = $exam_id;
            $studentexam->st_xm_master_id = $st_xm_master_id;
            $studentexam->exam_question_id = $question_id;
            $studentexam->st_question_answer = $value;
            $studentexam->correct_answer = $correctans;
            $studentexam->student_id = Auth()->user()->id;
            $studentexam->save();
            return $studentexam->id;
        }
     
    }

    public function examnextquestion(Request $request)
    {
        $data = [];
        $id = $request->examid;
        $data['exam'] = Exam::find($id);
        $data['examquestions'] = ExamQuestion::where('exam_id',$id)->where('status',1)->paginate(1);
        $data['tota_quest_done'] = StudentExam::where('exam_id',$id)->where('student_id',Auth()->user()->id)->count();
        $data['total_exam_question'] = ExamQuestion::where('exam_id',$id)->count();
        $data['total_question'] = ExamQuestion::where('exam_id',$id)->where('status',1)->count();
       return view('studentexamtest.next_exam_question',$data);
    }

    public function examfinishquestion(Request $request,$id)
    {
        $data = [];
       // $id = $request->examid;
        $data['exam'] = Exam::find($id);
        $result = 0;
        $data['totalexamquestion'] = $totalexamquestion =  ExamQuestion::where('exam_id',$id)->count();
        $studentexams = StudentExam::where('exam_id',$id)->where('status',1)->where('student_id',Auth()->user()->id)->get();
       foreach($studentexams as $studentexam)
       {
           if($studentexam->st_question_answer == $studentexam->correct_answer)
           {
            $result +=1;
           }
       }
       $data['result'] = $result;
       $stexamscore = StudentExamMaster::where(['exam_id'=>$id,'student_user_id'=>Auth()->user()->id])->update(['st_total_score'=>$result,'total_score'=>$totalexamquestion]);

       
        return view('studentexamtest.finish_exam_question',$data);
    }

    public function examfinishquestionpost(Request $request)
    {
        // $exam = Exam::where('id',$request->exam_id)->first();
        // $exam->exam_st_user_id = Auth()->user()->id;
        // $exam->save();
        $id = $request->exam_id;
        $stexammaster = new StudentExamMaster();
        $stexammaster->exam_id = $id;
        $stexammaster->student_user_id = Auth()->user()->id;
        $stexammaster->exam_attend_date = date('Y-m-d');
        $stexammaster->save();
        $examquestion = ExamQuestion::where('exam_id',$id)->update(['status'=>1]);
        
        return redirect()->route("examfinishquestion",$id)->with('success',"Successfully completed this Exam.");
    }
}


