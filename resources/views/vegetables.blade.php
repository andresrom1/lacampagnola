@extends('layouts.main')

@section('title', '- Sumá Vegetales')
@section('description', 'La Campagnola es una marca con más de 100 años acompañando la mesa familiar argentina. Referente en el mercado de los alimentos y reconocida por sus consumidores por la excelencia en la calidad y por su trayectoria.')

@section('content')


<main class="page-vegetales">
    <section class="general-header">
        <div class="image-bk">
            <img src="{{ asset('assets/images/vegetales-home-header.jpg') }}" srcset="{{ asset('assets/images/vegetales-home-header@2x.jpg') }} 2x" alt="vegetales-home-header" class="mobile">
            <img src="{{ asset('assets/images/vegetales-home-header-d.jpg') }}" srcset="{{ asset('assets/images/vegetales-home-header-d@2x.jpg') }} 2x" alt="vegetales-home-header" class="desktop">
        </div>
    </section>
    
    
    <div class="internal-content">
        <section class="vegetables-section">
            <div class="wrap">
                <div class="main-title">
                    <h1>#sumavegetales</h1>
                </div>
                <span class="separator"></span>
                <div class="intro">
                    <div class="texto">
                        <h2>¿Por qué sumar vegetales?</h2><br>
                        <p>Los vegetales son ingredientes infaltables en todas las cocinas del mundo. Colorean, enriquecen y aportan una pizca de creatividad a todos los platos donde los incorporamos.
                            Aportan energía y contribuyen naturalmente a nuestro consumo de fibra, vitaminas y minerales y otras sustancias beneficiosas: los fitoquímicos.
                            Algunos vegetales como el choclo y las legumbres aportan también proteínas y carbohidratos complejos.<br><br>
                            <span>Los vegetales son alimentos básicos porque sus múltiples beneficios contribuyen a que llevemos una alimentación saludable en cualquier etapa de la vida: contribuyen a que los niños crezcan sanos y también proveen bienestar físico, mental y social en todas las edades.</span><br><br>
                            Ayudan al organismo a producir enzimas, hormonas y otras sustancias esenciales. Contribuyen a prevenir deficiencias de vitaminas y minerales y también el sobrepeso y la obesidad. Reducen el riesgo asociado con las enfermedades crónicas: el consumo de vegetales se asocia con la prevención de enfermedades cardiovasculares y diabetes, por ejemplo. Los vegetales proveen componentes que ayudan a formar una microbiota intestinal más saludable lo que aporta beneficios a nuestro sistema inmune.<br><br>

                            La cantidad óptima de vegetales en nuestra alimentación equivale a tres porciones por día. ¿Cómo podemos lograr incorporarlos? Armando platos en el almuerzo y la cena que contengan la mitad de vegetales, incorporándolos en otros momentos del día como el desayuno, la merienda o la colación y también experimentando con ellos: combinar colores, sabores, texturas y condimentos nos permite crear y conocer formas nuevas y prácticas de disfrutarlos
                        </p>
                    </div>
                    <div class="intro-imagen">
                        <img src="{{ asset('assets/images/vegetales-grafico.jpg') }}" alt="Vegetales">
                    </div>
                </div>
                
            </div>

                    @foreach($productFamilies as $productFamily)
                <div class="vegetal-wrapper">
                    <div class="main-title vegetal-title accordion">{{ $productFamily->title }} <span>▴</span> <img src="{{ asset($productFamily->icon_image) }}" alt="{{ $productFamily->title }}"></div>


       
                    <div class="panel">
                        @if(count($productFamily->benefits()->get()) > 0)
                        <section class="products-bondades-section">
                            <div>
                                <div class="vegetal-desc">
                                    {{ $productFamily->vegetables_description }}
                                </div>
                                <div class="main-subtitle big">
                                    <span class="misc"></span>
                                    <h2 class="txt">bondades</h2>
                                    <span class="misc right"></span>
                                </div>
                                <ul class="bondades-products-list">
                                    
                                    @foreach($productFamily->benefits()->get() as $benefit)
                                    <li class="bondad">
                                        <div class="icon-content">
                                            <span class="icon">
                                                <img src="{{ asset($benefit->image) }}" alt="{{ $benefit->title }}">
                                            </span>
                                        </div>
                                        <div class="name">
                                            <h4>{{ $benefit->title }}</h4>
                                        </div>
                                        <div class="detail">
                                            <p>{{ $benefit->short_description }}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                        </section>
                        @endif



          
                        <section class="recetas-slider-section">
                            <div>

                                <div class="main-subtitle">
                                    <span class="misc"></span>
                                    <h2 class="txt">recetas</h2>
                                    <span class="misc"></span>
                                </div>
                            </div>
                            <div class="swiper-container recetas-slider-content swiper-container-initialized swiper-container-horizontal">
                                <ul class="swiper-wrapper recetas-slider" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                    
                                    @forelse($productFamily->recipes as $recipe)
                                    <li itemscope="" itemtype="http://schema.org/Recipe" class="swiper-slide item receta swiper-slide-active" style="width: 185.5px;">
                                        <a itemprop="url" href="{{ route('recipe.details', $recipe->slug) }}">
                                            <div class="image-content">
                                                <div class="image-content-mask"><img itemprop="image" src="{{ asset($recipe->icon_image) }}" alt="{{ $recipe->title }}"></div>
                                            </div>
                                            <div class="receta-name">
                                                <h3 itemprop="name">{{ $recipe->title }}</h3>
                                            </div>
                                        </a>
                                    </li>
                                    @empty
                                        sin recetas
                                    @endforelse
                                    
                                </ul>
                                <div class="swiper-button-content">
                                    <div class="swiper-button swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                    <div class="swiper-button swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </section>

                    </div>





                </div>
                @endforeach
    
            <div class="wrap vegetable-variants">
                <div class="main-title">
                    <h1>¿Qué tipos de vegetales podemos sumar?</h1>
                </div>
                <span class="separator"></span>
                <div class="intro">
                    <div class="intro-imagen">
                        <img src="{{ asset('assets/images/vegetales-tipos.jpg') }}" alt="Vegetales">
                    </div>
                    <div class="texto">
                        <p><span>No existe una única definición aceptada ampliamente cuando hablamos de vegetales pero podemos identificar algunos grupos específicos que muchas veces son deficitarios en nuesta alimentación habitual y cuya incorporación contribuye sensiblemente a mejorar nuestro patron alimentario y así, nuestra calidad de vida:</span>
                            <br><br>

                            <span>- Las frutas,</span> se caracterizan por su sabor dulce, en general aportan hidratos de carbono (los azúcares), agua, fibra y micronutrientes destacándose las Vitaminas A y C y minerales como el potasio y el magnesio. Se recomienda incorporar dos porciones de fruta por día. <br><br>

                            <span>- Las hortalizas</span> forman el grupo más diverso. Se recomienda consumir 3 porciones de hortalizas por día. Dentro de este grupo encontramos raíces como zanahoria, remolacha y rabanitos; bulbos como ajo, cebolla y puerro; tallos como hinojo o espárrago; hortalizas de hoja como acelga, lechuga, espinaca y rúcula; las inflorescencias como el alcaucil; las hortalizas de fruto como berengena, ají, pimiento, tomate, pepino, zapallito , calabaza y choclo o maíz dulce y, por útltimo, las coles como broccoli y coliflor, repollitos de bruselas, repollo blanco y repollo colorado, En este grupo también pueden incluirse las setas y los hongos como el champignon. Las hortalizas nos permiten jugar y experimentar infitintamente en nuestra cocina con colores, texturas, aromas y sabores como si fueran la paleta de un pintor. De este modo se logran preparaciones que aportan diversidad de nutrients: fibra, vitaminas, minerales y sustancias bioactivas. En la variedad está la clave, es cuestión de animarnos a crear.
                            <br><br>

                            <span>- Las frutas secas</span> se distinguen de las frutas porque tienen menor cantidad de agua y aportan junto con vitaminas, minerales y otras sustancias bioactivas, proteínas vegetales y grasas de buena calidad. Dentro de este grupo encontramos nueces, almendras, avellanas, pistachos y castañas. Los alimentos de este grupo aportan una gran densidad nutricional y son muy energéticos. Una porción está en el orden de 15 gramos: un puñadito!!<br><br>

                            <span>- Las legumbres</span> son nutricionalmente muy interesantes ya que se caracterizan por aportar proteína vegetal, carbohidratos complejos que se digieren lentamente, fibra, vitaminas, minerales y fitoquímicos. Dentro de las legumbres encontramos arvejas, lentejas, porotos y garbanzos. ¿Sabías que el maní es una legumbre? Los granos integrales aportan fibra, carbohidratos complejos y en menor grado que las legumbres, también proteínas vegetales. Incluimos en este grupo al grano entero de trigo, avena, quinoa, amaranto, trigo sarraceno. Combinar legumbres y cereales a lo largo del día nos proporciona proteínas completas lo que es especiamlente importante sin no se consumen alimentos de origen animal.<br><br>
                            <span>Sumar más vegetales a nuestro día nos ayuda a mantener una alimentación saludable en cada etapa de la vida.</span>


                        </p>
                    </div>

                </div>
            </div>
            
            
                        <div class="wrap">
                <div class="main-title">
                    <h1>De cocinero a artista</h1>
                </div>
                <span class="separator"></span>
                <div class="intro">
                    <div class="texto">
                        <p> <span style="color:#df011f">Platos lo más parecidos a un arcoíris.</span><br>
                            Para sumar vegetales a nuestro plato, las posibilidades son infinitas: Verduras ralladas o en rodajas finas, vegetales horneados y encurtidos, hojas crudas o salteadas. También es posible complementar con frutas en el postre o colación, y para los que se animan, cortadas en cubitos como ingrediente fresco, por ejemplo, en ensaladas.
                            Cuanto más variados son los colores, mayor variedad de nutrientes incorporamos.
                            <br><br><br>

                            <span style="color:#df011f">Elecciones con motivo</span><br>
                            ¿Cómo potenciar el valor de los vegetales en el plato?
                            Sumando la energía de los carbohidratos, la saciedad de la fibra y la fuerza de las proteínas. Sumamos carbohidatos cuando incorporamos vegetales con cereales (arroz, polenta, pastas, avena), idealmente integrales.<br><br>Es posible sumar proteínas agregando carne magra, pollo, huevos o pescados como el atún, también lácteos como queso o yogurt (si se consume alimentos de origen animal). Y nos queda del recurso de las legumbres!! El interior de las legumbres es especial: aporta carbohidratos complejos y fibras y también proteínas vegetales

                            <br><br><br>

                            <span style="color:#df011f">¡El twist final!</span><br>
                            Incorporando grasas saludables ayudamos a la armonía de nuestro plato: Usando aceites vegetales para cocinar, una buena vinagreta para aliñar, un aderezo suave de palta, jugo de limón exprimido. Y también podemos toppinear con frutos secos, semillas, o trocitos de aceitunas. Elegir el blend de especias ideal nos ayuda a lograr ese toque especial y único que nos distingue en la cocina y nos brinda disfrute asegurado!!!<br><br>El arte de condimentar con especias permite utilizar menos sal o simplemente no usarla!! En el caso de optar por alimentos enlatados o conservados es bueno probar las comidas antes de agregar sal, podría no hacer falta!!! <br><br><br>

                            <span style="color:#df011f">Cuerpo activo e hidratado</span><br>
                            A ponerse en movimiento: Potenciamos nuestros hábitos saludables al ejercitar cuerpo y mente.
                            Para tomar en las comidas y durante todo el día, el agua es la bebida estrella.
                            <br><br>
                        </p>
                    </div>
                    <div class="intro-imagen">
                        <img src="{{ asset('assets/images/vegetales-artista.jpg') }}" alt="Vegetales">
                    </div>


                </div>
            </div>
            
            

            <section class="banner-hashtag-section cocina">
                <div class="wrap">
                    <div class="txt-content">
                        <h3>Conocé nuestras recetas en:</h3>
                        <h2 class="hashtag-name"><a target="_blank" href="https://www.instagram.com/cocinalacampagnola/"><span>@</span>COCINALACAMPAGNOLA</a></h2>
                    </div>
                </div>
                <div class="banner-bk">
                    <img src="{{ asset('assets/images/IG_frutas-banner-1920x300.jpg') }}" srcset="{{ asset('assets/images/IG_frutas-banner-1920x300.jpg') }} 2x" alt="hashtag-banner-bk" class="mobile">
                    <img src="{{ asset('assets/images/IG_frutas-banner-1920x300.jpg') }}" srcset="{{ asset('assets/images/IG_frutas-banner-1920x300.jpg') }} 2x" alt="hashtag-banner-bk" class="desktop">
                </div>
            </section>

        </section>
    </div>




</main>

@endsection
