@extends('home.master')
@section('content')
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed"
             style="background-image: url( {{ asset('img/bg-img/bg-4.jpg') }} );">
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
                            </audio>
                            <br>
{{--                            <div class="btn-group btn-group-toggle" data-toggle="buttons">--}}
{{--                                <label class="btn btn-secondary">--}}
{{--                                    <a href="{{ route('music.next') }}" title="Next"> <i class="fa fa-angle-double-right"></i></a>--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-secondary active">--}}
{{--                                    <input type="radio" name="options" id="option1" checked> Download--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-secondary">--}}
{{--                                    <input type="radio" name="options" id="option2"> Share--}}
{{--                                </label>--}}
{{--                                <label class="btn btn-secondary">--}}
{{--                                    <input type="radio" name="options" id="option3"> Add--}}
{{--                                </label>--}}
{{--                            </div>--}}
                            <a href="{{route('music.play',['id'=>$nextSong])}}" class="btn btn-success" title="Next"><i class="fa fa-angle-double-right"></i></a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
