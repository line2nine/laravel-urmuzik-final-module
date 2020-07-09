@extends('home.master')
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>Change Password</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Edit Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <img src="{{asset('storage/' . $user->avatar)}}" alt="user-avatar" class="avatar-1">
                        <br>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{route('user.changePass.profile', $user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input name="oldPass" type="password" class="form-control">
                                    @if(\Illuminate\Support\Facades\Session::has('error'))
                                        <span class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</span>
                                    @endif
                                    @if($errors->first('oldPass'))
                                        <span class="text-danger">{{$errors->first('oldPass')}}</span>
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
                                <button type="submit" class="btn oneMusic-btn mt-30">Update</button>
                                <a href="{{route('user.profile', $user->id)}}" class="btn oneMusic-btnCustom mt-30">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Edit Area End ##### -->
@endsection
