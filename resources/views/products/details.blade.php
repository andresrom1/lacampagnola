@extends('layouts.main')

@section('meta')
@if( isset($productSubfamily) && !is_null($productSubfamily) )
<!-- META -->
<meta name="title" content="{{ $productSubfamily->meta_title }}">
<meta name="description" content="{{ $productSubfamily->meta_description }}">
<meta name="keywords" content="{{ $productSubfamily->meta_keywords }}" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="{{ url()->full() }}">
<meta name="twitter:title" content="{{ $productSubfamily->meta_title }}">
<meta name="twitter:description" content="{{ $productSubfamily->meta_description }}">
<meta name="twitter:creator" content="La Campagnola">
{{-- Las imágenes de sumario de Twitter deben ser de al menos 200x200px --}}
<meta name="twitter:image" content="{{ !is_null($productSubfamily->desktop_header_image) ? asset($productSubfamily->desktop_header_image) : '' }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $productSubfamily->meta_title }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:image" content="{{ !is_null($productSubfamily->desktop_header_image) ? asset($productSubfamily->desktop_header_image) : '' }}" />
<meta property="og:description" content="{{ $productSubfamily->meta_description }}" />
<!-- END META -->
@else
<!-- META -->
<meta name="title" content="{{ $productFamily->meta_title }}">
<meta name="description" content="{{ $productFamily->meta_description }}">
<meta name="keywords" content="{{ $productFamily->meta_keywords }}" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="{{ url()->full() }}">
<meta name="twitter:title" content="{{ $productFamily->meta_title }}">
<meta name="twitter:description" content="{{ $productFamily->meta_description }}">
<meta name="twitter:creator" content="La Campagnola">
{{-- Las imágenes de sumario de Twitter deben ser de al menos 200x200px --}}
<meta name="twitter:image" content="{{ asset($productFamily->desktop_header_image) }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $productFamily->meta_title }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:image" content="{{ asset($productFamily->desktop_header_image) }}" />
<meta property="og:description" content="{{ $productFamily->meta_description }}" />
<!-- END META -->
@endif
@endsection

@section('content')
<main class="page-products-detail">

    @if( isset($productSubfamily) && !is_null($productSubfamily) )
    @if( (!is_null($productSubfamily->desktop_header_video) && !is_null($productSubfamily->mobile_header_video)) || (!is_null($productSubfamily->mobile_header_image) && !is_null($productSubfamily->desktop_header_image)) )
    <section class="general-header">
        @if( !is_null($productSubfamily->desktop_header_video) && !is_null($productSubfamily->mobile_header_video) )
        <div class="video-bk">
            <video src="{{ $agent->isMobile() ? asset($productSubfamily->mobile_header_video) : asset($productSubfamily->desktop_header_video) }}" class="{{ $agent->isMobile() ? 'mobile' : '' }}" autoplay muted loop></video>
        </div>
        @elseif( !is_null($productSubfamily->mobile_header_image) && !is_null($productSubfamily->desktop_header_image) )
        <div class="image-bk">
            <img src="{{ $agent->isMobile() ? asset($productSubfamily->mobile_header_image) : asset($productSubfamily->desktop_header_image) }}" alt="{{ $productSubfamily->title }}">
        </div>
        @endif
    </section>
    @endif
    @else
    @if( (!is_null($productFamily->desktop_header_video) && !is_null($productFamily->mobile_header_video)) || (!is_null($productFamily->mobile_header_image) && !is_null($productFamily->desktop_header_image)) )
    <section class="general-header">
        @if( !is_null($productFamily->desktop_header_video) && !is_null($productFamily->mobile_header_video) )
        <div class="video-bk">
            <video src="{{ $agent->isMobile() ? asset($productFamily->mobile_header_video) : asset($productFamily->desktop_header_video) }}" class="{{ $agent->isMobile() ? 'mobile' : '' }}" autoplay muted loop></video>
        </div>
        @elseif( !is_null($productFamily->mobile_header_image) && !is_null($productFamily->desktop_header_image) )
        <div class="image-bk">
            <img src="{{ $agent->isMobile() ? asset($productFamily->mobile_header_image) : asset($productFamily->desktop_header_image) }}" alt="{{ $productFamily->title }}">
        </div>
        @endif
    </section>
    @endif
    @endif

    <div class="internal-content">

        <section class="products-details-section">
            <div class="wrap">
                <div class="main-title"><h1>{{ $productFamily->title }}</h1></div>
				<div class="main-subtitle">{!! $productFamily->description !!}</div>
                <ul class="subcategory-products-list">
                    @foreach($products as $product)
                        <li itemscope itemtype="http://schema.org/IndividualProduct" class="product">
                            @if( !is_null($product->image) )
                            <div class="img-content">
                                <img itemprop="image" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                            </div>
                            @endif
                            <div class="name">
                                <h4 itemprop="name">{{ $product->title }}</h4>
                            </div>
                            @if( !is_null($product->presentation) )
                            <div class="detail">
                                <p>{{ $product->presentation }}</p>
                            </div>
                            @endif
                            @if( $product->tags()->count() > 0 )
                            <ul class="caracteristicas">
                                @foreach($product->tags()->get() as $tag)
                                <li>
                                    <span><img src="{{ asset($tag->icon_image) }}" alt="{{ $tag->title }}"></span>
                                    <p>{{ $tag->title }}</p>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        @if( isset($productSubfamily) && !is_null($productSubfamily) )
            @if( $productSubfamily->benefits()->count() > 0 )
            <section class="products-bondades-section">
                <div class="wrap">

                    <div class="main-subtitle big">
                        <span class="misc"></span>
                        <h2 class="txt">bondades</h2>
                        <span class="misc right"></span>
                    </div>

                    <ul class="bondades-products-list">
                        @foreach($productSubfamily->benefits()->get() as $benefit)
                        <li class="bondad">
                            @if( !is_null($benefit->image) )
                            <div class="icon-content">
                                <span class="icon">
                                    <img src="{{ asset($benefit->image) }}" alt="{{ $benefit->title }}">
                                </span>
                            </div>
                            @endif
                            <div class="name"><h4>{{ $benefit->title }}</h4></div>
                            @if( !is_null($benefit->short_description) )
                            <div class="detail">
                                <p>{{ $benefit->short_description }}</p>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>

                </div>
            </section>
            @endif
        @else
            @if( $productFamily->benefits()->count() > 0 )
            <section class="products-bondades-section">
                <div class="wrap">

                    <div class="main-subtitle big">
                        <span class="misc"></span>
                        <h2 class="txt">bondades</h2>
                        <span class="misc right"></span>
                    </div>

                    <ul class="bondades-products-list">
                        @foreach($productFamily->benefits()->get() as $benefit)
                        <li class="bondad">
                            @if( !is_null($benefit->image) )
                            <div class="icon-content">
                                <span class="icon">
                                    <img src="{{ asset($benefit->image) }}" alt="{{ $benefit->title }}">
                                </span>
                            </div>
                            @endif
                            <div class="name"><h4>{{ $benefit->title }}</h4></div>
                            @if( !is_null($benefit->short_description) )
                            <div class="detail">
                                <p>{{ $benefit->short_description }}</p>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>

                </div>
            </section>
            @endif
        @endif

        @if( $recipesWithProducts->count() )
        <section class="recetas-slider-section">
            <div class="wrap">
                <div class="main-subtitle">
                    <span class="misc"></span>
                    <h2 class="txt">recetas DE ESTE PRODUCTO</h2>
                    <span class="misc"></span>
                </div>
            </div>
            <div class="swiper-container recetas-slider-content">
                <ul class="swiper-wrapper recetas-slider">
                    @foreach($recipesWithProducts as $recipe)
                    <li itemscope itemtype="http://schema.org/Recipe" class="swiper-slide item receta">
                        <a itemprop="url" href="{{ route('recipe.details', $recipe->slug) }}">
                            @if( !is_null($recipe->icon_image) )
                            <div class="image-content">
                                <div class="image-content-mask" ><img itemprop="image" src="{{ asset($recipe->icon_image) }}" alt="{{ $recipe->title }}"></div>
                            </div>
                            @endif
                            <div class="receta-name">
                                <h3 itemprop="name">{{ $recipe->title }}</h3>
                            </div>
                            @if( $recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->count() > 0 )
                            <ul class="caracteristicas">
                                @foreach($recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->get() as $tagRecipe)
                                <li>
                                    <span><img src="{{ asset($tagRecipe->icon_image) }}" alt="{{ $tagRecipe->title }}"></span>
                                    <p itemprop="recipeCategory">{{ $tagRecipe->title }}</p>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="swiper-button-content">
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </section>
        @endif

    </div>






</main>
@endsection
