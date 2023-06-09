<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('meta')
    @includeWhen( !isset($exception) && \Route::current()->getName() != 'product.details' && \Route::current()->getName() != 'product.subfamily.details' && \Route::current()->getName() != 'recipe.details' , 'partials.social-meta')

    <meta name="author" content="Arcor S.A.I.C | http://www.lacampagnola.com/" />
    <meta name="copyright" content="® Copyright La Campagnola {{ date('Y') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('css')

    <title>{{ $settings->where('key', 'title')->first()->value }} @yield('title')</title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer',"{{ env('GTM_ID') }}");</script>
    <!-- End Google Tag Manager -->

    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">

</head>
<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ env('GTM_ID') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('partials.header')

    @yield('content')

    @includeWhen((Request::is('contacto') && $agent->isDesktop()) || !Request::is('contacto'), 'partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')

    <div id="fb-root"></div>
    <script async defer
    crossorigin="anonymous"
    src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0&appId={{ env('FB_APP_ID') }}&autoLogAppEvents=1"></script>
</body>
</html>
