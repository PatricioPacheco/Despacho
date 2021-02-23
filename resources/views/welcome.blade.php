<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sistema Web Patricio Pacheco</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">

    </head>
    <body>
    
            <header>
        <nav id="nav" class="nav">
            <div class="contenedor-nav">
                <div class="enlaces" id="enlaces">

                <a href="{{ url('/') }}" id="enlace-inicio" class="btn-header"><strong>Inicio</strong></a>
                <a href="#" id="enlace-inicio" class="btn-header"><strong>Nosotros</strong></a>
                <a href="#" id="enlace-inicio" class="btn-header"><strong>Productos</strong></a>
                <a href="#" id="enlace-inicio" class="btn-header"><strong>Equipo</strong></a>
                <a href="#" id="enlace-inicio" class="btn-header"><strong>Servicio</strong></a>
                <a href="#" id="enlace-inicio" class="btn-header"><strong>Trabajo</strong></a>
        
                
                @if (Route::has('login'))
                
                    @auth
                        <a href="{{ url('/home') }}"><strong>Home</strong></a>
                    @else
                        <a href="{{ route('login') }}"><strong>Iniciar Sesión</strong></a>

                    
                    @endauth
                
            @endif

            
            
        </nav>
        <section class="textos-header">
            <h1>Potencia la organizacion y calidad de tus productos</h1>
            <h2>Con una pagina Web potente</h2>
        </section>  
    <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>

            
            <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">AP Company</h2>
            <p class="after">Nosotros</p>
            <div class="contenedor-sobre-nosotros">
                <img src="img/nosotros.svg" alt="">
                <div class="contenido-textos">
                    <h3><span>1</span>MISION</h3>
                        <p>Somos una empresa de servicios tecnológicos con enfoque social y crecimiento sostenido con alto concepto de servicio para contribuir al mejoramiento de la calidad de vida de nuestro equipo de trabajo y clientes; con la seguridad y respaldo técnico para cuidar de sus bienes mediante tecnología de punta. </p>
                    <h3><span>2</span>VISION</h3>
                        <p>Tener un crecimiento constante con servicio de excelencia y de reconocida trayectoria por su especialización en la prestación de servicios y Productos tecnológicos de punta; ofrecer a nuestros clientes productos adaptados a sus necesidades, brindar atención personalizada, con equipamiento moderno, con personal capacitado y comprometido.</p>
                </div>
            </div> 
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">DISTINTOS PRODUCTOS</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="img/comida1.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono.png" alt="">
                            <p>Todo tipo de alimento</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/cereales.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono.png" alt="">
                            <p>Varios cereales</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/dulces.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono.png" alt="">
                            <p>Diferentes caramelos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/carnes.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono.png" alt="">
                            <p>Carnes</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/licor.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono.png" alt="">
                            <p>Licores</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/flores.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono.png" alt="">
                            <p>Variedad de flores</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/vestimenta.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono.png" alt="">
                            <p>Vestimenta y mas</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/tecnologia.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono.png" alt="">
                            <p>Tecnologia</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team contenedor" id="equipo">
            <h3 class="equipo1">Nuestro Equipo</h3> 
            <p class="after">Conoce personas espectaculares</p>
            <div class="card">
                <div class="content-card">
                    <div class="people">
                        <img src="img/mujer.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>Sria. Ofelia Astudillo</h4>
                        <p>Documentos y comunicaciones a nombre de la empresa</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="img/carnets.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>Tnlgo. Patricio Pacheco</h4>
                        <p>Asistente de sistemas y desarrollo</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="img/hombre.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>QC. Jorge Carrion</h4>
                        <p>Coordinador de calidad</p>
                    </div>
                </div>
            </div>
        </section>
        <Section class="about" id="servicio">
            <div class="contenedor">
                <h3>Nuestros Servicios</h3>
                <p class="after">Siempre mejorando para ti</p>
                <section class="expertos">
                    <div class="cont-expertos">
                            <img src="img/orden.svg" alt="">
                            <h4>ORDEN</h4>
                            <p>El tiempo es oro en cualquier organización, y desenvolverse en un espacio donde ordenado ayudará a que la producción mejore y a que el ritmo de trabajo sea el idóneo.</p>
                    </div>
                    <div class="cont-expertos">
                        <img src="img/control.svg" alt="">
                        <h4>CONTROL</h4>
                        <p>Desarrollar un Control Interno adecuado a cada tipo de organización nos permitirá optimizar la utilización de recursos con calidad para alcanzar una adecuada gestión financiera y administrativa, logrando mejores niveles de productividad.</p>
                    </div>
                    <div class="cont-expertos">
                        <img src="img/despacho.svg" alt="">
                        <h4>DESPACHO</h4>
                        <p>Aumentar el valor del producto por medio de una mejora en la calidad del servicio, es mucho más rentable y más difícil de imitar para la competencia, lo que agrega un valor indiscutible a la marca, haciéndola mucho más atractiva para sus clientes.</p>
                    </div>
                </section>
            </div>
        </Section>
        <section class="work contenedor" id="trabajo">
            <h3>Nuestro Trabajo</h3>
            <p>Hacemos de algo simple algo extraordinario</p>
            <div class="botones-work">
                <ul>
                    <li class="filter" data-nombre='todo'>Todo</li>
                    <li class="filter" data-nombre='recepcion'>Recepcion</li>
                    <li class="filter" data-nombre='distribucion'>Distribucion</li>
                    <li class="filter" data-nombre='empaquetado'>Empaquetado</li>
                    <li class="filter" data-nombre='despacho'>Despacho</li>
                </ul>
            </div>
            <div class="galeria-work">
                <div class="cont-work recepcion">
                    <div class="img-work">
                        <img src="img/recepcion1.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Recepcion</h4>
                    </div>
                </div>
                <div class="cont-work recepcion">
                    <div class="img-work">
                        <img src="img/recepcion3.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Recepcion</h4>
                    </div>
                </div>
                <div class="cont-work recepcion">
                    <div class="img-work">
                        <img src="img/recepcion2.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Recepcion</h4>
                    </div>
                </div>
                
                <div class="cont-work distribucion">
                    <div class="img-work">
                        <img src="img/distribucion3.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Distribucion</h4>
                    </div>
                </div>
                <div class="cont-work distribucion">
                    <div class="img-work">
                        <img src="img/distribucion2.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Distribucion</h4>
                    </div>
                </div>
                <div class="cont-work distribucion">
                    <div class="img-work">
                        <img src="img/distribucion1.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Distribucion</h4>
                    </div>
                </div>

                <div class="cont-work empaquetado">
                    <div class="img-work">
                        <img src="img/empaquetado1.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Empaquetado</h4>
                    </div>
                </div>
                <div class="cont-work empaquetado">
                    <div class="img-work">
                        <img src="img/empaquetado3.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Empaquetado</h4>
                    </div>
                </div>
                <div class="cont-work empaquetado">
                    <div class="img-work">
                        <img src="img/empaquetado2.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Empaquetado</h4>
                    </div>
                </div>
                
                <div class="cont-work despacho">
                    <div class="img-work">
                        <img src="img/despacho2.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Despacho</h4>
                    </div>
                </div>
                <div class="cont-work despacho">
                    <div class="img-work">
                        <img src="img/despacho1.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Despacho</h4>
                    </div>
                </div>
                <div class="cont-work despacho">
                    <div class="img-work">
                        <img src="img/despacho3.jpg" alt="">
                    </div>
                    <div class="textos-work">
                        <h4>Despacho</h4>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <Footer id="contacto">
        <div class=" about">
            <div class="iconos">
                <img src="img/facebook.png" alt="">
                <p>Patricio Javier</p>
                <img src="img/whatsapp.png" alt="">
                <p>Telf: 0983418540</p>
                <img src="img/instagram.png" alt="">
                <p>@pijey_19</p>
            </div>
        </div>
        <p>Tecnologo. Pacheco Astudillo Patricio Javier</p>
    </Footer>
        
        </div>
    </body>
</html>
