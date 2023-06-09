<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Recipe;
use App\Models\Benefit;
use App\Models\Product;
use App\Models\Category;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use App\Models\ProductFamily;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $productFamilies = ProductFamily::orderBy('title', 'ASC')->get();

        // $categories = Category::orderBy('title', 'ASC')->get();
        $categoriesIds = Product::whereNotNull('category_id')->groupBy('category_id')->get()->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $categoriesIds)->orderBy('title', 'ASC')->get();

        $tagsWithRecipes = DB::table('recipe_tag')->groupBy('tag_id')->get()->pluck('tag_id')->toArray();

        $durationTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_duration_tag', 1)->orderBy('position', 'ASC')->get();
        $momentTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_moment_tag', 1)->orderBy('position', 'ASC')->get();
        $specialNeedTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_special_need_tag', 1)->orderBy('position', 'ASC')->get();

        $recipes = Recipe::where('in_home', 1)
            ->orderBy('position', 'ASC')
            ->limit(10)
            ->get();
        $banners = HomeBanner::where('is_visible', 1)
            ->orderBy('position', 'ASC')
            ->get();

        return view('home', compact('categories','productFamilies','durationTags','momentTags','specialNeedTags','recipes','banners'));
    }

    public function ourHistory()
    {
        return view('our-history');
    }
    
    public function vegetables()
    {
        $productFamilies = ProductFamily::orderBy('title', 'ASC')->get();

        // $categories = Category::orderBy('title', 'ASC')->get();
        $categoriesIds = Product::whereNotNull('category_id')->groupBy('category_id')->get()->pluck('category_id')->toArray();
        $categories = Category::whereIn('id', $categoriesIds)->orderBy('title', 'ASC')->get();

        $tagsWithRecipes = DB::table('recipe_tag')->groupBy('tag_id')->get()->pluck('tag_id')->toArray();

        $durationTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_duration_tag', 1)->orderBy('position', 'ASC')->get();
        $momentTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_moment_tag', 1)->orderBy('position', 'ASC')->get();
        $specialNeedTags = Tag::whereIn('id', $tagsWithRecipes)->where('is_special_need_tag', 1)->orderBy('position', 'ASC')->get();

        $recipes = Recipe::where('in_home', 1)
            ->orderBy('position', 'ASC')
            ->limit(10)
            ->get();

        return view('vegetables',compact('categories','productFamilies','durationTags','momentTags','specialNeedTags','recipes'));
    }
    
    

    public function contact()
    {
        return view('contact');
    }

    public function searchResults()
    {
        return view('search-results');
    }
}
