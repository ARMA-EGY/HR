@extends('layouts.auth')


@section('content')
        
    <div class="account-pages my-5 pt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">

                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">{{__('master.WELCOME-BACK')}}</h5>
                                        <p>{{__('master.SIGNIN-TO-CONTINUE-TO')}} </p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0"> 
                            <div class="auth-logo">
                                <a href="#" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('assets/images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="#" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('assets/images/logo.svg')}}" alt="" class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    @if(session()->has('fail'))	
                                        <div class="alert alert-danger alert-dismissible fade show m-2 mt-4" role="alert">
                                            {{ session()->get('fail') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{__('master.EMAIL')}}</label>
                                        <input type="email" class="@error('email') is-invalid @enderror form-control" name="email" id="email" placeholder="{{__('master.ENTER-EMAIL')}}" required>

                                        @error('email')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{__('master.PASSWORD')}}</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" class="@error('password') is-invalid @enderror  form-control" id="password" placeholder="{{__('master.ENTER-PASSWORD')}}" aria-label="Password" aria-describedby="password-addon" required>
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>

                                        @error('password')
                                            <div>
                                                <span class="text-danger">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            {{__('master.REMEMBER-ME')}}
                                        </label>
                                    </div>
                                    
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">{{__('master.LOG-IN')}}</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock me-1"></i> {{__('master.FORGET-YOUR-PASSWORD')}}</a>
                                    </div>
                                </form>
                            </div>
        
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
            
@endsection
	
	
	

