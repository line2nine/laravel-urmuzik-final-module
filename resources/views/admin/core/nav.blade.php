<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('index')}}">
            <span class="align-middle">URMUZIK</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.dashboard')}}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#users" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">User</span>
                </a>
                <ul id="users" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('user.list')}}">List</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('user.create')}}">Create New</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#songs" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="music"></i> <span class="align-middle">Song</span>
                </a>
                <ul id="songs" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('song.dashboard.list')}}">List</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#categories" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Category</span>
                </a>
                <ul id="categories" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('category.list')}}">List</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('category.create')}}">Create New</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#artists" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="star"></i> <span class="align-middle">Artist</span>
                </a>
                <ul id="artists" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('artist.list')}}">List</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('artist.create')}}">Create New</a></li>
                </ul>
            </li>

            <li class="sidebar-header">
                Tools & Components
            </li>

            <li class="sidebar-item">
                <a href="#changePass" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
                <ul id="changePass" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('user.detail', auth()->user()->id)}}">User Profile</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('user.changePass', auth()->user()->id)}}">Change Password</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
