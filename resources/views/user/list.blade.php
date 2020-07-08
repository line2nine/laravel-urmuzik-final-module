@extends('admin.dashboard')
@section('content')
    <form class="form-inline d-none d-sm-inline-block mb-2" method="get" action="{{route('user.search')}}">
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
        @if($users->count() >= 2)
            <p class="text-primary">Found {{$users->count()}} results matched with "{{request('keyword')}}"</p>
        @else
            <p class="text-primary">Found {{$users->count()}} result matched with "{{request('keyword')}}"</p>
        @endif
    @endif
    <div class="form-group">
        <a href="{{route('user.create')}}" class="btn btn-success">Create New</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1>Users List</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $key => $user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->role == \App\Http\Controllers\Role::ADMIN)
                                Admin
                            @else
                                Member
                            @endif
                        </td>
                        <td class="table-action">
                            <a href="{{route('user.detail', $user->id)}}"><i class="align-middle"
                                                                             data-feather="info"></i></a>
                            <a href="{{route('user.edit', $user->id)}}"><i class="align-middle"
                                                                           data-feather="edit-2"></i></a>
                            @if(auth()->user()->id !== $user->id)
                                <a onclick="return confirm('Are You Sure?')" href="{{route('user.delete', $user->id)}}"><i class="align-middle"
                                                                                 data-feather="trash"></i></a>
                            @endif
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
