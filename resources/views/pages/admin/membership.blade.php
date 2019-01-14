@extends('layouts.app')

@section('content')

<section class="membership-pro">
		<div class="container">
			<div class="box-shadow-div">
				<form method="">
					<div class="main-full-form">
						<div class="row">
							<div class="col-md-12">
								<div class="top-head">
									<div class="close-btn-pro">
										<a href="#" class="btn left-close"><i class="fa fa-close"></i></a>
									</div>
									<h3 class="text-center">Membership</h3>
									<div class="row">
										<div class="col-md-5">
											<div class="img-left-cont">
												<img src="assets/img/profile.jpg" alt="Profile picture"/>
											</div>
										</div>
										<div class="col-md-7">
											<div class="content-input-right">
												<div class="row">
													<div class="col-md-6">
														<h5 class="top-two">Join Date</h5>
													</div>
													<div class="col-md-6">
														<input class="half datepicker1" type="text" name="date" id="" placeholder="12/17/2018"/>
													</div>
												</div>
											</div>
											<div class="content-input-right">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<h5 class="top-two">Total Share</h5>
													</div>
													<div class="col-md-6 col-sm-6">
														<h4><b>11</b></h4>
													</div>
												</div>
											</div>
											<div class="content-input-right">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<h5 class="grey"><span>*</span>Membership Type</h5>
													</div>
													<div class="col-md-6 col-sm-6">
														<select>
															<option value="Presidium">Presidium</option>
															<option value="General">General</option>
														</select>
													</div>
												</div>
											</div>
											<div class="content-input-right">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<h5><span>*</span>Membership Category</h5>
													</div>
													<div class="col-md-6 col-sm-6">
														<select>
															<option>*</option>
                                                            <option>**</option>
                                                            <option>***</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="name-input">
												<span>*</span><h4>Arefa</h4>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-10">
											<table class="table table-bordered">
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
												<td><input type="text" class="w-50 h-36" <?php if($isAdmin != 1){ echo "disabled";} ?>></td>
											</table>
										</div>
										<div class="col-md-2">
											<div class="status-drop">
												<select <?php if($isAdmin != 1){ echo "disabled";} ?>>
                                                    <option>Select Status</option>
													<option>Applied</option>
                                                    <option>Approved</option>
                                                    <option>Under Review</option>
                                                    <option>Blocked</option>
                                                    <option>Closed</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="second-part">
							<div class="row">
								<div class="col-md-5">
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5><span>*</span>Cell No.</h5>
											</div>
											<div class="col-md-7">
												<input class="half" type="text" name="cell_num" />
											</div>
										</div>
									</div>
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5><span>*</span>Email</h5>
											</div>
											<div class="col-md-7">
												<input type="text" name="cell_num" />
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
								</div>
								<div class="col-md-5">
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5>Ref. ID</h5>
											</div>
											<div class="col-md-7">
												<input class="right-border" type="text" name="cell_num" />
											</div>
										</div>
									</div>
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5>Ref. Name</h5>
											</div>
											<div class="col-md-7">
												<input class="right-border" type="text" name="cell_num" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<center><div class="line"></div></center>
						<div class="third-content">
							<div class="row">
								<div class="col-md-7">
									<img class="" src="assets/img/profile.jpg" />
									<div class="content-second">
										<div class="row">
											<div class="col-md-3">
												<h5><span>*</span>NID No.</h5>
											</div>
											<div class="col-md-5">
												<input type="text" name="cell_num" />
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="main-right-social">
										<h4>Social Network ID</h4>
										<div class="row">
											<div class="col-md-5">
												<h5>Instagram</h5>
											</div>
											<div class="col-md-7">
												<div class="input-border">
													<input type="text" name="instagram" />
													<i class="fa fa-edit fl-r cu-po"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<h5>Facebook</h5>
											</div>
											<div class="col-md-7">
												<div class="input-border">
													<input type="text" name="instagram" />
													<i class="fa fa-edit fl-r cu-po"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<h5>LinkedIn</h5>
											</div>
											<div class="col-md-7">
												<div class="input-border">
													<input type="text" name="instagram" />
													<i class="fa fa-edit fl-r cu-po"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<center><div class="line"></div></center>
						<div class="second-part">
							<div class="row">
								<div class="col-md-5">
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5><span>*</span>Gender</h5>
											</div>
											<div class="col-md-7">
												<select>
                                                    <option>Select Gender</option>
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
										</div>
									</div>
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5><span>*</span>Nationality 1</h5>
											</div>
											<div class="col-md-7">
												<select>
                                                    <?php foreach($countries as $key=>$value): ?>
                                                        <option><?php echo $value['nationality']; ?></option>
                                                    <?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
								</div>
								<div class="col-md-5">
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5><span>*</span>DOB</h5>
											</div>
											<div class="col-md-7">
												<input class="half datepicker1" type="text" name="cell_num" placeholder="12/17/2018"/>
											</div>
										</div>
									</div>
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5>Nationality 2</h5>
											</div>
											<div class="col-md-7">
                                                <select>
                                                    <?php foreach($countries as $key=>$value): ?>
                                                        <option><?php echo $value['nationality']; ?></option>
                                                    <?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<center><div class="line"></div></center>
						<div class="second-part">
							<div class="row">
								<div class="col-md-5">
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5>Yearly Income</h5>
											</div>
											<div class="col-md-7">
												<input type="text" name="cell_num" placeholder="$"/>
											</div>
										</div>
									</div>
									<div class="content-second">
										<div class="row">
											<div class="col-md-6">
												<select id="profession_type">
													<option>Doctor</option>
                                                    <?php foreach($professions_types as $key=>$value): ?>
													    <option><?php echo $value['profession_type']; ?></option>
                                                    <?php endforeach; ?>
												</select>
											</div>
											<div class="col-md-6">
												<select id="profession_name">
                                                    <?php foreach($professions_name as $key=>$value): ?>
													    <option><?php echo $value['profession_name']; ?></option>
                                                    <?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
								</div>
								<div class="col-md-5">
									<div class="content-second">
										<div class="row">
											<div class="col-md-5">
												<h5><span>*</span>Account Detail</h5>
												<h6>(To Recieve Payment <span> without tax </span> )</h6>
											</div>
											<div class="col-md-7">
												<textarea></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<center>
						<div class="main-button">
							<button class="btn btn-success">Submit</button>
							<button class="btn btn-success">Add Share</button>
							<a href="" class="btn"><i class="fa fa-file-o"></i></a>
						</div>
					</center>
				</form>
			</div>
		</div>
	</section>
	
	
@endsection

@section('extra-JS')
<script>
    $(document).ready(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var dateToday = new Date();
        $('.datepicker1').datepicker({
            format: 'mm/dd/yyyy',
            startDate: "today",
            autoClose: true,
        }).on('changeDate', function(ev){                 
                $('#datepicker1').datepicker('hide');
            });
        $(document).on('change', '#profession_type', function(e) {
            e.preventDefault();
            var profession_type = $("#profession_type").val();
            $.ajax({
                    url: "getProfessionOfType",
                    type: "POST",
                    data: {profession_type:profession_type},
                    dataType: "json",
                    success: function (data) 
                    {
                        var html = "";
                        jQuery.each(data['professions'], function(index, item) {
                            html += '<option>'+item['profession_name']+'</option>'
                        });

                        $("#profession_name").html(html);
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