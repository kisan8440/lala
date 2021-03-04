@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <title>Dashboard | Upswale.com</title>

    {{-- Required option css internal and external --}}


@endsection

@section('content')

    {{-- Page content --}}
    <section>
        <div class="container mt-3">
            <div class="main-body">
            
                <!-- Breadcrumb -->
                @include('user.template.breadcumb')
                <!-- /Breadcrumb -->

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        @include('user.template.profile')
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ Auth::user()->firstname . ' '. Auth::user()->middlename . ' '. Auth::user()->lastname }}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {!! Auth::user()->mobileno ?? '<span class="text-danger font-12">Not updated</span>' !!}
                                    </div>
                                </div>
                                <hr>
                                
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        address line 1, city, country - 220388
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3">Cart item <small class="pl-2"><a href="{{ route('user.cart') }}"> <u><i> View all</i></u> </a></small> </h6>
                                @include('user.template.cart')
                            </div>
                        </div>
                        <!-- <div class="row gutters-sm">
                            <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                <small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>One Page</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                <small>Web Design</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Website Markup</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>One Page</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Mobile Template</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>Backend API</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

    {{-- Required optional JS --}}

@endsection
