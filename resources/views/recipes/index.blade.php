@extends('layouts.main')

@section('title', '- Recetas')
@section('description', 'En tu cocina, se cocina mucho más que comidas. Conocé todas nuestras recetas.')

@section('content')
<main class="page-recipes-home">

    <section class="general-header">
        <div class="image-bk">
            <img src="{{ asset('assets/images/recetas-home-header.jpg') }}" srcset="{{ asset('assets/images/recetas-home-header@2x.jpg') }} 2x" alt="recetas-home-header" class="mobile">
            <img src="{{ asset('assets/images/recetas-home-header-d.jpg') }}" srcset="{{ asset('assets/images/recetas-home-header-d@2x.jpg') }} 2x" alt="recetas-home-header" class="desktop">
        </div>
    </section>

    <div class="internal-content">
        <section class="recipes-filters-section">
            <div class="wrap">
                <form action="{{ route('recipe-search') }}">
                    @csrf
                    <div class="search-input">
                        <input type="search" name="q" autocomplete="off" placeholder="buscar receta">
                        <button class="btn-buscar">
                            <span class="lupa">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
                                <path d="M17.5,16.1l-4.3-4.3c0.9-1.2,1.4-2.6,1.4-4.2c0-3.9-3.2-7-7-7s-7,3.2-7,7s3.2,7,7,7c1.6,0,3-0.5,4.2-1.4
                                    l4.3,4.3L17.5,16.1z M7.5,12.6c-2.8,0-5-2.3-5-5s2.3-5,5-5s5,2.3,5,5S10.3,12.6,7.5,12.6z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="main-title"><h1>filtrar recetas por:</h1></div>
                    <ul class="filtros-list">
                        <li class="filtro">
                            <a class="btn select-button" href="#" data-open="product_category">
                                <div class="txt">categoría de productos</div><span class="icon"></span>
                            </a>
                            <div class="filtro-select-content">
                                <select class="filtro-select select-popup" name="product_category[]" data-placeholder="categoría de productos" multiple data-selector="product_category">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ ( isset($categoriesSelected) && in_array($category->id, $categoriesSelected) ) ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li class="filtro">
                            <a class="btn select-button" href="#" data-open="duration">
                                <div class="txt">tiempo de preparación</div><span class="icon"></span>
                            </a>
                            <div class="filtro-select-content">
                                <select class="filtro-select select-popup" name="duration" data-placeholder="tiempo de preparación" data-selector="duration">
                                    <option value="">Quitar filtro</option>
                                    @foreach($durationTags as $durationTag)
                                    <option value="{{ $durationTag->id }}" {{ ( isset($durationSelected) && $durationTag->id == $durationSelected ) ? 'selected' : '' }}>{{ $durationTag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li class="filtro">
                            <a class="btn select-button" href="#" data-open="moment">
                                <div class="txt">momento del día</div><span class="icon"></span>
                            </a>
                            <div class="filtro-select-content">
                                <select class="filtro-select select-popup" name="moment" data-selector="moment" data-placeholder="momento del día">
                                    <option value="">Quitar filtro</option>
                                    @foreach($momentTags as $momentTag)
                                    <option value="{{ $momentTag->id }}" {{ ( isset($momentSelected) && $momentTag->id == $momentSelected ) ? 'selected' : '' }}>{{ $momentTag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li class="filtro">
                            <a class="btn select-button" id="special-needs" href="#" data-open="special_needs">
                                <div class="txt">preferencias</div><span class="icon"></span>
                            </a>
                            <div class="filtro-select-content">
                                <select multiple class="filtro-select select-popup" name="special_needs[]" data-placeholder="preferencias" data-selector="special_needs">
                                    @foreach($specialNeedTags as $specialNeedTag)
                                    <option value="{{ $specialNeedTag->id }}" {{ ( isset($specialNeedsSelected) && in_array($specialNeedTag->id, $specialNeedsSelected) ) ? 'selected' : '' }}>{{ $specialNeedTag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                    </ul>

                    <!-- <span class="separator"></span> -->
                </form>
            </div>
        </section>


        <section class="recetas-list-section">
            <div class="loader-content" style="display:none">
                <div class="loader-big"></div>
            </div>

            <div class="wrap">

                <div class="main-subtitle big">
                    <span class="misc"></span>
                    <h2 class="txt">recetas</h2>
                    <span class="misc right"></span>
                </div>

                <ul class="recetas-list">
                    @foreach($recipes as $recipe)
                    <li class="item receta">
                        <a href="{{ route('recipe.details', $recipe->slug) }}">
                            @if( !is_null($recipe->icon_image) )
                            <div class="image-content">
                                <div class="image-content-mask" ><img src="{{ asset($recipe->icon_image) }}" alt="{{ $recipe->title }}"></div>
                            </div>
                            @endif
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

                <div class="no-results" style="display:none"><p>No se encontraron resultados.</p></div>

                @if( $recipes->count() && $total > env('RECIPE_PAGINATION_RESULTS') )
                <a href="#" class="load-more" id="load-more" data-url="{{ route('recipes.load-more') }}" data-total="{{ $total }}">Cargar más</a>
                @endif

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
