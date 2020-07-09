@extends('home.master')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>Add song to your playlist</h2>
            <p></p>
            <p>Playlist: {{$playlist->title}}</p>
        </div>
    </section>
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="one-music-songs-area mb-70">
                <div class="container">
                    <form method="post" action="{{route('playlist.store-song', ['playlist_id' => $playlist->id])}}">
                        @csrf
                        @forelse($songs as $key => $song)
                            <div class="form-check">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{asset('storage/'.$song->image)}}"
                                                 style="width: 70px; height: 70px">
                                        </div>
                                        <div class="col-md-8">
                                            <label class="form-check-label" for="defaultCheck1">
                                                <span>{{$song->name}}</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-check-input" type="checkbox" value="{{$song->id}}"
                                                   name="song[{{$song->id}}]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @empty
                            <p>No data</p>
                        @endforelse
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            &emsp;
                            <a href="{{route('playlist.detail', ['playlist_id' => $playlist->id])}}"
                               class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

