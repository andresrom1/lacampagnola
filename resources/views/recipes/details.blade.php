@extends('layouts.main')

@section('meta')
<!-- META -->
<meta name="title" content="{{ $recipe->meta_title }}">
<meta name="description" content="{{ $recipe->meta_description }}">
<meta name="keywords" content="{{ $recipe->meta_keywords }}" />

@php
    $metaImage = null;
    foreach($recipe->images as $image) {
        $metaImage = $image;
        break;
    }
@endphp

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="{{ url()->full() }}">
<meta name="twitter:title" content="{{ $recipe->meta_title }}">
<meta name="twitter:description" content="{{ $recipe->meta_description }}">
<meta name="twitter:creator" content="La Campagnola">
{{-- Las imágenes de sumario de Twitter deben ser de al menos 200x200px --}}
<meta name="twitter:image" content="{{ !is_null($recipe->images) ? asset($metaImage) : '' }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $recipe->meta_title }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:image" content="{{ !is_null($recipe->images) ? asset($metaImage) : '' }}" />
<meta property="og:description" content="{{ $recipe->meta_description }}" />
<!-- END META -->
@endsection

@section('content')

<main class="page-recipes-detail" itemscope itemtype="http://schema.org/Recipe">

    <section class="slider-header">
        <div class="swiper-container recetas-header-slider-content">
            <ul class="swiper-wrapper recetas-header-slider">
                @foreach($recipe->images as $image)
                <li class="swiper-slide item recetas-bk">
                    <div class="image-bk">
                        <img itemprop="image" src="{{ asset($image) }}" alt="{{ $recipe->title }}">
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="swiper-pagination"></div>
        </div>
        @if( !is_null($recipe->youtube_video) )
        <a href="{{ $recipe->youtube_video->url }}" class="btn" data-lity="" itemprop="embedUrl" >ver video de receta</a>
        @endif
    </section>

    <div class="internal-content">

        <section class="recipes-caracteristicas-section">
            <div class="wrap">
                <div class="main-title"><h1 itemprop="name">{{ $recipe->title }}</h1></div>
                @if( $recipe->tags()->count() > 0 )
                <ul class="caracteristicas">
                    @foreach($recipe->tags()->get() as $tag)
                    <li>
                        @if( !is_null($tag->icon_image) )
                        <span><img src="{{ asset($tag->icon_image) }}" alt="{{ $tag->title }}"></span>
                        @endif
                        <p itemprop="keywords">{{ $tag->title }}</p>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </section>

        @if( !is_null($recipe->ingredients) )
        <section class="recipes-ingredientes-section">
            <div class="wrap">
                <div class="main-subtitle big">
                    <span class="misc"></span>
                    <h2 class="txt">Ingredientes</h2>
                    <span class="misc right"></span>
                </div>
                <div class="ingredientes-list" itemprop="recipeIngredient">{!! $recipe->ingredients !!}</div>
		<a href="{{ route('recipes.generate-image', $recipe->slug) }}" class="btn">descargar lista</a>
            </div>
        </section>
        @endif

        @if( !is_null($recipe->preparation) )
        <section class="recipes-preparacion-section">
            <div class="wrap">
                <div class="main-subtitle big">
                    <span class="misc"></span>
                    <h2 class="txt">preparación</h2>
                    <span class="misc right"></span>
                </div>
                <div class="preparation-list" itemprop="recipeInstructions">{!! $recipe->preparation !!}</div>
            </div>
        </section>
        @endif

        @if( $recipe->products()->count() > 0 )
        <section class="productos-slider-section">
            <div class="wrap">
                <div class="main-subtitle">
                    <span class="misc"></span>
                    <h2 class="txt">productos relacionados</h2>
                    <span class="misc"></span>
                </div>
            </div>
            <div class="swiper-container productos-slider-content">
                <ul class="swiper-wrapper productos-slider">
                    @foreach($recipe->products()->get() as $product)
                    <li class="swiper-slide item producto">
                        <a href="{{ route('product.details', $product->productFamily->slug) }}">
                            <div class="image-content">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                            </div>
                            <div class="receta-name">
                                <h3>{{ $product->title }}</h3>
                            </div>
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
                        </a>
                    </li>
                    @endforeach
                </ul>
                <!-- If we need pagination -->
                <!-- <div class="swiper-pagination"></div> -->
                <!-- If we need navigation buttons -->
                <!-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> -->
            </div>
        </section>
        @endif

        <section class="banner-hashtag-section">
            <div class="wrap">
                <div class="txt-content">
                    <h3>compartí tus resultados:</h3>
                    <h2 class="hashtag-name"><a href="#">#mirecetaLaCampagnOla</a></h2>
                    <span class="separator"></span>
                </div>
            </div>
            <div class="banner-bk">
                <img src="{{ asset('assets/images/hashtag-banner-bk.jpg') }}" srcset="{{ asset('assets/images/hashtag-banner-bk@2x.jpg') }} 2x" alt="hashtag-banner-bk" class="mobile">
                <img src="{{ asset('assets/images/hashtag-banner-bk-d.jpg') }}" srcset="{{ asset('assets/images/hashtag-banner-bk-d@2x.jpg') }} 2x" alt="hashtag-banner-bk" class="desktop">
            </div>
        </section>


        <section class="facebook-comments-section">
            <div class="wrap">
                <div class="main-subtitle">
                    <span class="misc"></span>
                    <h2 class="txt">DEJANOS TUS COMENTARIOS</h2>
                    <span class="misc right"></span>
                </div>
                <div class="fb-comments" data-href="" data-width="" data-numposts="5"></div>
            </div>
        </section>

        @if( $relatedRecipes->count() > 0 )
        <section class="recetas-slider-section">
            <div class="wrap">
                <div class="main-subtitle">
                    <span class="misc"></span>
                    <h2 class="txt">conocé nuestras recetas</h2>
                    <span class="misc"></span>
                </div>
            </div>
            <div class="swiper-container recetas-slider-content">
                <ul class="swiper-wrapper recetas-slider">
                    @foreach($relatedRecipes as $relatedRecipe)
                    <li class="swiper-slide item receta">
                        <a href="{{ route('recipe.details', $relatedRecipe->slug) }}">
                            <div class="image-content">
                                <div class="image-content-mask" ><img src="{{ asset($relatedRecipe->icon_image) }}" alt="{{ $relatedRecipe->title }}"></div>
                            </div>
                            <div class="receta-name">
                                <h3>{{ $relatedRecipe->title }}</h3>
                            </div>
                            @if( $relatedRecipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->count() > 0 )
                            <ul class="caracteristicas">
                                @foreach($relatedRecipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->get() as $tag)
                                <li>
                                    <span><img src="{{ asset($tag->icon_image) }}" alt="{{ $tag->title }}"></span>
                                    <p>{{ $tag->title }}</p>
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

@section('js')
<script>
    $(document).ready( function() { $(".fb-comments").attr("data-href", window.location.href.split('?')[0]); });
</script>

@endsection
