<div class="row">
    <div class="col-md-4">
        <div class="d-inline-block" id="user-profile-img">
            <img src="{{ asset('img/logo.png') }}" alt="User Profile">
        </div>
        <div class="d-inline-block">
            <h6 class="mr-2">{{ $buyer->user->name }}</h6>
        </div>
        <div class="d-inline-block">
            <a href="#"><i class="fas fa-comments fa-1x"></i></a>
        </div>
        <footer class="blockquote-footer">{{ date('M j, Y', strtotime($buyer->created_at)) }}</footer>
        <div id="item-image">
            <img src="{{ asset('uploads/buyer/' . $buyer->buyer_featured_image) }}">
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
            <h5>Code: {{ $buyer->buyer_item_code }}</h5>
            <h6 class="float-left">Want to buy</h6>
            <h6 class="float-right">Weight</h6>
        </div>
        <div class="product-details w-100 mt-5">
            <h2 class="mb-3">${{ $buyer->buyer_sale_price }} </h2>
            <a href="http://www.{{ $buyer->buyer_website }}" target="_blank" class="btn btn-default btn-lg btn-block border-0">
                <i class="fas fa-location-arrow mr-2"></i>  {{ $buyer->buyer_website }}
            </a>
            <h3 class="mt-5 mb-3">{{ $buyer->buyer_pro_title }} </h3>
            <p>{{ $buyer->buyer_pro_description }}</p>
        </div>
        <p class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $buyer->buyer_location }}</p>
    </div>
    <div class="col-md-4">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Order No: {{ $buyer->buyer_item_code }}" aria-label="Search">
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
            <select class="custom-select">
                <option selected>Choose..</option>
                <option value="order_received">Order Received</option>
                <option value="in_process">In process</option>
                <option value="delivered">Delivered</option>
                <option value="waiting_for_rating">Waiting for rating</option>
                <option value="disput">Disput</option>
                <option value="closed">Closed</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <hr>
        <div class="row">
            <div class="col-md-2 mt-2"></div>
            <div class="col-md-8 mt-2"></div>
            <div class="col-md-2 mt-2">
                <a href="#" class="btn btn-success btn-block float-right">Submit</a>
            </div>
        </div>
    </div>

</div>
