@extends('home.master')
@section('content')
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed"
             style="background-image: url( {{ asset('img/bg-img/bg-4.jpg') }} );">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img src="{{ asset('storage/'.$song->image) }}" style="width: 350px; height: 460px" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <h2>{{$song->name}}</h2>
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
                            <div class="row">
                                <a href="{{route('music.play',['id'=>$nextSong])}}" class="pt-1 ml-3" title="Next"><i
                                        class="icon-next" style="color: white"></i></a>
                                &emsp;
                                @if($check == 0)
                                    <a href="{{ route('music.like',['id'=>$song->id]) }}" id="like" class="pt-1 like"
                                       style="color: white" title="Like"><i class="icon-like"></i> {{ $likes }}</a>
                                    &emsp;
                                @else
                                    <a href="{{ route('music.unlike',['id'=>$song->id]) }}" class="pt-1"
                                       style="color: white" title="Unlike"><i
                                            class="fa fa-thumbs-o-down"></i> {{ $likes }}  </a>
                                    &emsp;
                                @endif
                                <a href="#" class="pt-1"
                                   title="Download"><i class="icon-download" style="color: white"></i></a>
                                &emsp;
                                <p><i class="fa fa-headphones"></i> {{$song->view}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row" style="color: white">
                <div class="container">
                    <div class="row">
                        &emsp;&emsp;&emsp;
                        @include('comment.display-comment')
                        &emsp;&emsp;&emsp;
                    </div>
                    <div class="row">
                        &emsp;&emsp;&emsp;
                        @include('comment.comments')
                        &emsp;&emsp;&emsp;
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
