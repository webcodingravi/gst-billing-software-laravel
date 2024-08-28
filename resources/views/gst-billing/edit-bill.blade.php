@extends('layouts.app')
@section('content')
  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold"> EDIT GST BILL </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-uppercase">Invoice Basic Info</h4>
                    <hr>
                    <form action="" method="post" id="gstBillUpdateForm" name="gstBillUpdateForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Type</label>
                                    <select class="form-control border-bottom" name="party_id" id="party_id">
                                        <option value="">Please Select</option>
                                        @if ($parties->isNotEmpty())
                                            @foreach ($parties as $party)
                                            <option {{($gst_bills->party_id == $party->id) ? 'selected' : ''}} value="{{$party->id}}">{{$party->full_name}}</option>
 
                                            @endforeach
                                        @endif
                                    
                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Invoice Date</label>
                                    <input type="date" class="form-control border-bottom"
                                        id="invoice_date" value="{{$gst_bills->invoice_date}}" name="invoice_date" placeholder="Invoice Date"/>
                                        <p></p>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Invoice Number</label>
                                    <input type="text" class="form-control border-bottom"
                                        id="invoice_no" value="{{$gst_bills->invoice_no}}" name="invoice_no" placeholder="Invoice No">
                                        <p></p>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title text-uppercase">Item Details</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 border p-1 text-center">
                                <b>DESCRIPTIONS</b>
                            </div>
                            <div class="col-md-4 border p-1 text-center">
                                <b>TOTAL AMOUNT</b>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8 border p-2">
                                <input class="form-control" value="{{$gst_bills->item_description}}" name="item_description" id="item_description" />
                                <p></p>

                            </div>
                            <div class="col-md-4 border p-2">
                                <input class="form-control" value="{{$gst_bills->total_amount}}" name="total_amount" type="text" id="totalAmountInput"
                                    oninput="calculateNetAmount()">

                                    <p></p>


                            </div>
                        </div>

                        <div class="row mt-0">
                            <div class="col-md-3">
                                <label>CGST (%)</label>
                                <input type="text" value="{{$gst_bills->cgst_rate}}" name="cgst_rate" class="form-control border-bottom"
                                    placeholder="CGST Rate"  id="cgst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="cgstDisplay">{{number_format($gst_bills->sgst_amount,2)}}</span>
                                <input type="hidden" id="cgstAmount" name="cgst_amount" value="{{$gst_bills->sgst_amount}}">
                                <p></p>

                            </div>

                            <div class="col-md-3">
                                <label>SGST (%)</label>
                                <input type="text" value="{{$gst_bills->sgst_rate}}" name="sgst_rate" class="form-control border-bottom"
                                    placeholder="SGST Rate"  id="sgst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="sgstDisplay">{{number_format($gst_bills->sgst_amount,2)}}</span>
                                <input type="hidden" id="sgstAmount" name="sgst_amount" value="{{$gst_bills->sgst_amount}}">
                                <p></p>

                            </div>

                            <div class="col-md-3">
                                <label>IGST (%)</label>
                                <input type="text" value="{{$gst_bills->igst_rate}}" name="igst_rate" class="form-control border-bottom"
                                    placeholder="IGST Rate" id="igst" oninput="calculateNetAmount()">
                                <span class="float-right gststyle" id="igstDisplay">{{number_format($gst_bills->igst_amount,2)}}</span>
                                <input type="hidden"  id="igstAmount" name="igst_amount" value="{{$gst_bills->igst_amount}}">
                                <p></p>

                            </div>

                            <div class="col-md-3">
                                <ul style="list-style: none;float: right;">
                                    <li>
                                        <b>Total Amount:</b> ₹ <span type="text"
                                            id="totalAmountDisplay">{{number_format($gst_bills->total_amount,2)}}</span>
                                        

                                    </li>
                                    
                                    <li>
                                        <b>Tax:</b> ₹ <span type="text" id="taxDisplay">{{number_format($gst_bills->tax_amount,2)}}</span>
                                        <input type="hidden" value="{{$gst_bills->tax_amount}}" name="tax_amount"
                                            id="taxAmount">
                                            <p></p>

                                    </li>
                                    <li>
                                        <b>Net Amount:</b> ₹ <span type="text"
                                            id="netAmountDisplay">{{number_format($gst_bills->net_amount,2)}}</span>
                                        <input type="hidden" value="{{$gst_bills->net_amount}}" name="net_amount" id="netAmount">
                                        <p></p>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control border-bottom"
                                        id="declaration" value="{{$gst_bills->declaration}}" name="declaration" placeholder="Declaration">
                                </div>

                                <a href="printGST_bill.html">
                                    <button type="submit"
                                        class="btn btn-primary float-right mb-2">UPDATE</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
  
@endsection
@section('customJs')
<script>
    $("#gstBillUpdateForm").submit(function(event) {
   event.preventDefault();

   $.ajax({
      url : '{{route("gst-billing.update",$gst_bills->id)}}',
      type: 'put',
      data: $(this).serializeArray(),
      dataType: 'json',
      success: function(response) {
        if(response.status == true) {
          $("#party_id").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#invoice_date").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#invoice_no").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#totalAmountInput").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#cgstAmount").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#sgstAmount").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#taxAmount").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');
          $("#netAmount").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          window.location.href="{{route('gst-billing.index')}}";


        }else{
          if(response.errors['party_id']) {
            $("#party_id").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['party_id']);
          }else{
            $("#party_id").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['invoice_date']) {
            $("#invoice_date").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['invoice_date']);
          }else{
            $("#invoice_date").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['invoice_no']) {
            $("#invoice_no").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['invoice_no']);
          }else{
            $("#invoice_no").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['total_amount']) {
            $("#totalAmountInput").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['total_amount']);
          }else{
            $("#totalAmountInput").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['cgst_amount']) {
            $("#cgstAmount").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['cgst_amount']);
          }else{
            $("#cgstAmount").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['sgst_amount']) {
            $("#sgstAmount").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['sgst_amount']);
          }else{
            $("#sgstAmount").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['tax_amount']) {
            $("#taxAmount").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['tax_amount']);
          }else{
            $("#taxAmount").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

          if(response.errors['net_amount']) {
            $("#netAmount").addClass('is-invalid').siblings("P").addClass("invalid-feedback").html(response.errors['net_amount']);
          }else{
            $("#netAmount").removeClass('is-invalid').siblings("P").removeClass("invalid-feedback").html('');

          }

    


        }
      }
   });
});

</script>
    
@endsection