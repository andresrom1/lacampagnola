<?php $__env->startSection('title', '- Recetas'); ?>
<?php $__env->startSection('description', 'En tu cocina, se cocina mucho más que comidas. Conocé todas nuestras recetas.'); ?>

<?php $__env->startSection('content'); ?>
<main class="page-recipes-home">

    <section class="general-header">
        <div class="image-bk">
            <img src="<?php echo e(asset('assets/images/recetas-home-header.jpg')); ?>" srcset="<?php echo e(asset('assets/images/recetas-home-header@2x.jpg')); ?> 2x" alt="recetas-home-header" class="mobile">
            <img src="<?php echo e(asset('assets/images/recetas-home-header-d.jpg')); ?>" srcset="<?php echo e(asset('assets/images/recetas-home-header-d@2x.jpg')); ?> 2x" alt="recetas-home-header" class="desktop">
        </div>
    </section>

    <div class="internal-content">
        <section class="recipes-filters-section">
            <div class="wrap">
                <form action="<?php echo e(route('recipe-search')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="search-input">
                        <input type="search" name="q" autocomplete="off" placeholder="buscar receta">
                        <button class="btn-buscar">
                            <span class="lupa">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
                                <path d="M17.5,16.1l-4.3-4.3c0.9-1.2,1.4-2.6,1.4-4.2c0-3.9-3.2-7-7-7s-7,3.2-7,7s3.2,7,7,7c1.6,0,3-0.5,4.2-1.4
                                    l4.3,4.3L17.5,16.1z M7.5,12.6c-2.8,0-5-2.3-5-5s2.3-5,5-5s5,2.3,5,5S10.3,12.6,7.5,12.6z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="main-title"><h1>filtrar recetas por:</h1></div>
                    <ul class="filtros-list">
                        <li class="filtro">
                            <a class="btn select-button" href="#" data-open="product_category">
                                <div class="txt">categoría de productos</div><span class="icon"></span>
                            </a>
                            <div class="filtro-select-content">
                                <select class="filtro-select select-popup" name="product_category[]" data-placeholder="categoría de productos" multiple data-selector="product_category">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(( isset($categoriesSelected) && in_array($category->id, $categoriesSelected) ) ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </li>
                        <li class="filtro">
                            <a class="btn select-button" href="#" data-open="duration">
                                <div class="txt">tiempo de preparación</div><span class="icon"></span>
                            </a>
                            <div class="filtro-select-content">
                                <select class="filtro-select select-popup" name="duration" data-placeholder="tiempo de preparación" data-selector="duration">
                                    <option value="">Quitar filtro</option>
                                    <?php $__currentLoopData = $durationTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $durationTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($durationTag->id); ?>" <?php echo e(( isset($durationSelected) && $durationTag->id == $durationSelected ) ? 'selected' : ''); ?>><?php echo e($durationTag->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </li>
                        <li class="filtro">
                            <a class="btn select-button" href="#" data-open="moment">
                                <div class="txt">momento del día</div><span class="icon"></span>
                            </a>
                            <div class="filtro-select-content">
                                <select class="filtro-select select-popup" name="moment" data-selector="moment" data-placeholder="momento del día">
                                    <option value="">Quitar filtro</option>
                                    <?php $__currentLoopData = $momentTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momentTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($momentTag->id); ?>" <?php echo e(( isset($momentSelected) && $momentTag->id == $momentSelected ) ? 'selected' : ''); ?>><?php echo e($momentTag->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </li>
                        <li class="filtro">
                            <a class="btn select-button" id="special-needs" href="#" data-open="special_needs">
                                <div class="txt">preferencias</div><span class="icon"></span>
                            </a>
                            <div class="filtro-select-content">
                                <select multiple class="filtro-select select-popup" name="special_needs[]" data-placeholder="preferencias" data-selector="special_needs">
                                    <?php $__currentLoopData = $specialNeedTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialNeedTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($specialNeedTag->id); ?>" <?php echo e(( isset($specialNeedsSelected) && in_array($specialNeedTag->id, $specialNeedsSelected) ) ? 'selected' : ''); ?>><?php echo e($specialNeedTag->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </li>
                    </ul>

                    <!-- <span class="separator"></span> -->
                </form>
            </div>
        </section>


        <section class="recetas-list-section">
            <div class="loader-content" style="display:none">
                <div class="loader-big"></div>
            </div>

            <div class="wrap">

                <div class="main-subtitle big">
                    <span class="misc"></span>
                    <h2 class="txt">recetas</h2>
                    <span class="misc right"></span>
                </div>

                <ul class="recetas-list">
                    <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item receta">
                        <a href="<?php echo e(route('recipe.details', $recipe->slug)); ?>">
                            <?php if( !is_null($recipe->icon_image) ): ?>
                            <div class="image-content">
                                <div class="image-content-mask" ><img src="<?php echo e(asset($recipe->icon_image)); ?>" alt="<?php echo e($recipe->title); ?>"></div>
                            </div>
                            <?php endif; ?>
                            <div class="receta-name">
                                <h3><?php echo e($recipe->title); ?></h3>
                            </div>
                            <?php if( $recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->count() > 0 ): ?>
                            <ul class="caracteristicas">
                                <?php $__currentLoopData = $recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagRecipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <span><img src="<?php echo e(asset($tagRecipe->icon_image)); ?>" alt="<?php echo e($tagRecipe->title); ?>"></span>
                                    <p><?php echo e($tagRecipe->title); ?></p>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <div class="no-results" style="display:none"><p>No se encontraron resultados.</p></div>

                <?php if( $recipes->count() && $total > env('RECIPE_PAGINATION_RESULTS') ): ?>
                <a href="#" class="load-more" id="load-more" data-url="<?php echo e(route('recipes.load-more')); ?>" data-total="<?php echo e($total); ?>">Cargar más</a>
                <?php endif; ?>

            </div>

			<section class="banner-hashtag-section cocina">
                <div class="wrap">
                    <div class="txt-content">
                        <h3>Conocé nuestras recetas en:</h3>
                        <h2 class="hashtag-name"><a target="_blank" href="https://www.instagram.com/cocinalacampagnola/"><span>@</span>COCINALACAMPAGNOLA</a></h2>
                    </div>
                </div>
                <div class="banner-bk">
                    <img src="<?php echo e(asset('assets/images/IG_frutas-banner-1920x300.jpg')); ?>" srcset="<?php echo e(asset('assets/images/IG_frutas-banner-1920x300.jpg')); ?> 2x" alt="hashtag-banner-bk" class="mobile">
                    <img src="<?php echo e(asset('assets/images/IG_frutas-banner-1920x300.jpg')); ?>" srcset="<?php echo e(asset('assets/images/IG_frutas-banner-1920x300.jpg')); ?> 2x" alt="hashtag-banner-bk" class="desktop">
                </div>
            </section>
        </section>

    </div>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/recipes/index.blade.php ENDPATH**/ ?>