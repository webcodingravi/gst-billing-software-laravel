<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="../assets/images/favicon.ico"> -->

    <!-- Plugins css -->
    <!-- <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet"
        disabled />
    <link href="{{asset('assets/css/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled />

    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

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

        <div class="content-page m-0 p-0">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h2 class="page-title font-weight-bold">Invoice</h2>
                            </div>
                        </div>
                    </div> -->
                    <!-- end page title -->

                    <div class="row mt-3">
                        <div class="col-12">
                          <div class="col-md-12">
                            @extends('alertMessage.alertMessage')
                          </div>
                            <div class="card-box">
                                <!-- Logo & title -->
                                <div class="clearfix ">
                                    <div class="text-right">
                                        <h6><b>Date : </b><Span>{{\Carbon\Carbon::parse($vendorInvoice->created_at)->format('d M, Y')}}</Span></h6>
                                        <!-- <h1>GoBulky</h1> -->
                                    </div>
                                    <!-- <div class="text-center">
                                        <span>Address: Mukta Prasad Road, Near Taxi Stand</span><br>
                                        <span>Bikaner-334001 (Raj.) India</span><br>
                                        <span><b>Email:</b> gobulky.com |<b>Web:</b> www.gobulky.com |<b>Mob:</b>
                                            +919694145570</span>
                                    </div>
                                    <div class="row pt-3 pb-1">
                                        <div class="col-6 text-right">
                                            <span class="text-right"><b>PAN NO:</b> BFAPA5321J</span>
                                        </div>
                                        <div class="col-6">
                                            <span>
                                                <b>GSTIN NO:</b> 08BFAPA5321J1ZV</span>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-12 text-center border">
                                        <b>
                                            <h3 class="m-1">INVOICE </h3>
                                        </b>
                                    </div>
                                </div>
                                <div class="row text-center ">
                                    <div class="col-md-4 border p-0">
                                        <b>
                                            <div class="border-bottom">
                                                <h5>Details of the Client |
                                                    Billed to</h5>
                                            </div>
                                        </b>
                                        <div class="row pl-2 pt-1">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Name : {{$vendorInvoice->party->full_name}}</label>
                                                <input type="text" style="border: none; line-height: -10;">
                                            </div>
                                        </div>
                                        <div class="row pl-2">
                                          <div class="col-12 d-flex justiy-content-start">
                                              <label for="">Phone : {{$vendorInvoice->party->phone_no}}</label>
                                              <span></span>
                                          </div>
                                      </div>

                                        <div class="row pl-2">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Address : {{$vendorInvoice->party->address}}</label>
                                                <span></span>
                                            </div>
                                        </div>
                                      
                                   
                                    </div>
                                    <div class="col-md-5 border p-0">
                                        <b>
                                            <div class="border-bottom">
                                                <h5>Bank Details</h5>
                                            </div>
                                        </b>
                                        <div class="row pl-2 pt-1">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Account Holder Name : {{$vendorInvoice->account_holder_name}}</label>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="row pl-2">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Account Number : {{$vendorInvoice->account_no}}</label>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="row pl-2">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Bank Name : {{$vendorInvoice->bank_name}}</label>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="row pl-2">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Bank Address : {{$vendorInvoice->branch_address}}</label>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="row pl-2 pb-1">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">IFSC Code : {{$vendorInvoice->ifsc_code}}</label>
                                                <span></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3 border p-0">
                                        <b>
                                            <div class="border-bottom">
                                                <h5>Invoice Details</h5>
                                            </div>
                                        </b>
                                        {{-- <div class="row pl-2 pt-1">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Revrce Charge : </label>
                                                <span></span>
                                            </div>
                                        </div> --}}
                                        <div class="row pl-2">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Invoice No : #{{$vendorInvoice->invoice_no}}</label>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="row pl-2">
                                            <div class="col-12 d-flex justiy-content-start">
                                                <label for="">Invoice Date : {{\Carbon\Carbon::parse($vendorInvoice->invoice_date)}}</label>
                                                <span></span>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="table-responsive table-bordered">
                                            <table class="table mt-4 table-centered border">
                                                <thead>
                                                    <tr>
                                                        <th class="py-0 heading-color w-8">
                                                            SR NO.</th>
                                                        <th class="py-0 heading-color">
                                                            DESCRIPTION</th>
                                                        <th class="text-center py-1 heading-color w-15">
                                                            AMOUNT
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                          <p>{{$vendorInvoice->item_description}}</p>
                                                        </td>
                                                        <td class="text-center"><i class="fas fa-rupee-sign"></i> {{number_format($vendorInvoice->total_amount,2)}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row border">
                                    <div class="col-sm-6 col-lg-9 p-0">
                                    </div> <!-- end col -->
                                    <div class="col-sm-6 col-lg-3 mt-1">
                                        <ul class="list-unstyled">
                                            <li><b>Total :</b> <span class="float-right"><i
                                                        class="fas fa-rupee-sign"></i>
                                                        {{number_format($vendorInvoice->total_amount,2)}}</span></li>
                                           
                                            
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="mt-1 mb-1">
                                 <strong>Note:- </strong>{{$vendorInvoice->declaration}}
                              </div>


                                <div class="mt-4 mb-1">
                                    <div class="text-right d-print-none">
                                        <a href="javascript:window.print()"
                                            class="btn btn-primary waves-effect waves-light">Print <i
                                                class="mdi mdi-printer mr-1"></i></a>
                                    </div>
                                </div>
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{asset('assets/js/pages/dashboard-1.init.js')}}"></script>

        <!-- App js-->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

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