@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col">
      <div class="page-title-box">
          <h2 class="page-title font-weight-bold text-uppercase">Manage Parties</h2>
      </div>
  </div>

</div>
<!-- end page title -->
<div class="row">
  <div class="col-12">
      <div class="card-box">
          <a href="{{route('party.create')}}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
              <i class="mdi mdi-plus-circle"></i> Add Client
          </a>
          <h4 class="header-title mb-4 text-uppercase">Manage Parties</h4>
          <div class="row">
            <div class="col-md-12">
              @include('alertMessage.alertMessage')
            </div>
              <div class="col-sm-12 col-md-10">
                  {{-- <div class="dataTables_length" id="alternative-page-datatable_length"><label>Show
                          <select name="alternative-page-datatable_length"
                              aria-controls="alternative-page-datatable"
                              class="custom-select custom-select-sm form-control form-control-sm">
                              <option value="10">10</option>
                              <option value="25">25</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                          </select> entries</label></div> --}}
              </div>
              <div class="col-sm-12 col-md-2">
                  <div id="alternative-page-datatable_filter" class="dataTables_filter">
                    <form action="" method="get" id="searchForm" name="searchForm">
                      <label>Search:
                        <input type="search" name="keyword" value="{{Request::get('keyword')}}" id="keyword" class="form-control form-control-sm"
                        placeholder="Search.." aria-controls="alternative-page-datatable"></label>
                      </form>
                  </div>
              </div>
          </div>
          <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
              id="tickets-table">
              <thead class="bg-dark text-white">
                  <tr>
                      <th>S.No.</th>
                      <th>Client Type</th>
                      <th>Client Info</th>
                      <th>Bank Details</th>
                      <th>Created At</th>
                      <th class="hidden-sm">Action</th>
                  </tr>
              </thead>

              <tbody>
                @if ($parties->isNotEmpty())
                @foreach ($parties as $index => $party)
                <tr>
                  <td><b>{{$index+1}}</b></td>
                  <td>

                    @if ($party->party_type == 'client')
                    <span class="badge bg-info text-white text-uppercase">Client</span>
                    @elseif ($party->party_type == 'vendor')
                    <span class="badge bg-warning text-white text-uppercase">Vendor</span>
                      @else
                      <span class="badge bg-danger text-white text-uppercase">Employee</span>
                      
                      @endif
                  </td>

                  <td>
                      <ul class="list-unstyled">
                        <li><b>Name :</b><span>  {{$party->full_name}}</span></li>
                          <li><b>Phone :</b><span>  {{$party->phone_no}}</span></li>
                          <li><b>Address :</b> <span> {{$party->address}} </span></li>
                      </ul>
                  </td>

                 
                  <td>
                    <ul class="list-unstyled">
                      <li><b>Account Holder Name :</b><span>  {{$party->account_holder_name}}</span></li>
                        <li><b>Account No. :</b><span>  {{$party->phone_no}}</span></li>
                        <li><b>Bank Name :</b> <span>{{$party->bank_name}} </span></li>
                        <li><b>IFSC Code :</b> <span> {{$party->ifsc_code}} </span></li>
                        <li><b>Branch Address :</b> <span>{{$party->branch_address}} </span></li>
                    </ul>
                </td>

                 

                  <td>
                      {{\Carbon\Carbon::parse($party->created_at)->format("d M,Y")}}
                  </td>

                  <td>
                      <div class="btn-group dropdown">
                          <a href="javascript: void(0);"
                              class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                              data-toggle="dropdown" aria-expanded="false"><i
                                  class="mdi mdi-dots-horizontal"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{route('party.edit',$party->id)}}"><i
                                      class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                              <a class="dropdown-item" href="javascript:void(0);" onclick="deleteParty({{$party->id}})"><i
                                      class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
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
        {{$parties->links('pagination::bootstrap-5')}}
   
      </div>
  </div>

</div>
<!-- end row -->
  
@endsection


@section('customJs')
<script>
    $("#searchForm").submit(function(e) {
    e.preventDefault();

    var url = '{{route("party.index")}}?';

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
   function deleteParty(id) {
    url = '{{route("party.destroy","ID")}}';
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
          window.location.href="{{route('party.index')}}";
        }
    });
  }
  }
  
</script>
    
@endsection