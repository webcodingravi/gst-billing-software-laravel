<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Gst software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <!-- Plugins css -->
    <!-- <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- App css -->
    <link href="{{asset('assets/css2/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="assets/css2/app-creative.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css2/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet"
        disabled />
    <link href="{{asset('assets/css2/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled />

    <!-- icons -->
    <link href="{{asset('assets/css2/icons.min.css')}}" rel="stylesheet" type="text/css" />


</head>

<body class="authentication-bg">

    <div class="account-pages mt-5 mb-2">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="col-md-12">
                                    @include('alertMessage.alertMessage')
                                 </div>
                                <div class="auth-logo">
                                    <h3>GST Billing Software</h3>
                                </div>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                            </div>

                            <form action="{{route('authenticate')}}" method="post">
                              @csrf
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" type="email" id="emailaddress" 
                                        placeholder="Enter your email">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" id="password" value="{{old('password')}}"  class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Enter your password">
                                          
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div>

                                

                                <div class="form-group mb-0 text-center">
                                    <a href="javascript:void(0);"><button class="btn btn-primary btn-block font-weight-bold"
                                            type="submit">
                                            Log In </button></a>
                                </div>

                            </form>


                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="{{route('forgotPassword')}}" class="text-white-50 ml-1">Forgot your password?</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt text-white-50">

    </footer>

    <!-- Vendor js -->
    <script src="{{asset('assets/js2/vendor.min.js')}}"></script>

    <!-- App js-->
    <script src="{{asset('assets/js2/app.min.js')}}"></script>
    <script>
        setTimeout(() => {
       $("#alert-box").fadeOut('slow');
       }, 3000);
     
       
       </script>

</body>

</html>