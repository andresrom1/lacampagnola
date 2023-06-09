<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('tag', 'TagCrudController');
    CRUD::resource('benefit', 'BenefitCrudController');
    CRUD::resource('home-banner', 'HomeBannerCrudController');
    CRUD::resource('product-family', 'ProductFamilyCrudController');
    CRUD::resource('product-subfamily', 'ProductSubfamilyCrudController');
    Route::get('product/import', 'ProductCrudController@import')->name('products-import');
    Route::post('product/do-import', 'ProductCrudController@doImport')->name('products.do-import');
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('recipe', 'RecipeCrudController');
    CRUD::resource('setting', 'SettingCrudController');
    CRUD::resource('category', 'CategoryCrudController');
}); // this should be the absolute last line of this file
