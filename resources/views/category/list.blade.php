@extends('admin.dashboard')
@section('content')
    <form class="form-inline d-none d-sm-inline-block mb-2" method="get" action="{{route('category.search')}}">
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
        @if($categories->count() >= 2)
            <p class="text-primary">Found {{$categories->count()}} results matched with "{{request('keyword')}}"</p>
        @else
            <p class="text-primary">Found {{$categories->count()}} result matched with "{{request('keyword')}}"</p>
        @endif
    @endif
    <div class="form-group">
        <a href="{{route('category.create')}}" class="btn btn-success">Create New</a>
    </div>
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
                            <a href="{{route('category.edit', $category->id)}}"><i class="align-middle"
                                                                                   data-feather="edit-2"></i></a>
                            <a onclick="return confirm('Are You Sure?')" href="{{route('category.delete', $category->id)}}"><i class="align-middle"
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
