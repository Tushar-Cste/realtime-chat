@extends('layouts.app')

@section('content')
<section id="seller">
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Edit {{ $seller->seller_pro_title }} <i class="fas fa-plus-circle"></i></h2>
        <hr>
        {!! Form::open(array('route' => ['seller.update', $seller->id], 'method' => 'PUT', 'files' => true)) !!}
            @csrf
            <div class="row">
                <div class="col-md-3">
                  <div class="img-upload">
                    @if( $seller->seller_featured_image)
                      <div id="uploaded-image" class="col-md-8 offset-md-2 mt-5">
                          <img src="{{ asset('uploads/seller/' . $seller->seller_featured_image) }}">
                      </div>
                      <div id="update_image" class="col-md-8 offset-md-2 pt-5">
                          <i class="fas fa-camera fa-2x"></i> <span class="name"></span>
                          {{ Form::file('seller_featured_image') }}
                          <p>Drag nd drop click to upload</p>
                      </div>
                    @else
                      <div id="inner-img-upload">
                          <i class="fas fa-camera fa-2x"></i> <span class="name"></span>
                          {{ Form::file('seller_featured_image') }}
                          <p>Drag nd drop click to upload</p>
                      </div>
                    @endif
                  </div>
                    <!-- <div class="form-group row mt-3 mb-3">
                        <div class="col-md-6">
                            <input type="text" name="seller_commission_percentage" class="form-control{{ $errors->has('seller_commission_percentage') ? ' is-invalid' : '' }}"
                             placeholder="{{ $seller->seller_commission_percentage }}" value="{{ old('seller_commission_percentage') }}" required>
                        </div>
                        <div class="col-md-6">
                           <h5 class="mt-2"> Referral
                               <a href=""data-toggle="modal" data-target="#exampleModal" style="color: #212529;">
                                    <i class="fas fa-question-circle fa-1x"></i>
                               </a></h5>
                        </div>
                    </div> -->
                    @if ($errors->has('seller_featured_image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('seller_featured_image') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('seller_commission_percentage'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('seller_commission_percentage') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-5 mt-1">
                  <div class="form-group row">
                      <div class="col-md-12">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="seller_item_code">Item code</span>
                              </div>
                              <input type="text" class="form-control{{ $errors->has('seller_item_code') ? ' is-invalid' : '' }}"
                              name="seller_item_code" value="{{ $seller->seller_item_code }}" placeholder="{{ $seller->seller_item_code }}" >
                              <input type="text" class="form-control{{ $errors->has('seller_pro_weight') ? ' is-invalid' : '' }}"
                              placeholder="{{ $seller->seller_pro_weight }}" name="seller_pro_weight" value="{{ $seller->seller_pro_weight }}" >
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="seller_pro_weight">LB</span>
                              </div>
                          </div>
                          @if ($errors->has('seller_item_code'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('seller_item_code') }}</strong>
                              </span>
                          @endif
                          @if ($errors->has('seller_pro_weight'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('seller_pro_weight') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
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
                                    <span class="input-group-text" id="seller_category">Category</span>
                                </div>
                                <select class="form-control{{ $errors->has('seller_category') ? ' is-invalid' : '' }}" id="seller_category"
                                name="seller_category" value="{{ $seller->seller_category }}" >
                                    <option>{{ $seller->seller_category }}</option>
                                    <option>---------------------</option>
                                    <option>Physical Product</option>
                                    <option>Digital Product</option>
                                    <option>Physical Service</option>
                                    <option>Logical Service</option>
                                </select>
                            </div>
                            @if ($errors->has('seller_category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_category') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="seller_org_price">Original Price</span>
                                </div>
                                <input type="text" class="form-control{{ $errors->has('seller_org_price') ? ' is-invalid' : '' }}"
                                placeholder="{{ $seller->seller_org_price }}" name="seller_org_price" value="{{ $seller->seller_org_price }}" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="seller_sale_price">Sale price</span>
                                </div>
                                <input type="text" class="form-control{{ $errors->has('seller_sale_price') ? ' is-invalid' : '' }}"
                                placeholder="{{ $seller->seller_sale_price }}" name="seller_sale_price" value="{{ $seller->seller_sale_price }}" >
                            </div>
                            @if ($errors->has('seller_org_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_org_price') }}</strong>
                                </span>
                            @endif
                            @if ($errors->has('seller_sale_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_sale_price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="seller_website">My Website</span>
                              </div>
                                <input type="text" id="seller_website" class="form-control{{ $errors->has('seller_website') ? ' is-invalid' : '' }}"
                                name="seller_website"  value="{{ $seller->seller_website }}" placeholder="{{ $seller->seller_website }}" >
                            </div>
                            @if ($errors->has('seller_website'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_website') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="seller_pro_title">Title</label>
                            <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('seller_pro_title') ? ' is-invalid' : '' }}"
                               id="seller_pro_title" name="seller_pro_title" value="{{ $seller->seller_pro_title }}"
                               placeholder="{{ $seller->seller_pro_title }}" >
                            </div>
                            @if ($errors->has('seller_pro_title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_pro_title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="seller_pro_description">Description</label>
                            <div class="input-group">
                                <textarea class="form-control{{ $errors->has('seller_pro_description') ? ' is-invalid' : '' }}" name="seller_pro_description"
                                id="seller_pro_description" rows="6" value="{{ $seller->seller_pro_description }}" placeholder="{{ $seller->seller_pro_description }}" >
                                  {{ $seller->seller_pro_description }}
                                </textarea>
                            </div>
                            @if ($errors->has('seller_pro_description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_pro_description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('seller_location') ? ' is-invalid' : '' }}"
                                name="seller_location" value="{{ $seller->seller_location }}" placeholder="{{ $seller->seller_location }}" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="seller_location">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->has('seller_location'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_location') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                  <h5><small class="text-muted">My hidden note</small></h5>
                  <hr>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="seller_info_from">Info from:</label>
                            <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('seller_info_from') ? ' is-invalid' : '' }}"
                                placeholder="{{ $seller->seller_info_from }}" name="seller_info_from" value="{{ $seller->seller_info_from }}" >
                            </div>
                            @if ($errors->has('seller_info_from'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_info_from') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="seller_info_price">Buy price:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="seller_info_price">
                                        <i class="fas fa-dollar-sign"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control{{ $errors->has('seller_info_price') ? ' is-invalid' : '' }}"
                                placeholder="" name="seller_info_price" value="{{ $seller->seller_info_price }}" >
                            </div>
                            @if ($errors->has('seller_info_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_info_price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="seller_info_description">Description</label>
                            <div class="input-group">
                                <textarea class="form-control{{ $errors->has('seller_info_description') ? ' is-invalid' : '' }}"
                                name="seller_info_description" id="" rows="6" value="{{ $seller->seller_info_description }}"
                                placeholder="{{ $seller->seller_info_description }}">{{ $seller->seller_info_description }}</textarea>
                            </div>
                            @if ($errors->has('seller_info_description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seller_info_description') }}</strong>
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
<script type="text/javascript">
//Drowpdown show and hide elements
$("select").change(function () {
    // hide all optional elements
    $('#weight').css('display','none');

    $("select option:selected").each(function () {
        if($(this).val() == "physical_product") {
            $('#weight').css('display','block');
        }
    });
});

//Sale price can't be greater then original price
if ($("#seller_sale_price").val() > $("#seller_org_price").val()) {
    alert('Sale is larger than Org');
} else {

}
</script>
@endsection
