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
                   
                    <div class="card ">
                       <div class="card-body ">
                        <div class="card-body ">
                         
                                <h4 class="text-success">Congratulation {{Auth()->user()->name }}</h4>
                                <h4 class="text-primary">Correct Question Answer is {{ $result ?? 0}} out of {{$totalexamquestion ?? ''}}</h4>                 
                         </div>
                       
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
