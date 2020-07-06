@extends('admin.dashboard')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>Artists List</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($artists as $key => $artist)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img src="{{asset('storage/' . $artist->image)}}" alt="avt" class="avatar"></td>
                        <td>{{$artist->name}}</td>
                        <td class="table-action">
                            <a href="{{route('artist.detail', $artist->id)}}"><i class="align-middle"
                                                                                     data-feather="info"></i></a>
                            <a href="{{route('artist.edit', $artist->id)}}"><i class="align-middle"
                                                                                   data-feather="edit-2"></i></a>
                            <a href="{{route('artist.delete', $artist->id)}}"><i class="align-middle"
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
