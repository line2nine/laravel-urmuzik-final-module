<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

    <link rel="shortcut icon" href="{{asset('img/icons/icon-48x48.png')}}"/>

    <title>Settings | AdminKit Demo</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    @include('admin.core.nav')

    <div class="main">
        @include('admin.core.header')

        <main class="content">
            <div class="container-fluid p-0">

                <h1 class="h3 mb-3">Settings</h1>

                <div class="row">
                    <div class="col-md-3 col-xl-2">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0" style="color: #0f6674">Profile Settings</h5>
                            </div>

                            <div class="list-group list-group-flush" role="tablist">
                                <a class="list-group-item list-group-item-action active" data-toggle="list"
                                   href="#account" role="tab">
                                    Account
                                </a>
                                <a class="list-group-item list-group-item-action" data-toggle="list" href="#password"
                                   role="tab">
                                    Password
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-xl-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="account" role="tabpanel">

                                <div class="card">
                                    <div class="card-header">

                                        <h5 class="card-title mb-0">Public info</h5>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="inputUsername">Username</label>
                                                        <input type="text" class="form-control" id="inputUsername"
                                                               placeholder="Username">
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center">
                                                        <img alt="Charles Hall"
                                                             src="{{asset('img/avatars/avatar.jpg')}}"
                                                             class="rounded-circle img-responsive mt-2" width="128"
                                                             height="128"/>
                                                        <div class="mt-2">
                                                            <span class="btn btn-primary"><i class="fas fa-upload"></i>
                                                                Upload
                                                            </span>
                                                        </div>
                                                        <small>For best results, use an image at least 128px by 128px in
                                                            .jpg format</small>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">

                                        <h5 class="card-title mb-0">Private info</h5>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputFirstName">First name</label>
                                                    <input type="text" class="form-control" id="inputFirstName"
                                                           placeholder="First name">
                                                </div>

                                                <div class="form-group col-md-8">
                                                    <label for="inputEmail4">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail4"
                                                           placeholder="Email">
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="inputAddress">Address</label>
                                                    <input type="text" class="form-control" id="inputAddress"
                                                           placeholder="1234 Main St">
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="inputPhone">Phone</label>
                                                    <input type="number" class="form-control" id="inputPhone"
                                                           placeholder="1234 Main St">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>

                                        </form>

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="password" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Password</h5>

                                        <form>
                                            <div class="form-group">
                                                <label for="inputPasswordCurrent">Current password</label>
                                                <input type="password" class="form-control" id="inputPasswordCurrent">
                                                <small><a href="#">Forgot your password?</a></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPasswordNew">New password</label>
                                                <input type="password" class="form-control" id="inputPasswordNew">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPasswordNew2">Verify password</label>
                                                <input type="password" class="form-control" id="inputPasswordNew2">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        @include('admin.core.footer')
    </div>
</div>

<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

</body>

</html>
