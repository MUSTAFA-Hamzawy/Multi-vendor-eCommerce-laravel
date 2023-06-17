@php use App\MyHelpers;use Illuminate\Support\Facades\Auth; $role = Auth::user()->role;@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Coupons')
@section('content')
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Coupon</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Coupon List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                @if(Auth::user()->role == "vendor")
                    <div class="ms-auto" style="margin-bottom: 20px">
                        <a href="add_coupon" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                            <i class="bx bxs-plus-square"></i>Add New Coupon</a></div>
                @endif


                <table id="data_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Coupon Code</th>
                        <th>Discount</th>
                        <th>Expiration Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->coupon_code}}</td>
                            <td>{{$item->discount_amount}}%</td>
                            <td>{{MyHelpers::getDiffOfDate($item->expiration_date) }}</td>
                            <td>
                                @if($item->coupon_status)
                                    <div class="badge rounded-pill bg-light-success text-success w-100">active</div>
                                @else
                                    <div class="badge rounded-pill bg-light-danger text-danger w-100">Not active</div>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    @if(Auth::user()->role == "vendor")
                                        <a href="" class="" data-bs-toggle="modal"
                                           data-bs-target="#exampleFullScreenModal-{{$item->coupon_id}}"><i class='bx
                                       bxs-edit'></i></a>

                                    @endif


                                    <div class="modal fade" id="exampleFullScreenModal-{{$item->coupon_id}}"
                                         tabindex="-1"
                                         aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Coupon</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form class="coupon_form" action="{{route
                                                            ('vendor-coupon-update')
                                                            }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input name="coupon_id" value="{{$item->coupon_id}}"
                                                                       hidden/>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Coupon Code</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input name="coupon_code" type="text"
                                                                               class="form-control"
                                                                               value="{{$item->coupon_code}}"
                                                                               required autofocus/>
                                                                        <small style="color: #e20000" class="error"
                                                                               id="coupon_code-error"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Discount %</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input name="discount_amount" type="text"
                                                                               class="form-control"
                                                                               value="{{$item->discount_amount}}"
                                                                               required autofocus/>
                                                                        <small style="color: #e20000" class="error"
                                                                               id="discount_amount-error"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Expiration Date</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input type="datetime-local"
                                                                               class="form-control"
                                                                               name="expiration_date"
                                                                               value="{{$item->expiration_date}}"
                                                                               required>

                                                                        <small style="color: #e20000" class="error"
                                                                               id="expiration_date-error"></small>
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
                                       data-bs-target="#exampleDangerModal-{{$item->coupon_id}}">

                                        <i class='bx bxs-trash'></i>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleDangerModal-{{$item->coupon_id}}"
                                             tabindex="-1"
                                             style="display: none;" aria-hidden="true">
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
                                                        ('remove_coupon/{{$item->coupon_id}}');"
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
                $('.coupon_form').on('submit', function (event) {
                    event.preventDefault();
                    // remove errors if the conditions are true
                    $('.coupon_form *').filter(':input.is-invalid').each(function () {
                        this.classList.remove('is-invalid');
                    });
                    $('.coupon_form *').filter('.error').each(function () {
                        this.innerHTML = '';
                    });
                    $.ajax({
                        url: "{{route('vendor-coupon-update')}}",
                        method: 'POST',
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (response) {
                            // remove errors if the conditions are true
                            $('.coupon_form *').filter(':input.is-invalid').each(function () {
                                this.classList.remove('is-invalid');
                            });
                            $('.coupon_form *').filter('.error').each(function () {
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

@endsection
