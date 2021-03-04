@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <!-- <title>Brands | Upswale.com</title> -->
    <title>Brands</title>

    {{-- Required option css internal and external --}}
    <link rel="stylesheet" href="{{ asset('public/assets/css/jqueryUi/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/product_filter.css') }}">

    {{-- Option footer option --}}
    <link rel="stylesheet" href="{{ asset('public/assets/css/optional_footer.css') }}">
    
@endsection

@section('content')

    {{-- Page content --}}
    <section>

        {{-- filter loader --}}
        {{-- <div class="container">
            <h4 class="page-heading">
                Our Brands
            </h4>
        </div> --}}
        
        <div class="container-fluid outer-container">
            <div class="row mt-3 mb-4">
                <div class="col-sm-12">
                    <div class="products-box">
                        
                        @include('brands.templates.filter')

                        @include('brands.templates.brand_grid')
                        
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

@section('js')

    {{-- Required optional JS --}}
    <script src="{{ asset('public/assets/js/jqueryUi/jquery-ui.min.js') }}"></script>

@endsection