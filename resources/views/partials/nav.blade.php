<?php
use Illuminate\Support\Facades\DB;
$site_info = DB::table('site_info')->get();
$info_element_array = array();
foreach ($site_info as $info_element){
    $info_element_array[$info_element->attr_name] = $info_element->attr_value;
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image: url('/uploads/avatars/{{$info_element_array['header_right_pic']}}'); background-size: cover;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/uploads/avatars/{{$info_element_array['header_left_pic']}}" alt="Brand Logo" style="height: 50px;"> {{$info_element_array['site_name']}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="far fa-user-circle fa-2x"></i>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown" style="margin-top:9px;!important">
                                    <button class="btn btn-default dropdown-toggle look-like-btn" type="button" data-toggle="dropdown">More
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu p-l-12">
                                        <li><a href="#" style="text-decoration: none;">About Us</a></li>
                                        <li><a href="#" style="text-decoration: none;">Help</a></li>
                                        <li><a href="{{ URL('/upcoming_services') }}" style="text-decoration: none;">Upcoming Services</a></li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <!-- <li class="nav-item mt-4">
                                <a class="nav-link" href="{{ route('login') }}">
                                   <i class="fas fa-signal fa-1x"></i>
                                   Sort
                                </a>
                            </li> -->
                            <li class="nav-item mt-4">
                                <a class="nav-link" href="{{ route('login') }}"
                                data-toggle="modal" data-target="#filter-modal">
                                   <i class="fas fa-sliders-h fa-1x"></i>
                                   Filters
                                </a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link" href="{{ route('chatdashboard') }}">
                                    <i class="fas fa-comments fa-1x"></i>
                                    Chat
                                </a>
                            </li>

                            <li class="nav-item mt-4">
                                <a class="nav-link" href="{{ URL('/saved_posts') }}">
                                    <i class="fas fa-star fa-1x"></i>
                                    Saved
                                </a>
                            </li>
                            <li class="nav-item dropdown mt-4">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-plus-circle fa-1x"></i> Post<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('buyer.create') }}">
                                        Want to buy
                                    </a>
                                    <a class="dropdown-item" href="{{ route('seller.create') }}">
                                        Want to Sell
                                    </a>
                                    <a class="dropdown-item" href="{{ route('article.create') }}">
                                        Article Post
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown mt-4">
                              @if (Auth::user()->avatar)
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                style="position:relative; padding-left:50px;">
                                    {{ Auth::user()->name }}
                                    <img src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}" style="width:32px; height:32px; position:absolute; top:0px; left:10px; border-radius:50%">
                                     <span class="caret"></span>
                                </a>
                                @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                style="position:relative; padding-left:50px;">
                                    {{ Auth::user()->name }}
                                    <img src="{{ asset('img/default.png') }}" style="width:32px; height:32px; position:absolute; top:0px; left:10px; border-radius:50%">
                                     <span class="caret"></span>
                                </a>
                                @endif
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ URL('/profile') }}">
                                         Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ URL('/my_posts') }}">
                                        My Post
                                    </a>
                                    <a class="dropdown-item" href="{{ route('order') }}">
                                        My Order
                                    </a>
                                    <a class="dropdown-item" href="{{ route('coupons') }}">
                                        Coupon
                                    </a>
                                    <a class="dropdown-item" href="{{ route('wallet') }}">
                                         Wallet
                                    </a>
                                    <a class="dropdown-item" href="{{ route('AdvertisementPage') }}">
                                        Advertisement
                                    </a>
                                    <?php
                                    if (Auth::user()) {
                                    $login_user_id = Auth::user()->id;
                                    $users_manus = DB::table('menu_options')
                                            ->join('user_menu', 'user_menu.menu_options_id', '=', 'menu_options.id')
                                            ->where('user_menu.user_id', $login_user_id)->get();
                                        foreach ($users_manus as $users_manu){
                                    ?>
                                    <a class="dropdown-item" href="<?php echo $users_manu->link; ?>"><?php echo $users_manu->name; ?></a>
                                    <?php
                                    }
                                    }
                                    ?>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown m-t-25">
                                    <button class="btn btn-default dropdown-toggle look-like-btn" type="button" data-toggle="dropdown">More
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu p-l-12">
                                        <li><a href="#" style="text-decoration: none;">About Us</a></li>
                                        <li><a href="#" style="text-decoration: none;">Help</a></li>
                                        <li><a href="{{ URL('/upcoming_services') }}" style="text-decoration: none;">Upcoming Services</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                <!-- <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">More
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li>About Us</li>
                        <li>Help Us</li>
                        <li>Upcoming Services</li>
                    </ul>
                </div> -->
            </div>
        </nav>
       
