@extends('admin.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Category</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('category.edit', $category->id)}}">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" value="{{$category->name}}">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{route('category.list')}}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
