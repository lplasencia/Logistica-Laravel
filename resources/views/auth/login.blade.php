<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="Plantilla/images/favicon.png">
    <title>Iniciar Sesión</title>
    <!-- Custom CSS -->

    <link href="Plantilla/css/style.css" rel="stylesheet">
</head>

<body class="header-fix fix-sidebar">

    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>{{ __('Iniciar Sesión') }}</h4>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('Usuario') }}</label>
                                        <input id="email" type="email" class="form-control @error('username') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Contraseña') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">{{ __('Iniciar Sesión') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- All Jquery -->
    <script src="Plantilla/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="Plantilla/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="Plantilla/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="Plantilla/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="Plantilla/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="Plantilla/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="Plantilla/js/custom.min.js"></script>

</body>

</html>
