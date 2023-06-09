<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Recipe;
use App\Models\Product;
use App\Models\Category;
use App\Models\Preference;
use App\Models\RecipeMoment;
use Illuminate\Http\Request;
use App\Models\ProductFamily;
use Spatie\Searchable\Search;
use App\Models\RecipeDuration;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\PredictiveSearchCollection;

class SearchController extends Controller
{
    public function homeSearch(Request $request)
    {
        $tags = [];
        $q = $request->input('q');
		$q = $this->sanitize($q);
        $productCategory = $request->input('product_category');
        $duration = $request->input('duration');
        $moment = $request->input('moment');
        $specialNeeds = $request->input('special_needs');

        if( !is_null($duration) ) {
	    $duration = $this->sanitize($duration);
            $tags[] = $duration;
        }

        if( !is_null($moment) ) {
	    $moment = $this->sanitize($moment);
            $tags[] = $moment;
        }

        if( !is_null($specialNeeds) ) {
            $tags = array_merge($specialNeeds, $tags);
        }
        $recipeResults = Recipe::where('title', 'LIKE', '%'.$q.'%')
            ->filterProductCategory($productCategory)
            ->filterTags($tags)
            ->orderBy('title', 'ASC')
            ->get();

        $productResults = Product::where('title', 'LIKE', '%'.$q.'%')
            ->filterProductCategory($productCategory)
            ->filterTags($tags)
            ->orderBy('title', 'ASC')
            ->get();

        $productCategorySelected = Category::find($productCategory);
        $tagsSelected = Tag::whereIn('id', $tags)->get();

        return view('search-results', compact('recipeResults','productResults','productCategory','duration','moment','specialNeeds'));
    }

    public function predictiveSearch(Request $request)
    {
        $results = [];
        $q = $request->input('q') ? $this->sanitize($request->input('q')) : '';

        $searchResults = (new Search())
            ->registerModel(ProductFamily::class, 'title')
            ->registerModel(Product::class, 'title')
            ->registerModel(Recipe::class, 'title')
            ->search($q);

        if( $searchResults->count() ) {
            foreach($searchResults->groupByType() as $type => $modelSearchResults) {
                foreach($modelSearchResults as $searchResult) {
                    switch ($type) {
                        case 'product_families':
                            $results[] = [
                                "group" => 'Familia de productos',
                                "image" => asset($searchResult->searchable->icon_image),
                                "title" => $searchResult->searchable->title,
                                "url" => route('product.fork', $searchResult->searchable->slug)
                            ];

                            break;
                        case 'products':
                            $results[] = [
                                "group" => 'Productos',
                                "image" => asset($searchResult->searchable->image),
                                "title" => $searchResult->searchable->title,
                                "url" => route('product.details', $searchResult->searchable->productFamily->slug)
                            ];

                            break;
                        case 'recipes':
                            $results[] = [
                                "group" => 'Recetas',
                                "image" => asset($searchResult->searchable->icon_image),
                                "title" => $searchResult->searchable->title,
                                "url" => route('recipe.details', $searchResult->searchable->slug)
                            ];

                            break;
                    }
                }
            }
        }

        return json_encode($results);
    }

    public function recipePredictiveSearch(Request $request)
    {
        $results = [];
        $q = $request->input('q') ? $this->sanitize($request->input('q')) : '';

        $searchResults = (new Search())
            ->registerModel(Recipe::class, 'title')
            ->search($q);

        if( $searchResults->count() ) {
            foreach($searchResults->groupByType() as $type => $modelSearchResults) {
                foreach($modelSearchResults as $searchResult) {
                    $results[] = [
                        "group" => 'Recetas',
                        "image" => asset($searchResult->searchable->icon_image),
                        "title" => $searchResult->searchable->title,
                        "url" => route('recipe.details', $searchResult->searchable->slug)
                    ];
                }
            }
        }

        return json_encode($results);
    }

    public function recipeSearch(Request $request)
    {
        $tags = [];
        $q = $request->input('q');
	$q = $this->sanitize($q);
        $productCategory = $request->input('product_category');
        $duration = $request->input('duration');
        $moment = $request->input('moment');
        $specialNeeds = $request->input('special_needs');

        if( !is_null($duration) ) {
	    $duration = $this->sanitize($duration);
            $tags[] = $duration;
        }

        if( !is_null($moment) ) {
	    $moment = $this->sanitize($moment);
            $tags[] = $moment;
        }

        if( !is_null($specialNeeds) ) {
            $tags = array_merge($specialNeeds, $tags);
        }

        $total = Recipe::where('title', 'LIKE', '%'.$q.'%')
            ->filterProductCategory($productCategory)
            ->filterTags($tags)
            ->orderBy('title', 'ASC')
            ->count();

        $recipeResults = Recipe::where('title', 'LIKE', '%'.$q.'%')
            ->filterProductCategory($productCategory)
            ->filterTags($tags)
            ->orderBy('title', 'ASC')
            ->take(env('RECIPE_PAGINATION_RESULTS'))
            ->get();

        return response()->json([
            'data' => new RecipeCollection($recipeResults),
            'total' => $total
        ]);
    }

	private function sanitize($q){
		$q = strip_tags($q);
		$q = preg_replace('/[^A-Za-z0-9\-]/', '', $q);
		return $q;
	}
}
