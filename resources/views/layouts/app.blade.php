<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
    }
    .text-white{
    }
    .look-like-btn{
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none !important;
        cursor: pointer !important;
        overflow: hidden;
        color: #364759;
        box-shadow: none !important;
    }
</style>
@include('partials.head')
<?php
use Illuminate\Support\Facades\DB;
$site_info = DB::table('site_info')->get();
$info_element_array = array();
foreach ($site_info as $info_element){
    $info_element_array[$info_element->attr_name] = $info_element->attr_value;
}
?>
<body style="background: url('/uploads/avatars/{{$info_element_array['above_footer_pic']}}'); background-size: cover;">
    @include('partials.nav')
    <div class="container text-center">
      @include('partials.alert')
    </div>
    @include('partials.second_nav')
    @php
        $currentPage = 'otherpages';
    $adsUserId = 0;
    @endphp
    @if ($controller == 'UserController')
        @php
            $currentPage = 'profile';
        $adsUserId = $user->id;
                @endphp
    @endif
    <div class="row adsMargin position-relative">
        <div class="col-md-12">
            <div class="">
            <div class="row">
            @php
                $topAds       = \App\library\SiteHelper::getTopAds($currentPage,$adsUserId);
                $countTopAdds = (sizeof($topAds));
             
            
            @endphp
            <?php 
                if($countTopAdds == 0)
                {
                    $countTopAdds = 1;
                }
                $numberOfCols  = 12/$countTopAdds;
            ?>
            @foreach($topAds as $topAd)
            <div class="col-md-<?php echo $numberOfCols ?>">
                <div class="adsContent">
                    @if($topAd->adds_type == 'image')
                    <a class="adsLink" href="{{ 'http://'.$topAd->image_link }}" target="_blank" >
                        <img src="{{ asset('/uploads/adsImages/'.$topAd->image) }}" class="adsImage">
                    </a>
                    @elseif($topAd->adds_type == 'embed_code')
                        <?php echo $topAd->embed_code ?>
                    @elseif($topAd->adds_type == 'referral_code')
                        {{ $topAd->referral_code }}
                        @else
                    @endif
                </div>
            </div>
            @endforeach
        </div>
            </div>
        </div>
        <div class="col-md-1 ads-position-absolute-left">
            <div class="row" style="height:300px;width:159px;">
                @php
                    $leftAds = \App\library\SiteHelper::getLeftAds($currentPage,$adsUserId);
                @endphp
                @foreach($leftAds as $leftAd)
                    <div class="col-md-12">
                        <div class="adsContent">
                            @if($leftAd->adds_type == 'image')
                                <a class="adsLink" href="{{ 'http://'.$leftAd->image_link }}" target="_blank" >
                                    <img src="{{ asset('/uploads/adsImages/'.$leftAd->image) }}" class="adsImage" style="height:300px;">
                                </a>
                            @elseif($leftAd->adds_type == 'embed_code')
                                <?php echo $leftAd->embed_code ?>
                            @elseif($leftAd->adds_type == 'referral_code')
                                {{ $leftAd->referral_code }}
                            @else
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-1 ads-position-absolute-right">
            <div class="row" style="height:300px;width:159px;">
                @php
                    $rightAds = \App\library\SiteHelper::getRightAds($currentPage,$adsUserId);
                @endphp
                @foreach($rightAds as $rightAd)
                    <div class="col-md-12">
                        <div class="adsContent">
                            @if($rightAd->adds_type == 'image')
                                <a class="adsLink" href="{{ 'http://'.$rightAd->image_link }}" target="_blank" >
                                    <img src="{{ asset('/uploads/adsImages/'.$rightAd->image) }}" class="adsImage" style="height:300px">
                                </a>
                            @elseif($rightAd->adds_type == 'embed_code')
                                <?php echo $rightAd->embed_code ?>
                            @elseif($rightAd->adds_type == 'referral_code')
                                {{ $rightAd->referral_code }}
                            @else
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @php
       
        $popupAds = \App\library\SiteHelper::getPopupAds($currentPage,$adsUserId);
    @endphp
    @if($popupAds->count() > 0)
    <div id="open-modal" class="modal-window modal-sm" style="display: block;padding:0px;">
        <div>
            <div class="closebtnarea" align="right"><i title="Close" onclick="$('#open-modal').hide('slow');" class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i> </div><br>
            <div class="container">
                <div class="">
                    @foreach($popupAds as $popupAd)
                    <div class="col-md-12 margin-bottom-15" style="padding-right: 10px;padding-bottom: 10px;padding-left: 10px;">
                        <div class="adsContent">
                            @if($popupAd->adds_type == 'image')
                                <a class="adsLink" href="{{ 'http://'.$popupAd->image_link }}" target="_blank" >
                                    <img src="{{ asset('/uploads/adsImages/'.$popupAd->image) }}" class="adsImage" style="height:300px;border-radius: 10px;">
                                </a>
                            @elseif($popupAd->adds_type == 'embed_code')
                                <?php echo $popupAd->embed_code ?>
                            @elseif($popupAd->adds_type == 'referral_code')
                                {{ $popupAd->referral_code }}
                            @else
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    @yield('content')

    <div class="row adsMargin">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    @php
                        $bottomAds = \App\library\SiteHelper::getBottomAds($currentPage,$adsUserId);
                        $countBottomAdds = (sizeof($bottomAds));
                    @endphp
                    <?php 
                        if($countBottomAdds == 0)
                        {
                            $countBottomAdds = 1;
                        }
                        $numberOfBottomCols  = 12/$countBottomAdds;
                    ?>
                    @foreach($bottomAds as $bottomAd)
                        <div class="col-md-<?php echo $numberOfBottomCols; ?>">
                            <div class="adsContent">
                                @if($bottomAd->adds_type == 'image')
                                    <a class="adsLink" href="{{ 'http://'.$bottomAd->image_link }}" target="_blank" >
                                        <img src="{{ asset('/uploads/adsImages/'.$bottomAd->image) }}" class="adsImage">
                                    </a>
                                @elseif($bottomAd->adds_type == 'embed_code')
                                    <?php echo $bottomAd->embed_code ?>
                                @elseif($bottomAd->adds_type == 'referral_code')
                                    {{ $bottomAd->referral_code }}
                                @else
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
    @include('partials.filter-modal')
    @include('partials.JS')
    <div class="footer" style="background-image: url('/uploads/avatars/{{$info_element_array['footer_pic']}}'); min-height: 30px; background-size: cover;">
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
    $(function(){
        //$('#open-modal').modal('show');
    })
</script>
</body>
</html>
