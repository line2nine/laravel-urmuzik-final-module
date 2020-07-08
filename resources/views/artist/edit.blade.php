@extends('admin.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Create New Artist</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('artist.edit', $artist->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" value="{{$artist->name}}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{route('artist.list')}}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
