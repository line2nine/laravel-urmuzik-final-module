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

    <!-- ##### Edit Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        @if($user->google_id)
                            <img src="{{$user->avatar}}" alt="user-avatar" class="avatar-1">
                        @else
                            <img src="{{asset('storage/' . $user->avatar)}}" alt="user-avatar" class="avatar-1">
                        @endif
                        <br><br>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{route('user.edit.profile', $user->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input name="image" type="file">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input name="email" type="email" class="form-control" value="{{$user->email}}" id="exampleInputEmail1"
                                           aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" type="number" class="form-control" value="{{$user->phone}}">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" class="form-control" value="{{$user->address}}">
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
