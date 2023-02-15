@extends('frontend.layout.app')
@section('PageTitle', 'User Login')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="{{asset('frontend_assets')}}/imgs/page/login-1.png"
                                 alt="" />
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Login</h1>
                                        <p class="mb-30">Don't have an account? <a href="/user_register">Create
                                                here</a></p>
                                    </div>
                                    <form method="post" action="login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text"  placeholder="Username*"
                                                   name="username"
                                                   autocomplete="username"
                                                   autofocus
                                                   required
                                            />
                                            <small style="color: #e20000" class="error" id="username-error"></small>
                                        </div>
                                        <div class="form-group">
                                            <input  type="password" name="password" placeholder="Your password *"
                                                    autocomplete="current-password" class="form-control border-end-0"
                                                    required
                                            />
                                            <small style="color: #e20000" class="error" id="password-error"></small>
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
{{--                                                TODO-me: remember me checkbox --}}
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                    <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            <a class="text-muted" href="#">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
