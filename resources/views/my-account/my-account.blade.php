@extends('layouts.app')
@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title font-weight-bold text-uppercase">Account Setting</h4>
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
                      <h4 class="header-title text-uppercase">Account Setting</h4>
                      <hr>
                      <form action="{{route('users.update',$user->id)}}" class="needs-validation" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group mb-3">
                                      <label for="">Name</label>
                                      <input type="text" class="form-control border-bottom @error('name') is-invalid @enderror"
                                          id="name" value="{{old('name',$user->name)}}" name="name" placeholder="Enter Name" >
                                      @error('name')
                                           <span class="invalid-feedback">{{$message}}</span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Mobile</label>
                                    <input type="text" class="form-control border-bottom @error('mobile') is-invalid @enderror"
                                        id="mobile" value="{{old('mobile',$user->mobile)}}" name="mobile" placeholder="Enter Mobile" >
                                        @error('mobile')
                                        <span class="invalid-feedback">{{$message}}</span>
                                   @enderror
                                </div>
                            </div>
                          </div>

                          <div class="row">
                        

                            <div class="col-md-6">
                              <div class="form-group mb-3">
                                  <label for="">Profile Pic</label>
                                  <input type="file" class="form-control border-0 @error('image') is-invalid @enderror" name="image" id="image" accept="image/*">
                                  @error('image')
                                  <span class="invalid-feedback">{{$message}}</span>
                             @enderror

                              </div>
                              <div class="mb-3">
                              <img src="{{asset('uploads/profile_pic/thumb/'.$user->image)}}" class="img-fluid"/>
                            </div>


                          </div>

                          <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control border-bottom @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{old('email', $user->email)}}" placeholder="Enter Email" >
                                    @error('email')
                                    <span class="invalid-feedback">{{$message}}</span>
                               @enderror
                            </div>
                        </div>
                   
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                          <a class="btn btn-secondary" href="{{route('dashboard')}}">Cancel</a>

                      </form>

                      <form action="{{route('user.UpdatePassword')}}" method="post" class="needs-validation mt-5">

                        @csrf
                        <div class="row">
                          <div class="col-12">
                              <h4 class="header-title text-uppercase">Password Reset</h4>
                              <hr>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Old Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control border-bottom @error('old_password') is-invalid @enderror"
                                    id="old_password" name="old_password" value="{{old('old_password')}}" placeholder="Old Password" >
                                    @error('old_password')
                                    <span class="invalid-feedback">{{$message}}</span>
                               @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group mb-3">
                              <label for="">New Passwords<span class="text-danger">*</span></label>
                              <input type="password" value="{{old('new_password')}}" class="form-control border-bottom @error('new_password') is-invalid @enderror" name="new_password" id="new_password" placeholder="New Password">
                              @error('new_password')
                              <span class="invalid-feedback">{{$message}}</span>
                         @enderror
                          </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">confirm Password<span class="text-danger">*</span></label>
                            <input type="password" value="{{old('confirm_password')}}" class="form-control border-bottom @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            @error('confirm_password')
                            <span class="invalid-feedback">{{$message}}</span>
                       @enderror
                        </div>
                    </div>

                      

                  
                    </div>


                        
                          <br>

                          <button class="btn btn-primary" type="submit">Submit</button>
                          <a class="btn btn-secondary" href="{{route('dashboard')}}">Cancel</a>
                      </form>
                  </div>
              </div>
          </div>
      </div>

  </div>
</div>

@endsection