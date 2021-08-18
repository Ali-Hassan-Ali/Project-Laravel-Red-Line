@extends('layouts.home.login_app')

@section('content')

@section('title', __('home.login'))    

<!--start of login-->

    <section id="login">

        <div class="bg__login" style="background:-webkit-linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),url('{{ asset("home_files/images/bg-slider.jpg") }}') center/cover no-repeat;"></div>

        <div class="container text-white">

            <div class="row">

                <div class="col-10 mx-auto col-md-8 mx-auto pt-4 bg-dark border-button" style="border: solid #fff 1px;">
                    <h2 class="fw-300 text-center ">
                        <span class="text-danger ">Read</span> Line</span>
                    </h2>

                    <hr>

                    <form action="{{ route('login') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <div class="form-group ">
                            <label for="email"><i class="fa fa-envelope"></i> @lang('home.email')</label>
                            <input type="email" name="email" value="{{ old('email') }}" 
                                    class="form-control bg-transparent text-light border-input @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--password -->
                        <div class="form-group ">
                            <label><i class="fa fa-lock"></i> @lang('home.password')</label>
                            <input type="password" name="password" 
                                    class="form-control bg-transparent text-light border-input @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!--                    Login by Remember Me-->

                        <div class="form-group">
                            <div class="custom-control custom-checkbox ">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="custom-control-label ">@lang('home.remember')</label>
                            </div>
                        </div>
                        <!--                    Login form-->

                        <div class="form-group ">
                            <button type="submit " class="btn btn-danger btn-block"> @lang('home.login') <i class="fa fa-sign-in"></i></button>
                        </div>
                        <p class="text-center">@lang('home.create_ac') <a href="{{ route('register') }}">@lang('home.register')</a></p>
                        <p class="text-center">@lang('home.redirect_h') <a href="/">@lang('home.home')</a></p>
                        <p class="text-center">
                            <a href="./ResetPassword.html ">@lang('home.forget') ?</a>
                        </p>
                        <hr>
                        <!--                    Login by Gmail and Facebook-->
                        <div class="form-group ">
                            
                            @if (env('FACEBOOK_ID'))
                                
                                <a href="{{ route('auth.provider', ['provider' => 'facebook']) }}" class="btn btn-block btn-primary" style="background: #3b5998 ">
                                    <span class="fa fa-facebook"></span> @lang('home.Login_goole')
                                </a>

                            @endif

                            @if (env('GOOGLE_ID'))
                                
                                <a href="{{ route('auth.provider', ['provider' => 'google']) }}" class="btn btn-block btn-primary" style="background: #ea4335 ">
                                    <span class="fa fa-google"></span> @lang('home.Login_face')
                                </a>

                            @endif

                        </div>

                    </form>
                    <!--end fo form-->

                </div>
                <!--end of col-auto-->

            </div>
            <!--end of row-->

        </div>
        <!--end of container-->

    </section>

<!--end of login-->

@endsection
