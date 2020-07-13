@extends('home.master')
@section('content')
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed"
             style="background-image: url( {{ asset('img/bg-img/bg-4.jpg') }} );">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img src="{{ asset('storage/'.$song->image) }}" style="width: 300px; height: 350px" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <h2>{{$song->name}}</h2>
                        </div>
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
                                <a href="{{ route('music.like',['id'=>$song->id]) }}" id="like" class="pt-1 like"
                                   style="color: white" title="Like">
                                    {{--                                    @if(\Illuminate\Support\Facades\Auth::user()->like()->where('song_id',$song->id)->first())--}}
                                    @if($check == 0 )
                                        <i class="status-like icon-like"></i>
                                    @else
                                        <i class="status-liked status-like icon-like"></i>
                                    @endif
                                    <span class="totalLike">{{$likes}}</span>
                                </a>

                                &emsp;
                                <p><i class="fa fa-headphones"></i> {{$song->view}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4">
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="accordions" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- single accordian area -->
                        <div class="panel single-accordion">
                            <h6>
                                <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapseTwo"
                                   data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">Lyrics
                                    <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                </a>
                            </h6>
                            <div id="collapseTwo" class="accordion-content collapse">
                                <pre>{{$song->desc}}</pre>
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
                        &emsp;&emsp;&emsp;
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
