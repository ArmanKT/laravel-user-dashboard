<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="" />
    <!-- BEGIN: Page Title-->
    <title>Sign In | Modern & Minimal Multipurpose Bootstrap Admin Dashboard</title>
    <!-- END:  Page Title-->
    <!-- BEGIN: Custom CSS-->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- END: Custom CSS-->
    <!-- BEGIN: Favicon-->
    <link type="image/x-icon" rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- END: Favicon-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn"t work if you view the page via file: -->
    <!--[if lt IE 9]>
      <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <!--================================-->
    <!-- Page Content Start -->
    <!--================================-->
    <div class="ht-100v text-center">
        <div class="row no-gutters pd-0 mg-0">
            <div class="col-lg-4 bg-gray-100">

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="ht-100v d-flex align-items-center justify-content-center">
                        <div class="wd-300">
                            <h3 class="mg-b-5 tx-left">Sign In</h3>
                            <p class="tx-12 mg-b-30 tx-left">Welcome back! Please signin to continue.</p>
                            @if (\Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ \Session::get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            <div class="form-group tx-left">
                                <label class="mg-b-5">Email address</label>

                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="email"
                                    autofocus>
                                @error('email')
                                    <span class="invalid-feedback text-left" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between mg-b-5">
                                    <label class="mg-b-0">Password</label>
                                    <a href="aut-password.html" class="tx-15 mg-b-0">Forgot password?</a>
                                </div>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter your password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback text-left" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                       <label class="custom-control-label" for="remember"> {{ __('Remember Me') }}</label>
                                    </div>
                                 
                            </div>
                            <button type="submit"
                                class="btn btn-lg btn-outline-primary rounded-pill btn-block waves-effect">
                                {{ __('Sign In') }}
                            </button>

                            <div class="pd-y-20 tx-uppercase">or</div>

                            <div class="tx-15 mg-t-20 tx-center">Don't have an account? <a href="aut-signup.html"
                                    class="tx-dark">Create an Account</a></div>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8 bg-image hidden-sm">
        </div>
    </div>
    </div>
    <!--/ Page Content End -->
</body>

</html>
