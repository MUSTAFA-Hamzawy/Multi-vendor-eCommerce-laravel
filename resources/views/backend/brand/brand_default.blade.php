@php
    use Illuminate\Support\Facades\Auth;$role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Brands')
@section('content')
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Brand</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Brand List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="ms-auto" style="margin-bottom: 20px">
                    <a href="add_brand" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                        <i class="bx bxs-plus-square"></i>Add New Brand</a></div>

                <table id="data_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Brand Name</th>
                        <th>Brand Slug</th>
                        <th>View Details</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->brand_name}}</td>
                            <td>{{$item->brand_slug}}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm radius-30 px-4"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleVerticallycenteredModal-{{$item->brand_id}}">View
                                    Details
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleVerticallycenteredModal-{{$item->brand_id}}"
                                     tabindex="-1"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Brand Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{url('uploads/images/brand/' . $item->brand_image)}}"
                                                     class="card-img-top" style="max-width: 300px; margin-left:
                                                         10px">
                                                <div class="card-body">
                                                    <h5 class="card-title">Brand Name : <span style="font-weight:
                                                         lighter">{{$item->brand_name}}</span></h5>
                                                    <h5 class="card-title">Brand Slug : <span style="font-weight:
                                                         lighter">{{$item->brand_slug}}</span></h5>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="" class="" data-bs-toggle="modal"
                                       data-bs-target="#exampleFullScreenModal-{{$item->brand_id}}"><i class='bx
                                       bxs-edit'></i></a>

                                    <div class="modal fade" id="exampleFullScreenModal-{{$item->brand_id}}"
                                         tabindex="-1"
                                         aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Brand</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form class="brand_form" action="update_brand" method="POST"
                                                                  enctype="multipart/form-data">
                                                                @csrf
                                                                <input name="brand_id" value="{{$item->brand_id}}"
                                                                       hidden/>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Brand Name</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input name="brand_name" type="text"
                                                                               class="form-control"
                                                                               value="{{$item->brand_name}}"
                                                                               required autofocus/>
                                                                        <small style="color: #e20000" class="error"
                                                                               id="brand_name-error"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Brand Image</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input name="brand_image" id="brand_image"
                                                                               class="form-control" type="file">
                                                                        <small style="color: #e20000" class="error"
                                                                               id="brand_image-error"></small>
                                                                        <div>
                                                                            <img class="card-img-top" src="{{url
                                                                        ('uploads/images/brand/' .
                                                                        $item->brand_image)}}"
                                                                                 style="max-width: 250px; margin-top: 20px"
                                                                                 id="show_image">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-3"></div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input type="submit"
                                                                               class="btn btn-primary px-4"
                                                                               value="Save Changes"
                                                                        />
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="" class="ms-3" data-bs-toggle="modal"
                                       data-bs-target="#exampleDangerModal-{{$item->brand_id}}">

                                        <i class='bx bxs-trash'></i>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleDangerModal-{{$item->brand_id}}"
                                             tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white">Sure ?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <button onclick="window.location.replace
                                                        ('remove_brand/{{$item->brand_id}}');"
                                                                class="btn btn-dark">Confirm
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>


                                </div>
                            </td>
                        </tr>

                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
@section('plugins')
    <link href="{{asset('backend_assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
@endsection
@section('js')
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#data_table').DataTable({
                lengthChange: true,
                buttons: ['excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#data_table_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script src="sweetalert2.all.min.js"></script>



    @section('AjaxScript')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.brand_form').on('submit', function (event) {
                    event.preventDefault();
                    // remove errors if the conditions are true
                    $('.brand_form *').filter(':input.is-invalid').each(function () {
                        this.classList.remove('is-invalid');
                    });
                    $('.brand_form *').filter('.error').each(function () {
                        this.innerHTML = '';
                    });
                    $.ajax({
                        url: "{{route('brand-update')}}",
                        method: 'POST',
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (response) {
                            // remove errors if the conditions are true
                            $('.brand_form *').filter(':input.is-invalid').each(function () {
                                this.classList.remove('is-invalid');
                            });
                            $('.brand_form *').filter('.error').each(function () {
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
        </script>

    @endsection

    @section('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#brand_image').change(function (e) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#show_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection
@endsection
