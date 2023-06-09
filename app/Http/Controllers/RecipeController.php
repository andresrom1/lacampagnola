<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Recipe;
use App\Models\Product;
use App\Models\Category;
use App\Models\Preference;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy('position', 'ASC')->take(env('RECIPE_PAGINATION_RESULTS'))->get();
        $total = Recipe::count();

        // $categories = Category::orderBy('title', 'ASC')->get();
        $categoriesIds = Product::whereNotNull('category_id')->groupBy('category_id')->get()->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $categoriesIds)->orderBy('title', 'ASC')->get();

        $tagsWithRecipes = DB::table('recipe_tag')->groupBy('tag_id')->get()->pluck('tag_id')->toArray();

        $durationTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_duration_tag', 1)->orderBy('position', 'ASC')->get();
        $momentTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_moment_tag', 1)->orderBy('position', 'ASC')->get();
        $specialNeedTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_special_need_tag', 1)->orderBy('position', 'ASC')->get();

        return view('recipes.index', compact('recipes','total','categories','durationTags','momentTags','specialNeedTags'));
    }

    public function indexWithFilters(Request $request)
    {
        $tags = [];
        $categoriesSelected = $request->input('product_category');
        $durationSelected = $request->input('duration');
        $momentSelected = $request->input('moment');
        $specialNeedsSelected = $request->input('special_needs');

        $categoriesSelected = array_filter($categoriesSelected, function($val) {
            return !is_null($val);
        });

        if( !is_null($durationSelected) ) {
            $tags[] = $durationSelected;
        }

        if( !is_null($momentSelected) ) {
            $tags[] = $momentSelected;
        }

        if( !is_null($specialNeedsSelected) ) {
            $tags = array_merge($specialNeedsSelected, $tags);
        }

        $tags = array_filter($tags, function($val) {
            return !is_null($val);
        });

        $recipes = Recipe::filterProductCategory($categoriesSelected)
            ->filterTags($tags)
            ->orderBy('title', 'ASC')
            ->take(env('RECIPE_PAGINATION_RESULTS'))
            ->get();

        $total = Recipe::count();

        // $categories = Category::orderBy('title', 'ASC')->get();
        $categoriesIds = Product::whereNotNull('category_id')->groupBy('category_id')->get()->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $categoriesIds)->orderBy('title', 'ASC')->get();

        $tagsWithRecipes = DB::table('recipe_tag')->groupBy('tag_id')->get()->pluck('tag_id')->toArray();

        $durationTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_duration_tag', 1)->orderBy('position', 'ASC')->get();
        $momentTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_moment_tag', 1)->orderBy('position', 'ASC')->get();
        $specialNeedTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_special_need_tag', 1)->orderBy('position', 'ASC')->get();

        return view('recipes.index', compact('recipes','total','categories','durationTags','momentTags','specialNeedTags','categoriesSelected','durationSelected','momentSelected','specialNeedsSelected'));
    }

    function loadMore(Request $request)
    {
        $skip = $request->input('skip');

        $tags = [];
        $categoriesSelected = $request->input('product_category');
        $durationSelected = $request->input('duration');
        $momentSelected = $request->input('moment');
        $specialNeedsSelected = $request->input('special_needs');

        if( !is_null($categoriesSelected) ) {
            $categoriesSelected = array_filter($categoriesSelected, function($val) {
                return !is_null($val);
            });
        }

        if( !is_null($durationSelected) ) {
            $tags[] = $durationSelected;
        }

        if( !is_null($momentSelected) ) {
            $tags[] = $momentSelected;
        }

        if( !is_null($specialNeedsSelected) ) {
            $tags = array_merge($specialNeedsSelected, $tags);
        }

        if( !empty($tags) && !is_null($tags) ) {
            $tags = array_filter($tags, function($val) {
                return !is_null($val);
            });
        }

        $recipes = Recipe::filterProductCategory($categoriesSelected)
            ->filterTags($tags)
            ->orderBy('position', 'ASC')
            ->skip($skip)
            ->take(env('RECIPE_PAGINATION_RESULTS'))
            ->get();

        $view = view('recipes.load-more', compact('recipes'))->render();

        return $view;
    }

    public function details($recipeSlug)
    {
        $recipe = Recipe::where('slug', $recipeSlug)->first();
	if(!$recipe) abort('404');
        $relatedRecipes = Recipe::where('id', '!=', $recipe->id)
        ->whereHas('products', function($query) use($recipe) {
            $query->whereIn('category_id', $recipe->products()->get()->pluck('category_id')->toArray());
        })
        ->orderBy('position', 'ASC')
        ->get();

        if( $recipe ) {
            return view('recipes.details', compact('recipe','relatedRecipes'));
        }

        abort('404');
    }

    public function generateImage(Request $request, $recipeSlug)
    {
        $recipe = Recipe::where('slug', $recipeSlug)->first();

        if( !is_null($recipe) ) {
	  $pdf = PDF::getFacadeRoot();
	  $dompdf = $pdf->getDomPDF();
	  $dompdf->setHttpContext(stream_context_create([
	    'ssl' => [
	      'allow_self_signed'=> TRUE
	      ],
	  ]));
            $pdf = $pdf->loadView('recipes.ingredients', [
                'recipe' => $recipe
            ]);

	    return $pdf->download($recipe->title . ' - Ingredientes.pdf');
        }

        return redirect()->route('recipe.details', $recipeSlug);
    }

}
