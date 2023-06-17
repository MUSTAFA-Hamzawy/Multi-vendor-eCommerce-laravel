@php
    use App\MyHelpers;use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    $data = DB::table('get_vendor_data')->where('id', Auth::id())->get()[0];
    $status = Auth::user()->status;
@endphp

@extends('backend.layouts.app')
@section('PageTitle', 'Profile')
@section('content')

    @if(!$status)
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Your account is not activated</h6>
                    <div class="text-white">Wait for admin to activate your account</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <form id="profile_image" method="POST" action="{{route('vendor-profile-image-update')
                                }}" enctype="multipart/form-data">
                                    @csrf
                                    <img id="show_image" src="{{!empty($data->photo) ?
                                          url('uploads/images/profile/' . $data->photo):
                                          url('uploads/images/user_default_image.png')}}"
                                         alt="User Image"
                                         class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4>{{$data->name}}</h4>
                                        <label for="file-upload" class="btn btn-outline-primary"
                                               style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;">
                                            <i class="bx bxs-cloud-upload"></i> upload photo
                                        </label>
                                        <input name="image" id="file-upload" type="file" style="display: none"/>
                                        <input class="btn btn-primary" type="submit" value="Save"/>
                                        <div>
                                            <small style="color: #e20000" class="error" id="image-error"></small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="d-flex align-items-center mb-3">User Info</h4>
                            <br>
                            <form id="info_form" action="{{route('vendor-profile-info-update')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="name" type="text" class="form-control" value="{{$data->name}}"
                                               required autofocus/>
                                        <small style="color: #e20000" class="error" id="name-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" type="email" class="form-control" value="{{$data->email}}"
                                               required/>
                                        <small style="color: #e20000" class="error" id="email-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="username" type="text" class="form-control"
                                               value="{{$data->username}}" required/>
                                        <small style="color: #e20000" class="error" id="username-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Shop Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="shop_name" type="text" class="form-control"
                                               value="{{$data->shop_name}}" />
                                        <small style="color: #e20000" class="error" id="shop_name-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Joined Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">

                                        <h6 class="mb-0">{{MyHelpers::getDiffOfDate($data->created_at)}}</h6>
                                        <br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Shop Description</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea id="mytextarea"
                                                  name="shop_description">{{$data->shop_description
                                                  }}</textarea>
                                        <small style="color: #e20000" class="error" id="username-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="phone_number" type="text" class="form-control"
                                               value="{{$data->phone_number}}" placeholder="Your phone number"/>
                                        <small style="color: #e20000" class="error" id="phone_number-error"></small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="address" type="text"
                                               class="form-control"
                                               value="{{$data->address}}" placeholder="Your address"/>
                                        <small style="color: #e20000" class="error" id="address-error"></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes"
                                        />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="d-flex align-items-center mb-3">Change Password</h4>
                                    <br>
                                    <form id="password_form" action="{{route('vendor-profile-password-update')}}"
                                          method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Current Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="password" type="password" class="form-control" required/>
                                                <small style="color: #e20000" class="error" id="password-error"></small>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">New Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="new_password" type="password" class="form-control"
                                                       autofocus/>
                                                <small style="color: #e20000" class="error"
                                                       id="new_password-error"></small>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Confirm Password</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="confirm_password" type="password" class="form-control"
                                                       autofocus/>
                                                <small style="color: #e20000" class="error"
                                                       id="confirm_password-error"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save"/>
                                            </div>
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

@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#info_form').on('submit', function (event) {
                event.preventDefault();
                // remove errors if the conditions are true
                $('#info_form *').filter(':input.is-invalid').each(function () {
                    this.classList.remove('is-invalid');
                });
                $('#info_form *').filter('.error').each(function () {
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('vendor-profile-info-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // remove errors if the conditions are true
                        $('#info_form *').filter(':input.is-invalid').each(function () {
                            this.classList.remove('is-invalid');
                        });
                        $('#info_form *').filter('.error').each(function () {
                            this.innerHTML = '';
                        });
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.reload();
                        });
                    },
                    error: function (response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err) {
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key).addClass('is-invalid');
                        });
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#password_form').on('submit', function (event) {
                event.preventDefault();
                // remove errors if the conditions are true
                $('#password_form *').filter(':input.is-invalid').each(function () {
                    this.classList.remove('is-invalid');
                });
                $('#password_form *').filter('.error').each(function () {
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('vendor-profile-password-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // remove errors if the conditions are true
                        $('#password_form *').filter(':input.is-invalid').each(function () {
                            this.classList.remove('is-invalid');
                        });
                        $('#password_form *').filter('.error').each(function () {
                            this.innerHTML = '';
                        });
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // window.location.reload();
                        });
                    },
                    error: function (response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err) {
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key).addClass('is-invalid');
                        });
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#profile_image').on('submit', function (event) {
                event.preventDefault();
                // remove errors if the conditions are true
                $('#profile_image *').filter(':input.is-invalid').each(function () {
                    this.classList.remove('is-invalid');
                });
                $('#profile_image *').filter('.error').each(function () {
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('vendor-profile-image-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // remove errors if the conditions are true
                        $('#profile_image *').filter(':input.is-invalid').each(function () {
                            this.classList.remove('is-invalid');
                        });
                        $('#profile_image *').filter('.error').each(function () {
                            this.innerHTML = '';
                        });
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // window.location.reload();
                        });
                    },
                    error: function (response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err) {
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key).addClass('is-invalid');
                        });
                    }
                });
            });
        });
    </script>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#profile_image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'
            referrerpolicy="origin">
    </script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
@endsection
