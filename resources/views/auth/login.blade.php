@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <h4 class="page-heading">
            Login
        </h4>
    </div>
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="row">
                    @if(session()->has('error'))
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ session()->get('error') }}
                            </div>                    
                        </div>
                    @endif
                </div>

                <div class="row">
                    @if(session()->has('success'))
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ session()->get('success') }}
                            </div>                    
                        </div>
                    @endif
                </div>

                <form  method="POST" action="{{ route('login') }}">
                    <div class="row custom-form mt-2">
                        <div class="col-sm-12">
                            <div class="form-group mb-0">
                                <input required type="" class="form-control font-12 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                <label class="m-0 font-12">Your Email</label>
                                @csrf
                            </div>
                            @error('email')
                                <div class="text-danger font-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row custom-form mt-2">
                        <div class="col-sm-12 mt-4">
                            <div class="form-group mb-0">
                                <input required type="password" class="form-control font-12 @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                <label class="m-0 font-12">Your password</label>
                            </div>                            
                            @error('password')
                                <div class="text-danger font-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label font-12" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button class="flash theme-btn">Login</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-4 text-right mt-2">
                            <p>
                                <a href="#" class="font-12">Forgot your password? </a>                                
                            </p>
                        </div>
                    </div>
                    @if (Route::has('register'))
                        <div class="row">
                            <div class="col-sm-12 text-right mt-0">
                                <p>
                                    <a href="{{ route('register') }}" class="font-12">Click here to create a new account.</a>                                
                                </p>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
