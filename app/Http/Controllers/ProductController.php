<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductFamily;
use App\Models\ProductSubfamily;

class ProductController extends Controller
{
    public function index()
    {
        $productFamilies = ProductFamily::orderBy('position', 'ASC')->get();

        return view('products.index', compact('productFamilies'));
    }

    public function fork($productFamilySlug)
    {
        $productFamily = ProductFamily::where('slug', $productFamilySlug)->first();

        if( $productFamily ) {
            if( $productFamily->productSubfamily ) {
                // fork sub-family view
                return redirect()->route('product.subfamily', [$productFamily->slug, $productFamily->productSubfamily->slug]);
            }
            else {
                return redirect()->route('product.details', $productFamily->slug);
            }
        }

        abort('404');
    }

    public function forkList($productFamilySlug, $productSubfamilySlug)
    {
        $productFamily = ProductFamily::where('slug', $productFamilySlug)->first();
        $productSubfamily = ProductSubfamily::where('slug', $productSubfamilySlug)->first();

        if( $productSubfamily ) {
            return view('products.details-fork', compact('productFamily'));
        }

        abort('404');
    }

    public function details($productFamilySlug)
    {
        $productFamily = ProductFamily::where('slug', $productFamilySlug)->first();

        if( $productFamily ) {
            $products = Product::where('product_family_id', $productFamily->id)
			->orderBy('position', 'ASC')
			->orderBy('title', 'ASC')
            ->get();
            $recipesWithProducts = Recipe::whereHas('products', function($query) use($products) {
                $query->whereIn('id', $products->pluck('id')->toArray());
            })
            ->orderBy('position', 'ASC')
            ->get();

            return view('products.details', compact('productFamily','products','recipesWithProducts'));
        }

        abort('404');
    }

    public function forkDetails($productFamilySlug, $productSubfamilySlug)
    {
        $productFamily = ProductFamily::where('slug', $productFamilySlug)->first();
        $productSubfamily = ProductSubfamily::where('slug', $productSubfamilySlug)->first();

        if( $productFamily && $productSubfamily ) {
            $products = Product::where('product_family_id', $productFamily->id)
            ->where('product_subfamily_id', $productSubfamily->id)
            ->orderBy('title', 'ASC')
            ->get();
            $recipesWithProducts = Recipe::whereHas('products', function($query) use($products) {
                $query->whereIn('id', $products->pluck('id')->toArray());
            })
            ->orderBy('position', 'ASC')
            ->get();

            return view('products.details', compact('productFamily','productSubfamily','products','recipesWithProducts'));
        }

        abort('404');
    }
}
