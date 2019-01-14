@extends('layouts.app')
@section('custom-styles')
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-formhelpers.min.css') }}">
@section('content')
<section id="wallet">
  <div class="container mt-5">
    <div class="col-md-10 offset-md-1 mt-2">
      <div class="card shadow-lg">
        <div class="card-title mt-3">
          <div class="row col-md-12 p-r-0">
            <h4 class="display-4 col-md-5"><i class="fas fa-wallet"></i> Wallet</h4>
            <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center"><small class="text-muted">Current Balance</small></h5>
                  <p class="card-text text-center"><strong>$150.00</strong></p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center"><small class="text-muted">Available Balance</small></h5>
                  <p class="card-text text-center"><strong>${{$total_balance_remained}}</strong></p>
                </div>
              </div>
            </div>
            <div class="col-md-1 p-r-0">
            <a href="{{ URL('/home') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="row col-md-6">
              <div class="col-md-4">
                <div class="bfh-datepicker" id="start_date">
                  <input type="text" class="form-control bfh-datepicker">
                </div>
              </div>
              <div class="col-md-4">
                <div class="bfh-datepicker" id="end_date">
                  <input type="text" class="form-control bfh-datepicker">
                </div>
              </div>
              <div class="col-md-2 mb-2">
                <button type="submit" class="btn btn-success" id="apply">
                    {{ __('Apply') }}
                </button>
              </div>
            </div>
            <div class="row col-md-6">
              <div class="col-md-5 mb-2">
                <button type="button" class="btn btn-success btn-block">DEPOSIT
                  <i class="fas fa-download"></i>
                </button>
              </div>
              <div class="col-md-5 mb-2">
                <button type="button" class="btn btn-primary btn-block">WITHDRAW
                  <i class="fas fa-upload"></i>
                </button>
              </div>
              <div class="col-md-2 text-center mt-2">
                <a href="#" id="print"><i class="fas fa-print fa-2x"></i></a>
              </div>
            </div>
            <div class="col-md-12 mt-5" id="trans">
              <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" id="first">
                      <span aria-hidden="true">&laquo;</span>
                      <span>First</span>
                    </a>
                  </li>
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&laquo;</span>
                      <span>Previous</span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span>Next</span>
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <hr>
              <div class="row pl-4 d-flex">
                <div class="col-md-2">
                  <p><small><strong>Date <i class="fas fa-caret-down"></i></strong></small></p>
                </div>
                <div class="col-md-2">
                  <p><small><strong>Descriptions <i class="fas fa-caret-down"></i></strong></small></p>
                </div>
                <div class="col-md-8 float-right">
                  <div class="form-group row">
                    <div class="col-md-4">
                      <p><small><strong>Desposits/Credits <i class="fas fa-caret-down"></i></strong></small></p>
                    </div>
                    <div class="col-md-4">
                      <p><small><strong>Withdrawals/Debits <i class="fas fa-caret-down"></i></strong></small></p>
                    </div>
                    <div class="col-md-4">
                      <p><small><strong>Ending Daily Balance</strong></small></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card border-0 mb-0 p-0">
                <div class="card-header card-header pl-4 pb-0">
                  <p><small><strong>Pending Transactions</strong></small></p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
                        $i = 1; 
                        foreach($pending_transactions as $key=>$value): 
                    ?>
                      <div class="col-md-4">
                        <div class="form-group row">
                          <div class="col-md-6">
                            <a class="text-secondary" data-toggle="collapse" href="#PendingDetails<?php echo $i; ?>" role="button" aria-expanded="false" aria-controls="collapseDetails">
                              <small><i class="fas fa-plus-circle"></i>{{$value['datwise']}}</small>
                            </a>
                          </div>
                          <div class="col-md-6">
                            <a class="text-secondary" href="#"><small>{{$value['description']}}</small></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group row">
                          <div class="col-md-4">
                            <p class="text-secondary"><small><?php echo ($value['type'] == 'cr' ? $value['amount'] : ''); ?></small></p>
                          </div>
                          <div class="col-md-4">
                            <p class="text-secondary"><small><?php echo ($value['type'] == 'db' ? $value['withdraw'] : ''); ?></small></p>
                          </div>
                          <div class="col-md-2">
                            <p class="text-secondary"><small></small></p>
                          </div>
                        </div>
                      </div>
                    <div class="col-md-12">
                      <div class="collapse" id="PendingDetails<?php echo $i; ?>">
                        <div class="card ">
                          <div class="card-header pt-4">
                            <h6 class="card-title"><strong>Details</strong></h6>
                          </div>
                          <div class="card-body">
                            <!-- @if(isset($orders) && $orders)
                                @foreach($orders as $order)
                                <span>ORDER ID: {{ $order->order_number}} </span><br>

                                <span>User ID: {{ $order->user_id }}</span><br>
                                <span>Type: </span><br>
                                <span>Status: </span><br>
                                <a href="#">More details</a>
                                @endforeach
                            @endif -->
                            <?php echo $value['details']; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>
                  </div>
                </div>
              </div>
              <div class="card border-0 mb-0 p-0">
                <div class="card-header card-header pl-4 pb-0">
                  <p><small><strong>Posted Transactions</strong></small></p>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
                        $j = 1; 
                        foreach($posted_transactions as $key=>$value): 
                    ?>
                    <div class="col-md-4">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <a class="text-secondary" data-toggle="collapse" href="#PostedDetails<?php echo $j; ?>" role="button" aria-expanded="false" aria-controls="collapseDetails">
                            <small><i class="fas fa-plus-circle"></i> {{$value['datwise']}}</small>
                          </a>
                        </div>
                        <div class="col-md-6">
                          <a class="text-secondary" href="#"><small>{{$value['description']}}</small></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group row">
                        <div class="col-md-4">
                          <p class="text-secondary"><small><?php echo ($value['type'] == 'cr' ? $value['amount'] : ''); ?></small></p>
                        </div>
                        <div class="col-md-4">
                          <p class="text-secondary"><small><?php echo ($value['type'] == 'db' ? $value['withdraw'] : ''); ?></small></p>
                        </div>
                        <div class="col-md-2">
                          <p class="text-secondary"><small></small></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="collapse" id="PostedDetails<?php echo $j; ?>">
                        <div class="card ">
                          <div class="card-header pt-4">
                            <h6 class="card-title"><strong>Details</strong></h6>
                          </div>
                          <div class="card-body">
                                <!-- @if(isset($orders) && $orders)
                                @foreach($orders as $order)
                                <span>ORDER ID: {{ $order->order_number}} </span><br>

                                <span>User ID: {{ $order->user_id }}</span><br>
                                <span>Type: </span><br>
                                <span>Status: </span><br>
                                <a href="#">More details</a>
                                @endforeach
                              @endif -->
                              <?php echo $value['details']; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php 
                        $j++;
                        endforeach; 
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="excel" class="hide">

  </div>
</section>
@endsection

@section('extra-JS')
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-formhelpers.min.js')}}"></script>
<script src="{{ asset('js/FileSaver.js') }}"></script>
<script src="{{ asset('js/Blob.js') }}"></script>
<script src="{{ asset('js/xlsx.core.min.js') }}"></script>
<script src="{{ asset('js/tableexport.js') }}"></script>
<script type="text/javascript">
  $('.bfh-datepicker').bfhdatepicker('toggle');
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $( document ).ready(function() 
    {
      $("#apply").click(function(){
        var start_date = $("#start_date").val();
        var end_date   = $("#end_date").val();
        $.ajax({
                    url: "getTransByDateRange",
                    type: "POST",
                    data: {start_date:start_date,end_date:end_date},
                    success: function (data) 
                    {
                      console.log(data);
                      $("#trans").html(data);
                        // console.log(data.trans.first_page_url);
                        // $("#first").attr("href",data.trans.first_page_url);
                        // swal({
                        //     title: "Successfull Recieved!",
                        //     text: "",
                        //     icon: "success",
                        //     button: "OK",
                        // });
 
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert(errorThrown);
                    }
                });
      });

      $("#print").click(function(e){
        e.preventDefault();
        var start_date = $("#start_date").val();
        var end_date   = $("#end_date").val();
        $.ajax({
            url: "moveToExcel",
            type: "POST",
            data: {start_date:start_date,end_date:end_date},
            success: function (data) 
            {
              $("#excel").html(data);
              $("#excel").tableExport(); 
              $(".xlsx" ).trigger( "click" );
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) 
            {
                alert(errorThrown);
            }
        });
      });
      $("#first").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
                    url: url,
                    type: "POST",
                    data: {},
                    dataType: "JSON",
                    success: function (data) 
                    {
                        
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
