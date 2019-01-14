@extends('layouts.app')

@section('content')
<section id="userAccess" class="userAccess">
  <div class="container mt-5 mb-3">
    <div class="col-md-12 offset-md-0">
      <div class="card">
        <div class="card-header">
        
          <h5 class="card-title pt-2">User Access <a href="{{ URL('/home') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a>
        </h5>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-8 offset-md-5 align-items-center">

            </div>
            <div class="col-md-12"><hr></div>
            <div class="form-group col-md-6 mt-3">
              <div class="form-group row">
                  <div class="col-md-10 offset-md-1">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="">
                                  <i class="fas fa-unlock"></i>
                              </span>
                          </div>
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                      </div>


                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-10 offset-md-1">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="">
                                  <i class="fas fa-unlock"></i>
                              </span>
                          </div>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm password" required>
                      </div>

                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-10 offset-md-1">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="">
                                  <i class="fas fa-map-marker-alt"></i>
                              </span>
                          </div>
                          <input id="location" type="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" placeholder="Location" required>

                      </div>

                      @if ($errors->has('location'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('location') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-10 offset-md-1">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="">
                                  <i class="fas fa-phone"></i>
                              </span>
                          </div>
                          <input id="phone_no" type="phone_no" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') }}" placeholder="Phone" required>

                      </div>

                      @if ($errors->has('phone_no'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone_no') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-10 offset-md-1">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="">
                                  <i class="fab fa-paypal"></i>
                              </span>
                          </div>
                          <input id="paypal_email" type="paypal_email" class="form-control{{ $errors->has('paypal_email') ? ' is-invalid' : '' }}" name="paypal_email" value="{{ old('paypal_email') }}" placeholder="PayPal Email" required>

                      </div>

                      @if ($errors->has('paypal_email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('paypal_email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

            </div>
            <div class="form-group col-md-6 mt-3">
              <div class="form-group col-md-10 offset-md-1">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                   <button class="btn btn-secondary" type="button" id="button-addon2">
                     <i class="fas fa-search"></i>
                   </button>
                 </div>
               </div>
              </div>
              <div class="input-group col-md-10 offset-md-1">
                <div class="input-group mb-3">
                  <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">Active User</option>
                    <option value="2">User Under Review</option>
                    <option value="3">Block for Dues</option>
                    <option value="4">Block for Dispute</option>
                  </select>
                </div>
              </div>
              <div class="form-group col-md-10 offset-md-1">
                <a href="#" class="btn btn-primary btn-block">CREATE ID WITHOUT VERIFICATION</a>
              </div>
              <div class="form-group col-md-10 offset-md-1">
                <a href="#" class="btn btn-primary btn-block">CREATE ID WITH VERIFICATION</a>
              </div>
              <div class="form-group col-md-10 offset-md-1">
                <a href="#" class="btn btn-primary btn-block">EDIT PROFILE</a>
              </div>
              <div class="form-group col-md-10 offset-md-1">
                <a href="#" class="btn btn-danger btn-block">DELETE PROFILE</a>
              </div>
              <div class="form-group col-md-10 offset-md-1 mt-2">
                <button type="submit" class="btn btn-success btn-block float-right">
                    {{ __('Save') }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('extra-JS')

@endsection
