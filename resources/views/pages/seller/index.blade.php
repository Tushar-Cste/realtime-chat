@extends('layouts.app')

@section('content')
<div id="columns">
  @foreach ($sellers as $seller)
  <figure>
     <a href="{{ route('seller.show', $seller->id) }}">
          <img src="{{ asset('uploads/seller/' . $seller->seller_featured_image) }}">
          <figcaption><strong>{{ $seller->seller_pro_title }}</strong></figcaption>
          <figcaption><small class="text-muted">{{ date('M j, Y', strtotime($seller->created_at)) }}</small></figcaption>
      </a>
  </figure>
  @endforeach
</div>

    @include('partials.cal-modal')
@endsection

@section('extra-JS')

@endsection
