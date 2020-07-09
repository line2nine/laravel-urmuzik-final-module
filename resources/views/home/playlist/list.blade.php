@extends('home.master')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>All Playlists</h2><br>
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
            <div class="row oneMusic-albums">
                <!-- Playlist -->
                @forelse($playlists as $key => $playlist)
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <div class="single-album">
                            <a href="{{route('playlist.detail', ['playlist_id' => $playlist->id])}}">
                                <img src="{{asset('storage/'. $playlist->image)}}" alt="">
                                <div class="album-info">
                                    <h5>{{$playlist->title}}</h5>
                                    <p>Owner: {{$playlist->user->name}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <tr>No data</tr>
                @endforelse
            </div>
        </div>
    </section>
@endsection
