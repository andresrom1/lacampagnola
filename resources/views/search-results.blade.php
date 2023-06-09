@extends('layouts.main')

@section('content')

<main class="page-search-result">

    <section class="general-header">
        <div class="image-bk">
            <img src="{{ asset('assets/images/resultados-busqueda-header.jpg') }}" srcset="{{ asset('assets/images/resultados-busqueda-header@2x.jpg') }} 2x" alt="resultados-busqueda-header" class="mobile">
            <img src="{{ asset('assets/images/resultados-busqueda-header-d.jpg') }}" srcset="{{ asset('assets/images/resultados-busqueda-header-d@2x.jpg') }} 2x" alt="resultados-busqueda-header" class="desktop">
        </div>
    </section>


    <div class="internal-content">

        <div class="main-title"><h1>mirá los resultados <br>de tu búsqueda</h1></div>

        @if( $recipeResults->count() )
        <section class="recetas-list-section">
            <div class="wrap">
                <div class="main-subtitle big">
                    <span class="misc"></span>
                    <h2 class="txt">recetas</h2>
                    <span class="misc"></span>
                </div>

                <ul class="recetas-list">
                    @foreach($recipeResults as $recipe)
                    <li class="item receta">
                        <a href="{{ route('recipe.details', $recipe->slug) }}">
                            <div class="image-content">
                                <div class="image-content-mask" ><img src="{{ asset($recipe->icon_image) }}"></div>
                            </div>
                            <div class="receta-name">
                                <h3>{{ $recipe->title }}</h3>
                            </div>
                            @if( $recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->count() > 0 )
                            <ul class="caracteristicas">
                                @foreach($recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->get() as $tagRecipe)
                                <li>
                                    <span><img src="{{ asset($tagRecipe->icon_image) }}" alt="{{ $tagRecipe->title }}"></span>
                                    <p>{{ $tagRecipe->title }}</p>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
        @endif

        @if( $productResults->count() )
        <section class="products-details-section">
            <div class="wrap">
                <div class="main-subtitle big">
                    <span class="misc"></span>
                    <h2 class="txt">productos</h2>
                    <span class="misc"></span>
                </div>

                <ul class="subcategory-products-list">
                    @foreach($productResults as $product)
                        <li class="product">
                            <a href="{{ route('product.details', $product->productFamily->slug) }}">
                                <div class="img-content">
                                    <img src="{{ asset($product->image) }}">
                                </div>
                                <div class="name">
                                    <h4>{{ $product->title }}</h4>
                                </div>
                                {{-- <div class="detail">
                                    <p>x170g / x201g</p>
                                </div> --}}
                                @if( $product->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->count() > 0 )
                                <ul class="caracteristicas">
                                    @foreach($product->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->get() as $tag)
                                    <li>
                                        <span><img src="{{ asset($tag->icon_image) }}"></span>
                                        <p>{{ $tag->title }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        @endif

        @if( !$recipeResults->count() && !$productResults->count() )
        <section class="results-notfound-section">
            <div class="wrap">
                <div class="no-results"><p>No se encontraron resultados.</p></div>
            </div>
        </section>
        @endif

        <section class="results-null-section">
            <div class="wrap">
                <span class="separator"></span>
                <form action="{{ route('recipes-with-filters') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_category[]" value="{{ !is_null($productCategory) ? implode(',', $productCategory) : '' }}">
                    <input type="hidden" name="duration" value="{{ !is_null($duration) ? $duration : '' }}">
                    <input type="hidden" name="moment" value="{{ !is_null($moment) ? $moment : '' }}">
                    <input type="hidden" name="special_needs[]" value="{{ !is_null($specialNeeds) ? implode(',', $specialNeeds) : '' }}">
                    <input type="submit" value="no encontré lo que buscaba" class="boton">
                </form>
                <!-- <a href="{{ route('home') }}" class="boton">no encontré lo que buscaba<span class="icon"></span></a> -->
            </div>
        </section>


    </div>

</main>
@endsection
