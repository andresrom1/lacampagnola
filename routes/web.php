<?php

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if (env('APP_ENV') === 'prod') {
    URL::forceScheme('https');
}

Route::get('/', 'HomeController@index')->name('home');
Route::get('nuestra-historia', 'HomeController@ourHistory')->name('our-history');
Route::get('suma-vegetales', 'VegetablesController@vegetables')->name('vegetables');
Route::get('contacto', 'HomeController@contact')->name('contact');
Route::post('resultados-ajax', 'SearchController@predictiveSearch')->name('predictive-search');
Route::post('recetas-resultados-ajax', 'SearchController@recipePredictiveSearch')->name('recipe-predictive-search');
Route::post('resultados', 'SearchController@homeSearch')->name('home-search');
Route::post('resultados-recetas', 'SearchController@recipeSearch')->name('recipe-search');

Route::get('/pastas', function(){
	return redirect('/productos/pastas/detalle');
});
Route::get('/dulces', function(){
	return redirect('/productos/dulces-solidos/detalle');
});
Route::get('/dulces-solidos', function(){
	return redirect('/productos/dulces-solidos/detalle');
});

Route::group(['prefix' => 'productos'], function () {

    Route::get('/', 'ProductController@index')->name('products');
    Route::get('{productFamilySlug}', 'ProductController@fork')->name('product.fork');
    Route::get('{productFamilySlug}/detalle', 'ProductController@details')->name('product.details');
    Route::get('{productFamilySlug}/{productSubfamilySlug}', 'ProductController@forkList')->name('product.subfamily');
    Route::get('{productFamilySlug}/{productSubfamilySlug}/detalle', 'ProductController@forkDetails')->name('product.subfamily.details');

});




Route::group(['prefix' => 'recetas'], function () {

    Route::get('/', 'RecipeController@index')->name('recipes');
    Route::post('/', 'RecipeController@indexWithFilters')->name('recipes-with-filters');
    Route::get('cargar-mas', 'RecipeController@loadMore')->name('recipes.load-more');
    Route::get('{recipeSlug}', 'RecipeController@details')->name('recipe.details');
    Route::get('{recipeSlug}/generar-imagen', 'RecipeController@generateImage')->name('recipes.generate-image');

});
