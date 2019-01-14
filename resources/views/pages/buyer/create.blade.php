@extends('layouts.app')

@section('content')
    <section id="buyer">
        <div class="container shadow p-b-1">
            <h2 class="text-center mt-4 mb-4 p-l-r">Buyer Post <i class="fas fa-plus-circle"></i> <a href="{{ URL('/home') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a></h2>
           
            <hr>
            <div style="opacity:<?php echo $opacity; ?>">
            {!! Form::open(array('id'=>'buyer_form' , 'route' => 'buyer.store', 'files' => true)) !!}
                @csrf
                <div class="row">
                    <div class="col-md-4 show-ic offset-md-1">
                        <div class="img-upload">
                            <img id="blah" src="#" style="width:100%;height:100%;border-radius: 20px;"/>
                            <!-- <div id="inner-img-upload">
                                <img id="blah" src="#" alt="your image" />
                                <i class="fas fa-camera fa-2x"></i> <span class="name"></span>
                                {{ Form::file('buyer_featured_image',['id'=>'imgInp']) }}
                                <p>Drag and drop click to upload</p>
                            </div> -->
                        </div>
                        <div class="clearfix"></div>
                        <div class="image-upload-icon p-abs t-36" style="opacity:0">
                                <i class="fas fa-camera fa-2x m-l-42"></i> <span class="name"></span>
                                {{ Form::file('buyer_featured_image',['id'=>'imgInp']) }}
                                <p>Drag and drop click to upload</p>
                        </div>
                        <!-- <div class="form-group row mt-3 mb-3">
                            <div class="col-md-6">
                                <input type="text" name="buyer_commission_percentage" class="form-control{{ $errors->has('buyer_commission_percentage') ? ' is-invalid' : '' }}"
                                 placeholder="%" value="{{ old('buyer_commission_percentage') }}" required>
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
                                    name="buyer_category" value="{{ old('buyer_category') }}">
                                      <option>Choose</option>
                                      <option value="physical_product" <?php if (old('buyer_category') == 'physical_product') { ?> selected="true" <?php } ?>>Physical Product</option>
                                      <option value="digital_product"  <?php if (old('buyer_category') == 'digital_product') { ?> selected="true" <?php } ?>>Digital Product</option>
                                      <option value="physical_service"  <?php if (old('buyer_category') == 'physical_service') { ?> selected="true" <?php } ?>>Physical Service</option>
                                      <option value="logical_service"   <?php if (old('buyer_category') == 'logical_service') { ?> selected="true" <?php } ?>>Logical Service</option>
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
                                    <input type="number" class="form-control{{ $errors->has('buyer_sale_price') ? ' is-invalid' : '' }}"
                                    
                                    placeholder="$" name="buyer_sale_price" value="{{ old('buyer_sale_price') }}">
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
                                    <input type="text" id="buyer_website_f" class="form-control{{ $errors->has('buyer_website') ? ' is-invalid' : '' }}"
                                    placeholder="example.com" name="buyer_website"  value="{{ old('buyer_website') }}">
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
                                    placeholder="T-shirt" id="buyer_pro_title" name="buyer_pro_title"
                                    value="{{ old('buyer_pro_title') }}">
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
                                    id="buyer_pro_description" rows="6" value="<?php  echo old('buyer_pro_description'); ?>" placeholder="Description">{{old('buyer_pro_description')}}</textarea>
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
                                    <input type="text" class="form-control{{ $errors->has('buyer_location') ? ' is-invalid' : '' }}" placeholder="Service location"
                                    name="buyer_location" value="{{ old('buyer_location') }}">
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
                <div class="row m-b-1-e">
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
                                <button type="button" class="btn btn-success float-right m-b-12" id="buyer_form_btn">
                                    {{ __('DONE') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </section>
    @include('partials.cal-modal')
@endsection

@section('extra-JS')
<script>

    $(document).ready(function() {
        var allow_form_submission = "";
        $("#buyer_website_f").on("keyup", function(){
            var email =  $("#buyer_website_f").val();
            if(!validateEmail(email))
            {
                $("#buyer_website_f").addClass("is-invalid");
                allow_form_submission = false;
            }
            else
            {
                $("#buyer_website_f").removeClass("is-invalid");
                allow_form_submission = true;
            }
        });
        $("#buyer_form_btn").click(function(event){
            event.preventDefault();
            if(!allow_form_submission)
            {
                alert('please enter correct values to submit form');
            }
            else
            {
                $("#buyer_form").submit();
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
    // function validateEmail(email) 
    // {
    //     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //     return re.test(String(email).toLowerCase());
    // }
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
