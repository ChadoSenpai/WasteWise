@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{-- Dashboard Card --}}
                <div class="card">
                    <div class="card-header">
                        {{ __('Dashboard') }}
                    </div>
                    <div class="card-body">

                        {{-- Status Alert --}}
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- Small Boxes --}}
                        <div class="row">

                            {{-- New Orders --}}
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info shadow-sm">
                                    <div class="inner">
                                        <h3>150</h3>
                                        <p>New Orders</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- Bounce Rate --}}
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success shadow-sm">
                                    <div class="inner">
                                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                                        <p>Bounce Rate</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- User Registrations --}}
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning shadow-sm">
                                    <div class="inner">
                                        <h3>44</h3>
                                        <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- Unique Visitors --}}
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger shadow-sm">
                                    <div class="inner">
                                        <h3>65</h3>
                                        <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div> {{-- /.row --}}

                    </div> {{-- /.card-body --}}
                </div> {{-- /.card --}}

            </div>
        </div>
    </div>
@endsection
