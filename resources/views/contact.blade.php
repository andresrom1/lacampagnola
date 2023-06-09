@extends('layouts.main')

@section('title', '- Contacto')
@section('description', '¿Cómo podemos ayudarte? Realiza tu consulta comunicándote con nosotros.')

@section('content')

<main class="page-contact">
    <section class="general-header">
        <div class="image-bk">
            <img src="{{ asset('assets/images/contacto-home-header.jpg') }}" srcset="{{ asset('assets/images/contacto-home-header@2x.jpg') }} 2x" alt="contacto-home-header" class="mobile">
            <img src="{{ asset('assets/images/contacto-home-header-d.jpg') }}" srcset="{{ asset('assets/images/contacto-home-header-d@2x.jpg') }} 2x" alt="contacto-home-header" class="desktop">
        </div>
    </section>


    <div class="internal-content">

        <div class="wrap">

            <section class="contact-section">

                <div class="contact-help">
                    <div class="subtitle"><h2>¿Cómo podemos ayudarte?</h2></div>
                    <a href="https://www.arcor.com/contacto-bifurcador" target="_blank" class="boton">comunicate con nosotros<span class="icon"></span></a>
                    <span class="separator lightgrey"></span>
                </div>

                <div class="contact-phone">
                    <div class="subtitle"><h2>Atención al Consumidor</h2></div>
                    <div class="bajada"><h4>PARA REALIZAR UNA CONSULTA,<br>LLAMANOS AL <span><a href="tel:08003333111">0800-3333-111</a></span></h4></div>
                    <span class="separator lightgrey"></span>
                </div>

                <div class="contact-banner">
                    <div class="txt-content">
                        <div class="subtitle"><h2>visita nuestras redes sociales</h2></div>
                        <ul class="social">
                            <li class="icon fb">
                                <a href="https://www.facebook.com/CocinaLaCampagnola" target="_blank" rel="noopener noreferrer">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45 45">
                                        <path d="M28.3,15h-2.1c-1.7,0-2,0.8-2,1.9v2.6h4l-0.5,4h-3.4v10.3h-4.1V23.5h-3.5v-4h3.5v-3c0-3.4,2.1-5.3,5.1-5.3
                                            c1,0,2.1,0,3.1,0.2L28.3,15L28.3,15z"/>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            {{-- <li class="icon tw">
                                <a href="https://twitter.com/Cocinaen140" target="_blank">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45 45">
                                        <path d="M30.9,18.2c0,0.2,0,0.4,0,0.6c0,6.8-5.5,12.3-12.3,12.3c-2.3,0-4.7-0.7-6.6-1.9c0.3,0,0.7,0.1,1,0.1
                                            c1.9,0,3.8-0.6,5.4-1.8c-1.8,0-3.5-1.2-4-3c0.6,0.1,1.3,0.1,1.9-0.1c-2-0.4-3.5-2.2-3.5-4.2c0,0,0,0,0-0.1c0.6,0.3,1.3,0.5,2,0.5
                                            c-1.9-1.3-2.5-3.8-1.3-5.8c2.2,2.7,5.4,4.3,8.9,4.5c-0.5-2.3,0.9-4.6,3.2-5.2c1.5-0.4,3.1,0.1,4.1,1.3c1-0.2,1.9-0.5,2.7-1
                                            c-0.3,1-1,1.8-1.9,2.4c0.9-0.1,1.7-0.3,2.5-0.7C32.4,16.8,31.7,17.6,30.9,18.2L30.9,18.2z"/>
                                        </svg>
                                    </span>
                                </a>
                            </li> --}}
                            <li class="icon in">
                                <a href="https://instagram.com/cocinalacampagnola" target="_blank" rel="noopener noreferrer">
                                    <span>
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 35 35" style="enable-background:new 0 0 35 35;" xml:space="preserve">
                                            <style type="text/css">
                                                .st0{clip-path:url(#SVGID_2_);fill:url(#SVGID_3_);}
                                            </style>
                                            <g>
                                                <defs>
                                                    <path id="SVGID_1_" d="M17.5,12.4c-2.8,0-5.1,2.3-5.1,5.1s2.3,5.1,5.1,5.1s5.1-2.3,5.1-5.1S20.3,12.4,17.5,12.4L17.5,12.4z
                                                        M17.5,20.8c-1.8,0-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3s3.3,1.5,3.3,3.3S19.3,20.8,17.5,20.8L17.5,20.8z M22.8,11
                                                        c-0.7,0-1.2,0.5-1.2,1.2s0.5,1.2,1.2,1.2c0.7,0,1.2-0.5,1.2-1.2l0,0C24,11.5,23.5,11,22.8,11z M27.4,13.4c0-0.8-0.2-1.7-0.5-2.4
                                                        c-0.2-0.7-0.6-1.3-1.2-1.8c-0.5-0.5-1.1-0.9-1.8-1.2c-0.8-0.3-1.6-0.4-2.4-0.5c-0.9,0-1.3,0-4,0s-3.1,0-4.1,0.1
                                                        c-0.9,0-1.7,0.1-2.5,0.4c-0.6,0.3-1.2,0.7-1.7,1.2S8.3,10.3,8,10.9c-0.3,0.8-0.4,1.6-0.4,2.5c-0.1,1-0.1,1.4-0.1,4.1
                                                        s0,3.1,0.1,4.1c0,0.8,0.2,1.7,0.5,2.4c0.4,1.4,1.5,2.5,2.8,3c0.8,0.3,1.6,0.5,2.4,0.5c1.1,0,1.5,0,4.2,0s3.1,0,4.1-0.1
                                                        c0.8,0,1.7-0.2,2.4-0.5c0.7-0.2,1.3-0.6,1.8-1.2c0.5-0.5,0.9-1.1,1.2-1.8c0.3-0.8,0.4-1.6,0.5-2.4c0-1.1,0.1-1.4,0.1-4.1
                                                        S27.5,14.4,27.4,13.4L27.4,13.4z M25.6,21.5c0,0.6-0.1,1.3-0.3,1.9c-0.2,0.4-0.4,0.8-0.7,1.2c-0.3,0.3-0.7,0.6-1.1,0.8
                                                        c-0.6,0.2-1.2,0.3-1.9,0.3c-1.1,0.1-1.4,0.1-4,0.1s-3,0-4-0.1c-0.6,0-1.3-0.1-1.9-0.3c-0.4-0.2-0.8-0.4-1.2-0.8
                                                        c-0.3-0.3-0.6-0.7-0.7-1.2c-0.3-0.6-0.4-1.2-0.4-1.9c0-1.1-0.1-1.4-0.1-4s0-3,0.1-4c0-0.6,0.1-1.3,0.3-1.9
                                                        c0.2-0.4,0.4-0.8,0.8-1.2c0.3-0.3,0.7-0.6,1.2-0.8c0.5-0.1,1.1-0.2,1.8-0.2c1-0.1,1.3-0.1,4-0.1s3,0,4,0.1c0.6,0,1.3,0.1,1.9,0.3
                                                        c0.4,0.2,0.8,0.4,1.1,0.8c0.3,0.3,0.6,0.7,0.7,1.2c0.3,0.5,0.4,1.1,0.4,1.8c0,1.1,0.1,1.4,0.1,4S25.7,20.5,25.6,21.5L25.6,21.5z"
                                                        />
                                                </defs>
                                                <clipPath id="SVGID_2_">
                                                    <use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
                                                </clipPath>

                                                    <radialGradient id="SVGID_3_" cx="11.4683" cy="65.2234" r="25.7973" gradientTransform="matrix(-1.836970e-16 -1 -1 1.836970e-16 73.25 35)" gradientUnits="userSpaceOnUse">
                                                    <stop  offset="0" style="stop-color:#FAED24"/>
                                                    <stop  offset="3.569664e-02" style="stop-color:#F9E626"/>
                                                    <stop  offset="8.854577e-02" style="stop-color:#F8D828"/>
                                                    <stop  offset="0.152" style="stop-color:#F6C229"/>
                                                    <stop  offset="0.2238" style="stop-color:#F3A22A"/>
                                                    <stop  offset="0.3014" style="stop-color:#F17A28"/>
                                                    <stop  offset="0.35" style="stop-color:#F15B27"/>
                                                    <stop  offset="0.5" style="stop-color:#D41C5C"/>
                                                    <stop  offset="0.8" style="stop-color:#932A8E"/>
                                                    <stop  offset="1" style="stop-color:#932A8E"/>
                                                </radialGradient>
                                                <polygon class="st0" points="27.5,7.5 27.5,27.5 7.5,27.5 7.5,7.5 	"/>
                                            </g>
                                            </svg>
                                    </span>
                                </a>
                            </li>
                            <li class="icon yt">
                                <a href="https://www.youtube.com/channel/UCwOAEc5koRfQWGcmlnuDrWg" target="_blank" rel="noopener noreferrer">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45 45">
                                        <path d="M36.8,15.3c-0.3-1.3-1.3-2.3-2.6-2.7C31.8,12,22.5,12,22.5,12s-9.3,0-11.6,0.6C9.6,13,8.6,14,8.2,15.3
                                            c-0.4,2.4-0.6,4.8-0.6,7.2c0,2.4,0.2,4.8,0.6,7.2c0.3,1.3,1.3,2.3,2.6,2.6C13.2,33,22.5,33,22.5,33s9.3,0,11.6-0.6
                                            c1.3-0.4,2.3-1.4,2.6-2.6c0.4-2.4,0.6-4.8,0.6-7.2C37.4,20.1,37.2,17.7,36.8,15.3z M19.5,26.9v-8.9l7.8,4.4L19.5,26.9z"/>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="contact-legals">
                    <span class="separator lightgrey"></span>
                    <div class="logo"><a href="{{ route('home') }}"></a></div>
                    <div class="copy"><p>Todos los derechos reservados.</p></div>
                    <div class="terminos"><p><a href="#">Términos y condiciones.</a></p></div>
                </div>

            </section>
        </div>

    </div>

</main>
@endsection
