<header>
    <div class="wrap">
        <div class="main-menu">
            <input type="checkbox" name="thing" value="valuable" id="thing"/><label for="thing"></label>
            <nav class="main-menu-content">
                <ul class="link-content">
                    <li class="link-btn"><a href="<?php echo e(route('our-history')); ?>">Nuestra Historia</a></li>
                    <span class="separator lightgrey"></span>
                    <li class="link-btn"><a href="<?php echo e(route('products')); ?>">Productos</a></li>
                    <span class="separator lightgrey"></span>
                    <li class="link-btn"><a href="<?php echo e(route('recipes')); ?>">Recetas</a></li>
                    <span class="separator lightgrey"></span>
                    <li class="link-btn"><a href="<?php echo e(route('vegetables')); ?>">#sumavegetales</a></li>
                    <span class="separator lightgrey"></span>
                    <li class="link-btn"><a href="<?php echo e(route('contact')); ?>">Contacto</a></li>
                    <span class="separator lightgrey"></span>
                </ul>
                <ul class="social-content">
                    <li class="link-social"><a href="https://www.facebook.com/CocinaLaCampagnola" target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45 45">
                        <path d="M28.8,15.5h-2.1c-1.7,0-2,0.8-2,1.9V20h4l-0.5,4h-3.4v10.3h-4.1V24h-3.5v-4h3.5v-3c0-3.4,2.1-5.3,5.1-5.3
                            c1,0,2.1,0,3.1,0.2L28.8,15.5L28.8,15.5z"/>
                        </svg>
                        </a>
                    </li>
                    <li class="link-social"><a href="https://twitter.com/Cocinaen140" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45 45">
                            <path d="M30.9,18.2c0,0.2,0,0.4,0,0.6c0,6.8-5.5,12.3-12.3,12.3c-2.4,0-4.7-0.7-6.6-1.9c0.3,0,0.7,0.1,1,0.1
                                c1.9,0,3.8-0.6,5.4-1.8c-1.8,0-3.5-1.2-4-3c0.6,0.1,1.3,0.1,1.9-0.1c-2-0.4-3.5-2.2-3.5-4.2c0,0,0,0,0-0.1c0.6,0.3,1.3,0.5,2,0.5
                                c-1.9-1.3-2.5-3.8-1.3-5.8c2.2,2.7,5.4,4.3,8.9,4.5c-0.1-0.3-0.1-0.7-0.1-1c0-2.4,1.9-4.3,4.3-4.3c1.2,0,2.3,0.5,3.1,1.4
                                c1-0.2,1.9-0.5,2.7-1c-0.3,1-1,1.8-1.9,2.4c0.9-0.1,1.7-0.3,2.5-0.7C32.4,16.8,31.7,17.6,30.9,18.2z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="link-social"><a href="https://instagram.com/cocinalacampagnola" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45 45">
                            <path class="st0" d="M36.8,15.3c-0.3-1.3-1.3-2.3-2.6-2.7C31.8,12,22.5,12,22.5,12s-9.3,0-11.6,0.6C9.6,13,8.6,14,8.2,15.3
                                c-0.8,4.8-0.8,9.7,0,14.4c0.3,1.3,1.3,2.3,2.6,2.7C13.2,33,22.5,33,22.5,33s9.3,0,11.6-0.6c1.3-0.4,2.3-1.4,2.6-2.7v0
                                C37.6,24.9,37.6,20.1,36.8,15.3z M19.5,26.9v-8.9l7.8,4.4L19.5,26.9z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="bajada"><h4>PARA REALIZAR UNA CONSULTA,<br>LLAMANOS AL <span>0800-3333-111</span></h4></div>
                <span class="separator"></span>
                <div class="copy"><p>Copyright La Campagnola <?php echo e(date('Y')); ?>.<br>Todos los derechos reservados.</p></div>
            </nav>
        </div>
        <?php if( Request::is('/') ): ?>
        <h1 class="logo"><a href="<?php echo e(route('home')); ?>"></a></h1>
        <?php else: ?>
        <h3 class="logo"><a href="<?php echo e(route('home')); ?>"></a></h3>
        <?php endif; ?>
        <div class="main-search">
            <div class="input-content"><input type="text" id="q" data-url="<?php echo e(route('predictive-search')); ?>" autocomplete="off"></div>
            <button class="zoom"></button>
        </div>
    </div>
</header>
<?php /**PATH /var/www/html/resources/views/partials/header.blade.php ENDPATH**/ ?>