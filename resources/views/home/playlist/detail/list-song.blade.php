@extends('home.master')
@section('content')

    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>{{$playlist->title}}</h2>
            <p>{{$playlist->user->name}}</p>
            @if(\Illuminate\Support\Facades\Auth::user())
                @if(\Illuminate\Support\Facades\Auth::user()->id === $playlist->user->id)
                    <a href="{{route('playlist.add-song', ['playlist_id' => $playlist->id])}}"
                       title="add songs playlist"><i class="fa fa-plus-square-o"></i></a>
                    &emsp;
                    <a data-toggle="modal" data-target="#editPlaylist"
                       title="edit name playlist"><i class="fa fa-edit"></i></a>
                    &emsp;
                    <a href="{{route('my-playlist.delete', ['playlist_id' => $playlist->id])}}"
                       title="delete playlist" onclick="return confirm('Do you want to delete the playlist?')"><i
                            class="fa fa-trash"></i></a>
                @endif
            @endif
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif
        </div>
    </section>

    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="one-music-songs-area mb-70">
                <div class="container">
                    <div class="row">
                        <table class="table">
                            <tbody>
                            @forelse($listSong as $item)
                                <tr>
                                    <td><img src="{{asset('storage/'.$item->song->image)}}"
                                             style="width: 70px; height: 70px"></td>
                                    <td>{{$item->song->name}}</td>
                                    <td class="text-right">
                                        <a href="{{ route('playlist.play',['playlist_id'=> $playlist->id, 'song_id' => $item->song->id]) }}"
                                           title="play"><i
                                                class="fa fa-play-circle"></i></a> &emsp;
                                        <a href="{{ route('playlist.play',['playlist_id'=> $playlist->id, 'song_id' => $item->song->id]) }}"
                                           target="_blank"
                                           title="open new window"><i class="fa fa-external-link"></i></a>
                                        &emsp;
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            @if(\Illuminate\Support\Facades\Auth::user()->id === $playlist->user->id)
                                                <a href="{{route('playlist.delete-song', ['playlist_id' => $playlist->id, 'song_id' => $item->song->id])}}"
                                                   title="delete song"
                                                   onclick="return confirm('Do you want to delete the song?')"><i
                                                        class="fa fa-trash"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>No data</tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<@include('home.playlist.edit')
