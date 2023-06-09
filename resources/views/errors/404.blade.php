@extends('layouts.main')

@section('content')

<main class="page-404-error">
    <section class="general-header">
        <div class="image-bk">
            <img src="{{ asset('assets/images/historia-home-header.jpg') }}" srcset="{{ asset('assets/images/historia-home-header@2x.jpg') }} 2x" alt="historia-home-header" class="mobile">
            <img src="{{ asset('assets/images/historia-home-header-d.jpg') }}" srcset="{{ asset('assets/images/historia-home-header-d@2x.jpg') }} 2x" alt="historia-home-header" class="desktop">
        </div>
    </section>
    <div class="internal-content">
      <section class="error-section">
        <div class="wrap">
          <div class="main-subtitle big">
            <span class="misc"></span>
            <h2 class="txt">Lo sentimos</h2>
            <span class="misc"></span>
          </div>
          <div class="subtitle"><h2>El contenido que está buscando no está disponible</h2></div>
          <a href="/" class="boton">ir a la página de inicio<span class="icon"></span></a>
        </div>
      </section>
    </div>
</main>

@endsection
