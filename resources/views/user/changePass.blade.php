@extends('admin.dashboard')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Change Password</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('user.changePass', $user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputPassword4">Current Password</label>
                        <input name="oldPass" type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">New Password</label>
                        <input name="newPass" type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">Confirm Password</label>
                        <input name="confirmPass" type="password" class="form-control" id="inputPassword4">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
