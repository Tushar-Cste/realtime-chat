@extends('layouts.app')

@section('content')
<div class="container shadow mt-5 wd-80-pr">
  <div class="row justify-content-center">
    <div class="col-md-8 md-offset-2">
      <div class="card mb-5">
        <div class="card-header text-center">
            <div class="row">
            <div class="col-sm-4">
                <img src="{{ asset('/uploads/avatars/' . $user->avatar) }}" style="width:150px; height:150px;border-radius:5%;">
                <h4 class="card-title mt-3 mb-3">{{ $user->name }}'s Profile</h4>
                <a class="btn btn-success" data-toggle="modal" href='#updateProfilePicture'>Update Photo</a>
                
            </div>
            <div class="col-sm-4">
                <img src="{{ asset('/uploads/photoId/' . $user->photo_id) }}" style="width:150px; height:150px;border-radius:5%;">
                <h4 class="card-title mt-3 mb-3">Photo ID</h4>
                <a class="btn btn-success" data-toggle="modal" href='#updateProfilePhotoId'>Update Photo</a>
            </div>
            <div class="col-sm-4 p-r-8">
                <a href="{{ URL('/home') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a>
                <img src="{{ asset('/uploads/webcam/' . $user->webcam_image) }}" style="width:150px; height:150px;border-radius:5%;">
                <h4 class="card-title mt-3 mb-3">&nbsp;</h4>
                <a class="btn btn-success" data-toggle="modal" href='#uploadWebCamImage'>Take Picture with ID</a>
            </div>
            </div>
        </div>
        <div class="card-body">
          <div class="col-md-12"><hr></div>
          <form action="{{ route('updateUser') }}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <label for="phone_no" class="col-md-6">Mobile No.</label>
                        <div class="col-md-6">
                          <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ $user->phone_no }}" placeholder="{{ $user->phone_no }}">
                        </div>
                    </div>

                    @if ($errors->has('phone_no'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_no') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                      <label for="location" class="col-md-6">Where are you now ?</label>
                      <div class="col-md-6">
                        <input id="location" type="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ $user->location }}" placeholder="{{ $user->location }}">
                      </div>
                    </div>

                    @if ($errors->has('location'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <label for="paypal_email" class="col-md-6">PayPal Email</label>
                        <div class="col-md-6">
                          <input id="paypal_email" type="paypal_email" class="form-control{{ $errors->has('paypal_email') ? ' is-invalid' : '' }}" name="paypal_email" value="{{ $user->paypal_email }}" placeholder="{{ $user->paypal_email }}">
                        </div>
                    </div>

                    @if ($errors->has('paypal_email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('paypal_email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-2">
                <div class="col-md-6 offset-md-6">
                    <button type="submit" class="btn btn-success">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updateProfilePicture">
    <div class="modal-dialog">
        <div class="modal-content">
        <form enctype="multipart/form-data" action="{{ route('updatePic') }}" method="POST">
            @csrf
            <div class="modal-body">
                <img src="{{ asset('/uploads/avatars/' . $user->avatar) }}" class="img-responsive center-block profile1-img" style=" margin: 0px auto !important; display: block; width:150px; height:150px;border-radius:5%;">
                <hr>
                <label>Profile Picture</label>
                <input type="file" name="avatar" class="form-control" id="profile">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateProfilePhotoId">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('updatePic') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <img src="{{ asset('/uploads/photoId/' . $user->photo_id) }}" class="img-responsive center-block 2nd-img-app" style=" margin: 0px auto !important; display: block; width:150px; height:150px;border-radius:5%;">
                    <hr>
                    <label>Profile Picture</label>
                    <input type="file" name="photo_id" class="form-control" id="photo_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadWebCamImage">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('updatePic') }}" method="POST">
                @csrf
                <div class="modal-body">
                   <div id="my_camera"></div>
                    <input type="hidden" value="" id="webcam_image"  name="webcam_image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="take_picture">Take Picture</button>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="https://pixlcore.com/demos/webcamjs/webcam.min.js"></script>

<script language="JavaScript">
    // Webcam.set({
	// 		width: 320,
	// 		height: 240,
	// 		image_format: 'jpeg',
	// 		jpeg_quality: 90
	// 	});
	// 	Webcam.attach( '#my_camera' );
    $(document).ready(function() {
    
        $('#take_picture').click(function(){
            Webcam.snap( function(data_uri) { // display results in page document.getElementById('results').innerHTML = '
            $('#webcam_image').val(data_uri);
            $('#my_camera').html(
            '<img src="'+data_uri+'" />' ); 
            } );

            //$("#profile").on('click', function() {
                    // readURL(this);
                    //var src = $(this).val();
                    //$("#inner-img-upload"). html("<img src="+ src+">");
            //}

        });
        $(document).on("change", "#profile", function(event){
               var imgToApp = 'profile1-img';
               readURL(this,imgToApp);
        });
        $(document).on("change", "#photo_id", function(event){
            var imgToApp = '2nd-img-app';
               readURL(this,imgToApp);
        });
        function readURL(input,imgtToApp) 
        {
            console.log(imgtToApp);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('.'+imgtToApp).attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>
@endsection
