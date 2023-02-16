@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
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
        <li>
            <a class="has-arrow" style="cursor: pointer">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Brands</div>
            </a>
            <ul>
                <li> <a href="brands"><i class="bx bx-right-arrow-alt"></i>Show All</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
