@php
    use Illuminate\Support\Facades\Auth;$role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Add new product')
@section('plugins')
    <link href="{{asset('backend_assets')}}/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
    <link href="{{asset('backend_assets')}}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
@endsection
@section('content')

    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                    <li class="breadcrumb-item active" aria-current="page">Add new product</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add New Product</h5>
            <hr/>
            <form action="{{route('vendor-product-create')}}" method="POST" id="product_form" enctype="multipart/form-data">
                @csrf
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name/Title</label>
                                    <input name="product_name" type="text" class="form-control" id="inputProductTitle"
                                           placeholder="Enter product title" required>
                                    <small style="color: #e20000" class="error" id="product_name-error"></small>

                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Code</label>
                                    <input name="product_code" type="text" class="form-control" id="inputProductTitle"
                                           placeholder="Enter product code" required>
                                    <small style="color: #e20000" class="error" id="product_code-error"></small>

                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Short Description</label>
                                    <textarea name="product_short_description" class="form-control"
                                              id="inputProductDescription"
                                              rows="3" required></textarea>
                                    <small style="color: #e20000" class="error"
                                           id="product_short_description-error"></small>

                                </div>
                                <div class="mb-3">
                                    <label for="inputProductLongDescription" class="form-label">Detailed Description</label>
                                    <textarea id="mytextarea"
                                              name="product_long_description"> </textarea>
                                    <small style="color: #e20000" class="error"
                                           id="product_long_description-error"></small>

                                </div>

                                <div class="mb-3">
                                    <label for="inputProductQuantity" class="form-label">Product Quantity</label>
                                    <input name="product_quantity" type="number" min="0" class="form-control"
                                           id="inputProductQuantity" required>
                                    <small style="color: #e20000" class="error" id="product_quantity-error"></small>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Tags</label>
                                    <input name="product_tags" type="text" class="form-control
                                visually-hidden" data-role="tagsinput" >
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Colors</label>
                                    <input name="product_colors" type="text" class="form-control
                                visually-hidden" data-role="tagsinput" >
                                </div>

                                <div class="row mb-3">
                                    <label class="form-label">Product Thumbnail</label>
                                    <div class="col-sm-12 text-secondary">
                                        <input name="product_thumbnail" id="product_thumbnail" class="form-control"
                                               type="file" required>
                                        <small style="color: #e20000" class="error" id="product_thumbnail-error"></small>

                                        <div>
                                            <img class="card-img-top"
                                                 style="max-width: 250px; margin-top: 20px" id="show_image">
                                        </div>
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <label  class="form-label">Product Images</label>
                                    <input name="product_images[]" class="form-control" type="file"
                                           id="multi_image"
                                           multiple="">
                                    <div class="row" id="preview_img" style="padding: 20px"></div>
                                    <small style="color: #e20000" class="error" id="product_images-error"></small>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="inputPrice" class="form-label">Price</label>
                                        <input name="product_price" type="text" class="form-control" id="inputPrice"
                                               placeholder="00.00">
                                        <small style="color: #e20000" class="error" id="product_price-error"></small>

                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductType" class="form-label">Product Brand</label>
                                        <select name="brand_id" class="form-select" id="inputProductType">
                                            <option>Choose a brand</option>
                                            @foreach($brands as $item)
                                                <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                            @endforeach
                                        </select>
                                        <small style="color: #e20000" class="error" id="brand_id-error"></small>

                                    </div>
                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label">Product Category</label>
                                        <select class="form-select" id="inputVendor" name="sub_category_id">
                                            <option>Choose a category</option>

                                            @foreach($subCategories as $item)

                                                <option
                                                    value="{{$item->sub_category_id}}">{{$item->sub_category_name}}</option>
                                            @endforeach
                                        </select>
                                        <small style="color: #e20000" class="error" id="sub_category_id-error"></small>

                                    </div>
                                    <div class="form-check">
                                        <input name="product_status" class="form-check-input" type="checkbox"
                                               id="gridCheck" checked>
                                        <label class="form-check-label" for="gridCheck">Available</label>
                                    </div>
                                    <div class="form-check">
                                        <input name="hot_deal" class="form-check-input" type="checkbox"
                                               id="gridCheck2">
                                        <label class="form-check-label" for="gridCheck2">Hot Deal</label>
                                    </div>
                                    <div class="form-check">
                                        <input name="featured_product" class="form-check-input" type="checkbox"
                                               id="gridCheck3">
                                        <label class="form-check-label" for="gridCheck3">Featured Product</label>
                                    </div>
                                    <div class="form-check">
                                        <input name="special_offer" class="form-check-input" type="checkbox"
                                               id="gridCheck4">
                                        <label class="form-check-label" for="gridCheck4">Special Offer</label>
                                    </div>
                                    <div class="form-check">
                                        <input name="special_deal" class="form-check-input" type="checkbox"
                                               id="gridCheck5">
                                        <label class="form-check-label" for="gridCheck5">Special Deal</label>
                                    </div>

                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Save Product" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection


@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#product_form').on('submit', function(event){
                event.preventDefault();
                // remove errors if the conditions are true
                $('#product_form *').filter(':input.is-invalid').each(function(){
                    this.classList.remove('is-invalid');
                });
                $('#product_form *').filter('.error').each(function(){
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('vendor-product-create')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        // remove errors if the conditions are true
                        $('#product_form *').filter(':input.is-invalid').each(function(){
                            this.classList.remove('is-invalid');
                        });
                        $('#product_form *').filter('.error').each(function(){
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
    </script>
@endsection


@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#product_thumbnail').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_image').attr('src',e.target.result);
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
    <script src="{{asset('backend_assets')}}/plugins/input-tags/js/tagsinput.js"></script>

    <script>

        $(document).ready(function(){
            $('#multi_image').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(130)
                                        .height(120); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
@endsection
