@extends('admin.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit User</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('user.edit', $user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" value="{{$user->name}}"
                               placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input name="avatar" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Email</label>
                        <input name="email" type="email" class="form-control" id="inputEmail4" value="{{$user->email}}"
                               placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" type="text" class="form-control" value="{{$user->address}}"
                               placeholder="Your Address">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" type="number" class="form-control" value="{{$user->phone}}"
                               placeholder="Your Phone Number">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Role</label>
                            <select id="inputState" class="form-control" name="role">
                                <option
                                    @if($user->role == \App\Http\Controllers\Role::ADMIN)
                                    selected
                                    @endif
                                    value="{{ \App\Http\Controllers\Role::ADMIN }}">Admin
                                </option>
                                <option
                                    @if($user->role == \App\Http\Controllers\Role::USER)
                                    selected
                                    @endif
                                    value="{{ \App\Http\Controllers\Role::ADMIN }}">Member
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                                <option
                                    @if($user->role == \App\Http\Controllers\Status::ACTIVE)
                                    selected
                                    @endif
                                    value="{{ \App\Http\Controllers\Status::ACTIVE }}">Active
                                </option>
                                <option
                                    @if($user->status == \App\Http\Controllers\Status::BANNED)
                                    selected
                                    @endif
                                    value="{{ \App\Http\Controllers\Status::BANNED }}">Banned
                                </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{route('user.list')}}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
