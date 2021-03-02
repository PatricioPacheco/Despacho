<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
  
  </head>
  <body>
    <div class="preloader">
      
    </div>
    <div class="page">
      <!-- Top Banner--><a class="section section-banner text-center d-none d-xl-block" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" style="background-image: url(images/productos.jpg); background-image: -webkit-image-set( url(images/banner/background-04-1920x60.jpg) 1x, url(images/banner/background-04-3840x120.jpg) 2x )"></a>
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner-outer">
              <div class="rd-navbar-inner">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="index.html"><img class="brand-logo-dark" src="images/logo.png" alt="" width="198" height="66"/></a></div>
                </div>
                <div class="rd-navbar-right rd-navbar-nav-wrap">
                  <div class="rd-navbar-aside">
                    <ul class="rd-navbar-contacts-2">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                          <div class="unit-body"><a class="phone" href="tel:#">+593983418540</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                          <div class="unit-body"><a class="address" href="#">Quito, Ecuador</a></div>
                        </div>
                      </li>
                    </ul>
                    <ul class="list-share-2">
                      <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                    </ul>
                  </div>
                  <div class="rd-navbar-main">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="#servicios">Servicios</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#productos">Productos</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#equipo">Equipo</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="#contactos">Contactos</a>
                      </li>
                      <li class="rd-nav-item">
                        @if (Route::has('login'))
                        
                            @auth
                                <a class="rd-nav-link" href="{{ url('/home') }}">
                                    <strong>Sistema</strong>
                                </a>
                            @else
                                <a class="rd-nav-link" href="{{ route('login') }}">
                                    <strong>Iniciar Sesión</strong>
                                </a>
                            @endauth
                        
                        @endif  
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-2 swiper-slider-3" data-loop="true" data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper text-sm-left">
          <div class="swiper-slide context-dark" data-slide-bg="images/productos.jpg">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-8 col-lg-7 col-xl-7 offset-lg-1 offset-xxl-0">
                    <h1 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInUp" data-caption-delay="0">Sistema de Gestión de Productos</span></h1>
                    <p class="big swiper-text" data-caption-animate="fadeInLeft" data-caption-delay="300">Plataforma diseñada para la automatización de procesos de recepción, empaquetado y distribución.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- What We Offer-->
      <section class="section section-md bg-default" id="servicios">
        <div class="container">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">SERVICIOS</span></h3>
          <div class="row row-md row-30">
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Services Terri-->
                <article class="services-terri wow slideInUp">
                  <div class="services-terri-figure"><img src="images/seleccion.jpg" alt="" width="370" height="278"/>
                  </div>
                  <div class="services-terri-caption">
                    <h5 class="services-terri-title">Selección</h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Services Terri-->
                <article class="services-terri wow slideInDown">
                  <div class="services-terri-figure"><img src="images/empaque.jpg" alt="" width="370" height="278"/>
                  </div>
                  <div class="services-terri-caption">
                    <h5 class="services-terri-title">Empaquetado</h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Services Terri-->
                <article class="services-terri wow slideInUp">
                  <div class="services-terri-figure"><img src="images/despacho.jpg" alt="" width="370" height="278"/>
                  </div>
                  <div class="services-terri-caption">
                    <h5 class="services-terri-title">Despacho</h5>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- What We Offer-->
      <section class="section section-last bg-default" id="productos">
        <div class="container-fluid container-inset-0 isotope-wrap">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">PRODUCTOS</span></h3>
          <div class="row row-10 gutters-10 isotope" data-isotope-layout="masonry" data-isotope-group="gallery" data-lightgallery="group">
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInLeft"><a class="thumbnail-mary-figure" href="images/frutas.jpg" data-lightgallery="item"><img src="images/frutas.jpg" alt="" width="310" height="585"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title">Frutas</h6>
                    <div class="thumbnail-mary-location">y Vegetales</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-8 col-xl-4 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-big wow slideInRight"><a class="thumbnail-mary-figure" href="images/cereales.jpg" data-lightgallery="item"><img src="images/cereales.jpg" alt="" width="631" height="587"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title">Granos</h6>
                    <div class="thumbnail-mary-location">y Cereales</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInDown"><a class="thumbnail-mary-figure" href="images/carnes.jpg" data-lightgallery="item"><img src="images/carnes.jpg" alt="" width="311" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title">Carnes</h6>
                    <div class="thumbnail-mary-location">y Mariscos</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-8 col-xl-4 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary wow slideInUp"><a class="thumbnail-mary-figure" href="images/higiene.jpg" data-lightgallery="item"><img src="images/higiene.jpg" alt="" width="631" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title">Hiene Personal</h6>
                    <div class="thumbnail-mary-location">y Salud</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInUp"><a class="thumbnail-mary-figure" href="images/pan.jpg" data-lightgallery="item"><img src="images/pan.jpg" alt="" width="311" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title">Harinas</h6>
                    <div class="thumbnail-mary-location">y Panadería</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInRight"><a class="thumbnail-mary-figure" href="images/ferreteria.jpg" data-lightgallery="item"><img src="images/ferreteria.jpg" alt="" width="311" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title">Herramientas</h6>
                    <div class="thumbnail-mary-location">y Ferretería</div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-xs-6 col-sm-4 col-xl-2 isotope-item oh-desktop">
              <!-- Thumbnail Mary-->
              <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInLeft"><a class="thumbnail-mary-figure" href="images/dulces.jpg" data-lightgallery="item"><img src="images/dulces.jpg" alt="" width="311" height="289"/></a>
                <div class="thumbnail-mary-caption">
                  <div>
                    <h6 class="thumbnail-mary-title">Dulcería</h6>
                    <div class="thumbnail-mary-location">y Confitería</div>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <!-- Equipo de Trabajo -->
      <section class="section section-sm bg-default" id="equipo">
        <div class="container">
          <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">EQUIPO DE TRABAJO</span></h3>
          <div class="owl-carousel owl-style-11 dots-style-2" data-items="1" data-sm-items="1" data-lg-items="2" data-xl-items="3" data-margin="30" data-dots="true" data-mouse-drag="true" data-rtl="true">
            <article class="box-icon-megan wow fadeInUp" data-wow-delay=".1s">
              <div class="box-icon-megan-header">
                <div class="box-icon-megan-icon linearicons-leaf"></div>
              </div>
              <h5 class="box-icon-megan-title"><a href="#">Tnlgo. Patricio Pacheco</a></h5>
              <p class="box-icon-megan-text">Desarrollador</p>
            </article>
            <article class="box-icon-megan wow fadeInUp" data-wow-delay=".1s">
              <div class="box-icon-megan-header">
                <div class="box-icon-megan-icon linearicons-radar"></div>
              </div>
              <h5 class="box-icon-megan-title"><a href="#">Sra. Ofelia Astudillo</a></h5>
              <p class="box-icon-megan-text">Documentos y comunicaciones</p>
            </article>
            <article class="box-icon-megan wow fadeInUp" data-wow-delay=".15s">
              <div class="box-icon-megan-header">
                <div class="box-icon-megan-icon linearicons-thumbs-up"></div>
              </div>
              <h5 class="box-icon-megan-title"><a href="#">QC. Jorge Carrión</a></h5>
              <p class="box-icon-megan-text">Coordinador de Calidad</p>
            </article>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="section footer-modern context-dark footer-modern-2" id="contactos">
        <div class="footer-modern-line-2">
          <div class="container">
            <div class="row row-30 align-items-center">
              <div class="col-sm-6 col-md-7 col-lg-4 col-xl-4">
                <div class="row row-30 align-items-center text-lg-center">
                  <div class="col-md-7 col-xl-6"><a class="brand" href="index.html"><img src="images/logo.png" alt="" width="198" height="66"/></a></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-8 col-xl-8 oh-desktop">
                <div class="group-xmd group-sm-justify">
                  <div class="footer-modern-contacts wow slideInUp">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                      <div class="unit-body"><a class="phone" href="tel:#">+593983418540</a></div>
                    </div>
                  </div>
                  <div class="footer-modern-contacts wow slideInDown">
                    <div class="unit unit-spacing-sm align-items-center">
                      <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                      <div class="unit-body"><a class="mail" href="mailto:#">control.despacho2021@gmail.com</a></div>
                    </div>
                  </div>
                  <div class="wow slideInRight">
                    <ul class="list-inline footer-social-list footer-social-list-2 footer-social-list-3">
                      <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-modern-line-3">
          <div class="container">
            <div class="row row-10 justify-content-between">
              <div class="col-md-6"><span>Quito, Ecuador</span></div>
              <div class="col-md-auto">
                <!-- Derechos -->
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span></span><span>.&nbsp;</span><span>Todos los derechos reservados</span></p>
                <p><span>&nbsp;</span><span>Elaborador por: Tnlgo. Patricio Javier Pacheco Astudillo</span></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <!-- coded by Himic-->
  </body>
</html>