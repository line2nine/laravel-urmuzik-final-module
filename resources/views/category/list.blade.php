@extends('admin.dashboard')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>Categories List</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $key => $category)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$category->name}}</td>
                        <td class="table-action">
                            <a href="{{route('category.detail', $category->id)}}"><i class="align-middle"
                                                                                     data-feather="info"></i></a>
                            <a href="{{route('category.edit', $category->id)}}"><i class="align-middle"
                                                                                   data-feather="edit-2"></i></a>
                            <a href="{{route('category.delete', $category->id)}}"><i class="align-middle"
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
