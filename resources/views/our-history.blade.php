@extends('layouts.main')

@section('title', '- Nuestra Historia')
@section('description', 'La Campagnola es una marca con más de 100 años acompañando la mesa familiar argentina. Referente en el mercado de los alimentos y reconocida por sus consumidores por la excelencia en la calidad y por su trayectoria.')

@section('content')

<main class="page-our-history">
    <section class="general-header">
        <div class="image-bk">
            <img src="{{ asset('assets/images/historia-home-header.jpg') }}" srcset="{{ asset('assets/images/historia-home-header@2x.jpg') }} 2x" alt="historia-home-header" class="mobile">
            <img src="{{ asset('assets/images/historia-home-header-d.jpg') }}" srcset="{{ asset('assets/images/historia-home-header-d@2x.jpg') }} 2x" alt="historia-home-header" class="desktop">
        </div>
    </section>


    <div class="internal-content">
        <section class="history-section">
            <div class="wrap">
                <div class="main-title"><h1>nuestra historia</h1></div>
                <div class="intro"><p>La Campagnola es una marca con más de 100 años acompañando la mesa familiar argentina. Referente en el mercado de los alimentos y reconocida por sus consumidores por la excelencia en la calidad y por su trayectoria.</p></div>
                <ul class="year-list">
                    <div class="line-content"><div class="line"></div></div>
                    <li class="year">
                        <div class="img-content">
                            <!-- <div class="img"><img src="{{ asset('assets/images/history-1912.png') }}" alt="history-1912"></div> -->
                            <div class="img">
                                <img src="{{ asset('assets/images/history-1912.png') }}" srcset="{{ asset('assets/images/history-1912@2x.png') }} 2x" alt="history-1912">
                            </div>
                        </div>
                        <div class="year-content"><h3>1912</h3><h4>Los inicios</h4></div>
                        <div class="txt-content">
                            <p>El inicio de La Campagnola S.A.C.I. se remonta a 1912 con la llegada a la Argentina de los fundadores de la empresa, Silvio y Luis Benvenuto.</p>
                            <p>Iniciaron la empresa comercializando productos que importaban desde Italia, como conservas de pescado y de tomates, y exportando productos argentinos hacia Europa.</p>
                            <p>Los productos se comercializaban con la figura de una campesina (campagnola en italiano).</p>
                        </div>
                    </li>
                    <li class="year">
                        <div class="img-content">
                            <div class="img">
                                <img src="{{ asset('assets/images/history-1933.png') }}" srcset="{{ asset('assets/images/history-1933@2x.png') }} 2x" alt="history-1933">
                            </div>
                        </div>
                        <div class="year-content"><h3>1933</h3><h4>La primera planta</h4></div>
                        <div class="txt-content">
                            <p>En 1933 los fundadores decidieron afincarse en la Argentina, transformando la firma en una empresa industrial y comercial.</p>
                            <p>En este año, se abrió la primera planta en Mar del Plata, dedicada a la elaboración de conservas de pescado.</p>
                            <p>En esta ciudad fomentaron la pesca de especies desconocidas en nuestras costas (por ejemplo la caballa), la incorporación de máquinas y nuevos procesos de elaboración.</p>
                            <p>La Campagnola así, se transformó en una empresa elaboradora y comercializadora de conservas de pescado.</p>
                        </div>
                    </li>
                    <li class="year">
                        <div class="img-content">
                            <div class="img">
                                <img src="{{ asset('assets/images/history-1940.png') }}" srcset="{{ asset('assets/images/history-1940@2x.png') }} 2x" alt="history-1940">
                            </div>
                        </div>
                        <div class="year-content"><h3>1940</h3><h4>Nereida</h4></div>
                        <div class="txt-content">
                            <p>En los años 40`, La Campagnola presentó su marca Nereida, que desde ese momento se constituye en la marca líder de sardinas de la Argentina.</p>
                        </div>
                    </li>
                    <li class="year">
                        <div class="img-content">
                            <div class="img">
                                <img src="{{ asset('assets/images/history-1950.png') }}" srcset="{{ asset('assets/images/history-1950@2x.png') }} 2x" alt="history-1950">
                            </div>
                        </div>
                        <div class="year-content"><h3>1950</h3><h4>La empresa alimenticia multiproducto</h4></div>
                        <div class="txt-content">
                            <p>A comienzos de la década del 50, La Campagnola SACI compró la fábrica de San Martín (Pcia. de Mendoza), comenzando así la industrialización de conservas de vegetales, frutas y mermeladas.</p>
                            <p>De esta manera, la empresa comenzó una era de crecimiento y expansión. En esa época, se realizaron varias campañas publicitarias para ampliar el paraguas de marca y transformarse en una empresa alimenticia multiproducto.</p>
                            <p>Las conservas de pescado ya gozaban de tanto prestigio que surgió una frase popular que decía: "¿Qué clase de pescado sos que La Campagnola no te envasa?"</p>
                            <p>Durante años, este dicho fue utilizado por la empresa en sus campañas publicitarias con ilustraciones realizadas por el famoso humorista Landrú.</p>
                            <p>En esta época también se realizaron los concursos de dibujos en revistas infantiles auspiciados por La Campagnola. "Según tu propia idea" era la frase con la que se alentaba la creatividad de los niños para que realizaran ilustraciones haciendo referencia a las mermeladas.</p>
                        </div>
                    </li>
                    <li class="year">
                        <div class="img-content">
                            <div class="img">
                                <img src="{{ asset('assets/images/history-1972.png') }}" srcset="{{ asset('assets/images/history-1972@2x.png') }} 2x" alt="history-1972">
                            </div>
                        </div>
                        <div class="year-content"><h3>1972</h3><h4>El tomate</h4></div>
                        <div class="txt-content">
                            <p>La Campagnola SACI fue la primera empresa del sector en cosechar mecánicamente el tomate y lo hizo en las fincas de Río Negro y Mendoza.</p>
                        </div>
                    </li>
                    <li class="year">
                        <div class="img-content">
                            <div class="img">
                                <img src="{{ asset('assets/images/history-1980.png') }}" srcset="{{ asset('assets/images/history-1980@2x.png') }} 2x" alt="history-1980">
                            </div>
                        </div>
                        <div class="year-content"><h3>1980</h3><h4>Lanzamiento de la línea BC</h4></div>
                        <div class="txt-content">
                            <p>Innovación con los nuevos envases tetrabrick y el lanzamiento de la Línea BC.</p>
                            <p>En la década del 80, se introdujo en la Argentina el tetrabrick. El mercado que más se vió impactado por esta novedad fue el mercado de puré de tomate. Inmediatamente, La Campagnola SACI, incorporó esta nueva tecnología en la pulpa, el puré y el jugo de tomate.</p>
                            <p>La línea BC se lanzó en 1986, como la opción dietética de los productos originales. El lanzamiento tuvo gran apoyo publicitario en TV y gráfica en diarios donde La Campagnola, como experta en calidad, presentaba su nueva línea de "productos dietéticos", "muy ricos y livianos" y "sin sacrificar la silueta".</p>
                            <p>Actualmente, los productos BC son sinónimo de un estilo de vida sana en el que se conjugan el placer y la salud.</p>
                            <p>Los nuevos hábitos de nuestro tiempo destacan la importancia de una alimentación balanceada y la línea BC ofrece alternativas con menos calorías pero con las mismas cualidades de sabor.</p>
                        </div>
                    </li>
                    <!-- <li class="year">
                        <div class="img-content">
                            <div class="img">
                                <img src="{{ asset('assets/images/history-1995.png') }}" srcset="{{ asset('assets/images/history-1995@2x.png') }} 2x" alt="history-1995">
                            </div>
                        </div>
                        <div class="year-content"><h3>1995</h3><h4>inicios</h4></div>
                        <div class="txt-content">
                            <p>Nuevas inversiones en Logística y Producción.</p>
                            <p>En 1995, la empresa inauguró el centro de distribución de Bancalari, Pcia. de Bs.As. y construyó el depósito intermedio de San Martín, Mendoza.</p>
                            <p>Además, sumó a sus fincas en San Martín, nuevas fincas de duraznos en Tunuyán, Mendoza.</p>
                        </div>
                    </li> -->
                    <li class="year">
                        <div class="img-content">
                            <div class="img">                            
                                <img src="{{ asset('assets/images/history-2012.png') }}" srcset="{{ asset('assets/images/history-2012@2x.png') }} 2x" alt="history-2012">
                            </div>
                        </div>
                        <div class="year-content"><h3>2012</h3><h4>100 años de calidad y prestigio</h4></div>
                        <div class="txt-content">
                            <p>Este año La Campagnola cumplió 100 años en el mercado, y es la marca paradigmática y especialista en alimentos de la Argentina.</p>
                            <p>Clásica, premium, transgeneracional, con un gran reconocimiento por parte de los consumidores, sus productos son elaborados con los más altos estándares de calidad, con materia prima rigurosamente seleccionada y con procesos productivos de excelencia.</p>
                            <p>Sus principales líneas de productos son: Mermeladas, Conservas de Pescado, Conservas de Tomate y Salsas, Aderezos, Hierbas y Especias,  y Conservas de vegetales (choclo, arvejas, porotos y jardinera).</p>
                            <p>Todos estos productos acompañan la mesa de la familia argentina y del mundo.</p>
                        </div>
                    </li>
                    <li class="year">
                        <div class="img-content">
                            <div class="img">                           
                                <img src="{{ asset('assets/images/history-2019.png') }}" srcset="{{ asset('assets/images/history-2019@2x.png') }} 2x" alt="history-2019">
                            </div>
                        </div>
                        <div class="year-content"><h3>2019</h3><h4>La Campagnola lanza Hierbas, Especias y Mixes</h4></div>
                        <div class="txt-content">
                            <p>De esta forma, la compañía emblema del mundo de los alimentos, ingresa en una nueva categoría.</p>
                            <p>Con el objetivo de brindar a las familias una opción práctica y sabrosa de condimentar sus comidas, La Campagnola presenta sus nuevas Hierbas y Especias.</p>
			    <p>Para convertir la comida de todos los días en platos extraordinarios, y que sepas que vas a encontrar en La Campagnola el aroma y sabor único de una marca con más de 100 años de historia.</p>
                        </div>
                    </li>
                    <li class="year">
                        <div class="img-content">
                            <div class="img">                           
                                <img src="{{ asset('assets/images/history-2020.png') }}" srcset="{{ asset('assets/images/history-2020.png') }} 2x" alt="history-2020">
                            </div>
                        </div>
                        <div class="year-content"><h3>2020</h3><h4>Entramos al mundo de Dulces Solidos</h4></div>
                        <div class="txt-content">
                            <p>Un año después ingresamos en un nuevo segmento, ícono de los hogares argentinos.</p>
                            <p>Para enaltecer las clásicas recetas dulces se lanzan los nuevos dulces de batata y membrillo con toda la calidad de La Campagnola. </p>
                        </div>
                    </li>
                    <li class="year">
                        <div class="img-content">
                            <div class="img">                           
                                <img src="{{ asset('assets/images/history-2021.png') }}" srcset="{{ asset('assets/images/history-2021.png') }} 2x" alt="history-2021">
                            </div>
                        </div>
                        <div class="year-content"><h3>2021</h3><h4>La Gran Pasta</h4></div>
                        <div class="txt-content">
                            <p>La gran pasta llega a la mesa de todos. La Campagnola desembarca en el segmento de pastas secas 100% trigo candeal, ofreciendo la mejor calidad y sabor en el producto que más consumen los Argentinos.</p>
<p>Fideos largos, guiseros y soperos para cocinar múltiples variedades de platos.</p>
                        </div>
                    </li>
                </ul>
                <!-- <div class="loader"></div> -->
            </div>
        </section>
    </div>

</main>

@endsection
