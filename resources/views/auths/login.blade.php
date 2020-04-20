<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('sistem/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('sistem/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('sistem/assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('sistem/assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('sistem/assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="{{asset('sistem/assets/css/Source-Sans.css')}}" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('sistem/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('sistem/assets/img/favicon.png')}}">
</head>

<body>

    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center">
                                    <h1>HMIF</h1>
                                </div>
                                <p class="lead">Login to your account</p>
                            </div>
                            <form class="form-auth-small" action="/postlogin" method="POST">
                                <div class="form-group">
                                    {{csrf_field()}}
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input name="email" type="email" class="form-control" id="signin-email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input name="password" type="password" class="form-control" id="signin-password"
                                        placeholder="Password">
                                </div>
                                @if(session('false'))
                                <div class="alert alert-danger" role="alert">
                                    Email/Password Salah !
                                </div>
                                @endif
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Aplikasi SPK Kenaikan Kader HMIF</h1>
                            <p>by HMIF Amikom</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>
<script src="{{asset('sistem/assets/scripts/sweetalert.min.js')}}"></script>

</html>