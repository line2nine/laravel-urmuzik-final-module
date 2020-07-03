@extends('admin.dashboard')
@section('content')
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
                            <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
                            <a href="{{route('user.delete', $user->id)}}"><i class="align-middle" data-feather="trash"></i></a>
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
