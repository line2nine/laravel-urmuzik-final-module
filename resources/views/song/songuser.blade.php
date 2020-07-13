@extends('home.master')
@section('content')
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>My Songs</h2>
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

            <table class="table user-song">
                <tbody>
                @forelse($songs as $song)
                    <tr id="user-song-{{$song->id}}">
                        <td><img src="{{asset('storage/'.$song->image)}}" style="width: 70px; height: 70px"></td>
                        <td>{{$song->name}}</td>
                        <td>
                            <a href="{{ route('music.play',['id'=>$song->id]) }}" title="Play"><i
                                    class="fa fa-play-circle"></i></a> &emsp;
                            <a href="{{ route('music.play',['id'=>$song->id]) }}" target="_blank"
                               title="Open new window"><i class="fa fa-external-link"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('music.edit',['id'=>$song->id]) }}" title="Edit"><i
                                    class="fa fa-edit"></i></a>
                            &emsp;&emsp;
                            <a href="{{ route('music.delete',['id'=>$song->id]) }}" title="Delete"
                               onclick="return confirm('Are you sure delete?')" class="delete-song" data-id="{{$song->id}}"><i class="fa fa-trash"></i></a>
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
