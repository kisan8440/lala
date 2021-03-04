@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <title>Empowering Technologies</title>

    {{-- Required option css internal and external --}}

@endsection

@section('content')

    {{-- Page content --}}
    <section>

        <!-- banner-slider -->
        {{-- <div class="container-fluid">
            <div class="owl-carousel banner-slider mt-4 mb-3">
                <div> <img src="{{ asset('public/assets/images/banner/BLANK-GREEN.jpg') }}"> </div>
                <div> <img src="{{ asset('public/assets/images/banner/SERVICES-AND_SOLUTIONS.jpg') }}"> </div>
                <div> <img src="{{ asset('public/assets/images/banner/PRODUCT-BANNER.jpg') }}"> </div>
            </div>
        </div> --}}

        @isset($bestDealsProducts)
            <div class="container-fluid mb-4">
                <div class="row mt-3">
                    <div class="col-12">
                        <h4 class="outer-heading bg-theme-text">Best Deal Products</h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="owl-carousel best-deals mt-2">
                                    @foreach ($bestDealsProducts as $bestDealsProducts)
                                        @php
                                          $pageLink = route('product.view', $bestDealsProducts->productcsl);
                                        @endphp
                                        <div class="deals-outer">
                                            <div class="row p-3">
                                                <div class="col-12 font-12 text-muted font-weight-light">
                                                    <div>{{ $bestDealsProducts->categoryname }}</div>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ $pageLink ?? '#' }}">
                                                        <h6 class="p-name text-center">
                                                            {{ $bestDealsProducts->productname }}
                                                        </h6>
                                                    </a>
                                                </div>
                                                <div class="col-12 mt-2">

                                                    @php
                                                        $path = $bestDealsProducts->filename;
                                                        $base64 = '';
                                                        if($path != ''){
                                                            if(     strpos($path, '.jpg') > -1 
                                                                ||  strpos($path, '.JPG') > -1 
                                                                ||  strpos($path, '.jpeg') > -1 
                                                                ||  strpos($path, '.JPEG') > -1 
                                                                ||  strpos($path, '.png') > -1 
                                                                ||  strpos($path, '.PNG') > -1 
                                                                ||  strpos($path, '.webp') > -1 
                                                                ||  strpos($path, '.WEBP') > -1 
                                                            ){
                                                                $type = pathinfo($path, PATHINFO_EXTENSION);
                                                                
                                                                $data = @file_get_contents($path);

                                                                if($data === false){
                                                                    $path = asset('public/assets/images/products/img_404.jpg');
                                                                    $data = file_get_contents($path);
                                                                }                                        
                                                                    
                                                                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                            }else{
                                                                $base64 = asset('public/assets/images/products/img_404.jpg');
                                                            }
                                                        }else{
                                                            $base64 = asset('public/assets/images/products/img_404.jpg');
                                                        }
                                                    @endphp

                                                    <a href="{{ $pageLink ?? '#' }}">
                                                        <img src="{{ $base64 }}" alt="Our Collaborations" class="img">
                                                    </a>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <h6 class="text-success m-0 font-weight-light">
                                                        <div>
                                                            Rs. {{ $bestDealsProducts->bestdealprice ?? '0.00' }}
                                                        </div>
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="font-weight-light text-danger font-12 m-0 text-strike d-i-b">
                                                                <del>
                                                                    Rs. {{ $bestDealsProducts->price ?? '0.00' }} 
                                                                </del>
                                                                <span class="badge badge-danger">{{ $bestDealsProducts->discountpercantage }}%</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center mt-2">
                                                        <button class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
        @isset($bestDealsBrands)
            <div class="container-fluid mb-4">
                <div class="row mt-3">
                    <div class="col-12">
                        <h4 class="outer-heading bg-theme-text">Best Deal Brands</h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="owl-carousel best-deals mt-2">
                                    @foreach ($bestDealsBrands as $bestDealsBrands)
                                        @php
                                          $pageLink = route('brands.view', $bestDealsBrands->productcsl);
                                        @endphp
                                        <div class="deals-outer">
                                            <div class="row p-3">
                                                <div class="col-12 font-12 text-muted font-weight-light">
                                                    <div>{{ $bestDealsBrands->categoryname }}</div>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ $pageLink ?? '#' }}">
                                                        <h6 class="p-name text-center">
                                                            {{ $bestDealsBrands->productname }}
                                                        </h6>
                                                    </a>
                                                </div>
                                                
                                                <div class="col-12 mt-2">

                                                    @php
                                                        $path = $bestDealsBrands->filename;
                                                        $base64 = '';
                                                        if($path != ''){
                                                            if(     strpos($path, '.jpg') > -1 
                                                                ||  strpos($path, '.JPG') > -1 
                                                                ||  strpos($path, '.jpeg') > -1 
                                                                ||  strpos($path, '.JPEG') > -1 
                                                                ||  strpos($path, '.png') > -1 
                                                                ||  strpos($path, '.PNG') > -1 
                                                                ||  strpos($path, '.webp') > -1 
                                                                ||  strpos($path, '.WEBP') > -1 
                                                            ){
                                                                $type = pathinfo($path, PATHINFO_EXTENSION);
                                                                
                                                                $data = @file_get_contents($path);

                                                                if($data === false){
                                                                    $path = asset('public/assets/images/products/img_404.jpg');
                                                                    $data = file_get_contents($path);
                                                                }                                        
                                                                    
                                                                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                            }else{
                                                                $base64 = asset('public/assets/images/products/img_404.jpg');
                                                            }
                                                        }else{
                                                            $base64 = asset('public/assets/images/products/img_404.jpg');
                                                        }
                                                    @endphp

                                                    <a href="{{ $pageLink ?? '#' }}">
                                                        <img src="{{ $base64 }}" alt="Our Collaborations" class="img">
                                                    </a>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <h6 class="text-success m-0 font-weight-light">
                                                        <div>
                                                            Rs. {{ $bestDealsBrands->bestdealprice ?? '0.00' }}
                                                        </div>
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="font-weight-light text-danger font-12 m-0 text-strike d-i-b">
                                                                <del>
                                                                    Rs. {{ $bestDealsBrands->price ?? '0.00' }} 
                                                                </del>
                                                                <span class="badge badge-danger">{{ $bestDealsBrands->discountpercantage }}%</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center mt-2">
                                                        <button class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
        @isset($bestDealsSupport)
            <div class="container-fluid mb-4">
                <div class="row mt-3">
                    <div class="col-12">
                        <h4 class="outer-heading bg-theme-text">Best Deal Support</h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="owl-carousel best-deals mt-2">
                                    @foreach ($bestDealsSupport as $bestDealsSupport)
                                        @php
                                          $pageLink = route('support.view', $bestDealsSupport->productcsl);
                                        @endphp
                                        <div class="deals-outer">
                                            <div class="row p-3">
                                                <div class="col-12 font-12 text-muted font-weight-light">
                                                    <div>{{ $bestDealsSupport->categoryname }}</div>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ $pageLink ?? '#' }}">
                                                        <h6 class="p-name text-center">
                                                            {{ $bestDealsSupport->productname }}
                                                        </h6>
                                                    </a>
                                                </div>
                                                <div class="col-12 mt-2">

                                                    @php
                                                        $path = $bestDealsSupport->filename;
                                                        $base64 = '';
                                                        if($path != ''){
                                                            if(     strpos($path, '.jpg') > -1 
                                                                ||  strpos($path, '.JPG') > -1 
                                                                ||  strpos($path, '.jpeg') > -1 
                                                                ||  strpos($path, '.JPEG') > -1 
                                                                ||  strpos($path, '.png') > -1 
                                                                ||  strpos($path, '.PNG') > -1 
                                                                ||  strpos($path, '.webp') > -1 
                                                                ||  strpos($path, '.WEBP') > -1 
                                                            ){
                                                                $type = pathinfo($path, PATHINFO_EXTENSION);
                                                                
                                                                $data = @file_get_contents($path);

                                                                if($data === false){
                                                                    $path = asset('public/assets/images/products/img_404.jpg');
                                                                    $data = file_get_contents($path);
                                                                }                                        
                                                                    
                                                                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                            }else{
                                                                $base64 = asset('public/assets/images/products/img_404.jpg');
                                                            }
                                                        }else{
                                                            $base64 = asset('public/assets/images/products/img_404.jpg');
                                                        }
                                                    @endphp

                                                    <a href="{{ $pageLink ?? '#' }}">
                                                        <img src="{{ $base64 }}" alt="Our Collaborations" class="img">
                                                    </a>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <h6 class="text-success m-0 font-weight-light">
                                                        <div>
                                                            Rs. {{ $bestDealsSupport->bestdealprice ?? '0.00' }}
                                                        </div>
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <span class="font-weight-light text-danger font-12 m-0 text-strike d-i-b">
                                                                <del>
                                                                    Rs. {{ $bestDealsSupport->price ?? '0.00' }} 
                                                                </del>
                                                                <span class="badge badge-danger">{{ $bestDealsSupport->discountpercantage }}%</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center mt-2">
                                                        <button class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </section>

@endsection

@section('js')

    {{-- Required optional JS --}}
    <script src="{{ asset('public/assets/js/index.js') }}"></script>

@endsection
