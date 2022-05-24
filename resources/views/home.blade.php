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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>32</h3>

                            <p>Total Student</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-plus-square"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>2<sup style="font-size: 20px"></sup></h3>

                            <p>Total Exam</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-address-book"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>2313</h3>

                            <p>Total Passed</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cart-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gray">
                        <div class="inner">
                            <h3>12</h3>

                            <p>Total Failed</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-suitcase"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info
                            <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
    </section>
@endsection

@push('js')
@endpush
