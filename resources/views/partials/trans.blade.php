
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
           