@extends('home.master')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Singer Songs</h2><br>

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
                        <td>{{ $song->name }}</td>
                        <td class="text-right">
                            <a href="{{ route('artist.play',['artist_id'=>$artist->id, 'song_id'=>$song->id]) }}" title="play"><i
                                    class="fa fa-play-circle"></i></a> &emsp;
                            <a href="#" target="_blank"
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
