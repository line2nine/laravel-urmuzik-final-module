@extends('home.master')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>Add song to your playlist</h2>
            <p></p>
            <p>Owner: {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
        </div>
    </section>
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <form method="post" action="{{route('songAddToPlaylists.store', ['song_id' => $song_id])}}">
                @csrf
                <div class="row oneMusic-albums">
                    <!-- Playlist -->
                    @forelse($playlists as $key => $playlist)
                        <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                            <div class="single-album">
                                <img src="{{asset('storage/'. $playlist->image)}}" alt=""
                                     style="width: 190px; height: 220px">
                                <div class="album-info">
                                    <h5>{{$playlist->title}}</h5>
                                    &emsp;
                                    <p class="text-center"><input class="form-check-input" type="checkbox" value="{{$playlist->id}}"
                                              name="playlist[{{$playlist->id}}]"></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>No data</tr>
                    @endforelse

                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        &emsp;
                        <a href="{{route('music.index')}}"
                           class="btn btn-light">Cancel</a>
                    </div>
                </div>
                <br><br>
            </form>
        </div>
    </section>
@endsection

