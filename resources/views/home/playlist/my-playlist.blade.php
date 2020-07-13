@extends('home.master')
@section('playlist')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>My playlists</h2>
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif
        </div>
    </section>

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="row oneMusic-albums">
                <!-- Single Album -->
                @forelse($myPlaylists as $key => $playlist)
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <a href="{{route('playlist.detail', ['playlist_id' => $playlist->id])}}">
                            <div class="single-album">
                                <img src="{{asset('storage/'. $playlist->image)}}" alt="">
                                <div class="album-info">
                                    <h5>{{$playlist->title}}</h5>
                                </div>
                                <i class="fa fa-music"></i> <span style="color: blue">({{count($playlist->detailPlaylist)}})</span>
                                <br>
                                <i class="fa fa-headphones"></i> <span style="color: blue">{{$playlist->view}}</span>
                            </div>
                        </a>
                    </div>
                @empty
                    <tr>No data</tr>
                @endforelse
            </div>
        </div>
    </section>
@endsection
