@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col-md-8 offset-md-2 mt-3">
        <div class="card">
          <div class="card-header shadow-sm p-3 mb-1 bg-white rounded">
              <div class="float-left" id="user-profile-img">
                <img src="{{ asset('/uploads/photoId/' . $user->photo_id) }}" alt="User Profile"> {{ @$seller->user->name }}
              </div>
              <div class="float-right">
                <div class="col-md-12 mt-2">
                    <div class="review-block-rate-vistor">
                      <a href="#"><i class="fas fa-star" style="color:#ffc107;"></i></a>
                      <a href="#"><i class="fas fa-star" style="color:#ffc107;"></i></a>
                      <a href="#"><i class="fas fa-star" style="color:#ffc107;"></i></a>
                      <a href="#"><i class="fas fa-star" style="color:#ffc107;"></i></a>
                      <a href="#"><i class="fas fa-star" style="color:#ffc107;"></i></a>
                    </div>
                </div>
              </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  @if(Auth::user()->id == $seller->user_id)
                  <div class="col-md-6"></div>
                  <div class="form-group row col-md-6">
                    <div class="col-sm-5">
                      {!! Html::linkRoute('seller.edit', 'Edit', array($seller->id), array('class' =>
                         'btn btn-success btn-block')) !!}
                    </div>
                    <div class="col-sm-5">
                      {!! Form::open(['route' => ['seller.destroy', $seller->id], 'method' => 'DELETE']) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                      {!! Form::close() !!}
                    </div>
                    <div class="col-sm-2">
                      <a target="_blank" href="#">
                          <i class="fas fa-shopping-cart fa-2x"></i>
                      </a>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div id="item-image">
                    <img src="{{ asset('uploads/seller/' . $seller->seller_featured_image) }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-md-12">
                      <h6>Want to Sell</h6>
                      <h6>{{ $seller->seller_pro_title }}</h6>
                      <div class="d-inline-block">
                          <h6>Code: {{ $seller->seller_item_code }}</h6>
                      </div>
                      @if ($seller->seller_pro_weight)
                      <div class="d-inline-block float-right">
                          <h6>{{ $seller->seller_pro_weight }}LB</h6>
                      </div>
                      @endif
                      <br>
                      <div class="d-inline-block">
                          <h5><strong><del>${{ $seller->seller_org_price }}.00</del></strong></h5>
                      </div>
                      <div class="d-inline-block ml-5">
                          <h5><strong>${{ $seller->seller_sale_price }}.00</strong></h5>
                      </div>
                      <a href="http://www.{{ $seller->seller_website }}" target="_blank" class="btn btn-secondary btn-block border-0">
                          <i class="fas fa-location-arrow mr-2"></i>  {{ $seller->seller_website }}
                      </a>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h5>{{ $seller->seller_pro_title }}</h5>
                        <p><small><strong>{{ $seller->seller_pro_description }}</strong></small></p>
                    </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group row">
                  <div class="col-md-12 text-center ml-2">
                    <a target="_blank" href="#">
                        <i class="fas fa-star fa-2x"></i>
                    </a>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 text-center ml-2">
                    <a target="_blank" href="#">
                        <i class="fas fa-comments fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-8 offset-md-4">
                {!! Form::open(array('route' => ['sellerOrder', $seller->id], 'method' => 'PUT')) !!}
                  @csrf
                <input type="hidden" name="seller_status" value="1">
                <p class="mt-3 float-left"><i class="fas fa-map-marker-alt" value="Deliver to {{ $seller->seller_location }}"></i> Deliver to {{ $seller->buyer_location }}</p>
                @if(Auth::user()->id == $seller->user_id)
                <button type="button" class="btn btn-info btn-lg float-right" disabled>
                  <i class="fas fa-shopping-cart mr-2"></i>  Buy NOW
                </button>
                @else
                <input type="submit" value="Buy Now" class="btn btn-info btn-lg float-right">
                @endif
                {!! Form::close() !!}
              </div>
              <div class="col-md-12 text-center">
                <hr>
                <div class="social-links">
                    <ul class="list-inline mt-3">
                        <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                            <i class="fab fa-facebook-square fa-3x"></i>
                        </a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                            <i class="fab fa-twitter-square fa-3x"></i>
                        </a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                            <i class="fab fa-linkedin fa-3x"></i>
                        </a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                            <i class="fab fa-pinterest-square fa-3x"></i>
                        </a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                            <i class="fab fa-google-plus-square fa-3x"></i>
                        </a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                            <i class="fab fa-instagram fa-3x"></i>
                        </a></li>
                        <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                            <i class="fas fa-envelope fa-3x"></i>
                        </a></li>
                    </ul>
                </div>
                @if ($seller->seller_commission_percentage)
                <div class="col-md-8 offset-md-2">
                   <small><strong>{{ $seller->seller_commission_percentage }} referral </strong></small>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-4">
            <div class="d-inline-block" id="user-profile-img">
                <img src="{{ asset('img/logo.png') }}" alt="User Profile">
            </div>
            <div class="d-inline-block">
                <h6 class="mr-2">{{ @$seller->user->name }}</h6>
            </div>
            <div class="d-inline-block">
                <a href="#"><i class="fas fa-comments fa-1x"></i></a>
            </div>
            <footer class="blockquote-footer">{{ date('F nS, Y -g:iA', strtotime($seller->created_at)) }}</footer>
            <div id="item-image">
                <img src="{{ asset('uploads/seller/' . $seller->seller_featured_image) }}">
            </div>
            <div class="social-links">
                <ul class="list-inline mt-3">
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                        <i class="fab fa-facebook-square fa-3x"></i>
                    </a></li>
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                        <i class="fab fa-twitter-square fa-3x"></i>
                    </a></li>
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                        <i class="fab fa-linkedin fa-3x"></i>
                    </a></li>
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                        <i class="fab fa-pinterest-square fa-3x"></i>
                    </a></li>
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                        <i class="fab fa-google-plus-square fa-3x"></i>
                    </a></li>
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                        <i class="fab fa-instagram fa-3x"></i>
                    </a></li>
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="#">
                        <i class="fas fa-envelope fa-3x"></i>
                    </a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="basic-pro-info w-100 mt-2 mb-4">
                <h5>Code: {{ $seller->seller_item_code }}</h5>
                <h6 class="float-left">Want to sell - {{ $seller->seller_pro_title }}</h6>
                <h6 class="float-right">{{ $seller->seller_pro_weight }}LB</h6>
            </div>
            <div class="product-details w-100 mt-5">
                <h2 class="mb-3">${{ $seller->seller_sale_price }} </h2>
                <a href="http://www.{{ $seller->seller_website }}" target="_blank" class="btn btn-default btn-lg btn-block border-0">
                    <i class="fas fa-location-arrow mr-2"></i>  {{ $seller->seller_website }}
                </a>
                <h3 class="mt-5 mb-3">{{ $seller->seller_pro_title }} </h3>
                <p>{{ $seller->seller_pro_description }}</p>
            </div>
            <p class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $seller->seller_location }}</p>
        </div>
        <div class="col-md-4">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Order No: {{ $seller->item_code }}" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="col-md-12 mt-3">
                <div class="review-block-rate">
                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                        <i class="far fa-star"></i>
                    </button>
                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                        <i class="far fa-star"></i>
                    </button>
                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                        <i class="far fa-star"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                        <i class="far fa-star"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                        <i class="far fa-star"></i>
                    </button>
                </div>
            </div>
            <div class="card mt-3 mb-3" style="width: 18rem;">
                <div class="card-header">
                    Status
                </div>
                <select class="custom-select" multiple>
                    <option value="order_received">Order Received</option>
                    <option value="in_process">In process</option>
                    <option value="delivered">Delivered</option>
                    <option value="waiting_for_rating">Waiting for rating</option>
                    <option value="disput">Disput</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <div class="card mt-3 mb-3" style="width: 18rem;">
                <div class="card-header">
                    <h5><small class="text-muted">My hidden note</small></h5>
                </div>
                <div class="card-body">
                  <span>
                    <strong>Buy From:</strong> <a href="#">{{ $seller->seller_info_from }}</a>
                  </span>
                  <hr>
                  <span>
                    <strong>Buy Price:</strong> ${{ $seller->seller_info_price }}
                  </span>
                  <hr>
                  <span>
                    <strong>Description:</strong><br>
                    {{ substr(strip_tags($seller->seller_info_description), 0, 50) }}
                    {{ strlen(strip_tags($seller->seller_info_description)) > 50 ? "..." : ""}}
                  </span>

                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <hr>
            <div class="row">
                <div class="col-md-2 mt-2"></div>
                <div class="col-md-8 mt-2"></div>
                <div class="col-md-2 mt-2">
                    <a href="#" class="btn btn-success btn-block float-right">Submit</a>
                </div>
            </div>
        </div>

    </div> -->
</div>
@endsection

@section('extra-JS')

@endsection
