@extends('layouts.app')
@section('custom-styles')

@endsection
@section('content')
    <section id="seller">
        <div class="container-fluid shadow p-b-1">
            <h2 class="text-center mt-4 mb-4 p-l-r">Seller Post <i class="fas fa-plus-circle"></i><a href="{{ URL('/home') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a></h2>
            <hr>
            {!! Form::open(array('id'=>'seller_form' , 'route' => 'seller.store', 'files' => true)) !!}
                @csrf
                <div class="row" style="opacity:<?php echo $opacity; ?>;">
                    <div class="col-md-3 show-ic">
                        <div class="img-upload">
                            <img id="blah" src="#" style="width:100%;height:100%;border-radius: 20px;"/>
                            <!-- <div id="inner-img-upload">
                                <i class="fas fa-camera fa-2x"></i> <span class="name"></span>
                                {{ Form::file('seller_featured_image') }}
                                <p>Drag nd drop click to upload</p>
                            </div> -->
                        </div>
                        <div class="clearfix"></div>
                        <div class="image-upload-icon p-abs t-36" style="opacity:0;">
                                <i class="fas fa-camera fa-2x m-l-42"></i> <span class="name"></span>
                                {{ Form::file('seller_featured_image',['id'=>'imgInp']) }}
                                <p>Drag and drop click to upload</p>
                        </div>
                        <!-- <div class="form-group row mt-3 mb-3">
                            <div class="col-md-6">
                                <input type="text" name="seller_commission_percentage" class="form-control{{ $errors->has('seller_commission_percentage') ? ' is-invalid' : '' }}"
                                 placeholder="%" value="{{ old('seller_commission_percentage') }}" required>
                            </div>
                            <div class="col-md-6">
                               <h5 class="mt-2"> Referral
                                   <a href=""data-toggle="modal" data-target="#exampleModal" style="color: #212529;">
                                        <i class="fas fa-question-circle fa-1x"></i>
                                   </a>
                                </h5>
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
                          <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="seller_item_code">Item code</span>
                                </div>
                                <input type="text" class="form-control{{ $errors->has('seller_item_code') ? ' is-invalid' : '' }}"
                                name="seller_item_code" value="{{ old('seller_item_code') }}">
                            </div>
                          </div>
                          <div class="col-md-4" id="weight" style="display:none;">
                            <div class="input-group">
                              <input type="number" class="form-control{{ $errors->has('seller_pro_weight') ? ' is-invalid' : '' }}"
                              placeholder="Weight" name="seller_pro_weight" value="{{ old('seller_pro_weight') }}" id="seller_pro_weight">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="seller_pro_weight">LB</span>
                              </div>
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
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="sell-type">Want to</span>
                                    </div>
                                    <select class="form-control" id="sell-type" name="sell-type" readonly>
                                        <option readonly>Sell</option>
                                    </select>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="seller_category">Category</span>
                                    </div>
                                    <select class="form-control{{ $errors->has('seller_category') ? ' is-invalid' : '' }}" id="seller_category"
                                    name="seller_category" value="{{ old('seller_category') }}">
                                        <option>Choose</option>
                                        <option value="physical_product" <?php if (old('seller_category') == 'physical_product') { ?> selected="true" <?php } ?>>Physical Product</option>
                                        <option value="digital_product"  <?php if (old('seller_category') == 'digital_product') { ?> selected="true" <?php } ?>>Digital Product</option>
                                        <option value="physical_service"  <?php if (old('seller_category') == 'physical_service') { ?> selected="true" <?php } ?>>Physical Service</option>
                                        <option value="logical_service"  <?php if (old('seller_category') == 'logical_service') { ?> selected="true" <?php } ?>>Logical Service</option>
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
                                    <input type="number" class="form-control{{ $errors->has('seller_org_price') ? ' is-invalid' : '' }}"
                                    placeholder="$" name="seller_org_price" value="{{ old('seller_org_price') }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="seller_sale_price">Sale price</span>
                                    </div>
                                    <input type="number" class="form-control{{ $errors->has('seller_sale_price') ? ' is-invalid' : '' }}"
                                    placeholder="$" name="seller_sale_price" value="{{ old('seller_sale_price') }}">
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
                                    <input type="email" id="seller_website_f" class="form-control{{ $errors->has('seller_website') ? ' is-invalid' : '' }}"
                                    placeholder="example.com" name="seller_website"  value="{{ old('seller_website') }}">
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
                                    placeholder="T-shirt" id="seller_pro_title" name="seller_pro_title"
                                    value="{{ old('seller_pro_title') }}">
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
                                    id="seller_pro_description" rows="6" value="{{ old('seller_pro_description') }}" placeholder="Description">{{ old('seller_pro_description') }}</textarea>
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
                                    <input type="text" class="form-control{{ $errors->has('seller_location') ? ' is-invalid' : '' }}" placeholder="Service location"
                                    name="seller_location" value="{{ old('seller_location') }}">
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
                    <hr>
                    <div class="col-md-4">
                      <h5><small class="text-muted">My hidden note</small></h5>
                      <hr>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="seller_info_from">Info from:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control{{ $errors->has('seller_info_from') ? ' is-invalid' : '' }}"
                                    placeholder="example.com/product" name="seller_info_from" value="{{ old('seller_info_from') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="seller_info_from">Save from site</button>
                                    </div>
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
                                    <input type="number" class="form-control{{ $errors->has('seller_info_price') ? ' is-invalid' : '' }}"
                                    placeholder="" name="seller_info_price" value="{{ old('seller_info_price') }}">
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
                                    name="seller_info_description" id="" rows="6" value="{{ old('seller_info_description') }}" placeholder="Description">{{ old('seller_info_description') }}</textarea>
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
                <div class="row mb-2">
                    <div class="col-md-12">
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
                                <button type="button" class="btn btn-success float-right m-b-12" id="seller_form_btn">
                                    {{ __('DONE') }}
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
$(document).ready(function() {
        var allow_form_submission = "";
        $("#seller_website_f").on("keyup", function(){
            var email =  $("#seller_website_f").val();
            if(!validateEmail(email))
            {
                $("#seller_website_f").addClass("is-invalid");
                allow_form_submission = false;
            }
            else
            {
                $("#seller_website_f").removeClass("is-invalid");
                allow_form_submission = true;
            }
        });
        $("#seller_form_btn").click(function(event){
            event.preventDefault();
            if(!allow_form_submission)
            {
                alert('please enter correct values to submit form');
            }
            else
            {
                $("#seller_form").submit();
            }
        });
        $(".fa-camera").click(function () {
            $("#imgInp").trigger('click');
            });
            $('#imgInp').on('change', function() {
                readURL(this);
                //var src = $(this).val();
                //$("#inner-img-upload"). html("<img src="+ src+">");
            })
      
    });
    function readURL(input) 
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    function validateEmail(str) 
    {
        var regex = str.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
        if (regex == null)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
</script>

@endsection
