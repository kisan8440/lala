@extends('layouts.app')

@section('content')
<section>
        
    <div class="container">
        <h4 class="page-heading">
            Register
        </h4>
    </div>

    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="row custom-form mt-0">
                        <div class="col-sm-12">
                            <div class="form-group mb-0">                                
                                <input id="firstname" type="text" class="form-control  font-12  @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                <label class="m-0 font-12" for="firstname">{{ __('First name') }}</label>
                            </div>
                            @error('firstname')
                                <div class="text-danger font-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row custom-form mt-2">
                        <div class="col-sm-12 mt-3">
                            <div class="form-group mb-0">                                
                                <input required id="lastname" type="text" class="form-control font-12  @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}">
                                <label class="m-0 font-12" for="lastname">{{ __('Last name') }}</label>
                            </div>
                            @error('lastname')
                                <div class="text-danger font-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row custom-form mt-2">
                        <div class="col-sm-12 mt-3">
                            <div class="form-group mb-0">                                
                                <input required id="email" type="text" class="form-control font-12  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                <label class="m-0 font-12" for="email">{{ __('Email') }}</label>
                            </div>
                            @error('email')
                                <div class="text-danger font-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row custom-form mt-2">
                        <div class="col-sm-12 mt-3">
                            <div class="form-group mb-0">                                
                                <input required id="password" type="password" class="form-control font-12  @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                                <label class="m-0 font-12" for="password">{{ __('Password') }}</label>
                            </div>
                            @error('password')
                                <div class="text-danger font-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row custom-form mt-2">
                        <div class="col-sm-12 mt-3">
                            <div class="form-group mb-0">                                
                                <input required id="password_confirmation" type="password" class="form-control font-12  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                <label class="m-0 font-12" for="password_confirmation">{{ __('Confirm password') }}</label>
                            </div>
                            @error('password_confirmation')
                                <div class="text-danger font-12">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row custom-form mt-4">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="flash theme-btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        <div class="row">
                            <div class="col-sm-12 text-right mt-4">
                                <p>
                                    <a href="{{ route('login') }}" class="font-12">Already have an account? Click login.</a>                                
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
