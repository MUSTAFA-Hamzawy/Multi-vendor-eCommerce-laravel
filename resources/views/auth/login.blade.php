<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('backend.includes.favicon')
    @include('backend.includes.css')
    <title>Sign in</title>
</head>

<body class="bg-login">
<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="{{asset('backend_assets')}}/images/logo-img.png" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Sign in</h3>
                                    <p>Don't have an account yet? <a href="/register">Sign up here</a>
                                    </p>
                                </div>
                                <div class="d-grid">
                                    <a class="btn my-4 shadow-sm btn-white" href="social_auth/google"> <span class="d-flex
                                    justify-content-center align-items-center">
                          <img class="me-2" src="{{asset('backend_assets')}}/images/icons/search.svg" width="16"
                               alt="Image
                          Description">
                          <span>Sign in with Google</span>
											</span>
                                    </a>
                                </div>
                                <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH USERNAME</span>
                                    <hr/>
                                </div>
                                <div class="form-body">
                                    <form id="login_form" class="row g-3" method="POST" action="{{route('login')
                                    }}">
                                        @csrf

                                        <div class="col-sm-12">
                                            <label for="inputUserName" class="form-label">Username</label>
                                            <input name="username" type="text" class="form-control" id="inputUserName"
                                                   placeholder="Username" autocomplete="username"
                                                   autofocus
                                                   required>
                                            <small style="color: #e20000" class="error"
                                                   id="username-error">{{isset($errors->get('username')[0]) ? $errors->get
                                                   ('username')[0] : null}}</small>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input name="password" autocomplete="current-password"
                                                       type="password" class="form-control border-end-0"
                                                       id="inputChoosePassword" placeholder="Enter Password"
                                                       required> <a	href="javascript:;"
                                                                       class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-switch">
                                                <input name="remember" class="form-check-input" type="checkbox"
                                                       id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
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
    });
</script>
</body>

</html>
