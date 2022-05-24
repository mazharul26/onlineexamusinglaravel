<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function index(Request $request)
    {
        menuSubmenu('examquestion', 'allexam');
        $data = [];
        $paginate = 50;
        $data['items'] = ExamQuestion::paginate($paginate);
        return view('admin.question.index',$data)
        ->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    public function create()
    {
        menuSubmenu('examquestion', 'allexam');
        $data = [];
        $data['exams'] = Exam::where('status',1)->get();
        return view('admin.question.create',$data);
    }

    public function store(Request $request)
    {
        $allData = new ExamQuestion();
        $allData->exam_id = $request->exam_id;
        $allData->question_name = $request->question_name;
        $allData->option_1 = $request->option_1;
        $allData->option_2 = $request->option_2;
        $allData->option_3 = $request->option_3;
        $allData->option_4 = $request->option_4;
        $allData->option_others = $request->option_others;
        $allData->correct_ans = $request->correct_ans;
        $allData->addedby = Auth()->user()->id;
        $allData->save();
        return redirect()->route('examquestion.index')
        ->with('success','Exam Question created successfully');
    }

    public function edit($id)
    {
        menuSubmenu('examquestion', 'allexam');
        $data = [];
        $data['exams'] = Exam::where('status',1)->get();
        $data['item'] = ExamQuestion::find($id);

        return view('admin.question.edit',$data);

    }

    public function update(Request $request,$id)
    {
        $allData =  ExamQuestion::find($id);
        $allData->exam_id = $request->exam_id;
        $allData->question_name = $request->question_name;
        $allData->option_1 = $request->option_1;
        $allData->option_2 = $request->option_2;
        $allData->option_3 = $request->option_3;
        $allData->option_4 = $request->option_4;
        $allData->option_others = $request->option_others;
        $allData->correct_ans = $request->correct_ans;
        $allData->status = $request->status;
        $allData->editedby = Auth()->user()->id;
        $allData->save();
        return redirect()->route('examquestion.index')
        ->with('success','Exam Question Updated successfully');
    }

    public function destroy($id)
    {
        ExamQuestion::find($id)->delete();
        return redirect()->route('examquestion.index')
        ->with('warning','Exam Question Deleted successfully');
    }
}
