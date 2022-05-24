@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-12">
                    <h4>{{ env('APP_NAME') }}</h4>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-8 col-8 offset-2">
                    <div class="card">
                  

                        <div class="table-responsive">
        
                            <table class="table table-bordered table-sm table-striped text-success">
                               <tr class="">
                                   <th colspan="5" >
                                       <h3 class="">Exam List</h3>
                                   </th>
                               </tr>
                                <tr>
                                    <th>SL</th>
                                    <th>Exam Title</th>
                                    <th>Exam Subject</th>
                                    <th>Exam Time (Minutes)</th>
                                    <th>Action</th>
                                </tr>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($exams as $key => $exam)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$exam->exam_name ?? ''}} </td>
                                        <td>{{$exam->exam_subject ?? ''}} </td>
                                        <td>{{$exam->exam_time ?? ''}} </td>
                                      
                              
                                        <td>
                                            @php
                                                $user_id = Auth()->user()->id;
                                            @endphp
                                            @if(($exam->authattendexamuser->count() > 0))
                                            <a class="btn btn-warning btn-xs"
                                            href="#">Already done</a>
                                            <a class="btn btn-success btn-xs"
                                            href="{{route('examfinishquestion',$exam->id)}}">Result</a>
                                            @else
                                            <a class="btn btn-primary btn-xs"
                                            href="{{route('examwisequestion',$exam->id)}}">Start</a>
                                          
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
        
        
        
                        </div>
        
                     
        
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@push('js')
@endpush
