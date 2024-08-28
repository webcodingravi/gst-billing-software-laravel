<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Create Invoice</title>
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
    <link href="{{asset('assets/css2/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css2/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet"
        disabled />
    <link href="{{asset('assets/css2/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled />

    <!-- icons -->
    <link href="{{asset('assets/css2/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

</head>

<body data-layout-mode="detached"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <!-- start page title -->
        <div class="content-page m-0 p-0">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title font-weight-bold text-uppercase"> Create Invoice </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('vendor-invoice.store')}}" class="needs-validation pb-2" method="post">
                                        @csrf
                                        <h6 class="text-right"><b>Date : </b><Span>{{\Carbon\Carbon::now()->format('d M, Y')}}</Span></h6>
                                        <h4 class="page-title "><i data-feather="edit-3"
                                                class="pr-0 mr-1 text-uppercase"></i>Enter Your
                                            Details</h4>
                                        <hr>
                                        <div class="row my-3">
                                            <div class="form-group col-md-4">
                                                <label for="">Name</label>
                                                <input name="full_name" value="{{old('full_name')}}" type="text" class="form-control border-bottom @error('full_name') is-invalid @enderror"
                                                    id="validationCustom01" placeholder="Enter Name">
                                                    @error('full_name')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                        
                                                    @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Phone No.</label>
                                                <input type="text" value="{{old('phone_no')}}" name="phone_no" class="form-control border-bottom @error('phone_no') is-invalid @enderror"
                                                    id="validationCustom01" placeholder="Phone/Mobile no.">
                                                    @error('phone_no')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                        
                                                    @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Invoice No.</label>
                                                <input name="invoice_no" value="{{old('invoice_no')}}" type="text" class="form-control border-bottom @error('invoice_no') is-invalid @enderror"
                                                    id="validationCustom02" placeholder="Invoice No.">

                                                    @error('phone_no')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                        
                                                    @enderror
                                            </div>
                                        
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-md-8">
                                                <label for="">Address</label>
                                                <input name="address" value="{{old('address')}}" type="text" class="form-control border-bottom @error('address') is-invalid @enderror"
                                                    id="validationCustom02" placeholder="Destination/Address"
                                                >
                                                @error('address')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                        
                                                    @enderror

                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Invoice Date</label>
                                                <input name="invoice_date" value="{{old('invoice_date')}}" type="date" class="form-control border-bottom @error('invoice_date') is-invalid @enderror"
                                                    id="validationCustom02" placeholder="Invoice Date">
                                                    @error('invoice_date')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                        
                                                    @enderror
                                            </div>

                                          

                                            
                                        </div>
                                        <h4 class="page-title pt-2"><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER
                                            YOUR BANK
                                            DETAIL</h4>
                                        <hr>
                                        <div class="row my-3">
                                            <div class="form-group col-md-4">
                                                <label for="">Account Holder Name</label>
                                                <input name="account_holder_name" value="{{old('account_holder_name')}}" type="text" class="form-control border-bottom @error('account_holder_name') is-invalid @enderror"
                                                    id="validationCustom01" placeholder="Enter Account Holder Name"
                                                >

                                                @error('account_holder_name')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                    
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Account Number</label>
                                                <input name="account_no" value="{{old('account_no')}}" type="text" class="form-control border-bottom @error('account_no') is-invalid @enderror"
                                                    id="validationCustom01" placeholder="Enter Account Number"
                                                >

                                                @error('account_no')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                    
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Bank Name</label>
                                                <input name="bank_name" value="{{old('bank_name')}}" type="text" class="form-control border-bottom @error('bank_name') is-invalid @enderror"
                                                    id="validationCustom02" placeholder="Enter Bank Name">

                                                    @error('bank_name')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                        
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="">IFSC Code</label>
                                                <input name="ifsc_code"  value="{{old('ifsc_code')}}" type="text" class="form-control border-bottom @error('ifsc_code') is-invalid @enderror"
                                                    id="validationCustom01" placeholder="IFSC Code">

                                                    @error('ifsc_code')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                        
                                                    @enderror

                                            </div>
                                            <div class="form-group col-md-9">
                                                <label for="">Bank Address</label>
                                                <input name="branch_address" value="{{old('branch_address')}}" type="text" class="form-control border-bottom @error('branch_address') is-invalid @enderror"
                                                    id="validationCustom01" placeholder="Destination/Address"
                                                >
                                                @error('account_no')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                    
                                                @enderror

                                            </div>
                                        </div>
                                        <h4 class="page-title "><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER
                                            PRODUCT/ITEM DETAIL
                                        </h4>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-8 border p-1">
                                                <span>DESCRIPTIONS</span>
                                            </div>
                                            <div class="col-md-4 border p-1">
                                                TOTAL AMOUNT
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-8 border p-2">
                                                <input value="{{old('item_description')}}" class="form-control @error('item_description') is-invalid @enderror" name="item_description" />
                                                @error('item_description')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                    
                                                @enderror
                                            </div>
                                            <div class="col-md-4 border p-2">
                                                <input name="total_amount" value="{{old('total_amount')}}" class="form-control @error('total_amount') is-invalid @enderror" type="text" id="totalInput"
                                                    oninput="calculateTotalAmount()">
                                                    @error('total_amount')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                        
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mt-0">
                                            <div class="col-md-12">
                                                <ul style="list-style: none;float: right;">
                                                    <li>
                                                        <b>Total Amount:</b> ₹ <span type="text"
                                                            id="totalDisplay">0</span>
                                                    </li>
                                           
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                                <div class="row mt-3 px-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="declaration" class="form-control border-bottom"
                                                id="validationCustom05" placeholder="Declaration">
                                        </div>

                                        <a href="printGST_bill.html">
                                            <button type="submit" class="btn btn-success float-right mb-2">SUBMIT <i
                                                    data-feather="arrow-right" class="ml-1 fw-bold"></i></button>
                                        </a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- End Form  -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{asset('assets/js2/vendor.min.js')}}"></script>

    <!-- Plugins js-->
    <script src="{{asset('assets/libs2/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/libs2/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{asset('assets/js2/pages/dashboard-1.init.js')}}"></script>

    <!-- App js-->
    <script src="{{asset('assets/js2/app.min.js')}}"></script>

    <!-- Script JS File -->

    <script src="{{asset('js/1.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
  

    <script>
      setTimeout(() => {
     $("#alert-box").fadeOut('slow');
     }, 3000);
   
     
     </script>

</body>

</html>