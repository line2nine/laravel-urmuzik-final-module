<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
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
                <a href="#ui" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('user.list')}}">List</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('user.create')}}">Create New</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="music"></i> <span class="align-middle">Songs</span>
                </a>
                <ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">List</a></li>
                </ul>
            </li>

            <li class="sidebar-header">
                Tools & Components
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
