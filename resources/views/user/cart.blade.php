@extends('layouts.app')

@section('css')

    {{-- Page title --}}
    <title>User - cart | Upswale.com</title>

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
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Cart items</i> list</h6>
                                @include('user.template.cart')
                                <div class="row mt-3">
                                    <div class="col-12 font-12 theme-pagination">
                                        @if ($cartItem)
                                            {{ $cartItem->withQueryString()->links() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-sm">
                            
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
