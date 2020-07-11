@extends('home.master')
@section('login')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay loginurm-area"
             style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input name="username" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @if($errors->first('username'))
                                        <span class="text-danger"><sub>*{{$errors->first('username')}}</sub></span>
                                    @else
                                        <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                                    @if($errors->first('password'))
                                        <span class="text-danger"><sub>*{{$errors->first('password')}}</sub></span>
                                    @endif
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Login</button>
                            </form>
                            <br>
                            <p style="font-weight: bold">OR</p>
                            <a href="{{route('auth.google')}}" class="btn oneMusic-btn btn-icon">
                                <span class="btn-inner--icon">Continue via <img src="{{asset('img/icons/google.svg')}}"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->
@endsection
