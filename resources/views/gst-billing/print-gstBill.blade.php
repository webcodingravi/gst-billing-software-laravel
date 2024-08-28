@extends('layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Invoice</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">
          <div class="col-12">
              <div class="card-box">
                  <!-- Logo & title -->
                  <div class="clearfix ">
                      <div class="text-center">
                          <h1>{{$company_details->company_name}}</h1>
                      </div>
                      <div class="text-center">
                          <span>{{$company_details->address}}</span><br>
                          <span><b>Email:</b> {{$company_details->email}} | <b>Web:</b> {{$company_details->website}} | <b>Mob:</b>
                            {{$company_details->mobile_no}}</span>
                      </div>
                      <div class="row pt-3 pb-3">
                          <div class="col-12 text-center">
                              <span>
                                  <b>GSTIN NO:</b> {{$company_details->gst_no}}</span>
                          </div>
                      </div>
                  </div>
                  <!-- end row -->
                  <div class="row">
                      <div class="col-12 text-center border">
                          <b>
                              <h3 class="m-1">GST INVOICE </h3>
                          </b>
                      </div>
                  </div>
                  <div class="row text-center ">
                      <div class="col-md-6 border p-0">
                          <b>
                              <div class="border-bottom">
                                  <h5>Details of the Client |
                                      Billed to</h5>
                              </div>
                          </b>
                          <div class="row pl-2 pt-1">
                              <div class="col-12 d-flex justiy-content-start">
                                  <label for="">Name : {{$gst_bills->party->full_name}}</label>
                                  {{-- <input type="text" value="" style="border: none; line-height: -10;"> --}}
                              </div>
                          </div>

                          <div class="row pl-2">
                            <div class="col-12 d-flex justiy-content-start">
                                <label for="">Phone : {{$gst_bills->party->phone_no}}</label>
                                <span></span>
                            </div>
                        </div>

                          <div class="row pl-2">
                              <div class="col-12 d-flex justiy-content-start">
                                  <label for="">Address : {{$gst_bills->party->address}}</label>
                                  <span></span>
                              </div>
                          </div>
                       
                          {{-- <div class="row pl-2 pb-1">
                              <div class="col-9 d-flex justiy-content-start">
                                  <label for="">State : </label>
                                  <span></span>
                              </div>
                              <div class="col-3 d-flex px-1">
                                  <label for="">State Code | <span><b></b></span> </label>
                              </div>
                          </div> --}}
                      </div>
                      <div class="col-md-6 border p-0">
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
                                  <label for="">Invoice No : #{{$gst_bills->invoice_no}}</label>
                                  <span></span>
                              </div>
                          </div>
                          <div class="row pl-2">
                              <div class="col-12 d-flex justiy-content-start">
                                  <label for="">Invoice Date : {{\Carbon\Carbon::parse($gst_bills->invoice_date)->format('d M,Y')}}</label>
                                  <span></span>
                              </div>
                          </div>
                          {{-- <div class="row pl-2 pb-1">
                              <div class="col-9 d-flex justiy-content-start">
                                  <label for="">State : </label>
                                  <span></span>
                              </div>
                              <div class="col-3 d-flex px-1">
                                  <label for="">State Code | <span><b>08</b></span> </label>
                              </div>
                          </div> --}}
                      </div>
                  </div>
                  <!-- end row -->

                  <div class="row">
                      <div class="col-12 p-0">
                          <div class="table-responsive table-bordered">
                              <table class="table mt-4 table-centered border">
                                  <thead>
                                      <tr>
                                          <th class="py-0"
                                              style="width: 8%; background-color: rgb(130, 210, 241); color: black;">
                                              SR NO.</th>
                                          <th class="py-0"
                                              style="background-color: rgb(130, 210, 241); color: black;">
                                              DESCRIPTION</th>
                                          <th style="width: 15%; background-color: rgb(130, 210, 241); color: black;"
                                              class="text-center py-1">
                                              AMOUNT
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>
                                             <p>{{$gst_bills->description}}</p>
                                          </td>
                                          <td class="text-center"><i class="fas fa-rupee-sign"></i> {{number_format($gst_bills->total_amount,2)}}</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div> <!-- end table-responsive -->
                      </div> <!-- end col -->
                  </div>
                  <!-- end row -->

                  <div class="row border">
                      <div class="col-sm-6 col-lg-9 p-0">
                          <div class="clearfix pt-2 pb-2 mt-1 mb-1 ml-1 text-center"
                              style="background-color: rgba(218, 218, 218, 0.37); border-radius: 5px;">
                              <h5><b>Bank Details</b></h5>
                              <p><b>{{$company_details->bank_name}}, ACCOUNT NO:</b> {{$company_details->account_no}} <b>IFSC:</b> {{$company_details->ifsc_code}}</p>
                          </div>
                      </div> <!-- end col -->
                      <div class="col-sm-6 col-lg-3 mt-1">
                          <ul class="list-unstyled">
                              <li><b>Total :</b> <span class="float-right"><i
                                          class="fas fa-rupee-sign"></i> {{number_format($gst_bills->total_amount,2)}}</span></li>
                              <li><b>CGST :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                {{number_format($gst_bills->cgst_amount,2)}}</span></li>
                              <li><b>SGST :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                {{number_format($gst_bills->sgst_amount,2)}}</span></li>
                              <li><b>IGST :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                {{number_format($gst_bills->igst_amount,2)}}</span></li>
                              <li><b>Total GST :</b><span class="float-right"><i
                                          class="fas fa-rupee-sign"></i> {{number_format($gst_bills->tax_amount,2)}}</span>
                              </li>
                              <li><b>Grand Total :</b><span class="float-right"><i
                                          class="fas fa-rupee-sign"></i> {{number_format($gst_bills->net_amount,2)}}</span>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div> <!-- end col -->
                  </div>
                  <!-- end row -->

                  <div class="mt-1 mb-1">
                    <strong>Note:- </strong>{{$gst_bills->declaration}}
                 </div>

                  <div class="mt-4 mb-1">
                      <div class="text-right">
                          <i class="mdi mdi-printer mr-0 font-18 vertical-middle"></i>
                          <select style="width: 40%; border: none; border-bottom: 1px solid lightgray;">
                              <option value="">All Copies</option>
                              <option value="">Orignal: Client Copy</option>
                              <option value="">Orignal: Office Copy</option>
                          </select>
                      </div>
                  </div>

                 

                  <div class="mt-4 mb-1">
                      <div class="text-right d-print-none">
                          <a href="javascript:window.print()"
                              class="btn btn-primary waves-effect waves-light">Print <i
                                  class="mdi mdi-printer mr-1"></i></a>
                          <a href="{{route('gst-billing.index')}}" class="btn btn-danger waves-effect waves-light">All
                              Bills <i class="fas fa-rupee-sign"></i></a>
                      </div>
                  </div>
              </div> <!-- end card-box -->
          </div> <!-- end col -->
      </div>
      <!-- end row -->

  </div> <!-- container -->

  
@endsection