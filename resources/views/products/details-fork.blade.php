@extends('layouts.main')

@section('content')
<main class="page-products-subcategory">

    <section class="general-header">
        @if( !is_null($productFamily->desktop_header_video) && !is_null($productFamily->mobile_header_video) )
        <div class="video-bk">
            <video src="{{ $agent->isMobile() ? asset($productFamily->mobile_header_video) : asset($productFamily->desktop_header_video) }}" class="{{ $agent->isMobile() ? 'mobile' : '' }}" autoplay muted loop></video>
        </div>
        @else
        <div class="image-bk">
            <img src="{{ $agent->isMobile() ? asset($productFamily->mobile_header_image) : asset($productFamily->desktop_header_image) }}" alt="{{ $productFamily->title }}">
        </div>
        @endif
    </section>

    <div class="internal-content">
        <section class="products-subcategory-section">
            <div class="wrap">
                <div class="main-title"><h1>{{ $productFamily->title }}</h1></div>

                <ul class="subcategory-products-list">
                @foreach($productFamily->productSubfamily()->get() as $productSubfamily)
                    <li class="boton"><a href="{{ route('product.subfamily.details', [$productFamily->slug, $productSubfamily->slug]) }}">{{ $productSubfamily->title }}<span class="icon"></span></a></li>
                @endforeach
                </ul>
            </div>
        </section>
    </div>

</main>
@endsection
