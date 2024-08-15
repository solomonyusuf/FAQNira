@extends('shared.adminlayout')
@section('body')
    <div class="row">
        <div class="col-md-12 mb-4 order-0">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;" class="bx bx-archive"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong> ARTICLE CATEGORIES</strong>
                            </span>
                            <h3 class="card-title mb-2">{{number_format($category)}}</h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;" class="bx bxs-pencil"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong> ARTICLES </strong>
                            </span>
                            <h3 class="card-title mb-2">{{number_format($article)}}</h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;"
                                       class="bx bx-group"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>DATABASE USERS</strong>
                            </span>
                            <h3 class="card-title mb-2">{{number_format($user)}}</h3>
                          </div>
                    </div>
                </div>

             <div class="col-md-4 col-sm-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;"
                                       class="bx bxs-hand-up"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>HELPFUL VOTE</strong>
                            </span>
                            <h3 class="card-title mb-2">{{number_format($helpful)}}</h3>
                          </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;"
                                       class="bx bxs-hand-down"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>UNHELPFUL VOTE</strong>
                            </span>
                            <h3 class="card-title mb-2">{{number_format($unhelpful)}}</h3>
                          </div>
                    </div>
                </div>

        </div>
           {{-- <!-- Line Area Chart -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-0">Article Analytics</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        --}}{{--{!! $chart->container() !!}--}}{{--

                    </div>
                </div>
            </div>
            <!-- /Line Area Chart -->--}}
    </div>
   {{-- {!! $chart->script() !!}--}}

@endsection
