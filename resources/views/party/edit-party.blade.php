@extends('layouts.app')
@section('content')

  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title font-weight-bold text-uppercase"> Edit Party </h4>
              </div>
          </div>
      </div>
      <!-- end page title -->
      <!-- Start Form  -->
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title text-uppercase"> Basic Info</h4>
                      <hr>
                      <form action="" class="needs-validation"  name="partyUpdateForm" id="partyUpdateForm" method="post">
                        @csrf
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group mb-3">
                                      <label for="validationCustom01">Type</label>
                                      <select name="party_type" class="form-control border-bottom "
                                          id="party_type" placeholder="Please select Type"
                                          >
                                          <option {{($party->party_type == 'client') ? 'selected' : ''}} value="client">Client</option>
                                          <option {{($party->party_type == 'vendor') ? 'selected' : ''}} value="vendor">Vendor</option>
                                          <option {{($party->party_type == 'employee') ? 'selected' : ''}} value="employee">Employee</option>
                                      </select>
                                      <p></p>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group mb-3">
                                      <label for="full_name">Full Name</label>
                                      <input type="text" value="{{$party->full_name}}" name="full_name" class="form-control border-bottom "
                                          id="full_name" placeholder="Enter client's full name"
                                         >
                                         <p></p>

                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group mb-3">
                                      <label for="phone_no">Mobile Number</label>
                                      <input value="{{$party->phone_no}}" type="text" name="phone_no" class="form-control border-bottom "
                                          id="phone_no" placeholder="mobile number"
                                         >
                                         <p></p>

                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group mb-3">
                                      <label for="address">Address</label>
                                      <input value="{{$party->address}}" type="text" name="address" class="form-control border-bottom "
                                          id="address" placeholder="Enter Address">
                                          <p></p>

                                  </div>
                              </div>
                          </div>


                          <h4 class="header-title text-uppercase">Bank Details</h4>
                          <hr>
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group mb-3">
                                      <label for="account_holder_name">Account Holder Name</label>
                                      <input value="{{$party->account_holder_name}}" type="text" name="account_holder_name" class="form-control border-bottom "
                                          id="account_holder_name" placeholder="Enter Accoumt Holder name"
                                          >
                                          <p></p>

                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="form-group mb-3">
                                      <label for="account_no">Account Number</label>
                                      <input value="{{$party->account_no}}" type="text" name="account_no" class="form-control border-bottom "
                                          id="account_no" placeholder="Enter Account Number"
                                          >
                                    
                                  </div>
                              </div>


                              <div class="col-md-4">
                                  <div class="form-group mb-3">
                                      <label for="bank_name">Bank Name</label>
                                      <input value="{{$party->bank_name}}" type="text" name="bank_name" class="form-control border-bottom "
                                          id="bank_name" placeholder="Enter Bank Name"
                                          >
                                          <p></p>

                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group mb-3">
                                      <label for="ifsc_code">IFSC Code</label>
                                      <input value="{{$party->ifsc_code}}" type="text" name="ifsc_code" class="form-control border-bottom "
                                          id="ifsc_code" placeholder="Enter IFSC Code"
                                          >
                                          <p></p>

                                  </div>
                              </div>


                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <label for="branch_address">Branch</label>
                                  <input value="{{$party->branch_address}}" type="text" name="branch_address" class="form-control border-bottom "
                                      id="branch_address" placeholder="Enter Branch">
                                      <p></p>

                              </div>
                          </div>
                          <br>

                          <button class="btn btn-primary" type="submit">UPDATE</button>
                          <a href="{{route('party.index')}}" class="btn btn-secondary" >Cancel</a>
                      </form>
                  </div>
              </div>
          </div>
      </div>

  </div>

@endsection

@section('customJs')
<script>
$("#partyUpdateForm").submit(function(event) {
   event.preventDefault();

   $.ajax({
      url : '{{route("party.update",$party->id)}}',
      type: 'put',
      data: $(this).serializeArray(),
      dataType: 'json',
      success: function(response) {
        if(response.status == true) {
          $("#party_type").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#full_name").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#phone_no").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#address").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#account_holder_name").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#account_no").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#ifsc_code").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#branch_address").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          window.location.href="{{route('party.index')}}";


        }else{
          if(response.errors['party_type']) {
            $("#party_type").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['party_type']);
          }else{
            $("#party_type").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['full_name']) {
            $("#full_name").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['full_name']);
          }else{
            $("#full_name").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['phone_no']) {
            $("#phone_no").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['phone_no']);
          }else{
            $("#phone_no").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['address']) {
            $("#address").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['address']);
          }else{
            $("#address").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['account_holder_name']) {
            $("#account_holder_name").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['account_holder_name']);
          }else{
            $("#account_holder_name").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['account_no']) {
            $("#account_no").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['account_no']);
          }else{
            $("#account_no").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['bank_name']) {
            $("#bank_name").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['bank_name']);
          }else{
            $("#bank_name").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['ifsc_code']) {
            $("#ifsc_code").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['ifsc_code']);
          }else{
            $("#ifsc_code").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['branch_address']) {
            $("#branch_address").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['branch_address']);
          }else{
            $("#branch_address").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

        }
      }
   });
});

</script>

@endsection