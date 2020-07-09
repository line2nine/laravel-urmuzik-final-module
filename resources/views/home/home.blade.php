@extends('home.master')
@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{asset('img/bg-img/bg-1.jpg')}});"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span>
                                </h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover
                                    <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{asset('img/bg-img/bg-2.jpg')}});"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Colorlib Music
                                    <span>Colorlib Music</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover
                                    <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <h2>New Songs</h2>
                        </div>

                        <!-- Single Top Item -->
                        @foreach($songs as $key => $song)
                            <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp"
                                 data-wow-delay="100ms">
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail">
                                        <img src="{{asset('storage/' . $song->image)}}" style="width: 70px; height: 70px" alt="">
                                    </div>
                                    <div class="content-">
                                        <h6>{{$song->name}}</h6>
                                        <p>{{$song->artist->name}}</p>
                                    </div>
                                </div>
                                <a href="{{route('music.play', $song->id)}}" target="_blank"><i class="icon-play-button"></i></a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <h2>Top Trending</h2>
                        </div>

                        <!-- Single Top Item -->
                        @foreach($songsTrending as $key => $trending)
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp"
                             data-wow-delay="100ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="{{asset('storage/' . $trending->image)}}" style="width: 70px; height: 70px" alt="">
                                </div>
                                <div class="content-">
                                    <h6>{{$trending->name}}</h6>
                                    <p>{{$trending->artist->name}}</p>
                                </div>
                            </div>
                            <audio controls>
                                <source src="{{ asset('/storage/' . $trending->type) }}" type="audio/ogg">
                                <source src="horse.mp3" type="audio/mpeg">
                            </audio>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <h2>Top Playlists</h2>
                        </div>
                        <!-- Single Top Item -->
                        @foreach($trendingPlaylists as $playlist)
                            <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp"
                                 data-wow-delay="100ms">
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail">
                                        <img src="{{asset('storage/' . $playlist->image)}}" alt=""
                                             style="width: 70px; height: 70px; border-radius: 50%;">
                                    </div>
                                    <div class="content-">
                                        <a href="{{ route('playlist.detail',['playlist_id'=>$playlist->id]) }}"><h6>{{$playlist->title}}</h6></a>
                                        <p><i class="fa fa-headphones"></i> {{$playlist->view}}</p>
                                    </div>
                                </div>
                                <a href="{{ route('playlist.detail',['playlist_id'=>$playlist->id]) }}" target="_blank"><i class="icon-play-button"></i></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <h2>New Playlists</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        @foreach($recentPlaylists as $key => $playlist)
                        <div class="single-album">
                            <img src="{{asset('storage/' . $playlist->image)}}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>{{$playlist->title}}</h5>
                                </a>
                                <p>Creator: {{$playlist->user->name}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->
@endsection
