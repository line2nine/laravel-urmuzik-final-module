@extends('home.master')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Song</h2>
        </div>
    </section>
    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">

            <table class="table">
                <tbody>
                @forelse($songs as $song)
                    <tr>
                        <td><img src="{{asset('storage/'.$song->image)}}" style="width: 70px;"></td>
                        <td>{{$song->name}}</td>
                        <td>
                            <a href="{{ route('music.play',['id'=>$song->id]) }}" title="play"><i class="fa fa-play-circle"></i></a> &emsp;
                            <a href="{{ route('music.play',['id'=>$song->id]) }}" target="_blank" title="open new window"><i class="fa fa-plus-square-o"></i></a>
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
