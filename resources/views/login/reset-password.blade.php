<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Reset Password | Gst software</title>
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
                                    <h3>Reset Password</h3>
                                </div>
                            </div>

                            <form action="{{route('processResetPassword')}}" method="post">
                              @csrf
                              <input type="hidden" name="token" id="token" value="{{$StrToken}}">
                                <div class="form-group mb-3">
                                    <label for="new_password">New Password</label>
                                    <input class="form-control @error('new_password') is-invalid @enderror" value="{{old('new_password')}}" name="new_password" type="password" id="new_password" 
                                        placeholder="Enter New Password">
                                        @error('new_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="confirm_password">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="confirm_password" id="confirm_password" value="{{old('confirm_password')}}"  class="form-control @error('confirm_password') is-invalid @enderror"
                                            placeholder="Enter your password">
                                            
                                    </div>
                                    @error('confirm_password')
                                            <span class="text-danger">{{$message}}</span>
                                             @enderror
                                  
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <a href="javascript:void(0);"><button class="btn btn-primary btn-block font-weight-bold"
                                            type="submit">
                                            Update Password </button></a>
                                </div>

                            </form>


                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
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