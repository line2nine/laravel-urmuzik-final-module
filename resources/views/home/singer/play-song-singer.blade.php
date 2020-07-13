@extends('home.master')
@section('content')
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed"
             style="background-image: url( {{ asset('img/bg-img/bg-4.jpg') }} );">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img id="image" src="{{ asset('storage/'.$song->image) }}" style="width: 350px; height: 460px">
                    </div>
                </div>

                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <h2>{{$artist->name}}</h2>
                        </div>
                        <p id="desc">{{ $song->desc }}</p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p id="name">{{ $song->name }}</p>
                            </div>
                            <audio autoplay onended="auto()" id="next">
                                <source id="autoNext" src="{{ asset('/storage/' . $song->type) }}" type="audio/ogg">
                                <source src="horse.mp3" type="audio/mpeg">
                            </audio>
                            <br>
                            <div class="row">
                                <a href="{{ route('artist.play',['artist_id'=>$artist->id, 'song_id'=>$nextSong->id]) }}"
                                   class="pt-1 ml-3" title="Next"><i class="icon-next" style="color: white"></i></a>
                                &emsp;
                                <p id="view"><i class="fa fa-headphones"></i> {{$song->view}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table">
                <tbody style="color: white;">
                @forelse($listSong as $item)
                    <tr>
                        <td><img src="{{asset('storage/'.$item->image)}}" style="width: 70px;height: 70px"></td>
                        <td style="color: white;">{{$item->name}}</td>
                        <td class="text-right">
                            <a href="{{ route('artist.play',['artist_id'=>$artist->id, 'song_id'=>$item->id]) }}"
                               title="play"><i
                                    class="fa fa-play-circle" style="color: green;"></i></a> &emsp;
                            <a href="{{ route('artist.play',['artist_id'=>$artist->id, 'song_id'=>$item->id]) }}"
                               target="_blank"
                               title="open new window"><i class="fa fa-external-link" style="color: white;"></i></a>
                            &emsp;
                        </td>
                    </tr>
                @empty
                    <tr>No data</tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
    <script>
        function auto() {
            let songs = '<?php echo $listSong ?>';
            let result = JSON.parse(songs);
            let song = '<?php echo $song ?>';
            let currentSong = JSON.parse(song);
            console.log(currentSong.id)
            console.log(result[0].id);
            for (let i = 0; i < result.length; i++) {
                if (currentSong.id == result[i].id) {
                    let nextSong = result[i + 1];
                    console.log(nextSong);
                    document.getElementById('autoNext').src = "http://yourmusic.com/storage/" + nextSong.type;
                    document.getElementById('image').src = "http://yourmusic.com/storage/" + nextSong.image;
                    document.getElementById('desc').innerHTML = nextSong.desc;
                    document.getElementById('name').innerHTML = nextSong.name;
                    document.getElementById('view').innerHTML = '<i class="fa fa-headphones"></i> ' + nextSong.view;
                    document.getElementById('next').load();
                    document.getElementById('next').play();
                    window.location.href = "http://yourmusic.com/artists/" + nextSong.artist_id + "/songs/" + nextSong.id + "/play";
                }
            }
        }
    </script>
@endsection
