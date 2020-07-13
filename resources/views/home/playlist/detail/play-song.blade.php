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
                            <h2>{{$playlist->title}}</h2>
                            <p><i class="fa fa-headphones"></i> {{$playlist->view}}</p>
                        </div>
                        <p id="desc">{{ $song->desc }}</p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p id="name">{{ $song->name }}</p>
                            </div>
                            <audio autoplay onended="autoNext()" id="next">
                                <source id="autoNext" src="{{ asset('/storage/' . $song->type) }}" type="audio/ogg">
                                <source src="horse.mp3" type="audio/mpeg">
                            </audio>
                            <br>
                            <div class="row">
                                <a href="{{ route('playlist.play',['playlist_id' => $nextSong->playlist_id, 'song_id'=> $nextSong->song_id]) }}"
                                   class="pt-1 ml-3" title="Next"><i
                                        class="icon-next" style="color: white"></i></a>
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
                        <td><img src="{{asset('storage/'.$item->song->image)}}" style="width: 70px;height: 70px"></td>
                        <td style="color: white;">{{$item->song->name}}</td>
                        <td class="text-right">
                            <a href="{{ route('playlist.play',['playlist_id'=>$playlist->id, 'song_id'=>$item->song->id]) }}"
                               title="play"><i
                                    class="fa fa-play-circle" style="color: green;"></i></a> &emsp;
                            <a href="{{ route('playlist.play',['playlist_id'=>$playlist->id, 'song_id'=>$item->song->id]) }}"
                               target="_blank"
                               title="open new window"><i class="fa fa-external-link" style="color: white;"></i></a>
                            &emsp;@if(\Illuminate\Support\Facades\Auth::user()->id === $playlist->user->id)
                                <a href="{{route('playlist.delete-song', ['playlist_id' => $playlist->id, 'song_id' => $item->song->id])}}"
                                   title="delete song" onclick="return confirm('Do you want to delete the song?')">
                                    <i class="fa fa-trash" style="color: red;"></i>
                                </a>
                                @endif
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
        function autoNext() {
            let songs = '<?php echo $listSong ?>';
            let result = JSON.parse(songs);
            let song = '<?php echo $song ?>';
            let currentSong = JSON.parse(song);
            for (let i = 0; i < result.length; i++) {
                if (currentSong.id == result[i].song_id) {
                    let nextSong = result[i + 1];
                    console.log(nextSong);
                    document.getElementById('autoNext').src = "http://yourmusic.com/storage/" + nextSong.song['type'];
                    document.getElementById('image').src = "http://yourmusic.com/storage/" + nextSong.song['image'];
                    document.getElementById('desc').innerHTML = nextSong.song['desc'];
                    document.getElementById('name').innerHTML = nextSong.song['name'];
                    document.getElementById('view').innerHTML = '<i class="fa fa-headphones"></i> ' + nextSong.song['view'];
                    document.getElementById('next').load();
                    document.getElementById('next').play();
                    window.location.href = "http://yourmusic.com/playlist/" + nextSong.playlist_id + "/detail/" + nextSong.song_id + "/play";
                }
            }
        }
    </script>
@endsection
