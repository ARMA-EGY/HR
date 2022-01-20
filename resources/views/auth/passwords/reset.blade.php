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
                                
                                <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                                    @csrf
            
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">{{__('auth.EMAIL')}}</label>
                                        <input id="useremail" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" placeholder="{{__('auth.ENTER-EMAIL')}}" required autofocus autocomplete="email">
                                       
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{__('auth.PASSWORD')}}</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" id="password" placeholder="{{__('auth.ENTER-PASSWORD')}}" aria-label="Password" aria-describedby="password-addon" required autocomplete="new-password">
                                            <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>

                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">{{__('auth.CONFIRM-PASSWORD')}}</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="{{__('auth.ENTER-CONFIRM-PASSWORD')}}" required autocomplete="new-password">
                                        </div>
                                    </div>
                
                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{__('auth.RESET-PASSWORD')}}</button>
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

