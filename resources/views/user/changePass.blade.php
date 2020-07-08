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
                        <label>Current Password</label>
                        <input name="oldPass" type="password" class="form-control">
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <span class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input name="newPass" type="password" class="form-control">
                        @if($errors->first('newPass'))
                            <span class="text-danger">{{$errors->first('newPass')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input name="confirmPass" type="password" class="form-control">
                        @if($errors->first('confirmPass'))
                            <span class="text-danger">{{$errors->first('confirmPass')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
