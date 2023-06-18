@php use App\MyHelpers;use Illuminate\Support\Facades\Auth; @endphp

@php
    $authData = Auth::user();
    $notificationCount = $authData->unreadNotifications()->count();

@endphp
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span
                        class="position-absolute top-50 search-show translate-middle-y"><i
                            class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i
                            class='bx bx-x'></i></span>
                </div>
            </div>
            <div id="notification-button" class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li   class="nav-item dropdown dropdown-large">
                        <a  id="2" class="nav-link dropdown-toggle dropdown-toggle-nocaret
                        position-relative" href="#"
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li style="margin-bottom: 30px" class="nav-item dropdown dropdown-large">
                        <a id="1" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"

                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if($notificationCount > 0)
                                <span id="notification-alert-count" class="alert-count">
                                {{ $notificationCount  }}
                                </span>
                            @endif


                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>

                                    <p id="mark-as-read" class="msg-header-clear ms-auto" >Marks all as
                                        read</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @forelse($authData->notifications as $notification)
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i
                                                    class="bx {{$notification->data['icon']}}"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">{{ $notification->data['title']  }}<span
                                                        class="msg-time
                                                float-end">{{MyHelpers::getDiffOfDate($notification->created_at)
                                                }}</span></h6>
                                                <p class="msg-info">{{$notification->data['message']}}</p>
                                            </div>
                                        </div>
                                    </a>

                                @empty
                                @endforelse
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">

                        <div class="dropdown-menu dropdown-menu-end" hidden>

                            <div class="header-message-list">

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{!empty($authData->photo) ?
                                url('uploads/images/profile/' . $authData->photo) :
                                url('uploads/images/user_default_image.png' )
                                 }}"
                         class="user-img"
                         alt="user
                    avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{$authData->name}}</p>
                        <p class="designattion mb-0">{{$authData->role}}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="profile"><i class="bx bx-user"></i><span>Profile</span></a>
                    </li>

                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
                                               this.closest('form').submit();">
                                <i class='bx bx-log-out-circle'></i><span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>


@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#notification-button').click( function(e){
                console.log('clicked');

                $.ajax({
                    url: "{{route('read-all-notifications')}}",
                    method: 'GET',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        $('#notification-alert-count').remove();
                    },
                    error: function(response) {
                    }
                });
            });
        });
    </script>

@endsection
