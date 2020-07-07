@extends('admin.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Create New User</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('user.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" id="inputName" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input name="avatar" type="file" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input name="password" type="password" class="form-control" id="inputPassword4"
                                   placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input name="address" type="text" class="form-control" id="inputAddress"
                               placeholder="Your Address">
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Phone</label>
                        <input name="phone" type="number" class="form-control" id="inputPhone"
                               placeholder="Your Phone Number">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Role</label>
                            <select id="inputState" class="form-control">
                                <option
                                    value="{{ \App\Http\Controllers\Role::ADMIN }}">Admin
                                </option>
                                <option
                                    value="{{ \App\Http\Controllers\Role::USER }}">Member
                                </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('user.list')}}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
