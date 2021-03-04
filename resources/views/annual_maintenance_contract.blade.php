@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <title>Annual maintenance contract | Upswale.com</title>
    
    {{-- Required option css internal and external --}}


@endsection

@section('content')

    {{-- Page content --}}
    
    <section>

        <div class="container">
            <h4 class="page-heading">
                {{ $pageTitle ?? 'Annual maintenance contract' }}
            </h4>
        </div>

        <div class="container mt-3">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="row">
                            <div class="col-12">
    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 pl-0 pr-sm-0 pr-md-3">
                                        <div class="theme-block box-hover-effect p-4">
                                            <h5 class="text-uppercase m-0 custom-underline position-relative">
                                                Contact us
                                            </h5>
                                            <div class="mt-4">
                                                <table class="">
                                                    <tr>
                                                        <td class="text-yellow">
                                                            <i class="fas fa-home"></i>
                                                        </td>
                                                        <td>
                                                            <h6 class="m-0 p-0 bg-theme-text">
                                                                Upswale.com
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top">
                                                            <i class="fas fa-map-marker-alt text-yellow"></i>
                                                        </td>
                                                        <td valign="top">
                                                            <p class="m-0">
                                                                1st Floor, Narendra Sadan Complex, 
                                                                Near Ismail Degree College, 
                                                                Budhana Gate, Meerut-250001, 
                                                                Uttar Pradesh, India.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-phone flip-180 text-yellow"></i> 
                                                        </td>
                                                        <td>
                                                            <a href="tel:+918171227799">
                                                                <p class="m-0"> +91 8171 227 799</p>
                                                            </a>                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="far fa-envelope text-yellow"></i>
                                                        </td>
                                                        <td>
                                                            <a href="mailto:info@upswale.com">
                                                                <p class="m-0">info@upswale.com</p>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 theme-block box-hover-effect">
                                        <p class="m-0 font-medium">
                                            <i class="fas fa-quote-left text-yellow fa-2x mr-2"></i>
                                            <span>
                                                We are Dynamic and Challenging Electrical Engineering Team whose Main Focus is to provide our clients with high quality professional services, and cost effective solutions. By providing personalized service, every client is treated like the only client with Reliability and Conformance to Standards.
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-12 theme-block p-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="img-style">
                                                    <img class="w-100" src="./assets/images/images/electrical.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row theme-block ">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row theme-block pr-1">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
