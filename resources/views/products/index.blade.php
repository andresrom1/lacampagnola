@extends('layouts.main')

@section('title', '- Productos')
@section('description', 'Desde hace más de 100 años, los productos La Campagnola son elaborados con los más altos estándares de calidad para acompañar la mesa familiar argentina.')

@section('content')
<main class="page-products-home">

    <section class="general-header">
        <div class="image-bk">
            <img src="{{ asset('assets/images/producto-home-header.jpg') }}" srcset="{{ asset('assets/images/producto-home-header@2x.jpg') }} 2x" alt="producto-home-header" class="mobile">
            <img src="{{ asset('assets/images/producto-home-header-d.jpg') }}" srcset="{{ asset('assets/images/producto-home-header-d@2x.jpg') }} 2x" alt="producto-home-header" class="desktop">
        </div>
    </section>

    <div class="internal-content">
        <section class="products-family-section">
            <div class="wrap">
                <div class="main-title"><h1>conocé nuestra <br>familia de productos</h1></div>
                <span class="separator"></span>
                <ul class="family-products-list">
                    @foreach($productFamilies as $productFamily)
                    <li class="producto">
                        <a href="{{ $productFamily->productSubfamily()->exists() ? route('product.subfamily', [$productFamily->slug, $productFamily->productSubfamily->slug]) : route('product.details', $productFamily->slug) }}">
                            <div class="producto-name">
                                <h3>{{ $productFamily->title }}</h3>
                            </div>
                            @if( !is_null($productFamily->icon_image) )
                            <div class="image-content">
                                <div class="image-content-mask" ><img src="{{ asset($productFamily->icon_image) }}" alt="{{ $productFamily->title }}"></div>
                            </div>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>


			<section class="banner-hashtag-section cocina">
                <div class="wrap">
                    <div class="txt-content">
                        <h3>Conocé nuestras recetas en:</h3>
                        <h2 class="hashtag-name"><a target="_blank" href="https://www.instagram.com/cocinalacampagnola/"><span>@</span>COCINALACAMPAGNOLA</a></h2>
                    </div>
                </div>
                <div class="banner-bk">
                    <img src="{{ asset('assets/images/IG_frutas-banner-1920x300.jpg') }}" srcset="{{ asset('assets/images/IG_frutas-banner-1920x300.jpg') }} 2x" alt="hashtag-banner-bk" class="mobile">
                    <img src="{{ asset('assets/images/IG_frutas-banner-1920x300.jpg') }}" srcset="{{ asset('assets/images/IG_frutas-banner-1920x300.jpg') }} 2x" alt="hashtag-banner-bk" class="desktop">
                </div>
            </section>

        </section>
    </div>

</main>
@endsection
