@extends('layouts.master')

@push('css')
@endpush

@section('content')

    <section class="content">

        <div class="container-fluid">

           
            <br>
            <div class="card card-primary">
               
                <div class="card-header">
                  

                    <h4 class="card-title">
                        Updated Exam
                    </h4>

                    <div class="card-tools">
                       
                    </div>
                </div>
                <div class="card-body">

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

                   
                    {!! Form::model($exam, ['method' => 'PATCH','enctype'=>'multipart/form-data', 'route' => ['exam.update', $exam->id]]) !!}
                    <div class="row">
                      
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <div class="">
                                    <label for="">Exam Name : <span
                                        class="text-danger">*</span></label>
                                    <input type="text" id="" class="form-control" placeholder="" 
                                        name="exam_name" value="{{$exam->exam_name ?? ''}}" required>


                                    <br>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <div class="">
                                    <label for="">Exam Subject : <span
                                        class="text-danger">*</span></label>
                                    <input type="text" id="" class="form-control" placeholder="" 
                                        name="exam_subject" value="{{$exam->exam_subject ?? ''}}" required>


                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 ">
                            <div class="form-group">
                                <div class="">
                                    <label for="">Exam Time : (Minutes)<span
                                        class="text-danger">*</span></label>
                                    <input type="text" id="" class="form-control" placeholder="" 
                                        name="exam_time" value="{{$exam->exam_time ?? ''}}" required>


                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                <div class="">
                                    <label for="">Exam Status :<span
                                        class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control">
                                        <option value="0" {{$exam->status== 0?"selected":''}}>De-Active</option>
                                        <option value="1" {{$exam->status== 1?"selected":''}}>Active</option>
                                    </select>


                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2  mt-4">
                          
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>

            <div class="card">
                  

                <div class="table-responsive">

                    <table class="table table-bordered table-sm table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Exam Title</th>
                            <th>Exam Subject</th>
                            <th>Exam Time(Minutes)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ ++$i  }}</td>
                                <td>{{$item->exam_name ?? ''}} </td>
                                <td>{{$item->exam_subject ?? ''}} </td>
                                <td>{{$item->exam_time ?? ''}} </td>
                                <td class="">
                                    @if($item->status == 1)
                                    <p class="text-success">Active</p>
                                    @else
                                    <p class="text-warning">DeActive</p>
                                    @endif
                                </td>
                      
                                <td>
                            
                                    <a class="btn btn-primary btn-xs"
                                        href="{{ route('exam.edit', $item->id) }}">Edit</a>
                                        <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{{ $item->id }}">Delete
                                        </a>
                                        <!---Modal start----->
                                        <div class="modal" id="myModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Delete item</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="{{ route('exam.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Are you sure to delete ?
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                </div>
                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                  <button type="submit" class="btn btn-success" >Yes</button>
                                                </div>
                                                </form>
                
                                              </div>
                                            </div>
                                          </div>
                
                                        </div>
                                              <!---Modal end----->
                                  
                                </td>
                            </tr>
                        @endforeach
                    </table>



                </div>

                {!! $items->render() !!}

            </div>


        </div>
    </section>
@endsection

@push('js')
    <script>
        var loadFile1 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush