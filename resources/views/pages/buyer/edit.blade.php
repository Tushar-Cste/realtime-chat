@extends('layouts.app')

@section('content')
<section id="buyer">
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Edit {{ $buyer->buyer_pro_title }} <i class="fas fa-plus-circle"></i></h2>
        <hr>
        {!! Form::open(array('route' => ['buyer.update', $buyer->id], 'method' => 'PUT', 'files' => true)) !!}
            @csrf
            <div class="row">
                <div class="col-md-4 offset-md-1">
                  <div class="img-upload">
                    @if( $buyer->buyer_featured_image)
                    <div id="uploaded-image" class="col-md-8 offset-md-2 mt-5">
                        <img src="{{ asset('uploads/buyer/' . $buyer->buyer_featured_image) }}">
                    </div>
                    <div id="update_image" class="col-md-8 offset-md-2 pt-5">
                        <i class="fas fa-camera fa-2x"></i> <span class="name"></span>
                        {{ Form::file('buyer_featured_image') }}
                        <p>Drag nd drop click to upload</p>
                    </div>
                    @else
                        <div id="inner-img-upload">
                            <i class="fas fa-camera fa-2x"></i> <span class="name"></span>
                            {{ Form::file('buyer_featured_image') }}
                            <p>Drag nd drop click to upload</p>
                        </div>
                      @endif
                    </div>
                    <!-- <div class="form-group row mt-3 mb-3">
                        <div class="col-md-6">
                            <input type="text" name="buyer_commission_percentage" class="form-control{{ $errors->has('buyer_commission_percentage') ? ' is-invalid' : '' }}"
                             placeholder="{{ $buyer->buyer_commission_percentage }}" value="{{ old('buyer_commission_percentage') }}" required>
                        </div>
                        <div class="col-md-6">
                           <h5 class="mt-2"> Referral
                               <a href=""data-toggle="modal" data-target="#exampleModal" style="color: #212529;">
                                    <i class="fas fa-question-circle fa-1x"></i>
                               </a></h5>
                        </div>
                    </div> -->
                    @if ($errors->has('buyer_featured_image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('buyer_featured_image') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('buyer_commission_percentage'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('buyer_commission_percentage') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 mt-1">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="sell-type">Want to</span>
                                </div>
                                <select class="form-control" id="sell-type" name="sell-type" readonly>
                                    <option readonly>Buy</option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="buyer_category">Category</span>
                                </div>
                                <select class="form-control{{ $errors->has('buyer_category') ? ' is-invalid' : '' }}" id="buyer_category"
                                name="buyer_category" value="{{ $buyer->buyer_category }}">
                                    <option>{{ $buyer->buyer_category }}</option>
                                    <option>---------------------</option>
                                    <option value="physical_product">Physical Product</option>
                                    <option value="digital_product">Digital Product</option>
                                    <option value="physical_service">Physical Service</option>
                                    <option value="logical_service">Logical Service</option>
                                </select>
                            </div>
                            @if ($errors->has('buyer_category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('buyer_category') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="buyer_sale_price">Price</span>
                                </div>
                                <input type="text" class="form-control{{ $errors->has('buyer_sale_price') ? ' is-invalid' : '' }}"
                                name="buyer_sale_price" value="{{ $buyer->buyer_sale_price }}" placeholder="{{ $buyer->buyer_sale_price }}">
                            </div>
                            @if ($errors->has('buyer_sale_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('buyer_sale_price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="buyer_website">My Website</span>
                              </div>
                                <input type="text" id="buyer_website" class="form-control{{ $errors->has('buyer_website') ? ' is-invalid' : '' }}"
                                name="buyer_website"  value="{{ $buyer->buyer_website }}" placeholder="{{ $buyer->buyer_website }}">
                            </div>
                            @if ($errors->has('buyer_website'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('buyer_website') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="buyer_pro_title">Title</label>
                            <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('buyer_pro_title') ? ' is-invalid' : '' }}"
                               id="buyer_pro_title" name="buyer_pro_title" value="{{ $buyer->buyer_pro_title }}"
                               placeholder="{{ $buyer->buyer_pro_title }}">
                            </div>
                            @if ($errors->has('buyer_pro_title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('buyer_pro_title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="buyer_pro_description">Description</label>
                            <div class="input-group">
                                <textarea class="form-control{{ $errors->has('buyer_pro_description') ? ' is-invalid' : '' }}" name="buyer_pro_description"
                                id="buyer_pro_description" rows="6" value="{{ $buyer->buyer_pro_description }}" placeholder="">{{ $buyer->buyer_pro_description }}</textarea>
                            </div>
                            @if ($errors->has('buyer_pro_description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('buyer_pro_description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('buyer_location') ? ' is-invalid' : '' }}"
                                name="buyer_location" value="{{ $buyer->buyer_location }}" placeholder="{{ $buyer->buyer_location }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="buyer_location">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('buyer_location'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('buyer_location') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-5">
                <div class="col-md-10 offset-md-1">
                    <div id="form-footer">
                        <div class="form-footer-right float-right">
                            <a href="#">
                                <i class="fas fa-download fa-2x"></i>
                            </a>
                            <a href="#">
                                <i class="fas fa-copy fa-2x"></i>
                            </a>
                            <a href="#">
                                <i class="fas fa-trash-alt fa-2x"></i>
                            </a>
                            <a href="#">
                                <i class="fas fa-plus-square fa-2x"></i>
                            </a>
                            <a href="#">
                                <i class="fas fa-edit fa-2x"></i>
                            </a>
                            <button type="submit" class="btn btn-success float-right">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</section>
    @include('partials.cal-modal')
@endsection

@section('extra-JS')

@endsection
