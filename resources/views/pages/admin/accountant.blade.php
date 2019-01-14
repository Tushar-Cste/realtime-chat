@extends('layouts.app')
@section('content')
    <div id="loader" class="txt-algn-center hide">
        <i class="fa fa-spinner fa-spin" style="font-size:51px;color:#685ade;"></i>
    </div>
    <section id="admin" class="admin-panel main-c">
        <div class="container mt-5 mb-3">
            <div class="col-xs-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title pt-2"><i class="fa fa-calculator" style="font-size:25px"></i> Accountant <a href="{{ URL('/home') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 b-r-2 p-43-p" style="padding-top:241px;">
                                <form id="deposit_form" action="">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id=""><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="" id="deposit_amount" name="deposit_amount" value="" required utocomplete="off" />
                                    </div>
                                    <div class="input-group m-t-12">
                                        <input type="text" class="form-control" placeholder="Description" id="deposit_description" name="deposit_description" value="" required autocomplete="off" />
                                    </div>
                                    <div class="input-group m-t-12">
                                        <textarea class="form-control" name="deposit_details" id="deposit_details" rows="6" value="" placeholder="Details" required autocomplete="off"></textarea>
                                    </div>
                                    <div class="col-md-5 m-t-12 f-l-r">
                                        <button type="button" id="deposit_btn" class="btn btn-success btn-block">DEPOSIT<i class="fas fa-download"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 p-43-p">
                                <div class="row">
                                    <div class="col-md-12" style="height:142px;text-align:center;">
                                        <img id="user_image" src="" alt="Not Found" height="130" width="130" style="border-radius:66px;">
                                    </div>
                                </div>
                                <form id="transfer_form" action="">
                                    <!-- <div class="form-group">
                                        <select id="transfer_id" name="transfer_id" class="form-control demo-default" placeholder="Type your name...">
                                            <option value="">Select user name ...</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input class="form-control" data-val="0"  id="transfer_id" name="transfer_id" type="search" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary search_user" type="button" id="button-addon2">
                                            <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- <div class="input-group m-t-12">
                                        <input type="text" id="transfer_id" name="transfer_id" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                    <div class="input-group m-t-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id=""><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="" id="transfer_amount" name="transfer_amount" value="" autocomplete="off" required>
                                    </div>
                                    <div class="input-group m-t-12">
                                        <input type="text" class="form-control" placeholder="Description" id="transfer_description" name="transfer_description" value="" autocomplete="off" required>
                                    </div>
                                    <div class="input-group m-t-12">
                                        <textarea class="form-control" name="transfer_details" id="transfer_details" rows="6" value="" placeholder="Details" required></textarea>
                                    </div>
                                    <div class="col-md-5 m-t-12 f-l-r">
                                        <button type="button" class="btn btn-primary btn-block" id="transfer_btn">Transfer<i class="fas fa-upload"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('extra-JS')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $( document ).ready(function() 
    {
        //getNamesIdsList();
        $("#deposit_btn").click(function()
        {
            $("#loader").removeClass('hide');
            $(".main-c").addClass('hide');
            var amount = $("#deposit_amount").val();
            var description = $("#deposit_description").val();
            var details = $("#deposit_details").val();
            if(amount == "" || description == "" || details == "")
            {
                $("#loader").addClass('hide');
                $(".main-c").removeClass('hide');
                alert('please enter the values');
                return false;
            }
            var deposit_form_data = $("#deposit_form").serializeArray();
            $.ajax({
                    url: "credit",
                    type: "POST",
                    data: {deposit_form_data:deposit_form_data},
                    dataType: "JSON",
                    success: function (data) 
                    {
                        $("#loader").addClass('hide');
                        $(".main-c").removeClass('hide');
                        $('#deposit_form').trigger("reset");
                        swal({
                            title: "Successfull deposit!",
                            text: "",
                            icon: "success",
                            button: "OK",
                        });
 
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
        });    
        $("#transfer_btn").click(function(){

            $("#loader").removeClass('hide');
            $(".main-c").addClass('hide');
            var transfer_id = $("#transfer_id").attr("data-val");
            var amount = $("#transfer_amount").val();
            var description = $("#transfer_description").val();
            var details = $("#transfer_details").val();
            if(transfer_id == "" || amount == "" || description == "" || details == "")
            {
                $("#loader").addClass('hide');
                $(".main-c").removeClass('hide');
                alert("please enter the values");
                return false;
            }
            var transfer_form_data = $("#transfer_form").serializeArray();
            console.log(transfer_form_data);
            $.ajax({
                    url: "transfer",
                    type: "POST",
                    data: {transfer_form_data:transfer_form_data,transfer_id:transfer_id},
                    dataType: "JSON",
                    success: function (data) 
                    {
                        $("#loader").addClass('hide');
                        $(".main-c").removeClass('hide');
                        if(data['error'] == 0)
                        {
                            $('#transfer_form').trigger("reset");
                            swal({
                                title: "Successfull Transfered!",
                                text: "",
                                icon: "success",
                                button: "OK",
                            });
                        }
                        else
                        {
                            swal({
                                title: "You have not enough amount to be transfered!",
                                text: "",
                                icon: "error",
                                button: "OK",
                            }); 
                        }
 
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
        });
        // $("#transfer_id").on('change', function (e) {
        //     var image_name = $('#transfer_id').find(":selected").attr('data-value');
        //     $("#user_image").attr('src',"{{asset('uploads/avatars')}}/"+image_name);
        // });
        $("#button-addon2").on('click', function (e) {
            var email = $('#transfer_id').val();
            $.ajax({
                    url: "getEmailBasedData",
                    type: "POST",
                    data: {email:email},
                    dataType: "JSON",
                    success: function (data) 
                    {
                        $("#transfer_id").attr("data-val",data['res'][0]['id']);
                        $("#user_image").attr('src',"{{asset('uploads/avatars')}}/"+data['res'][0]['avatar']);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
        });
    });
    function getNamesIdsList()
    {
        $.ajax({
                    url: "getIdNameList",
                    type: "POST",
                    data: {},
                    dataType: "JSON",
                    success: function (data) 
                    {
                        console.log(data['opts']);
                        $("#transfer_id").html(data['opts']);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
    }
</script>
@endsection