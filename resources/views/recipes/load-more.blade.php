@foreach($recipes as $recipe)
<li class="item receta">
    <a href="{{ route('recipe.details', $recipe->slug) }}">
        <div class="image-content">
            <div class="image-content-mask" ><img src="{{ asset($recipe->icon_image) }}" alt="{{ $recipe->title }}"></div>
        </div>
        <div class="receta-name">
            <h3>{{ $recipe->title }}</h3>
        </div>
        @if( $recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->count() > 0 )
        <ul class="caracteristicas">
            @foreach($recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->get() as $tag)
            <li>
                @if( !is_null($tag->icon_image) )
                <span><img src="{{ asset($tag->icon_image) }}" alt="{{ $tag->title }}"></span>
                @endif
                <p>{{ $tag->title }}</p>
            </li>
            @endforeach
        </ul>
        @endif
    </a>
</li>
@endforeach
