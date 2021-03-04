@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <title>{{ $itemDetails->itemname ?? 'Item details' }} | Upswale.com</title>

    {{-- Required option css internal and external --}}
    <link rel="stylesheet" href="{{ asset('public/assets/css/product_details.css') }}">

    {{-- Option footer option --}}
    <link rel="stylesheet" href="{{ asset('public/assets/css/optional_footer.css') }}">
    
@endsection

@section('content')

    {{-- Page content --}}
    <section>

        <div class="container-fluid bg-yellow">
            <div class="row">
                <div class="container pt-1 pb-1 custom-breadcumb">

                    @php
                        $url = route('product.search');
                        $p_url = $url;
                    @endphp

                    <a class="text-uppercase font-12 font-weight-bold" href="{{ $url }}">
                        Product
                    </a>

                    @if ($itemDetails->categoryname)

                        @if ($url == $p_url)
                            @php
                                $joinQuery = '?'
                            @endphp
                        @else
                            @php
                                $joinQuery = '&'
                            @endphp
                        @endif

                        @php
                            $url = $url .''. $joinQuery . 'category=' . $itemDetails->categorycode;
                        @endphp

                        <span class="pl-2 pr-2 bg-theme-text">
                            <i class="fas fa-angle-right font-12"></i>
                        </span> 
                        <a class="text-uppercase font-12 font-weight-bold" href="{{ $url }}">
                            {{ $itemDetails->categoryname }}
                        </a>
                    @endif

                    @if ($itemDetails->subcategoryname)

                        @if ($url == $p_url)
                            @php
                                $joinQuery = '?'
                            @endphp
                        @else
                            @php
                                $joinQuery = '&'
                            @endphp
                        @endif

                        @php
                            $url = $url .''. $joinQuery . 'subCategory=' . $itemDetails->subcategorycode;
                        @endphp

                        <span class="pl-2 pr-2 bg-theme-text">
                            <i class="fas fa-angle-right font-12"></i>
                        </span> 
                        <a class="text-uppercase font-12 font-weight-bold" href="{{ $url }}">
                            {{ $itemDetails->subcategoryname }}
                        </a>
                    @endif

                    @if ($itemDetails->itemname)
                        <span class="pl-2 pr-2 bg-theme-text">
                            <i class="fas fa-angle-right font-12"></i>
                        </span> 
                        <span class="text-uppercase font-12 text-500">
                            {{ $itemDetails->itemname }}
                        </span>
                    @endif

                </div>
            </div>
        </div>

        <div class="container outer-container">
            <div class="row mb-4">
                <div class="col-sm-12">

                    <section class="mb-4 mt-4">
                        <div class="row">
                            <div class="col-md-5 mb-4 mb-md-0">
        
                                <div class="mdb-lightbox">
        
                                    <div class="row product-gallery mx-1">
        
                                        <div class="col-12 mb-0">

                                            @php                                                                     							
                                                $path = $itemDetails->filename;
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

                                            <figure class="view overlay rounded z-depth-1 main-img">
                                                <a href="javascript:void(0)" data-size="710x823" title="click to open">
                                                    <img src="{{ $base64 }}" alt="{{ $itemDetails->itemname }}" class="img-fluid z-depth-1 image-details-view">
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">

                                                @foreach ($itemDetails['itemImages'] as $itemImage)

                                                    @php                                                                     							
                                                        $path = $itemImage->filename;
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

                                                                if($data !== false){
                                                                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                                }   
                                                            }
                                                        }
                                                                                                    
                                                    @endphp

                                                    @if ($base64 != '')
                                                        
                                                        <div class="col-3">
                                                            <div class="view overlay rounded z-depth-1 gallery-item gallery-thumbnails">
                                                                <img title="{{ $itemImage->propertiesname }}" src="{{ $base64 }}" alt="{{ $itemImage->propertiesname }}" class="img-fluid min-height-90">
                                                                <div class="mask rgba-white-slight"></div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                    
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
        
                                </div>
        
                            </div>
                            <div class="col-md-7">
        
                                <h4>
                                    {{ $itemDetails->itemname }}
                                </h4>
        
                                <p class="mb-2 text-muted text-uppercase font-500">
                                    
                                    {{ $itemDetails->categoryname }}

                                    @if ($itemDetails->subcategoryname)
                                        <span class="pl-2 pr-2 text-yelloe">
                                            <i class="fas fa-angle-right"></i>
                                        </span>
                                        {{ $itemDetails->subcategoryname }}
                                    @endif
                                                                    
                                </p>                               

                                <p>
                                    <span class="mr-1 font-500">
                                        <i class="fas fa-rupee-sign"></i>
                                        <span id="product-price">{{ $itemDetails->itemprice ?? '0.00' }}</span>
                                    </span>
                                </p>

                                @if ($itemDetails->itemdescription)
                                    <p class="pt-1">
                                        {{ $itemDetails->itemdescription }}  
                                    </p>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                                                <td>
                                                    {{ $itemDetails->modelno }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2">
                                    <p class="m-0">
                                        <i class="fas fa-dot-circle text-yellow"></i>
                                        <a href="#product_overview">View product full overview</a>
                                    </p>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Buy now</button>
                                <button type="button" class="btn btn-outline-warning btn-md mr-1 mb-2 add-item-to-cart"><i class="fas fa-shopping-cart"></i>Add to cart </button>
                                
                                <a 
                                    id="reset-default"
                                    class="btn btn-outline-success btn-md mb-2" 
                                    href="{{ route('product.item_view',  $itemDetails->csl) }}" 
                                    style="
                                        display: 
                                        @if (request()->input('customized')) 
                                            inline-block 
                                        @else 
                                            none 
                                        @endif
                                    ">
                                    <i class="fas fa-redo rotate-120 flip-180"></i>
                                    Reset default
                                </a>

                                <hr>

                            </div>
                        </div>
        
                    </section>
                    
                </div>
            </div>
        </div>

        {{-- Product description --}}

        <div class="container-fluid pb-5" id="product_overview">
            <section class="row product-description">
                <div class="col-12 product-description-head">
                    <div class="row">
                        <div class="container">
                            <ul class="product-description-nav">
                                
                                @foreach ($productNavDesc as $nav)
                                    <li class="
                                    @if ($loop->index == '0')
                                        active
                                    @endif
                                    p-desc-btn tab-navigate" data-target="{{ '#'.$nav->descriptioncode }}">
                                        <button> {{ $nav->descriptionname }} </button>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="container mt-3">

                            @foreach ($productNavDesc as $nav)

                                @if ($nav->descriptioncode != '')
                                    @include('products.templates.items_nav.'.$nav->descriptioncode)
                                @endif

                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
        </div>

        <input type="hidden" name="urlPath" id="urlPath">
        <input type="hidden" name="basePrice" value="{{ $itemDetails->itemprice ?? '0.00' }}" id="basePrice">
        
        <input type="hidden" name="base_url" id="base_url" value="{{ route('index') }}">
        <input type="hidden" name="product_csl" id="product_csl" value="{{ $itemDetails->csl }}">

    </section>

@endsection

@section('js')

    {{-- Required optional JS --}}
    <script src="{{ asset('public/assets/js/tab_navigation.js') }}"></script>
    <script src="{{ asset('public/assets/js/doc-opener.js') }}"></script>
    <script src="{{ asset('public/assets/js/cusomize-item.js') }}"></script>
    
@endsection