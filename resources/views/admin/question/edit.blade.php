@extends('layouts.master')

@section('content')


<article class="post post-large">
    
    <div class="row">
     
        <div class=" col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                     @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                  </ul>
                </div>
                @endif
                <div class="card-body">
            
                  
                    {!! Form::model($item, ['method' => 'PATCH','enctype'=>'multipart/form-data', 'route' => ['examquestion.update', $item->id]]) !!}
                    <div class="row">
                     <div class="col-md-3 col-12 "></div>
                    <div class="col-md-6 col-12">
                        <h3  class="bg-info p-4">Update Exam Question Information
                        </h3>
                        <div class="form-group">
                            <label>Exam Name: <span class="text-danger">*</span></label>
                            <select name="exam_id" id="" class="form-control">
                                <option value="" class="">Please Select One</option>
                                @foreach ($exams as $exam)
                                   <option value="{{$exam->id}}" {{$exam->id == $item->exam_id ? "Selected":''}}>{{$exam->exam_subject ?? ''}}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Question Name : <span class="text-danger">*</span></label>
                            {!! Form::text('question_name', null, ['placeholder' => 'Typing Qustion Name', 'class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Option 1 : <span class="text-danger">*</span></label>
                            {!! Form::text('option_1', null, ['placeholder' => 'Typing Option 1', 'class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Option 2 : <span class="text-danger">*</span></label>
                            {!! Form::text('option_2', null, ['placeholder' => 'Typing Option 2', 'class' => 'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Option 3 : <span class="text-danger">*</span></label>
                            {!! Form::text('option_3', null, ['placeholder' => 'Typing Option 3', 'class' => 'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Option 4 : <span class="text-danger">*</span></label>
                            {!! Form::text('option_4', null, ['placeholder' => 'Typing Option 4', 'class' => 'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Option Other : </label>
                            {!! Form::text('option_others', null, ['placeholder' => 'Typing Option Others', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Correct Answer : <span class="text-danger">*</span></label>
                            {!! Form::text('correct_ans', null, ['placeholder' => 'Typing Correct Answer', 'class' => 'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                           
                                <label for="">Exam Question Status :<span
                                    class="text-danger">*</span></label>
                                <select name="status" id="" class="form-control">
                                    <option value="0" {{$item->status== 0?"selected":''}}>In-Active</option>
                                    <option value="1" {{$item->status== 1?"selected":''}}>Active</option>
                                </select>


                               
                           
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success ">Update</button>
                        </div>
                      </div>  
                      {!! Form::close() !!}
                  
                </div>
                </div>
              </div>
        </div>
     

    </div>
   
</article>





@endsection