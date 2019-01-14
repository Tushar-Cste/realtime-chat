@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="columns">
            @foreach ($posts as $post)   
                @if ($post -> post_type == "buyer")
                    <?php 
                        $buyer = App\Buyer::where('id',$post->post_id)->get()->first();
                        if(!empty($seller)){
                    ?>
                    <figure class="share-save-icon">
                        <img class="share-save-icon-buyr w-4"  style="" src="{{asset('img/' . 'referrer.png')}}">
                        <img id="{{$buyer->id}}" data-value="{{$id}}" data-value1="buyer" class="share-save-icon-buyr w-4 m-2-45"  style="" src="{{asset('img/' . 'save3.jpg')}}">
                        <a href="{{ route('buyer.show', $buyer->id) }}">
                                    <img src="{{ asset('uploads/buyer/' . $buyer->buyer_featured_image) }}">
                                    <figcaption><strong>{{ $buyer->buyer_pro_title }}</strong></figcaption>
                                    <figcaption class="mt-2"><small class="text-muted">{{ date('M j, Y', strtotime($buyer->created_at)) }}</small></figcaption>
                                    <figcaption class="float-left"><small class="text-muted"><strong>Buy</strong></small></figcaption>
                        </a>
                    </figure>
                    <?php } ?>
                @elseif($post -> post_type == "seller")
                    <?php 
                        $seller = App\Seller::where('id',$post->post_id)->get()->first();
                        if(!empty($seller)){
                    ?>
                    <figure class="share-save-icon">
                    <img class="share-save-icon-buyr w-4" src="{{asset('img/' . 'referrer.png')}}">
                        <img id="{{$seller->id}}" data-value="{{$id}}" data-value1="seller" class="share-save-icon-buyr w-4 m-2-45"  style="" src="{{asset('img/' . 'save3.jpg')}}">
                    <a href="{{ route('seller.show', $seller->id) }}">
                                <img src="{{ asset('uploads/seller/' . $seller->seller_featured_image) }}">
                                <figcaption><strong>{{ $seller->seller_pro_title }}</strong></figcaption>
                                <figcaption class="mt-2"><small class="text-muted">{{ date('M j, Y', strtotime($seller->created_at)) }}</small></figcaption>
                                <figcaption class="float-left"><small class="text-muted"><strong>Sell</strong></small></figcaption>
                            </a>
                    </figure>
                    <?php } ?>
                @else
                    <?php 
                        $article = App\Article::where('id',$post->post_id)->get()->first();
                        if(!empty($article)){
                    ?>
                    <figure class="share-save-icon">
                    <img class="share-save-icon-buyr w-4" src="{{asset('img/' . 'referrer.png')}}">
                    <img id="{{$article->id}}" data-value="{{$id}}" data-value1="article" class="share-save-icon-buyr w-4 m-2-45"  style="" src="{{asset('img/' . 'save3.jpg')}}">
                        <a href="{{ route('article.show', $article->id) }}">
                            <img src="{{ asset('uploads/article/' . $article->article_featured_image) }}">
                            <figcaption><strong>{{ $article->article_title }}</strong></figcaption>
                            <figcaption class="mt-2"><small class="text-muted">{{ date('M j, Y', strtotime($article->created_at)) }}</small></figcaption>
                            <figcaption class="float-left"><small class="text-muted"><strong>Article</strong></small></figcaption>
                        </a>
                    </figure>
                        <?php } ?>
                @endif
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-JS')
    <script>
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".share-save-icon-buyr").click(function()
            {
                var user_id = $(this).attr("data-value");
                var post_id =  $(this).attr("id");
                var post_type =  $(this).attr("data-value1");
                var status = 0;
                $.ajax({
                            url: "SavePost",
                            type: "POST",
                            data: {user_id : user_id, post_id:post_id, post_type:post_type,status:status},
                            dataType: "JSON",
                            success: function (data) {
                                    console.log(data); 
                                    location.reload();
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    alert(errorThrown);
                                }
                        });
            });
    </script>
@endsection
