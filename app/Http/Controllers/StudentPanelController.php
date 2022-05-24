<?php

namespace App\Http\Controllers;

use App\Models\StudentExamMaster;
use Illuminate\Http\Request;

class StudentPanelController extends Controller
{
    public function onlyauthstudentresultshow(Request $request)
    {
        menuSubmenu('authstudentresult', 'allauthstudentresult');
        $data = [];
        $paginate = 100;
        $data['items'] = $items = StudentExamMaster::where('student_user_id',Auth()->user()->id)->paginate($paginate);

        return view('studentexamtest.auth_student_result_show',$data)
        ->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    public function adminallstudentresultshow(Request $request)
    {
        menuSubmenu('authstudentresult', 'adminallstudentresultshow');
        $data = [];
        $paginate = 100;
        $data['items'] = $items = StudentExamMaster::paginate($paginate);
       // return $items; 
        return view('studentexamtest.admin_student_result_show',$data)
        ->with('i', ($request->input('page', 1) - 1) * $paginate);
    }
}
