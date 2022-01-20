@extends('layouts.auth')


@section('content')

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> {{__('auth.RESET-PASSWORD')}}</h5>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0"> 
                            <div>
                                <a href="#">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('assets/images/logo.svg')}}" alt="" class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="p-2">
                                
                                @if (session('status'))
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @else
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        {{__('auth.ENTER-EMAIL-TO-RESET')}}
                                    </div>
                                @endif
                                
                                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">{{__('auth.EMAIL')}}</label>
                                        <input id="useremail" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" placeholder="{{__('auth.ENTER-EMAIL')}}" required autofocus autocomplete="email">
                                       
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                
                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{__('auth.SEND-PASSWORD-RESET-LINK')}}</button>
                                    </div>

                                </form>
                            </div>
        
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p>{{__('auth.REMEMBER-IT')}} <a href="{{ route('login') }}" class="fw-medium text-primary"> {{__('auth.SIGN-IN')}}</a> </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
            
@endsection

