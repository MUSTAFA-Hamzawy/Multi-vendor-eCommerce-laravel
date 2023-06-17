<!doctype html>
<html lang="en">
@php
$errList = [];
$errList['name'] = $errors->get('name') ? $errors->get('name')[0] : null;;
$errList['email'] = $errors->get('email') ? $errors->get('email')[0] : null;;
$errList['username'] = $errors->get('username') ? $errors->get('username')[0] : null;;
$errList['passwordErr'] = $errors->get('password') ? $errors->get('password')[0] : null;
@endphp
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('backend.includes.favicon')
    @include('backend.includes.css')
    <title>Sign up</title>
</head>

<body class="bg-login">
<!--wrapper-->
<div class="wrapper">
    <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="my-4 text-center">
                        <img src="{{asset('backend_assets')}}/images/logo-img.png" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Sign Up</h3>
                                    <p>Already have an account? <a href="/login">Sign in here</a>
                                    </p>
                                </div>
                                <div class="d-grid">
                                    <a class="btn my-4 shadow-sm btn-white" href="social_auth/google"> <span class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="{{asset('backend_assets')}}/images/icons/search.svg" width="16"
                               alt="Image
                          Description">
                          <span>Sign Up with Google</span>
											</span>
                                    </a>
                                </div>
                                <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{route('register')}}">
                                        @csrf
                                        <input type="text" name="role" value="vendor" hidden/>
                                        <div class="col-sm-12">
                                            <label for="inputName" class="form-label">Name</label>
                                            <input name="name" type="text" class="form-control" id="inputName"
                                                   placeholder="Your name" autocomplete="name" value="{{old('name')}}"
                                                   autofocus
                                                   required>
                                            <small style="color: #e20000" class="error">{{$errList['name']}}</small>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input name="email" type="email" class="form-control"
                                                   id="inputEmailAddress"  autocomplete="username" required
                                                   placeholder="example@user.com" value="{{old('email')}}">
                                            <small style="color: #e20000" class="error">{{$errList['email']}}</small>

                                        </div>
                                        <div class="col-sm-12">
                                            <label for="inputUserName" class="form-label">Username</label>
                                            <input name="username" type="text" class="form-control" id="inputUserName"
                                                   placeholder="Choose a unique username" autocomplete="username"
                                                   autofocus
                                                   required value="{{old('username')}}">
                                            <small style="color: #e20000" class="error">{{$errList['username']}}</small>

                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input name="password" type="password"
                                                       class="form-control border-end-0"
                                                       autocomplete="new-password" required
                                                       id="inputChoosePassword" placeholder="Enter Password">

                                                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                            <small style="color: #e20000"
                                                   class="error">{{$errList['passwordErr']}}</small>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Confirm Password
                                            </label>
                                            <div class="input-group" id="show_hide_password_2">
                                                <input name="password_confirmation" type="password"
                                                       class="form-control border-end-0"
                                                       autocomplete="new-password" required
                                                       id="password_confirmation" placeholder="Confirm Password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>


                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->
@include('backend.includes.js')
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });

        $("#show_hide_password_2 a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password_2 input').attr("type") == "text") {
                $('#show_hide_password_2 input').attr('type', 'password');
                $('#show_hide_password_2 i').addClass("bx-hide");
                $('#show_hide_password_2 i').removeClass("bx-show");
            } else if ($('#show_hide_password_2 input').attr("type") == "password") {
                $('#show_hide_password_2 input').attr('type', 'text');
                $('#show_hide_password_2 i').removeClass("bx-hide");
                $('#show_hide_password_2 i').addClass("bx-show");
            }
        });
    });
</script>
</body>

</html>
