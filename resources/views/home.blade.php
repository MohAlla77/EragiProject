@extends('Master')
    @section('title', ('Home'))
    @section('navbarTitle', ('Home'))
    @section('content')
        <div class="container-fluid px-4 mx-auto">
            @include('shared.success_message')
            <h1 class="mt-4">Car condition</h1>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body text-center">All</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('page.view', 'all')}}">View
                                Details</a>
                            <div class="small text-white"><i class="fa-regular fa-comment"></i>
                            {{$count_all}}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body text-center">In Maintenace</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('page.view' , 'Maintenace')}}">View
                                Details</a>
                            <div class="small text-white"><i class="fa-regular fa-comment"></i>
                                {{$count_main}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body text-center">Waiting For a Reason</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('page.view', 'Waiting')}}">View
                                Details</a>
                            <div class="small text-white"><i class="fa-regular fa-comment"></i>
                                {{$count_wait}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body text-center">Done</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('page.view', 'done')}}">View
                                Details</a>
                            <div class="small text-white"><i class="fa-regular fa-comment"></i>
                                {{$count_done}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-black text-white mb-4">
                        <div class="card-body text-center">Need To check</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{route('page.check')}}">View
                                Details</a>
                            <div class="small text-white"><i class="fa-regular fa-comment"></i>
                                {{$count_wait}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
    {{-- <canvas id="myChart"></canvas> --}}