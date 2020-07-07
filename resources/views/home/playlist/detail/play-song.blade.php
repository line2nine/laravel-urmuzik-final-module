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
                            <div class="row">
                                <a href="#" class="btn btn-success" title="Next"><i
                                        class="fa fa-angle-double-right"></i></a>
                                &emsp;
                                <p><i class="fa fa-headphones"></i> {{$song->view}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table">
                <tbody>
                @forelse($listSong as $item)
                    <tr>
                        <td><img src="{{asset('storage/'.$item->song->image)}}" style="width: 70px;"></td>
                        <td>{{$item->song->name}}</td>
                        <td>
                            <a href="{{ route('playlist.play',['playlist_id'=>$playlist->id, 'song_id'=>$item->song->id]) }}"
                               title="play"><i
                                    class="fa fa-play-circle"></i></a> &emsp;
                            <a href="{{ route('music.play',['id'=>$item->song->id]) }}" target="_blank"
                               title="open new window"><i class="fa fa-plus-square-o"></i></a>
                            &emsp;
                            <a href="{{route('playlist.delete-song', ['playlist_id' => $playlist->id, 'song_id' => $item->song->id])}}"
                               title="">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>No data</tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>

@endsection
