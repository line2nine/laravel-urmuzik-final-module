@extends('home.master')
@section('content')

    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>{{$playlist->title}}</h2>
            <p></p>
            <p>{{$playlist->user->name}}</p>
        </div>
    </section>

    <section class="album-catagory section-padding-100-0">
        <div class="container">
            {{--            <a class="btn btn-success" href="{{route('playlist.add-song')}}">add song</a>--}}
            <div class="one-music-songs-area mb-70">
                <div class="container">
                    <div class="row">
                        <table class="table">
                            <tbody>
                            @forelse($listSong as $item)
                                <tr>
                                    <td><img src="{{asset('storage/'.$item->song->image)}}" style="width: 70px;"></td>
                                    <td>{{$item->song->name}}</td>
                                    <td>
                                        <a href="{{ route('music.play',['id'=>$item->song->id]) }}" title="play"><i
                                                class="fa fa-play-circle"></i></a> &emsp;
                                        <a href="{{ route('music.play',['id'=>$item->song->id]) }}" target="_blank"
                                           title="open new window"><i class="fa fa-plus-square-o"></i></a>
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
