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

class VegetablesController extends Controller
{
    public function vegetables()
    {
        $productFamilies = ProductFamily::whereNotNull("vegetables_description")->orderBy('title', 'ASC')->get();
        
        foreach($productFamilies as $productFamily){
           $productFamily->products = Product::where('product_family_id', $productFamily->id)->get();
           $recipes = [];
           foreach($productFamily->products as $product){
               foreach($product->recipes as $recipe){
                   $exists = false;
                   foreach($recipes as $r){
                       if($r->id == $recipe->id){
                           $exists = true;
                       }
                   }
                   if(!$exists){
                       array_push($recipes, $recipe);
                   }
               }
           }
           $productFamily->recipes = $recipes;
        }

        return view('vegetables',compact('productFamilies'));
    }
    
}
