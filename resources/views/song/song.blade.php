@extends('home.master')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>All Songs</h2><br>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('search.home') }}" method="get">
                            <div class="row">
                                <div class="col-md-6 col-lg-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="keyword"
                                               placeholder="Search by keyword">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <select class="form-control" name="select">
                                        <option value="song">Song</option>
                                        <option value="playlist">Playlist</option>
                                        <option value="artist">Artist</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-light">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">

            <table class="table">
                <tbody>
                @forelse($songs as $song)
                    <tr>
                        <td><img src="{{asset('storage/'.$song->image)}}" style="width: 70px; height: 70px"></td>
                        <td>{{$song->name}}</td>
                        <td class="text-right">
                            <a href="{{ route('songAddToPlaylists', ['song_id' => $song->id]) }}"
                               title="add to the my playlist"><i
                                    class="fa fa-eject"></i></a> &emsp;
                            <a href="{{ route('music.play', ['id' => $song->id]) }}" title="play"><i
                                    class="fa fa-play-circle"></i></a> &emsp;
                            <a href="{{ route('music.play', ['id' => $song->id]) }}" target="_blank"
                               title="open new window"><i class="fa fa-external-link"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>No data</tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
    <!-- ##### Album Catagory Area End ##### -->


@endsection
