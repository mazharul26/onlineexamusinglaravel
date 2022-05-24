<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        menuSubmenu('exam', 'allexam');
        $data = [];
        $paginate = 50;
        $data['items'] = Exam::paginate($paginate);
        return view('admin.exam.index',$data)
        ->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'exam_name' => 'required',
            'exam_subject' => 'required',
            'exam_time' => 'required',
        ]);
    
        $exam = Exam::create([
            'exam_name' => $request->input('exam_name'),
            'exam_subject' => $request->input('exam_subject'),
            'exam_time' => $request->input('exam_time'),
        ]);
       
        return redirect()->route('exam.index')
                        ->with('success','Exam created successfully');
     
    }

    public function edit(Request $request,$id)
    {
        menuSubmenu('exam', 'allexam');
        $data = [];
        $paginate = 50;
        $data['exam'] = Exam::find($id);
        $data['items'] = Exam::paginate($paginate);
        return view('admin.exam.edit',$data)
        ->with('i', ($request->input('page', 1) - 1) * $paginate);
    }


    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'exam_name' => 'required',
            'exam_subject' => 'required',
            'exam_time' => 'required',
        ]);
        $input = $request->all();
 
        $exam = Exam::find($id);
        $exam->update($input);
        return redirect()->route('exam.index')
                        ->with('success','Exam Updated successfully');
     
    }

    public function destroy($id)
    {
        Exam::find($id)->delete();
        return redirect()->route('exam.index')
                        ->with('success','Exam deleted successfully');
    }
}
