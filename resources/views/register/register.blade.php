@extends('home.master')
@section('register')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Register</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Register Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Sign Up</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label><span style="color: red"><sup>*</sup></span>
                                    <input name="name" type="text" class="form-control">
                                    @if($errors->first('name'))
                                        <span class="text-danger"><sub>*{{$errors->first('name')}}</sub></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label><span style="color: red"><sup>*</sup></span>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp">
                                    @if($errors->first('email'))
                                        <span class="text-danger"><sub>*{{$errors->first('email')}}</sub></span>
                                    @else
                                        <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll
                                            never share your email with anyone else.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label><span style="color: red"><sup>*</sup></span>
                                    <input name="password" type="password" class="form-control"
                                           id="exampleInputPassword1">
                                    @if($errors->first('password'))
                                        <span class="text-danger"><sub>*{{$errors->first('password')}}</sub></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label><span style="color: red"><sup>*</sup></span>
                                    <input name="confirmPass" type="password" class="form-control"
                                           id="exampleInputPassword1">
                                    @if($errors->first('confirmPass'))
                                        <span class="text-danger"><sub>*{{$errors->first('confirmPass')}}</sub></span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Avatar</label>
                                    <input name="image" type="file" class="form-control">
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Register Area End ##### -->
@endsection
