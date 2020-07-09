@extends('home.master')
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>User Profile</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Register Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content" style="font-size: 20px">
                        @if($user->google_id)
                            <img src="{{$user->avatar}}" alt="user-avatar" class="avatar-1">
                        @else
                            <img src="{{asset('storage/' . $user->avatar)}}" alt="user-avatar" class="avatar-1">
                        @endif
                        <br>
                        <br>
                        <!-- Login Form -->
                        <div class="form-group">
                            <label>Name</label>
                            <br>
                            <span style="color: blue">{{$user->name}}</span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Email</label>
                            <br>
                            <span style="color: blue">{{$user->email}}</span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Phone</label>
                            <br>
                            <span style="color: blue">{{$user->phone}}</span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Address</label>
                            <br>
                            <span style="color: blue">{{$user->address}}</span>
                        </div>
                        <hr>
                        <a href="{{route('user.edit.profile', $user->id)}}" class="btn oneMusic-btn mt-30">Edit</a>
                        <a href="{{route('index')}}" class="btn oneMusic-btnCustom mt-30">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Register Area End ##### -->
@endsection
