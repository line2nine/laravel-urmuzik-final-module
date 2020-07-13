<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="/"><img src="{{asset('img/core-img/logo.png')}}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="/">Home</a></li>
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <li><a>Playlists</a>
                                        <ul class="dropdown">
                                            <li><a href="{{route('playlist.index')}}">Playlists</a></li>
                                            <li><a href="{{route('my-playlist')}}">My Playlists</a></li>
                                            <li><a data-toggle="modal" data-target="#newPlaylist"
                                                   style="cursor: pointer">New Playlist</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{route('playlist.index')}}">Playlist</a></li>
                                @endif

                                <li><a href="{{route('artist.index')}}">Artist</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                                <li><a href="{{route('music.index')}}"><i class="fa fa-music"></i> Song</a></li>
                                <li><a href="{{route('music.upload')}}"><i class="fa fa-arrow-circle-up"></i> Upload</a>
                                </li>
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login -->
                                <div class="login-register-btn mr-50">
                                    <div class="classynav">
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            <ul>
                                                <li><a href="#" id="loginBtn"><img src="
                                                        @if(!auth()->user()->google_id)
                                                            {{asset('storage/' . auth()->user()->avatar)}}
                                                        @else
                                                        {{auth()->user()->avatar}}
                                                        @endif
                                                            " class="rounded-circle" alt="Cinque Terre" width="40px">
                                                    </a>
                                                    <ul class="dropdown">
                                                        @if(auth()->user()->role == \App\Http\Controllers\Role::ADMIN)
                                                            <li>
                                                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="{{route('user.profile', auth()->user()->id)}}">Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('user.changePass.profile', auth()->user()->id)}}">Change
                                                                    Password</a>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <a href="{{ route('music.list.user',['id'=>auth()->user()->id]) }}">List
                                                                Songs</a></li>
                                                        <li>
                                                            <a href="{{route('my-playlist')}}">My Playlists</a>
                                                        </li>
                                                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i>
                                                                Logout</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                    </div>
                                    @else
                                        <a href="{{route('login')}}" id="loginBtn">Login</a>
                                        &nbsp
                                        <a href="#" id="loginBtn">|</a>
                                        &nbsp
                                        <a href="{{route('register')}}" id="loginBtn">Register</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
@include('home.playlist.add')
