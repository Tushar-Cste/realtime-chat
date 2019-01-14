@extends('layouts.app')

@section('content')
	<section class="membership-sec">
		<div class="container">
			<div class="top-head-sec">
				<div class="member-top-bar">
					<div class="row">
						<div class="col-sm-6">
							<h3 class="main-head-top">Membership</h3>
						</div>
						<div class="col-sm-6">
							<a href="#"><i class="fa fa-close"></i></a>
						</div>
					</div>
				</div>
				<div class="reg-sec">
					<div class="row">
						<div class="col-md-6">
							<div class="main-button-regis">
								<a href="#">
									<div class="row">
										<div class="col-sm-5">
											<img src="{{ URL::to('/') }}/img/circle-icon.png" alt="pdf image" />
										</div>
										<div class="col-sm-7">
											<div class="inner-button">
												<h5>Download Blank</h5>
												<h4>Registration</h4>
												<h5>From Here</h5>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="main-button-regis">
								<a href="/userMembershipdetails">
									<div class="row">
										<div class="col-sm-5">
											<img src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}" alt="pdf image" />
										</div>
										<div class="col-sm-7">
											<div class="inner-button main-sec">
												<h5>My</h5>
												<h4>Membership</h4>
												<h5>Detail</h5>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>	
					</div>
                </div>
                <?php if($isAdmin == 1): ?>
				<div class="row">
					<div class="col-md-12">
						<div class="member-admin-line">
							<h5 class="member-admin">Membership Admin</h5>
						</div>
					</div>
				</div>
				<div class="reg-sec">
					<div class="row">
						<div class="col-md-6">
							<div class="main-button-regis">
								<a href="#">
									<div class="row">
										<div class="col-md-5">
											<img src="{{ URL::to('/') }}/img/circle-icon.png" alt="pdf image" />
										</div>
										<div class="col-md-7">
											<div class="inner-button">
												<h5>Upload Blank</h5>
												<h4>Registration</h4>
												<h5>From Here</h5>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="main-button-regis image">
								<img class="member-image" src="assets/img/profile.jpg" alt="" />
							</div>
						</div>	
					</div>
					<div class="update-and-verify">
						<div class="row">
							<div class="col-md-6">
								<div class="main-update">
									<h2>$50</h2>
									<h5>Update Shar Rate</h5>
								</div>
							</div>
							<div class="col-md-6">
								<div class="verify-content">
									<div class="input-div">
										<i class="fa fa-user"></i>
										<input type="text" style="width:69%;" name="verify_user" placeholder="Verify" />
										<a href="/userMembershipdetails"><i id="" class="fa fa-search srch" style="cursor:pointer"></i></a>
										<h3>Verify</h3>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-12">
						<h3 class="add-prof">Add Profession List</h3>
						<div class="table-div">
							
							<table class="table">
								<thead>
								  <tr class="head">
									<th>Profession</th>
									<th>Type</th>
								  </tr>
								</thead>
								<tbody>
                                <?php foreach($professions as $key=>$value): ?>
								  <tr id="<?php echo $value['id']; ?>" style="cursor:pointer;" class="professionList">
									<td>{{$value['profession_name']}}</td>
									<td>{{$value['profession_type']}}<i class="fa fa-times profession-del" style="font-size:24px;color: grey;float: right;cursor:pointer;"></i></td>
                                  </tr>
                                <?php endforeach; ?>
								</tbody>
							  </table>
						</div>
						<div class="sec-table">
							<table class="table">
								<tbody>
								  <tr class="profession_id" id="">
									<td><input id="profession_name" name="profession_name" type="text" style="width:100%"></td>
									<td><input id="profession_type" name="profession_type" type="text" style="width:100%"></td>
								  </tr>
								</tbody>
							</table>
						</div>	  
						<div class="bottom-btns">
							<a href="#" id="add_profession" class="btn btn-success right">Add</a>
							<a href="#" id="update_profession" class="btn btn-success right">Update</a>
							<a href="#" id="delete_profession" class="btn btn-success">Delete</a>
						</div>
					</div>
				</div>
            </div>
            <?php endif; ?>
		</div>
	</section>

@endsection

@section('extra-JS')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#add_profession").click(function(e){
            e.preventDefault();
            var profession_name = $("#profession_name").val();
            var profession_type = $("#profession_type").val();
            $.ajax({
                    url: "addProfession",
                    type: "POST",
                    data: {profession_name:profession_name,profession_type:profession_type},
                    dataType: "json",
                    success: function (data) 
                    {
                        swal({
                            title: "Successfully Added!",
                            text: "",
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            location.reload(true);
                        });
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
        });
        $(".professionList").click(function(){
            var profession_id = $(this).attr("id");
            $.ajax({
                    url: "getProfession",
                    type: "POST",
                    data: {profession_id:profession_id},
                    dataType: "json",
                    success: function (data) 
                    {
                        console.log(data);
                        console.log(data['res'][0]['id']);
                        $(".profession_id").attr("id",data['res'][0]['id']);
                        $("#profession_name").val(data['res'][0]['profession_name']);
                        $("#profession_type").val(data['res'][0]['profession_type']);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
        });
        $("#update_profession").click(function(e){
            e.preventDefault();
            var id = $(".profession_id").attr("id");
            var profession_name = $("#profession_name").val();
            var profession_type = $("#profession_type").val();
            $.ajax({
                    url: "updateProfession",
                    type: "POST",
                    data: {id:id,profession_name:profession_name,profession_type:profession_type},
                    dataType: "json",
                    success: function (data) 
                    {
                        swal({
                            title: "Successfuly Updated!",
                            text: "",
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            location.reload(true);
                        });
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
        });
        $(".profession-del").click(function(){ 
            var id = $(this).closest('tr').attr("id");
            $.ajax({
                    url: "deleteProfession",
                    type: "POST",
                    data: {id:id},
                    dataType: "json",
                    success: function (data)
                    {
                        swal({
                            title: "Successfuly Delered!",
                            text: "",
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            location.reload(true);
                        });
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
        });
    });
</script>
@endsection