@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
    $status = Auth::user()->status;
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('backend_assets')}}/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">User</li>
        <li>
            <a href="{{route( $role . '-profile')}}" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Profile</div>
            </a>
        </li>
        <li>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <a href="{{route('logout')}}" aria-expanded="false" onclick="event.preventDefault(); this.closest
                ('form').submit();">
                    <div class="parent-icon"><i class="bx bx-log-out-circle"></i>
                    </div>
                    <div class="menu-title">Logout</div>
                </a>
            </form>

        </li>
        <li class="menu-label"></li>
        @if($role === 'admin')
            <li>
                <a  href="{{route('admin-vendor-list')}}" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-world'></i>
                    </div>
                    <div class="menu-title">Vendors</div>
                </a>

            </li>
        @endif

        @if($status)
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-checkmark-circle'></i>
                    </div>
                    <div class="menu-title">Brands</div>
                </a>
                <ul>
                    <li> <a href="{{route('brand')}}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                    </li>
                    <li> <a href="{{route('brand-add')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
                    </li>
                </ul>

            </li>
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-folder'></i>
                    </div>
                    <div class="menu-title">Categories</div>
                </a>
                <ul>
                    <li> <a href="{{route('category')}}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                    </li>
                    <li> <a href="{{route('category-add')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-dinner'></i>
                    </div>
                    <div class="menu-title">Sub Categories</div>
                </a>
                <ul>
                    <li> <a href="{{route('sub-category')}}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                    </li>
                    <li> <a href="{{route('sub-category-add')}}"><i class="bx bx-right-arrow-alt"></i>Add Sub
                            Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-graph'></i>
                    </div>
                    <div class="menu-title">Products</div>
                </a>
                <ul>
                    <li> <a href="{{route($role . '-product')}}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                    </li>
                    <li> <a href="{{route('vendor-product-add')}}"><i class="bx bx-right-arrow-alt"></i>Add
                            Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" style="cursor: pointer">
                    <div class="parent-icon"><i class='lni lni-wallet'></i>
                    </div>
                    <div class="menu-title">Coupons</div>
                </a>
                <ul>
                    <li> <a href="{{route($role . '-coupon')}}"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                    </li>
                    <li> <a href="{{route('vendor-coupon-add')}}"><i class="bx bx-right-arrow-alt"></i>Add
                            Coupon</a>
                    </li>
                </ul>
            </li>
        @endif

    </ul>
    <!--end navigation-->
</div>
