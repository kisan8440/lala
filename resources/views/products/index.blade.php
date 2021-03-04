@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <title>Products | Upswale.com</title>

    {{-- Required option css internal and external --}}

    <style>
        .service-c p img{
            height: 70px;
            width: 70px;
            border-radius: 50%;
            text-align: center;
        }
        
        .service-c .main-image img{
            height: 200px;
            width: 200px;
        }
    </style>

@endsection

@section('content')

    {{-- Page content --}}
    <section>
        <div class="container">
            <h4 class="page-heading">
                Product collection
            </h4>
        </div>
        <div class="container mb-2">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row d-flex align-items-center justify-content-center service-c">
                            <div class="col">
                                <h5 class="text-center">Electrical</h5>
                                <p class="mb-0 mt-4 text-center">
                                    <img src="{{ asset('./public/assets/images/images/service-elec-icon.jpg') }}" alt="Electrical">
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'electrical') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/service-elec.jpg') }}" alt="Electrical">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row d-flex align-items-center justify-content-center service-c">
                            <div class="col">
                                <h5 class="text-center">UPS</h5>
                                <p class="mb-0 mt-4 text-center">
                                    <img src="{{ asset('./public/assets/images/images/service-ups-icon.jpg') }}" alt="Electrical">
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'ups') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/service-ups.jpg') }}" alt="Electrical">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row d-flex align-items-center justify-content-center service-c">
                            <div class="col">
                                <h5 class="text-center">Solar</h5>
                                <p class="mb-0 mt-4 text-center">
                                    <img src="{{ asset('./public/assets/images/images/service-solar-icon.jpg') }}" alt="Electrical">
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'solar') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/service-solar.jpg') }}" alt="Electrical">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="theme-block parent box-hover-effect bg-cool-svg">
                        <div class="row d-flex align-items-center justify-content-center service-c">
                            <div class="col">
                                <h5 class="text-center">Batteries</h5>
                                <p class="mb-0 mt-4 text-center">
                                    <img src="{{ asset('./public/assets/images/images/service-battery-icon.jpg') }}" alt="Electrical">
                                </p>
                                <div class="text-center">
                                    <a class="theme-btn mb-2 mt-4 text-uppercase flash" href="{{ route('products.categories', 'batteries') }}">Go to page</a>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center main-image">
                                <img src="{{ asset('./public/assets/images/images/service-battery.jpg') }}" alt="Electrical">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

@endsection

@section('js')

    {{-- Required optional JS --}}

@endsection
