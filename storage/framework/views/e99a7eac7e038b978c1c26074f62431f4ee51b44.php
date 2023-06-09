<?php $__env->startSection('meta'); ?>
<?php if( isset($productSubfamily) && !is_null($productSubfamily) ): ?>
<!-- META -->
<meta name="title" content="<?php echo e($productSubfamily->meta_title); ?>">
<meta name="description" content="<?php echo e($productSubfamily->meta_description); ?>">
<meta name="keywords" content="<?php echo e($productSubfamily->meta_keywords); ?>" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo e(url()->full()); ?>">
<meta name="twitter:title" content="<?php echo e($productSubfamily->meta_title); ?>">
<meta name="twitter:description" content="<?php echo e($productSubfamily->meta_description); ?>">
<meta name="twitter:creator" content="La Campagnola">

<meta name="twitter:image" content="<?php echo e(!is_null($productSubfamily->desktop_header_image) ? asset($productSubfamily->desktop_header_image) : ''); ?>">

<!-- Open Graph data -->
<meta property="og:title" content="<?php echo e($productSubfamily->meta_title); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo e(url()->full()); ?>" />
<meta property="og:image" content="<?php echo e(!is_null($productSubfamily->desktop_header_image) ? asset($productSubfamily->desktop_header_image) : ''); ?>" />
<meta property="og:description" content="<?php echo e($productSubfamily->meta_description); ?>" />
<!-- END META -->
<?php else: ?>
<!-- META -->
<meta name="title" content="<?php echo e($productFamily->meta_title); ?>">
<meta name="description" content="<?php echo e($productFamily->meta_description); ?>">
<meta name="keywords" content="<?php echo e($productFamily->meta_keywords); ?>" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo e(url()->full()); ?>">
<meta name="twitter:title" content="<?php echo e($productFamily->meta_title); ?>">
<meta name="twitter:description" content="<?php echo e($productFamily->meta_description); ?>">
<meta name="twitter:creator" content="La Campagnola">

<meta name="twitter:image" content="<?php echo e(asset($productFamily->desktop_header_image)); ?>">

<!-- Open Graph data -->
<meta property="og:title" content="<?php echo e($productFamily->meta_title); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo e(url()->full()); ?>" />
<meta property="og:image" content="<?php echo e(asset($productFamily->desktop_header_image)); ?>" />
<meta property="og:description" content="<?php echo e($productFamily->meta_description); ?>" />
<!-- END META -->
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="page-products-detail">

    <?php if( isset($productSubfamily) && !is_null($productSubfamily) ): ?>
    <?php if( (!is_null($productSubfamily->desktop_header_video) && !is_null($productSubfamily->mobile_header_video)) || (!is_null($productSubfamily->mobile_header_image) && !is_null($productSubfamily->desktop_header_image)) ): ?>
    <section class="general-header">
        <?php if( !is_null($productSubfamily->desktop_header_video) && !is_null($productSubfamily->mobile_header_video) ): ?>
        <div class="video-bk">
            <video src="<?php echo e($agent->isMobile() ? asset($productSubfamily->mobile_header_video) : asset($productSubfamily->desktop_header_video)); ?>" class="<?php echo e($agent->isMobile() ? 'mobile' : ''); ?>" autoplay muted loop></video>
        </div>
        <?php elseif( !is_null($productSubfamily->mobile_header_image) && !is_null($productSubfamily->desktop_header_image) ): ?>
        <div class="image-bk">
            <img src="<?php echo e($agent->isMobile() ? asset($productSubfamily->mobile_header_image) : asset($productSubfamily->desktop_header_image)); ?>" alt="<?php echo e($productSubfamily->title); ?>">
        </div>
        <?php endif; ?>
    </section>
    <?php endif; ?>
    <?php else: ?>
    <?php if( (!is_null($productFamily->desktop_header_video) && !is_null($productFamily->mobile_header_video)) || (!is_null($productFamily->mobile_header_image) && !is_null($productFamily->desktop_header_image)) ): ?>
    <section class="general-header">
        <?php if( !is_null($productFamily->desktop_header_video) && !is_null($productFamily->mobile_header_video) ): ?>
        <div class="video-bk">
            <video src="<?php echo e($agent->isMobile() ? asset($productFamily->mobile_header_video) : asset($productFamily->desktop_header_video)); ?>" class="<?php echo e($agent->isMobile() ? 'mobile' : ''); ?>" autoplay muted loop></video>
        </div>
        <?php elseif( !is_null($productFamily->mobile_header_image) && !is_null($productFamily->desktop_header_image) ): ?>
        <div class="image-bk">
            <img src="<?php echo e($agent->isMobile() ? asset($productFamily->mobile_header_image) : asset($productFamily->desktop_header_image)); ?>" alt="<?php echo e($productFamily->title); ?>">
        </div>
        <?php endif; ?>
    </section>
    <?php endif; ?>
    <?php endif; ?>

    <div class="internal-content">

        <section class="products-details-section">
            <div class="wrap">
                <div class="main-title"><h1><?php echo e($productFamily->title); ?></h1></div>
				<div class="main-subtitle"><?php echo $productFamily->description; ?></div>
                <ul class="subcategory-products-list">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li itemscope itemtype="http://schema.org/IndividualProduct" class="product">
                            <?php if( !is_null($product->image) ): ?>
                            <div class="img-content">
                                <img itemprop="image" src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->title); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="name">
                                <h4 itemprop="name"><?php echo e($product->title); ?></h4>
                            </div>
                            <?php if( !is_null($product->presentation) ): ?>
                            <div class="detail">
                                <p><?php echo e($product->presentation); ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if( $product->tags()->count() > 0 ): ?>
                            <ul class="caracteristicas">
                                <?php $__currentLoopData = $product->tags()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <span><img src="<?php echo e(asset($tag->icon_image)); ?>" alt="<?php echo e($tag->title); ?>"></span>
                                    <p><?php echo e($tag->title); ?></p>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </section>

        <?php if( isset($productSubfamily) && !is_null($productSubfamily) ): ?>
            <?php if( $productSubfamily->benefits()->count() > 0 ): ?>
            <section class="products-bondades-section">
                <div class="wrap">

                    <div class="main-subtitle big">
                        <span class="misc"></span>
                        <h2 class="txt">bondades</h2>
                        <span class="misc right"></span>
                    </div>

                    <ul class="bondades-products-list">
                        <?php $__currentLoopData = $productSubfamily->benefits()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="bondad">
                            <?php if( !is_null($benefit->image) ): ?>
                            <div class="icon-content">
                                <span class="icon">
                                    <img src="<?php echo e(asset($benefit->image)); ?>" alt="<?php echo e($benefit->title); ?>">
                                </span>
                            </div>
                            <?php endif; ?>
                            <div class="name"><h4><?php echo e($benefit->title); ?></h4></div>
                            <?php if( !is_null($benefit->short_description) ): ?>
                            <div class="detail">
                                <p><?php echo e($benefit->short_description); ?></p>
                            </div>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                </div>
            </section>
            <?php endif; ?>
        <?php else: ?>
            <?php if( $productFamily->benefits()->count() > 0 ): ?>
            <section class="products-bondades-section">
                <div class="wrap">

                    <div class="main-subtitle big">
                        <span class="misc"></span>
                        <h2 class="txt">bondades</h2>
                        <span class="misc right"></span>
                    </div>

                    <ul class="bondades-products-list">
                        <?php $__currentLoopData = $productFamily->benefits()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="bondad">
                            <?php if( !is_null($benefit->image) ): ?>
                            <div class="icon-content">
                                <span class="icon">
                                    <img src="<?php echo e(asset($benefit->image)); ?>" alt="<?php echo e($benefit->title); ?>">
                                </span>
                            </div>
                            <?php endif; ?>
                            <div class="name"><h4><?php echo e($benefit->title); ?></h4></div>
                            <?php if( !is_null($benefit->short_description) ): ?>
                            <div class="detail">
                                <p><?php echo e($benefit->short_description); ?></p>
                            </div>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                </div>
            </section>
            <?php endif; ?>
        <?php endif; ?>

        <?php if( $recipesWithProducts->count() ): ?>
        <section class="recetas-slider-section">
            <div class="wrap">
                <div class="main-subtitle">
                    <span class="misc"></span>
                    <h2 class="txt">recetas DE ESTE PRODUCTO</h2>
                    <span class="misc"></span>
                </div>
            </div>
            <div class="swiper-container recetas-slider-content">
                <ul class="swiper-wrapper recetas-slider">
                    <?php $__currentLoopData = $recipesWithProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li itemscope itemtype="http://schema.org/Recipe" class="swiper-slide item receta">
                        <a itemprop="url" href="<?php echo e(route('recipe.details', $recipe->slug)); ?>">
                            <?php if( !is_null($recipe->icon_image) ): ?>
                            <div class="image-content">
                                <div class="image-content-mask" ><img itemprop="image" src="<?php echo e(asset($recipe->icon_image)); ?>" alt="<?php echo e($recipe->title); ?>"></div>
                            </div>
                            <?php endif; ?>
                            <div class="receta-name">
                                <h3 itemprop="name"><?php echo e($recipe->title); ?></h3>
                            </div>
                            <?php if( $recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->count() > 0 ): ?>
                            <ul class="caracteristicas">
                                <?php $__currentLoopData = $recipe->tags()->whereRaw('(is_special_need_tag = 1 OR is_duration_tag = 1)')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tagRecipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <span><img src="<?php echo e(asset($tagRecipe->icon_image)); ?>" alt="<?php echo e($tagRecipe->title); ?>"></span>
                                    <p itemprop="recipeCategory"><?php echo e($tagRecipe->title); ?></p>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="swiper-button-content">
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <?php endif; ?>

    </div>






</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/products/details.blade.php ENDPATH**/ ?>