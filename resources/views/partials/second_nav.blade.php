<?php
use Illuminate\Support\Facades\DB;
$site_info = DB::table('site_info')->get();
$info_element_array = array();
foreach ($site_info as $info_element){
    $info_element_array[$info_element->attr_name] = $info_element->attr_value;
}
?>
  
<div class="second-nav bg-dark mb-3" style="background-image: url('/uploads/avatars/{{$info_element_array['header_right_pic']}}'); background-size: cover;">
    
    <div class="container pb-3">
        <div class="row">
            <div class="col-md-4">
                <h5 class="pt-4" style="color: #000!important; font-style: italic;">{{$info_element_array['site_slogan']}}</h5>
               <!-- <p style="color: #000!important; font-style: italic;">{ {$info_element_array['site_slogan']}}</p> -->
            </div>
            <div class="col-md-8">
                <img class="mt-4" src="{{ asset('img/logo.png') }}" alt="" style="height:80px; width:100px;">
                <img class="mt-4" src="{{ asset('img/logo.png') }}" alt="" style="height:80px; width:100px;">
                <img class="mt-4" src="{{ asset('img/logo.png') }}" alt="" style="height:80px; width:100px;">

            </div>
        </div>
    </div>
</div>

