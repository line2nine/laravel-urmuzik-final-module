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
            <div class="one-music-songs-area mb-70">
                <div class="container">
                    <form method="post" action="{{route('playlist.store-song', ['playlist_id' => $playlist->id])}}">
                        @csrf
                        @forelse($songs as $key => $song)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$song->id}}" name="song[{{$song->id}}]">
                                <label class="form-check-label" for="defaultCheck1">
                                        <span><img src="{{asset('storage/'.$song->image)}}" style="width: 70px;">
                                        </span>
                                    <span>{{$song->name}}</span>
                                </label>
                            </div>
                        @empty
                            <p>No data</p>
                        @endforelse

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

