@extends('home.master')
@section('content')

    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <a data-toggle="modal" data-target="#exampleModal"><p>See what’s new</p></a>
            <h2>My playlist</h2>
        </div>
    </section>

    <section class="album-catagory section-padding-100-0">
        <div class="container">

            <div class="one-music-songs-area mb-70">
                <div class="container">
                    <div class="row">

                        <!-- Single Song Area -->
                        <div class="col-12">
                            <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                                <div class="song-thumbnail">
                                    <img src="img/bg-img/s1.jpg" alt="">
                                </div>
                                <div class="song-play-area">
                                    <div class="song-name">
                                        <p>01. Main Hit Song</p>
                                    </div>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Song Area -->
                        <div class="col-12">
                            <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                                <div class="song-thumbnail">
                                    <img src="img/bg-img/s2.jpg" alt="">
                                </div>
                                <div class="song-play-area">
                                    <div class="song-name">
                                        <p>01. Main Hit Song</p>
                                    </div>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Song Area -->
                        <div class="col-12">
                            <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                                <div class="song-thumbnail">
                                    <img src="img/bg-img/s3.jpg" alt="">
                                </div>
                                <div class="song-play-area">
                                    <div class="song-name">
                                        <p>01. Main Hit Song</p>
                                    </div>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Song Area -->
                        <div class="col-12">
                            <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                                <div class="song-thumbnail">
                                    <img src="img/bg-img/s4.jpg" alt="">
                                </div>
                                <div class="song-play-area">
                                    <div class="song-name">
                                        <p>01. Main Hit Song</p>
                                    </div>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
