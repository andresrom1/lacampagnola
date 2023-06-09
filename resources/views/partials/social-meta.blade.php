<!-- META -->
<meta name="title" content="{{ $settings->where('key', 'title')->first()->value }}">
@if (trim($__env->yieldContent('description')))
    <meta name="description" content="@yield('description')">
@else
  <meta name="description" content="{{ $settings->where('key', 'description')->first()->value }}">
@endif
<meta name="keywords" content="La Campagnola, LA CAMPAGNOLA, recetas La Campagnola, recetas la campagnola, recetas campagnola, recetas LC, productos La Campagnola, alimentos la campagnola, alimentos campagnola, alimentos LC, frutas La Campagnola, tomates La Campagnola, mermeladas La Campagnola, jaleas La Campagnola, pescados La Campagnola, legumbres La Campagnola, hortalizas La Campagnola, salsas La Campagnola, coctel La Campagnola, peras La Campagnola, ananá La Campagnola, pulpa de tomates La Campagnola, puré de tomates La Campagnola, Salsati La Campagnola, extracto triple de tomates La Campagnola, mermelada la campagnola durazno, mermelada la campagnola frutilla, mermelada la campagnola ciruela, mermelada la campagnola naranja, mermelada la campagnola damasco, mermelada la campagnola frambuesa, mermelada la campagnola arándano, la campagnola jalea de membrillo, tomate pelado perita entero la campagnola, tomate perita cubeteado la campagnola, pulpa de tomates salsati, puré de tomates salsati, tomate pelado perita salsati, tomate cubeteado salsati, salsa salsati pomarola, salsa salsati portuguesa, salsa salsati pizza, salsa salsati filetto, salsa salsati ajo y cebolla, arvejas frescas la campagnola, arvejas secas la campagnola, choclo amarillo la campagnola, choclo amarillo cremoso la campagnola, jardinera la campagnola, jardinera con choclo la campagnola, garbanzos la campagnola, lentejas la campagnola, porotos alubia la campagnola, porotos pallares la campagnola, atún al natural la campagnola, atún en aceite la campagnola, atún al natural la campagnola, atún en aceite de oliva la campagnola, atún en salsa de tomate la campagnola, atún en pouch al natural la campagnola, atún en pouch en aceite la campagnola, caballa al natural la campagnola, caballa en aceite y agua la campagnola, caballa en salsa de tomate la campagnola, ketchup la campagnola, ketchup picante la campagnola" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="{{ url()->full() }}">
<meta name="twitter:title" content="{{ $settings->where('key', 'title')->first()->value }} @yield('title')">
<meta name="twitter:description" content="{{ $settings->where('key', 'description')->first()->value }}">
<meta name="twitter:creator" content="La Campagnola">
{{-- Las imágenes de sumario de Twitter deben ser de al menos 200x200px --}}
<meta name="twitter:image" content="{{ asset($settings->where('key', 'image')->first()->value) }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ $settings->where('key', 'title')->first()->value }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:image" content="{{ asset($settings->where('key', 'image')->first()->value) }}" />
<meta property="og:description" content="{{ $settings->where('key', 'description')->first()->value }}" />
<!-- END META -->
