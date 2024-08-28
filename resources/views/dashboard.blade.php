@extends('layouts.app')
@section('content')

  <!-- Start Content-->
  <div class="container-fluid">
    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title font-weight-bold">DASHBOARD</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->

    
    <div class="row">
      <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-right">
                <h3 class="mt-1">
                  ₹<span data-plugin="counterup">{{number_format($revenueLastThirtyDays,2)}}</span>
                </h3>
                <p class="text-muted mb-1 text-truncate">
                  Last 30 Days Revenue
                </p>
              </div>
            </div>


            
          </div>
          <!-- end row-->
        </div>
        <!-- end widget-rounded-circle-->
      </div>
      <!-- end col-->



      <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                <i class="fe-pie-chart font-22 avatar-title text-primary"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-right">
                <h3 class="text-dark mt-1">
                  ₹<span data-plugin="counterup">{{number_format($TaxAmountLastThirtyDays,2)}}</span>
                </h3>
               
                <p class="text-muted mb-1 text-truncate">
                  Last 30 Days Total Tax 
                </p>
              </div>
            </div>
          </div>
          <!-- end row-->
        </div>
        <!-- end widget-rounded-circle-->
      </div>
      <!-- end col-->
      <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                <i class="fe-users font-22 avatar-title text-info"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-right">
                <h3 class="text-dark mt-1">
                  <span data-plugin="counterup">{{$totalClient}}</span>
                </h3>
                <p class="text-muted mb-1 text-truncate">Total Client</p>
              </div>
            </div>
          </div>
          <!-- end row-->
        </div>
        <!-- end widget-rounded-circle-->
      </div>
      <!-- end col-->

      <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                <i class="fe-users font-22 avatar-title text-warning"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-right">
                <h3 class="text-dark mt-1">
                  <span data-plugin="counterup">{{$totalVendor}}</span>
                </h3>
                <p class="text-muted mb-1 text-truncate">
                  Total Vendor
                </p>
              </div>
            </div>
          </div>
          <!-- end row-->
        </div>
        <!-- end widget-rounded-circle-->
      </div>
      <!-- end col-->


      
      <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                <i class="fe-bar-chart font-22 avatar-title text-info"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-right">
                <h3 class="mt-1">
                  ₹<span data-plugin="counterup">{{number_format($totalRevenue,2)}}</span>
                </h3>
                <p class="text-muted mb-1 text-truncate">
                  Total Revenue
                </p>
              </div>
            </div>


            
          </div>
          <!-- end row-->
        </div>
        <!-- end widget-rounded-circle-->
      </div>


      <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card-box">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                <i class="fe-bar-chart-2 font-22 avatar-title text-success"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-right">
                <h3 class="text-dark mt-1">
                  ₹<span data-plugin="counterup">{{number_format($TaxAmount,2)}}</span>
                </h3>
               
                <p class="text-muted mb-1 text-truncate">
                  Total Tax 
                </p>
              </div>
            </div>
          </div>
          <!-- end row-->
        </div>
        <!-- end widget-rounded-circle-->
      </div>
      <!-- end col-->
    </div>
  </div>

  
@endsection