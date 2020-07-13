@extends('home.master')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>All Artists</h2><br>
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
                @forelse($artists as $artist)
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <div class="single-album">
                                <a href="{{ route('artist.song',['id'=>$artist->id]) }}">
                                    <img src="{{asset('storage/' . $artist->image)}}" alt=""></a>
                                <div class="album-info">
                                    <a href="{{ route('artist.song',['id'=>$artist->id]) }}">
                                        <h5>{{ $artist->name }}</h5></a>
                                </div>
                        </div>
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
