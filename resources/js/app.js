/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


// libs
require('./bootstrap');
require('./swiper');
require('lity/dist/lity.js');
require('./autocomplete.js');
require('./vegetables.js');


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// includes
if( window.location.pathname === '/' ) {
    require('./home.js');
    require('./recipe-autocomplete.js');
}
if( window.location.pathname.indexOf('/recetas') !== -1 ) {
    require('./recipes.js');
}
