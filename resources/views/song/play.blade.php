@extends('home.master')
@section('content')
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url( {{ asset('img/bg-img/bg-4.jpg') }} );">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img src="{{ asset('storage/'.$song->image) }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                            <h2>Buy What’s New</h2>
                        </div>
                        <p>{{ $song->desc }}</p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>{{ $song->name }}</p>
                            </div>
                            <audio autoplay>
                                <source src="{{ asset('/storage/' . $song->type) }}" type="audio/ogg">
                                <source src="horse.mp3" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
