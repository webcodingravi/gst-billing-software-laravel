@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col">
      <div class="page-title-box">
          <h2 class="page-title font-weight-bold text-uppercase">Manage Vendor Bills</h2>
      </div>
  </div>

</div>
<!-- end page title -->
<div class="row">
  <div class="col-12">
      <div class="card-box">
          <a href="{{route('vendor-invoice.create')}}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
              <i class="mdi mdi-plus-circle"></i> Create Vendor Bill
          </a>
          <h4 class="header-title mb-4 text-uppercase">Manage Vendor Bills</h4>
          <div class="row">
            <div class="col-md-12">
                @include('alertMessage.alertMessage')
              </div>
              <div class="col-sm-12 col-md-10">
              
              </div>
              <div class="col-sm-12 col-md-2">
                  <div id="alternative-page-datatable_filter" class="dataTables_filter">
                    <form action="" method="get" name="searchForm" id="searchForm">
                      <label>Search:
                        <input type="search" id="keyword" name="keyword" value="{{Request::get('keyword')}}" class="form-control form-control-sm"
                       placeholder="Search.." aria-controls="alternative-page-datatable"></label>
                    </form>
                  </div>
              </div>
          </div>
          <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
              id="tickets-table">
              <thead class="bg-dark text-white">
                  <tr>
                      <th>
                          S.No.
                      </th>
                      <th>Bill No</th>
                      <th>Client's Info</th>
                      <th>Billing Info</th>
                      <th>Date</th>
                      <th class="hidden-sm">Action</th>
                  </tr>
              </thead>

              <tbody>
                @if ($vendor_bills->isNotEmpty())
                @foreach ($vendor_bills as $index => $vendorBill)
                <tr>
                    <td><b>{{$index+1}}</b></td>
                    <td>
                        #{{$vendorBill->invoice_no}}
                    </td>

                    <td>
                        <ul class="list-unstyled">
                        <li><b>Name :</b><span> {{$vendorBill->party->full_name}}</span></li>
                        <li><b>Phone :</b><span> {{$vendorBill->party->phone_no}}</span></li>
                        </ul>

                       
                    </td>

                    <td>
                        <ul class="list-unstyled">
                            <li><b>Total Amount :</b><span> ₹{{number_format($vendorBill->total_amount,2)}}</span></li>
                        </ul>
                    </td>

                    <td>
                        {{\Carbon\Carbon::parse($vendorBill->invoice_date)->format('d M, Y')}}
                    </td>
                    <td>
                        <div class="btn-group dropdown">
                            <a href="javascript: void(0);"
                                class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                data-toggle="dropdown" aria-expanded="false"><i
                                    class="mdi mdi-dots-horizontal"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('vendor-invoice.show',$vendorBill->id)}}"><i
                                    class="mdi mdi-alert-octagon-outline mr-2 text-muted font-18 vertical-middle"></i>Show Invoice</a>

        
                               
                            </div>
                        </div>
                    </td>
                </tr>   
                @endforeach

                @else
                <tr><td colspan="6">No Record Found</td></tr>


                
                    
                @endif
                  
              </tbody>
          </table>
      </div><!-- end col -->

      <div class="col-12">
        {{-- pagination --}}
      {{$vendor_bills->links('pagination::bootstrap-5')}}
 
    </div>
  </div>
</div>
<!-- end row -->

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">

          <div class="modal-body p-1">
              <div class="row">
                  <div class="col-12">
                      <div class="card-box m-0">
                          <div class="row">
                              <div class="col-6">
                                  <p class="m-1"><b>Date : </b>01/09/2023</p>
                              </div>
                              <div class="col-6">
                                  <p class="m-1 float-right"><b>Bill No. : </b>#01</p>
                              </div>
                          </div>
                          <div class="border-top"></div>
                          <div class="row pt-1">
                              <div class="col-6">
                                  <p class="m-1"><b>Customer Name : </b>John Doe</p>
                              </div>
                              <div class="col-6">
                                  <p class="m-1 float-right"><b>Phone No. : </b>9865320159</p>
                              </div>
                          </div>
                          <!-- <div class="border-bottom"></div> -->

                          <!-- Logo & title -->

                          <div class="row">
                              <div class="col-12 p-0">
                                  <div class="table-responsive table-bordered">
                                      <table class="table mt-0 table-centered border">
                                          <thead>
                                              <tr>

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

                                                  <td>
                                                      <b>Web Design</b> <br />
                                                      2 Pages static website - my website
                                                  </td>
                                                  <td class="text-center">$660.00</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div> <!-- end table-responsive -->
                              </div> <!-- end col -->
                          </div>
                          <!-- end row -->

                          <div class="row border">
                              <div class="col-sm-12 col-lg-12 mt-1">
                                  <ul class="list-unstyled float-right">
                                      <li><b>Total Amount :</b> <span class="float-right"><i
                                                  class="fas fa-rupee-sign ml-2"></i> 0.00</span></li>

                                      <li><b>TAX :</b><span class="float-right"><i
                                                  class="fas fa-rupee-sign"></i> 0.00</span>
                                      </li>
                                      <li><b>Net Amount :</b><span class="float-right"><i
                                                  class="fas fa-rupee-sign"></i> 0.00</span>
                                      </li>
                                  </ul>
                                  <div class="clearfix"></div>
                              </div> <!-- end col -->
                          </div>
                          <!-- end row -->

                      </div> <!-- end card-box -->
                  </div> <!-- end col -->
              </div>
          </div>
          <div class="modal-footer">
              <a href="printGST_bill.html" class="btn btn-primary waves-effect waves-light">Print
                  <i class="mdi mdi-printer mr-1"></i></a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div> --}}
  
@endsection

@section('customJs')
<script>

$("#searchForm").submit(function(e) {
    e.preventDefault();

    var url = '{{route("vendor-invoice.index")}}?';

    var keyword = $("#keyword").val();
 

    // If keyword has a value

    if(keyword != '') {
      url += 'keyword='+keyword;
    }

    window.location.href=url;
  });

  $("#keyword").change(function() {
    $("#searchForm").submit();
  });



      // delete data
   function deleteVendorBill(id) {
    url = '{{route("vendor-invoice.destroy","ID")}}';
    newUrl = url.replace("ID",id);
    if(confirm("Are you sure you want to delete?")) {
    $.ajax({
        url : newUrl,
        type: 'delete',
        data: {
          "_token" : "{{csrf_token()}}"
        },
        dataType: 'json',
        success:function(response) {
          window.location.href="{{route('vendor-invoice.index')}}";
        }
    });
  }
  }
</script>
    
@endsection