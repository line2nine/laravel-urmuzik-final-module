@extends('home.master')
@section('playlist')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <a><p>See what’s new</p></a>
            <h2>Artists</h2>
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
                            <a href="#">
                                <a href="{{ route('artist.song',['id'=>$artist->id]) }}"><img src="{{asset('img/bg-img/a'.random_int(1,12).'.jpg')}}" alt=""></a>
                                <div class="album-info">
                                    <a href="{{ route('artist.song',['id'=>$artist->id]) }}"><h5>{{ $artist->name }}</h5></a>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
