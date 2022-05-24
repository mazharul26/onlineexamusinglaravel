@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <div class="container">
        <div class="container-fluid">
            <br>
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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2>Edit New User</h2>
                        <p><a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a></p>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8 offset-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Mobile No:</strong>
                                        {!! Form::text('mobile', null, ['placeholder' => 'Mobile Number', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
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
    </div>


@endsection

@push('js')
@endpush
