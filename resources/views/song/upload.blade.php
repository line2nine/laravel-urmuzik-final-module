@extends('home.master')
@section('content')
    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                            </p>
                    @endif
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{ route('music.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Song</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                           placeholder="name song">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">File <i><span
                                                style="color: red">(.mp3)</span></i></label>
                                    <input type="file" name="type" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category</label>
                                    <select class="form-control" name="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Artist</label>
                                    <select class="form-control" name="artists">
                                        @foreach($artists as $artist)
                                            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control" rows="4" name="desc"></textarea>
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">New</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->
@endsection
