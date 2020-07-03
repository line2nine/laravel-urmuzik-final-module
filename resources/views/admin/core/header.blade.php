<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle d-flex">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                    <img src="{{asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                         class="avatar img-fluid rounded mr-1"/>
                    <span class="text-dark">{{strtoupper(auth()->user()->name)}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('user.detail', auth()->user()->id)}}"><i class="align-middle mr-1"
                                                                          data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="{{route('user.changePass', auth()->user()->id)}}"><i class="align-middle mr-1" data-feather="code"></i>
                        Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out mr-1"></i> Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
