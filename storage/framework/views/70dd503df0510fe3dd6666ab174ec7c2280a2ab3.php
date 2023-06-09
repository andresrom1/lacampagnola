<?php $__env->startSection('content'); ?>

<main class="page-search-result">

    <section class="general-header">
        <div class="image-bk">
            <img src="<?php echo e(asset('assets/images/resultados-busqueda-header.jpg')); ?>" srcset="<?php echo e(asset('assets/images/resultados-busqueda-header@2x.jpg')); ?> 2x" alt="resultados-busqueda-header" class="mobile">
            <img src="<?php echo e(asset('assets/images/resultados-busqueda-header-d.jpg')); ?>" srcset="<?php echo e(asset('assets/images/resultados-busqueda-header-d@2x.jpg')); ?> 2x" alt="resultados-busqueda-header" class="desktop">
        </div>
    </section>


    <div class="internal-content">

        <div class="main-title"><h1>mirá los resultados <br>de tu búsqueda</h1></div>

        <?php if( $recipeResults->count() ): ?>
        <section class="recetas-list-section">
            <div class="wrap">
                <div class="main-subtitle big">
                    <span class="misc"></span>
                    <h2 class="txt">recetas</h2>
                    <span class="misc"></span>
                </div>

                <ul class="recetas-list">
                    <?php $__currentLoopData = $recipeResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item receta">
                        <a href="<?php echo e(route('recipe.details', $recipe->slug)); ?>">
                            <div class="image-content">
                                <div class="image-content-mask" ><img src="<?php echo e(asset($recipe->icon_image)); ?>"></div>
                            </div>
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
            </div>
        </section>
        <?php endif; ?>

        <?php if( $productResults->count() ): ?>
        <section class="products-details-section">
            <div class="wrap">
                <div class="main-subtitle big">
                    <span class="misc"></span>
                    <h2 class="txt">productos</h2>
                    <span class="misc"></span>
                </div>

                <ul class="subcategory-products-list">
                    <?php $__currentLoopData = $productResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="product">
                            <a href="<?php echo e(route('product.details', $product->productFamily->slug)); ?>">
                                <div class="img-content">
                                    <img src="<?php echo e(asset($product->image)); ?>">
                                </div>
                                <div class="name">
                                    <h4><?php echo e($product->title); ?></h4>
                                </div>
                                
                                <?php if( $product->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->count() > 0 ): ?>
                                <ul class="caracteristicas">
                                    <?php $__currentLoopData = $product->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <span><img src="<?php echo e(asset($tag->icon_image)); ?>"></span>
                                        <p><?php echo e($tag->title); ?></p>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </section>
        <?php endif; ?>

        <?php if( !$recipeResults->count() && !$productResults->count() ): ?>
        <section class="results-notfound-section">
            <div class="wrap">
                <div class="no-results"><p>No se encontraron resultados.</p></div>
            </div>
        </section>
        <?php endif; ?>

        <section class="results-null-section">
            <div class="wrap">
                <span class="separator"></span>
                <form action="<?php echo e(route('recipes-with-filters')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="product_category[]" value="<?php echo e(!is_null($productCategory) ? implode(',', $productCategory) : ''); ?>">
                    <input type="hidden" name="duration" value="<?php echo e(!is_null($duration) ? $duration : ''); ?>">
                    <input type="hidden" name="moment" value="<?php echo e(!is_null($moment) ? $moment : ''); ?>">
                    <input type="hidden" name="special_needs[]" value="<?php echo e(!is_null($specialNeeds) ? implode(',', $specialNeeds) : ''); ?>">
                    <input type="submit" value="no encontré lo que buscaba" class="boton">
                </form>
                <!-- <a href="<?php echo e(route('home')); ?>" class="boton">no encontré lo que buscaba<span class="icon"></span></a> -->
            </div>
        </section>


    </div>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/search-results.blade.php ENDPATH**/ ?>