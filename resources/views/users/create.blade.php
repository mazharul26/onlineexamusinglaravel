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
                    Create New User
                </h4>

                <div class="card-tools">
            <a class="btn btn-default w3-blue btn-xs" href="{{ route('users.index') }}"> Back</a>
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


{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
  
            <div class="col-xs-8 col-sm-8 col-md-8 offset-2">
                <div class="card">
                    <div class="card-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
        
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Mobile No:</strong>
                    {!! Form::text('mobile', null, array('placeholder' => 'Mobile Number','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple', 'onselect'=>"myFunction()")) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </div>
        </div>  
   
   
</div>
{!! Form::close() !!}
                
            </div>
        </div>

    </div>
</section>
@endsection

@push('js')
@endpush



 
