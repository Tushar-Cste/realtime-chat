@extends('layouts.app')

@section('content')
<div id="columns">
    @foreach ($buyers as $buyer)
    <figure>
       <a href="{{ route('buyer.show', $buyer->id) }}">
            <img src="{{ asset('uploads/buyer/' . $buyer->buyer_featured_image) }}">
            <figcaption><strong>{{ $buyer->buyer_pro_title }}</strong></figcaption>
            <figcaption><small class="text-muted">{{ date('M j, Y', strtotime($buyer->created_at)) }}</small></figcaption>
        </a>
    </figure>
    @endforeach
</div>

    @include('partials.cal-modal')
@endsection

@section('extra-JS')

@endsection
