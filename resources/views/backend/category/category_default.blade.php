@php
    use Illuminate\Support\Facades\Auth;$role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Categories')
@section('content')
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="ms-auto" style="margin-bottom: 20px">
                    <a href="add_category" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                        <i class="bx bxs-plus-square"></i>Add New Category</a></div>

                <table id="data_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>View Details</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->category_name}}</td>
                            <td>{{$item->category_slug}}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm radius-30 px-4"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleVerticallycenteredModal-{{$item->category_id}}">View
                                    Details
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleVerticallycenteredModal-{{$item->category_id}}"
                                     tabindex="-1"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Category Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{url('uploads/images/category/' . $item->category_image)}}"
                                                     class="card-img-top" style="max-width: 300px; margin-left:
                                                         10px">
                                                <div class="card-body">
                                                    <h5 class="card-title">Category Name : <span style="font-weight:
                                                         lighter">{{$item->category_name}}</span></h5>
                                                    <h5 class="card-title">Category Slug : <span style="font-weight:
                                                         lighter">{{$item->category_slug}}</span></h5>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="" class="" data-bs-toggle="modal"
                                       data-bs-target="#exampleFullScreenModal-{{$item->category_id}}"><i class='bx
                                       bxs-edit'></i></a>

                                    <div class="modal fade" id="exampleFullScreenModal-{{$item->category_id}}"
                                         tabindex="-1"
                                         aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form class="category_form" action="{{route
                                                            ('category-update')
                                                            }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input name="category_id" value="{{$item->category_id}}"
                                                                       hidden />
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Category Name</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input name="category_name" type="text"
                                                                               class="form-control"
                                                                               value="{{$item->category_name}}"
                                                                               required autofocus/>
                                                                        <small style="color: #e20000" class="error"
                                                                               id="category_name-error"></small>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Category Image</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <input name="category_image"
                                                                               id="category_image"
                                                                               class="form-control" type="file" >
                                                                        <small style="color: #e20000" class="error"
                                                                               id="category_image-error"></small>
                                                                        <div>
                                                                            <img class="card-img-top" src="{{url
                                                                        ('uploads/images/category/' .
                                                                        $item->category_image)}}"
                                                                                 style="max-width: 250px; margin-top: 20px" id="show_image">
                                                                        </div>

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
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="" class="ms-3" data-bs-toggle="modal"
                                       data-bs-target="#exampleDangerModal-{{$item->category_id}}">

                                        <i class='bx bxs-trash'></i>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleDangerModal-{{$item->category_id}}"
                                             tabindex="-1"
                                             style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white">Sure ?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        <button onclick="window.location.replace
                                                        ('remove_category/{{$item->category_id}}');"
                                                                class="btn btn-dark">Confirm</button>
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
    <link href="{{asset('backend_assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend_assets')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#data_table').DataTable( {
                lengthChange: true,
                buttons: [ 'excel', 'pdf', 'print']
            } );

            table.buttons().container()
                .appendTo( '#data_table_wrapper .col-md-6:eq(0)' );
        } );
    </script>

    <script src="sweetalert2.all.min.js"></script>



    @section('AjaxScript')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.category_form').on('submit', function(event){
                    event.preventDefault();
                    // remove errors if the conditions are true
                    $('.category_form *').filter(':input.is-invalid').each(function(){
                        this.classList.remove('is-invalid');
                    });
                    $('.category_form *').filter('.error').each(function(){
                        this.innerHTML = '';
                    });
                    $.ajax({
                        url: "{{route('category-update')}}",
                        method: 'POST',
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success : function(response)
                        {
                            // remove errors if the conditions are true
                            $('.category_form *').filter(':input.is-invalid').each(function(){
                                this.classList.remove('is-invalid');
                            });
                            $('.category_form *').filter('.error').each(function(){
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
                        error: function(response) {
                            var res = $.parseJSON(response.responseText);
                            $.each(res.errors, function (key, err){
                                $('#' + key + '-error').text(err[0]);
                                $('#' + key ).addClass('is-invalid');
                            });
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#mark-as-read').click(function() {
                    $('.alert-count').remove();

                    $.ajax({
                        url: "{{route('read-all-notifications')}}",
                        method: 'GET',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success : function(response)
                        {
                        },
                        error: function(response) {
                        }
                    });
                });
            });
        </script>

    @endsection

    @section('js')
        <script type="text/javascript">
            $(document).ready(function(){
                $('#category_image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#show_image').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection
@endsection
