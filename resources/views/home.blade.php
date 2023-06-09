@extends('layouts.main')

@section('description', 'La Campagnola es una marca con más de 100 años acompañando la mesa familiar argentina. Referente en el mercado de los alimentos y reconocida por sus consumidores por la excelencia en la calidad y por su trayectoria.')

@section('content')

<main class="page-home">
    <section class="search-section">
        <div class="wrap">
            <div class="form-content">
                <form action="{{ route('home-search') }}" method="POST">
                    @csrf
                    <span class="misc top">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 254 18">
                        <path d="M233.5,0c4.2-0.1,8.4,0.6,12.3,2c3.6,1.5,5.1,3.5,5.7,4.9c0.9,1.9,0.5,4.1-1,5.6
                            c-1.4,1.4-3.3,2.2-5.2,2.3c-2.7,0.2-5.3-0.2-7.8-1.2c-0.7-0.3-1-1-0.7-1.6c0.2-0.6,0.9-1,1.6-0.7c5.4,2,9,1,10.3-0.5
                            c0.8-0.8,1-1.9,0.5-2.9c-0.6-1.4-2.1-2.6-4.4-3.6c-3.6-1.3-7.5-1.9-11.3-1.8c-21.6,0-37.4,2.6-52.6,5.1c-14.4,2.4-28,4.6-45.6,4.6
                            c-4.2,0.1-8.3-0.5-12.3-1.8c-1-0.3-1.9-0.8-2.8-1.2c-1.2,0.4-2.6,0.7-4,1c-7.6,1.5-17.7,1.9-29.3,1.1c-14.2-1-28.9-3.6-40.6-5.7
                            c-9.3-1.6-17.3-3-21.7-3c-4.3,0-10.5,0.1-15.2,1.2C7.6,4.1,5.9,4.8,4.3,5.8C3.2,6.5,2.6,7.7,2.6,9c-0.1,0.9,0.3,1.7,1,2.2
                            c2.4,1.9,8.3,1.2,10.4,0.8c0.7-0.1,1.4,0.3,1.5,1c0.1,0.7-0.3,1.3-1,1.5c-1.5,0.3-3.1,0.5-4.7,0.5c-3.5,0.1-6.2-0.5-7.8-1.8
                            C0.7,12.2,0,10.6,0,9c0-2.1,1-4,2.7-5.2c1.8-1.3,3.9-2.1,6.1-2.5C13.9,0.1,20.2,0,24.6,0C29.2,0,37,1.4,46.7,3.1
                            C58.4,5.1,73,7.7,87.1,8.7c14.6,1,24.4,0,30.6-1.5c-0.3-0.3-0.5-0.7-0.8-1c-0.7-1.1-0.8-2.5-0.1-3.7c1-1.6,3.2-2.6,6.4-2.6h0
                            c2.6,0,4.3,0.7,5,2c0.5,0.9,0.4,2-0.2,2.8c-1,1.3-2.4,2.4-4,3c-0.1,0.1-0.3,0.1-0.4,0.2l0.2,0.1c3.7,1.2,7.6,1.7,11.4,1.6
                            c17.4,0,30.9-2.2,45.2-4.6C195.8,2.6,211.7,0,233.5,0z M126,3.2c-0.1-0.1-0.8-0.6-2.8-0.6h0c-2.6,0-3.9,0.7-4.2,1.3
                            c-0.2,0.4-0.1,0.8,0.1,1.1c0.4,0.6,0.9,1.1,1.5,1.5c1.8-0.5,3.4-1.3,4.9-2.5C125.7,3.8,125.9,3.5,126,3.2L126,3.2z"/>
                        </svg>
                    </span>
                    <div class="title">
                        <h4>en tu cocina, se cocina</h4>
                        <h3>MUCHO MÁS QUE COMIDAS</h3>
                    </div>
                    <div class="search-input">
                        <input type="search" name="q" id="recipe-query" autocomplete="off" placeholder="¿Qué receta estas buscando?" data-url="{{ route('recipe-predictive-search') }}">
                        <button class="btn-buscar">
                            <span class="lupa">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
                                <path d="M17.5,16.1l-4.3-4.3c0.9-1.2,1.4-2.6,1.4-4.2c0-3.9-3.2-7-7-7s-7,3.2-7,7s3.2,7,7,7c1.6,0,3-0.5,4.2-1.4
                                    l4.3,4.3L17.5,16.1z M7.5,12.6c-2.8,0-5-2.3-5-5s2.3-5,5-5s5,2.3,5,5S10.3,12.6,7.5,12.6z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <span class="misc bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 254 18">
                        <path d="M18.5,15c-4.2,0.1-8.4-0.6-12.3-2c-3.6-1.5-5.1-3.5-5.7-4.9c-0.9-1.9-0.5-4.1,1-5.6
                            c1.4-1.4,3.3-2.2,5.2-2.3c2.7-0.2,5.3,0.2,7.8,1.2c0.7,0.3,1,1,0.7,1.6c-0.2,0.6-0.9,1-1.6,0.7c-5.4-2-9-1-10.3,0.5
                            c-0.8,0.8-1,1.9-0.5,2.9c0.6,1.4,2.1,2.6,4.4,3.6c3.6,1.3,7.5,1.9,11.3,1.8c21.6,0,37.4-2.6,52.6-5.1c14.4-2.4,28-4.6,45.6-4.6
                            c4.2-0.1,8.3,0.5,12.3,1.8c1,0.3,1.9,0.8,2.8,1.2c1.2-0.4,2.6-0.7,4-1c7.6-1.5,17.7-1.9,29.3-1.1c14.2,1,28.9,3.6,40.6,5.7
                            c9.3,1.6,17.3,3,21.7,3c4.3,0,10.5-0.1,15.2-1.2c1.9-0.3,3.6-1.1,5.2-2.1c1.1-0.7,1.7-1.9,1.7-3.1c0.1-0.9-0.3-1.7-1-2.2
                            c-2.4-1.9-8.3-1.2-10.4-0.8c-0.7,0.1-1.4-0.3-1.5-1c-0.1-0.7,0.3-1.3,1-1.5c1.5-0.3,3.1-0.5,4.7-0.5c3.5-0.1,6.2,0.5,7.8,1.8
                            c1.3,1,2,2.6,1.9,4.2c0,2.1-1,4-2.7,5.2c-1.8,1.3-3.9,2.1-6.1,2.5c-5,1.1-11.4,1.3-15.7,1.3c-4.6,0-12.3-1.4-22.1-3.1
                            c-11.7-2.1-26.3-4.6-40.4-5.6c-14.6-1-24.4,0-30.6,1.5c0.3,0.3,0.5,0.7,0.8,1c0.7,1.1,0.8,2.5,0.1,3.7c-1,1.6-3.2,2.6-6.4,2.6h0
                            c-2.6,0-4.3-0.7-5-2c-0.5-0.9-0.4-2,0.2-2.8c1-1.3,2.4-2.4,4-3c0.1-0.1,0.3-0.1,0.4-0.2l-0.2-0.1c-3.7-1.2-7.6-1.7-11.4-1.6
                            c-17.4,0-30.9,2.2-45.2,4.6C56.2,12.4,40.3,15,18.5,15z M126,11.8c0.1,0.1,0.8,0.6,2.8,0.6h0c2.6,0,3.9-0.7,4.2-1.3
                            c0.2-0.4,0.1-0.8-0.1-1.1c-0.4-0.6-0.9-1.1-1.5-1.5c-1.8,0.5-3.4,1.3-4.9,2.5C126.3,11.2,126.1,11.5,126,11.8L126,11.8z"/>
                        </svg>
                    </span>
                    <div class="filtros-content">
                        <h4>también podes usar nuestros filtros:</h4>
                        <ul class="filtros-list">
                            <li class="filtro">
                                <a class="btn-link select-button" id="product-category" href="#" data-open="product_category">
                                    <div class="btn">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 35 35">
                                            <path d="M29.1,5.3c0-0.2-0.1-0.4-0.3-0.6c0,0,0-0.1,0-0.1c-0.5-2-3.6-3.4-8.2-3.9
                                                c-7.1-0.7-11.6,0.9-13,1.8C7,3,6.5,3.6,6.2,4.4C6,4.5,5.8,4.8,5.8,5c0,16.1,0.1,24.2,0.2,25.3c0,0.1,0.1,0.2,0.1,0.3
                                                c0.3,1.2,1.7,2.7,6.5,3.5c1.5,0.2,3,0.3,4.6,0.3c3.8,0,8.2-0.6,10.4-2.1c0.4-0.3,0.8-0.7,1.1-1.1c0.2-0.1,0.3-0.3,0.4-0.6
                                                C29.2,29.4,29.2,11.8,29.1,5.3z M8.8,3.9L8.8,3.9c0.7-0.5,3.6-1.7,8.4-1.7c1.1,0,2.2,0.1,3.3,0.2c4.8,0.5,6.4,1.9,6.6,2.6
                                                c0,0.4-0.2,0.9-0.6,1C24,7.8,17.1,8.3,12.9,7.6C9.4,7,8,6,7.8,5.3C7.7,4.7,8.4,4.1,8.8,3.9z M7.6,7.6c1.5,0.9,3.2,1.4,5,1.6
                                                c1.5,0.2,3,0.3,4.6,0.3c3.7,0,8-0.6,10.2-2c0,0.6,0,1.2,0,1.8c-0.1,0.1-0.2,0.3-0.2,0.5c-0.1,0.3-0.3,0.6-0.6,0.8
                                                c-2.5,1.7-9.4,2.2-13.6,1.5c-3.6-0.6-5-1.6-5.1-2.3c0-0.2-0.1-0.3-0.2-0.5C7.6,8.7,7.6,8.2,7.6,7.6z M27.3,29.8
                                                c-0.1,0.1-0.1,0.2-0.1,0.3c-0.1,0.3-0.3,0.6-0.6,0.8c-2.5,1.7-9.4,2.2-13.6,1.5c-3.6-0.6-5-1.6-5.1-2.3c0-0.1,0-0.2-0.1-0.2
                                                c0-0.4,0-1.1-0.1-2c1.5,0.8,3.2,1.4,4.9,1.6c1.5,0.2,3,0.3,4.6,0.3c3.7,0,7.9-0.6,10.2-2C27.3,28.7,27.3,29.4,27.3,29.8L27.3,29.8z
                                                M27.3,25c-0.1,0.1-0.2,0.3-0.2,0.4c-0.1,0.3-0.3,0.6-0.6,0.8c-2.5,1.7-9.4,2.2-13.6,1.5c-3.6-0.6-5-1.6-5.1-2.3
                                                c0-0.1-0.1-0.3-0.1-0.4c0-3.6,0-8.6,0-12.9c1.5,0.9,3.2,1.4,4.9,1.6c1.5,0.2,3,0.3,4.6,0.3c3.7,0,8-0.6,10.2-2.1
                                                C27.4,16.5,27.4,21.4,27.3,25L27.3,25z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <p class="name">producto</p>
                                </a>
                                <div class="filtro-select-content">
                                    <select class="filtro-select select-popup" name="product_category[]" multiple data-selector="product_category">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="filtro">
                                <a class="btn-link select-button" href="#" data-open="duration">
                                    <div class="btn">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 35 35">
                                            <path d="M31.6,5.5C31.6,5.5,31.6,5.5,31.6,5.5c-0.4-1.4-1.5-2.4-2.8-2.9c-2.4-0.7-6-1.3-9.5,1
                                                c-1.6,1.2-3.8,1.5-5.7,0.7c-0.7-0.3-1.5-0.5-2.2-0.6C9.8,3.4,8.2,3.6,6.8,4.4c-2.5,1.4-4,4.1-3.8,7c0.2,2.5,0.8,4.9,1.7,7.1
                                                c0.2,0.5,0.4,1.1,0.6,1.6C6,21.7,6.6,23.4,7.1,25c0,0.1,0.1,0.2,0.1,0.3c0,0.3,0.1,0.5,0.3,0.7L8.1,31c0.2,0.9,1.1,1.6,5,1.9
                                                C14,33,15.1,33,16.4,33c2.5,0.1,5-0.2,7.4-0.8c0.6-0.2,1.1-0.6,1.3-1.2c0,0,0-0.1,0-0.1l0.4-3.6c0.2-0.2,0.4-0.4,0.5-0.7
                                                c1.6-3.1,2.9-6.3,4.1-9.6c0.8-2.2,1.4-4.5,1.7-6.8C32.1,8.6,32,7,31.6,5.5z M23.3,30.4c0,0-0.1,0-0.2,0.1c-1.8,0.7-6.8,0.8-9.9,0.6
                                                c-1.2,0-2.3-0.2-3.4-0.6l-0.6-4l0.1,0l0.1,0c2.4-0.9,5.1-1.3,7.7-1c2.3,0.3,4.5,1,6.5,2L23.3,30.4z M30,9.9
                                                c-0.3,2.2-0.9,4.4-1.6,6.5c-1.1,3.2-2.4,6.3-4,9.3c-2.2-1.1-4.6-1.8-7-2.1c-0.7-0.1-1.3-0.1-2-0.1c-2.2,0-4.4,0.4-6.5,1.2l-0.1,0
                                                l0,0c-0.5-1.7-1.1-3.4-1.8-5.1c-0.2-0.5-0.4-1.1-0.6-1.6c-0.9-2-1.5-4.2-1.6-6.5c-0.1-2.2,1-4.3,3-5.4c1-0.6,2.2-0.7,3.3-0.4
                                                c0.7,0.1,1.3,0.3,1.9,0.5c2.4,0.9,5.2,0.6,7.3-0.9c2.2-1.5,4.6-1.7,8-0.8c0.5,0.1,1.1,0.4,1.6,1.8C30.2,7.4,30.3,8.7,30,9.9L30,9.9z
                                                M11.4,12.6c0-0.5-0.4-0.9-0.9-0.9c-0.5,0-0.9,0.4-0.9,0.8c-0.1,2,1.4,7.5,1.6,8c0.1,0.4,0.5,0.6,0.9,0.6c0.1,0,0.2,0,0.3,0
                                                c0.5-0.1,0.7-0.7,0.6-1.1c0,0,0,0,0,0C12.5,18.8,11.3,14.1,11.4,12.6L11.4,12.6z M23.5,12.1c-0.5,0-0.9,0.5-0.9,1c0,0,0,0,0,0
                                                c0.1,1.5-1.1,6.1-1.5,7.4c-0.1,0.5,0.1,1,0.6,1.1c0,0,0,0,0,0c0.1,0,0.2,0,0.3,0c0.4,0,0.7-0.3,0.9-0.6c0.2-0.5,1.7-6,1.6-8
                                                C24.4,12.5,24,12.1,23.5,12.1L23.5,12.1z M16.8,11.6c-0.5,0.1-0.8,0.6-0.7,1.1c0,0,0,0,0,0c0.3,1.4,0,6.2-0.2,7.5
                                                c-0.1,0.5,0.3,1,0.8,1c0,0,0.1,0,0.1,0c0.5,0,0.8-0.3,0.9-0.8c0.1-0.6,0.6-6.2,0.1-8.2C17.7,11.8,17.2,11.5,16.8,11.6L16.8,11.6z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <p class="name">tiempo de<br>preparación</p>
                                </a>
                                <div class="filtro-select-content">
                                    <select class="filtro-select select-popup" name="duration" data-selector="duration">
                                        <option value="">Quitar filtro</option>
                                        @foreach($durationTags as $durationTag)
                                        <option value="{{ $durationTag->id }}">{{ $durationTag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="filtro">
                                <a class="btn-link select-button" href="#" data-open="moment">
                                    <div class="btn">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 35 35">
                                            <path d="M33,10.3C28.2,0.9,17.1-0.2,9.1,3.5l0,0c-7,3.4-10.3,11.4-7.8,18.7c1.4,4.4,4.8,8,9.1,9.7
                                                c2.4,1,5,1.6,7.6,1.6c2.5,0,5-0.5,7.3-1.5c3.9-1.8,6.9-5.1,8.2-9.2C35,18.7,34.8,14.2,33,10.3z M31.9,22.2c-1.2,3.6-3.9,6.6-7.3,8.2
                                                c-4.3,1.9-9.2,1.8-13.4,0c-3.8-1.6-6.8-4.7-8.1-8.7C0.8,15.2,3.7,8.1,9.9,5.1l0,0c7.3-3.4,17.3-2.4,21.6,6
                                                C33,14.6,33.2,18.6,31.9,22.2z M22.5,22.2c0.3,0,0.7-0.2,0.8-0.5c0.2-0.4,0-0.9-0.5-1.1c0,0,0,0,0,0c-0.7-0.3-4-2.1-4.9-2.7
                                                c0-0.6-0.1-2.4-0.1-7.8V9.9c0-0.5-0.4-0.9-0.9-0.9l0,0c-0.5,0-0.9,0.4-0.9,0.9v0V10c0,8.3,0.1,8.5,0.4,8.8c0.4,0.5,5.5,3.2,5.7,3.3
                                                C22.3,22.2,22.4,22.2,22.5,22.2L22.5,22.2z M17.5,6.6V6.4c0-0.5-0.4-0.9-0.9-0.8c-0.5,0-0.8,0.4-0.8,0.8v0.2c0,0.5,0.4,0.9,0.9,0.8
                                                C17.1,7.4,17.5,7,17.5,6.6L17.5,6.6z M29.7,16.3c-0.5,0-0.9,0.4-0.9,0.9c0,0,0,0,0,0v0.2c0,0.5,0.4,0.9,0.9,0.8
                                                c0.5,0,0.8-0.4,0.8-0.8v-0.2C30.6,16.7,30.2,16.3,29.7,16.3L29.7,16.3z M27.8,22.6c-0.5,0-0.9,0.4-0.9,0.9v0v0.2
                                                c0,0.5,0.4,0.9,0.9,0.8c0.5,0,0.8-0.4,0.8-0.8v-0.2C28.7,23,28.3,22.6,27.8,22.6C27.8,22.6,27.8,22.6,27.8,22.6L27.8,22.6z M23,26.5
                                                c-0.5,0-0.9,0.4-0.9,0.9c0,0,0,0,0,0v0.2c0,0.5,0.4,0.9,0.9,0.8c0.5,0,0.8-0.4,0.8-0.8v-0.2C23.8,26.8,23.4,26.4,23,26.5
                                                C23,26.5,23,26.5,23,26.5L23,26.5z M11.4,25.5c-0.5,0-0.9,0.4-0.9,0.9v0.2c0,0.5,0.4,0.9,0.9,0.8c0.5,0,0.8-0.4,0.8-0.8v-0.2
                                                C12.3,25.9,11.9,25.5,11.4,25.5z M6.8,21.5c-0.5,0-0.9,0.4-0.9,0.9v0v0.2c0,0.5,0.4,0.9,0.9,0.8c0.5,0,0.8-0.4,0.8-0.8v-0.2
                                                C7.7,21.9,7.3,21.5,6.8,21.5C6.8,21.5,6.8,21.5,6.8,21.5z M6.3,17.3v-0.2c0-0.5-0.4-0.9-0.9-0.8c-0.5,0-0.8,0.4-0.8,0.8v0.2
                                                c0,0.5,0.4,0.9,0.9,0.8C6,18.2,6.3,17.8,6.3,17.3z M7.1,11.2c-0.5,0-0.9,0.4-0.9,0.9v0.2c0,0.5,0.4,0.9,0.9,0.9
                                                c0.5,0,0.9-0.4,0.9-0.9v-0.2C7.9,11.6,7.6,11.2,7.1,11.2L7.1,11.2z M11.9,8.8V8.6c0-0.5-0.4-0.9-0.9-0.8c-0.5,0-0.8,0.4-0.8,0.8v0.2
                                                c0,0.5,0.4,0.9,0.9,0.8C11.5,9.6,11.9,9.3,11.9,8.8L11.9,8.8z M22.8,8.9c0.5,0,0.9-0.4,0.9-0.9V7.8c0-0.5-0.4-0.9-0.9-0.9
                                                c-0.5,0-0.9,0.4-0.9,0.9V8C21.9,8.5,22.3,8.9,22.8,8.9L22.8,8.9z M28.1,12v-0.2c0-0.5-0.4-0.9-0.9-0.8c-0.5,0-0.8,0.4-0.8,0.8V12
                                                c0,0.5,0.4,0.9,0.9,0.8C27.7,12.8,28.1,12.5,28.1,12L28.1,12z M17.5,27.4c-0.5,0-0.9,0.4-0.9,0.9c0,0,0,0,0,0v0.2
                                                c0,0.5,0.4,0.9,0.9,0.8c0.5,0,0.8-0.4,0.8-0.8v-0.2C18.3,27.8,17.9,27.4,17.5,27.4L17.5,27.4z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <p class="name">momento<br>del día</p>
                                </a>
                                <div class="filtro-select-content">
                                    <select class="filtro-select select-popup" name="moment" data-selector="moment">
                                        <option value="">Quitar filtro</option>
                                        @foreach($momentTags as $momentTag)
                                        <option value="{{ $momentTag->id }}">{{ $momentTag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li class="filtro">
                                <a class="btn-link select-button" href="#" data-open="special_needs">
                                    <div class="btn">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 35 35">
                                            <path d="M5.8,12.9c-0.4,0-0.8-0.3-0.9-0.7C4.8,11.1,5.1,9.9,5.8,9c0.8-1.1,2-1.7,3.3-1.8
                                                c0.5,0,0.9,0.4,0.9,0.9c0,0.5-0.4,0.9-0.9,0.9c-0.8,0-1.5,0.4-2,1.1c-0.4,0.5-0.6,1.1-0.5,1.7c0.1,0.5-0.2,1-0.7,1.1
                                                C6,12.9,5.9,12.9,5.8,12.9z M17.6,31.5c-3.1,0-11-6.2-14.8-12.8c-2.7-4.6-3-8.7-0.9-11.8c1.3-2,3.4-3.3,5.8-3.4
                                                C11.2,3.4,15,5.7,17,7.7c2.6-2.6,6.2-4.1,9.9-4.1c2.9,0,5.6,1.8,6.8,4.4c1.3,2.7,1,5.9-0.9,9.5c-3.8,7.1-13.1,13.7-14.9,13.9
                                                C17.8,31.5,17.7,31.5,17.6,31.5z M8,5.3c-0.1,0-0.2,0-0.3,0C5.9,5.4,4.3,6.4,3.3,7.9c-2.1,3.1-0.6,7.1,1,9.9
                                                c3.8,6.5,11.1,11.9,13.2,11.9c0,0,0.1,0,0.1,0c1.3-0.2,10.4-6.6,13.9-13.5c1.4-2.8,1.6-5.3,0.6-7.3c-0.9-2.1-3-3.4-5.3-3.4
                                                c-3.9-0.2-8,2.4-9,4.1c-0.2,0.4-0.8,0.6-1.2,0.3c-0.1-0.1-0.2-0.1-0.2-0.2C14.9,7.9,11.3,5.3,8,5.3z"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <p class="name">preferencias</p>
                                </a>
                                <div class="filtro-select-content">
                                    <select multiple class="filtro-select select-popup" name="special_needs[]" data-selector="special_needs">
                                        @foreach($specialNeedTags as $specialNeedTag)
                                        <option value="{{ $specialNeedTag->id }}">{{ $specialNeedTag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <input type="submit" value="buscar receta ideal" class="btn-buscar-receta">
                </form>
            </div>
        </div>

        <div class="bk-slide">
            <ul class="bk-slide-content">
                <li class="item">
                    <img src="{{ asset('assets/images/home-main-bk.jpg') }}" srcset="{{ asset('assets/images/home-main-bk@2x.jpg') }} 2x" alt="home-main-bk" class="mobile">
                    <img src="{{ asset('assets/images/home-main-bk-d.jpg') }}" srcset="{{ asset('assets/images/home-main-bk-d@2x.jpg') }} 2x"  alt="home-main-bk" class="desktop">
                </li>
            </ul>
        </div>
    </section>


    <section class="recetas-slider-section">
        <div class="wrap">
            <div class="main-subtitle">
                <span class="misc"></span>
                <h2 class="txt">conocé nuestras recetas</h2>
                <span class="misc right"></span>
            </div>
        </div>
        <div class="swiper-container recetas-slider-content">
            <ul class="swiper-wrapper recetas-slider">
                @foreach($recipes as $recipe)
                <li class="swiper-slide item receta">
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
                                @if( !is_null($tagRecipe->icon_image) )
                                <span><img src="{{ asset($tagRecipe->icon_image) }}" alt="{{ $tagRecipe->title }}"></span>
                                @endif
                                <p>{{ $tagRecipe->title }}</p>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="swiper-button-content">
                <div class="swiper-button swiper-button-next"></div>
                <div class="swiper-button swiper-button-prev"></div>
            </div>
        </div>
    </section>


    <section class="recetas-banner-section">

        <div class="swiper-container recetas-banner-content">
            <ul class="swiper-wrapper recetas-banner">
                @foreach($banners as $banner)
                <li class="swiper-slide item banner">
                    <div class="txt-content">
                        <div class="wrap">
                            @if( !is_null($banner->title) )
                            <div class="subtitle">
                                <h2>{{ $banner->title }}</h2>
                            </div>
                            @endif
                            @if( !is_null($banner->text) )
                            <h3>
                                @if( !is_null($banner->link) )
                                <a href="{{ $banner->link }}">
                                @endif
                                    {{ $banner->text }}
                                @if( !is_null($banner->link) )
                                </a>
                                @endif
                            </h3>
                            @endif
                            @if( $banner->tags()->count() > 0 )
                            <ul class="caracteristicas">
                                @foreach($banner->tags()->get() as $tagBanner)
                                <li>
                                    @if( !is_null($tagBanner->icon_image) )
                                    <span><img src="{{ asset($tagBanner->icon_image) }}" alt="{{ $tagBanner->title }}"></span>
                                    @endif
                                    <p>{{ $tagBanner->title }}</p>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            @if( !is_null($banner->youtube_video) )
                                @php
                                    $youtubeVideoJson = json_decode($banner->youtube_video);
                                @endphp
                                @if( $agent->isMobile() || $agent->isTablet() )
                                <a href="{{ $youtubeVideoJson->url }}" class="btn-ver-video" data-lity>ver video</a>
                                @endif
                                @if( $agent->isDesktop() && !is_null($banner->link) )
                                <a href="{{ $banner->link }}" class="btn-ver-receta">ver receta</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    @if( !is_null($banner->mobile_image) || !is_null($banner->desktop_image) )
                    <div class="banner-bk">
                        @if( $agent->isDesktop() && isset($youtubeVideoJson) )
                        <a href="{{ $youtubeVideoJson->url }}" class="btn-ver-video" data-lity>ver video</a>
                        @endif
                        <img src="{{ $agent->isMobile() ? asset($banner->mobile_image) : asset($banner->desktop_image) }}" alt="{{ $banner->title }}">
                    </div>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>

    </section>

    @if( $productFamilies->count() > 0 )
    <section class="productos-familia-slider-section">
        <div class="wrap">
            <div class="main-subtitle">
                <span class="misc"></span>
                <h2 class="txt">conocé nuestros productos</h2>
                <span class="misc right"></span>
            </div>
        </div>
        <div class="swiper-container productos-familia-slider-content">
            <ul class="swiper-wrapper productos-slider">
                @foreach($productFamilies as $productFamily)
                <li class="swiper-slide item producto">
                    <a href="{{ $productFamily->productSubfamily()->exists() ? route('product.subfamily', [$productFamily->slug, $productFamily->productSubfamily->slug]) : route('product.details', $productFamily->slug) }}">
                        <div class="producto-name">
                            <h3>{{ $productFamily->title }}</h3>
                        </div>
                        @if( !is_null($productFamily->icon_image) )
                        <div class="image-content">
                            <div class="image-content-mask" ><img src="{{ asset($productFamily->icon_image) }}" alt="{{ $productFamily->title }}"></div>
                        </div>
                        @endif
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="swiper-button-content">
                <div class="swiper-button swiper-button-next"></div>
                <div class="swiper-button swiper-button-prev"></div>
            </div>
        </div>
    </section>
    @endif

    <section class="instagram-feed-section">
        <div class="wrap">
            <div class="main-subtitle">
                <span class="misc"></span>
		<h2 class="txt">Para recetas y más, seguinos en <span>@</span>cocinalacampagnola en Instagram!</h2>
                <span class="misc right"></span>
            </div>
            <div id="curator-feed-default-layout"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
        </div>
    </section>

</main>


@endsection

@section('js')
<!-- The Javascript can be moved to the end of the html page before the </body> tag -->
<script type="text/javascript">
/* curator-feed-default-layout */
(function(){
var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
i.src = "https://cdn.curator.io/published/9237dfd3-98b9-483e-a5b8-57ca19462852.js";
e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
})();
</script>

<script type="application/ld+json">
{ "@context" : "http://schema.org",
  "@type" : "Brand",
  "url" : "http://www.lacampagnola.com/",
  "contactPoint" : [
    { "@type" : "ContactPoint",
      "telephone" : "0800-3333-111",
      "contactType" : "customer service"
    } ] }
</script>

@endsection
