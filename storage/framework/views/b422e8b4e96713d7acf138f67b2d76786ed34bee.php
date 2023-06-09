<?php $__env->startSection('title', '- Productos'); ?>
<?php $__env->startSection('description', 'Desde hace más de 100 años, los productos La Campagnola son elaborados con los más altos estándares de calidad para acompañar la mesa familiar argentina.'); ?>

<?php $__env->startSection('content'); ?>
<main class="page-products-home">

    <section class="general-header">
        <div class="image-bk">
            <img src="<?php echo e(asset('assets/images/producto-home-header.jpg')); ?>" srcset="<?php echo e(asset('assets/images/producto-home-header@2x.jpg')); ?> 2x" alt="producto-home-header" class="mobile">
            <img src="<?php echo e(asset('assets/images/producto-home-header-d.jpg')); ?>" srcset="<?php echo e(asset('assets/images/producto-home-header-d@2x.jpg')); ?> 2x" alt="producto-home-header" class="desktop">
        </div>
    </section>

    <div class="internal-content">
        <section class="products-family-section">
            <div class="wrap">
                <div class="main-title"><h1>conocé nuestra <br>familia de productos</h1></div>
                <span class="separator"></span>
                <ul class="family-products-list">
                    <?php $__currentLoopData = $productFamilies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFamily): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="producto">
                        <a href="<?php echo e($productFamily->productSubfamily()->exists() ? route('product.subfamily', [$productFamily->slug, $productFamily->productSubfamily->slug]) : route('product.details', $productFamily->slug)); ?>">
                            <div class="producto-name">
                                <h3><?php echo e($productFamily->title); ?></h3>
                            </div>
                            <?php if( !is_null($productFamily->icon_image) ): ?>
                            <div class="image-content">
                                <div class="image-content-mask" ><img src="<?php echo e(asset($productFamily->icon_image)); ?>" alt="<?php echo e($productFamily->title); ?>"></div>
                            </div>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/products/index.blade.php ENDPATH**/ ?>