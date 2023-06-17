@php use Illuminate\Support\Facades\Auth; @endphp
@if(Auth::user())
    @switch(Auth::user()->role)
        @case("vendor")
            @include('backend.profile.vendor_profile')
        @case("admin")
            @include('backend.profile.admin_profile')
    @endswitch

@else
    @include('auth.login')
@endif


