<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('PageTitle')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend_assets')}}/imgs/theme/favicon.svg" />
    @include('frontend.includes.css')
</head>

<body>
<!-- Modal -->

<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend_assets')}}/imgs/shop/product-16-2.jpg" alt="product
                                    image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend_assets')}}/imgs/shop/product-16-1.jpg" alt="product
                                    image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend_assets')}}/imgs/shop/product-16-3.jpg" alt="product
                                    image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend_assets')}}/imgs/shop/product-16-4.jpg" alt="product
                                    image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend_assets')}}/imgs/shop/product-16-5.jpg" alt="product
                                    image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend_assets')}}/imgs/shop/product-16-6.jpg" alt="product
                                    image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend_assets')}}/imgs/shop/product-16-7.jpg" alt="product
                                    image" />
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="{{asset('frontend_assets')}}/imgs/shop/thumbnail-3.jpg" alt="product
                                image"
                                    /></div>
                                <div><img src="{{asset('frontend_assets')}}/imgs/shop/thumbnail-4.jpg" alt="product
                                image"
                                    /></div>
                                <div><img src="{{asset('frontend_assets')}}/imgs/shop/thumbnail-5.jpg" alt="product
                                image"
                                    /></div>
                                <div><img src="{{asset('frontend_assets')}}/imgs/shop/thumbnail-6.jpg" alt="product
                                image"
                                    /></div>
                                <div><img src="{{asset('frontend_assets')}}/imgs/shop/thumbnail-7.jpg" alt="product
                                image"
                                    /></div>
                                <div><img src="{{asset('frontend_assets')}}/imgs/shop/thumbnail-8.jpg" alt="product
                                image"
                                    /></div>
                                <div><img src="{{asset('frontend_assets')}}/imgs/shop/thumbnail-9.jpg" alt="product
                                image"
                                    /></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                            <span class="old-price font-md ml-15">$52</span>
                                        </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.includes.header')


<main class="main">
    @yield('content')

</main>







    @include('frontend.includes.footer')
    @include('frontend.includes.js')
</body>

</html>
