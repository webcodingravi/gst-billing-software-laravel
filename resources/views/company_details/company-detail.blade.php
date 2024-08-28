@extends('layouts.app')
@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title font-weight-bold text-uppercase">Company Details</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->
      <!-- Start Form  -->
      <div class="row">
        <div class="col-md-12">
            @include('alertMessage.alertMessage')
        </div>
          <div class="col-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="header-title text-uppercase">Company Details</h4>
                      <hr>
                      <form action="{{route('processCompanyDetail')}}" class="needs-validation" method="post">
                        @csrf
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group mb-3">
                                      <label for="">Company Name</label>
                                      <input type="text" class="form-control border-bottom @error('company_name') is-invalid @enderror"
                                          id="company_name" value="{{old('company_name',$company_detail->company_name)}}" name="company_name" placeholder="Enter Company Name" >
                                      @error('company_name')
                                           <span class="invalid-feedback">{{$message}}</span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Mobile</label>
                                    <input type="text" class="form-control border-bottom @error('mobile_no') is-invalid @enderror"
                                        id="mobile_no" value="{{old('mobile_no',$company_detail->mobile_no)}}" name="mobile_no" placeholder="Enter Mobile" >
                                        @error('mobile_no')
                                        <span class="invalid-feedback">{{$message}}</span>
                                   @enderror
                                </div>
                            </div>

                          </div>


                             <div class="row">
                            <div class="col-md-6">
                              <div class="form-group mb-3">
                                  <label for="">Email</label>
                                  <input type="text" class="form-control border-bottom @error('mobile_no') is-invalid @enderror"
                                      id="email" value="{{old('email',$company_detail->email)}}" name="email" placeholder="Enter Email" >
                                      @error('email')
                                      <span class="invalid-feedback">{{$message}}</span>
                                 @enderror
                              </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Website</label>
                                <input type="text" class="form-control border-bottom @error('website') is-invalid @enderror"
                                    id="website" value="{{old('website',$company_detail->website)}}" name="website" placeholder="Enter Website" >
                                    @error('website')
                                    <span class="invalid-feedback">{{$message}}</span>
                               @enderror
                            </div>
                        </div>


                        </div>

                          

                          <div class="row">
                      
                          <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">GST No.</label>
                                <input type="text" class="form-control border-bottom @error('gst_no') is-invalid @enderror"
                                    id="gst_no" name="gst_no" value="{{old('gst_no',$company_detail->gst_no)}}" placeholder="Enter GST No." >
                                    @error('gst_no')
                                    <span class="invalid-feedback">{{$message}}</span>
                               @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group mb-3">
                              <label for="">Address</label>
                              <input type="text" class="form-control border-bottom @error('address') is-invalid @enderror"
                                  id="address" name="address" value="{{old('address',$company_detail->address)}}" placeholder="Enter Address" >
                                  @error('address')
                                  <span class="invalid-feedback">{{$message}}</span>
                             @enderror
                          </div>
                      </div>
                    </div>

                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">Bank Name</label>
                            <input type="text" class="form-control border-bottom"
                                id="bank_name" name="bank_name" value="{{$company_detail->bank_name}}" placeholder="Enter Bank Name" >
                               
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">Account Number</label>
                            <input type="text" class="form-control border-bottom"
                                id="account_no" name="account_no" value="{{$company_detail->account_no}}" placeholder="Enter Account Number" >
                               
                        </div>
                    </div>

                    

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">IFSC CODE</label>
                                    <input type="text" class="form-control border-bottom"
                                        id="ifsc_code" name="ifsc_code" value="{{$company_detail->ifsc_code}}" placeholder="Enter IFSC Code" >
                                       
                                </div>
                            </div>



                            </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                          <a class="btn btn-secondary" href="{{route('dashboard')}}">Cancel</a>

                      </form>

                 
                    </div>


                        
                         
                  </div>
              </div>
          </div>
      </div>

  </div>
</div>

@endsection