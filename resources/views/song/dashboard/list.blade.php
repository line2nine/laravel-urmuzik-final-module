@extends('admin.dashboard')
@section('content')
    <form class="form-inline d-none d-sm-inline-block mb-2" method="get" action="{{route('song.dashboard.search')}}">
        @csrf
        <div class="input-group input-group-navbar">
            <input type="text" class="form-control" placeholder="Search…"
                   name="keyword" aria-label="Search"
                   value="{{request('keyword')?request('keyword'):''}}">
            <div class="input-group-append">
                <button class="btn" type="button">
                    <i class="align-middle" data-feather="search"></i>
                </button>
            </div>
        </div>
    </form>
    @if(request('keyword'))
        @if($songs->count() >= 2)
            <p class="text-primary">Found {{$songs->count()}} results matched with "{{request('keyword')}}"</p>
        @else
            <p class="text-primary">Found {{$songs->count()}} result matched with "{{request('keyword')}}"</p>
        @endif
    @endif
{{--    <div class="form-group">--}}
{{--        <a href="{{route('song.dashboard.create')}}" class="btn btn-success">Create New</a>--}}
{{--    </div>--}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>Songs List</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Category</th>
                    <th>Uploaded By</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($songs as $key => $song)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$song->name}}</td>
                        <td>{{$song->artist->name}}</td>
                        <td>{{$song->category->name}}</td>
                        <td>{{$song->user->name}}</td>
                        <td class="table-action">
{{--                            <a href="{{route('song.dashboard.detail', $song->id)}}"><i class="align-middle"--}}
{{--                                                                             data-feather="info"></i></a>--}}
{{--                            <a href="{{route('song.dashboard.edit', $song->id)}}"><i class="align-middle"--}}
{{--                                                                           data-feather="edit-2"></i></a>--}}
                                <a onclick="return confirm('Are You Sure?')" href="{{route('song.dashboard.delete', $song->id)}}"><i class="align-middle"
                                                                                 data-feather="trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No Data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
