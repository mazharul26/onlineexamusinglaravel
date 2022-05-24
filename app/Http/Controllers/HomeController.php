<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Exam;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {
        if(Auth::user()->hasRole('Admin|Super-Admin')){
            $total_user = User::count();
            $total_role = Role::count();
            return view('home', compact('total_user', 'total_role'));

        }elseif(Auth::user()->hasRole('Students'))
        {
            $data['exams'] = Exam::where('status',1)->with('authattendexamuser')->get();
            //return  $data['exams'] ;
            $data['attendexams'] = Exam::count();

            return view('authors.studentdashboard',$data);
        }
     
    }

 


    



    



 
    
}
