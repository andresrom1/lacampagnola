<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php echo $__env->yieldContent('meta'); ?>
    <?php echo $__env->renderWhen( !isset($exception) && \Route::current()->getName() != 'product.details' && \Route::current()->getName() != 'product.subfamily.details' && \Route::current()->getName() != 'recipe.details' , 'partials.social-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <meta name="author" content="Arcor S.A.I.C | http://www.lacampagnola.com/" />
    <meta name="copyright" content="® Copyright La Campagnola <?php echo e(date('Y')); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>

    <title><?php echo e($settings->where('key', 'title')->first()->value); ?> <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer',"<?php echo e(env('GTM_ID')); ?>");</script>
    <!-- End Google Tag Manager -->

    <link rel="icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">

</head>
<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo e(env('GTM_ID')); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->renderWhen((Request::is('contacto') && $agent->isDesktop()) || !Request::is('contacto'), 'partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <?php echo $__env->yieldContent('js'); ?>

    <div id="fb-root"></div>
    <script async defer
    crossorigin="anonymous"
    src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0&appId=<?php echo e(env('FB_APP_ID')); ?>&autoLogAppEvents=1"></script>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/main.blade.php ENDPATH**/ ?>