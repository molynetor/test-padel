@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Landing Page -->
        <div class="landing-div">
            <div class="landing-wrapper d-flex flex-column h-100 align-items-center justify-content-center text-center">
                <div class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h1 class="display-4 animated slideInLeft delay-1s">Disfruta de las mejores pistas
                            </h1>
                        </div>
                        <div class="carousel-item">
                            <h1 class="display-4 animated slideInRight delay-1s">Participa en los mejores torneos
                            </h1>
                        </div>
                        <div class="carousel-item">
                            <h1 class="display-4 animated zoomInDown delay-1s">Da lo mejor de ti </h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- promociones section starts  -->
    <section class="courses" id="noticias">
        <div class="heading my-5 pt-4">
            <span data-aos="zoom-in" class="mt-3">Noticias</span>
            <h3 data-aos="zoom-in" class="mb-5">Nuestros últimos torneos</h3>
        </div>
        <div class="box-container mb-3 ">
            @foreach($blogpost as $blog)
            <div class="box " data-aos="fade-up">
                <div class="image">
                    <img src="{{asset('images')}}/{{$blog->post_image}}" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <span ><i class="fas fa-calendar"></i>{{ $blog->date }}</span>
                       

                    </div>
                    <h3>{{ $blog->post_title }}</h3>
                   

                        <a href="{{ route('post.details',$blog->id) }}" class="btn btn-outline-brand">Leer Más</a>
                    
                </div>
            </div>

            @endforeach
        </div>
    </section>

    <!-- fin de promociones -->




    <find-pista id="reservar" class="my-5"></find-pista>


    <!--galeria-->
    <section class="project-area" id="galeria">
        <div class="container">
            <div class="heading my-3 pt-4">
                <span class="mb-2">Galería</span>
                <h3>Nuestros Servicios</h3>
            </div>
            <div class="button-group my-4">
                <button type="button" class="active">Todas</button>
                <button type="button" data-filter=".pistas">Pistas</button>
                <button type="button" data-filter=".torneos">Torneos</button>
                <button type="button" data-filter=".vestuarios">Vestuarios</button>
                <button type="button" data-filter=".servicios">Servicios</button>
            </div>

            <div class="row grid">
                <div class="col-lg-4 col-md-6 col-sm-12 element-item torneos">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/padel2.jpg">
                                <img src="/img/padel2.jpg" alt="javieles" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Torneo Infantil Mayo</h4>
                            <span class="text-secondary">Torneos</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 element-item pistas">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/pista1.jpeg">
                                <img src="/img/pista1.jpeg" alt="portfolio-2" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Pistas 1 azul</h4>
                            <span class="text-secondary">Pistas</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 element-item vestuarios">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/vestuario.jpg">
                                <img src="/img/vestuario.jpg" alt="portfolio-6" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Vestuario masculino</h4>
                            <span class="text-secondary">Vestuarios </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 element-item pistas">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/pista2.jpeg">
                                <img src="/img/pista2.jpeg" alt="portfolio-3" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Pista 2 roja</h4>
                            <span class="text-secondary">Pistas</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 element-item vestuarios">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/vestuario-femenino.jpg">
                                <img src="/img/vestuario-femenino.jpg" alt="portfolio-7" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Vestuario femenino</h4>
                            <span class="text-secondary">Vestuarios</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 element-item torneos">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/torneo3.jpg">
                                <img src="/img/torneo3.jpg" alt="portfolio-8" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Marathon de Pádel Junio</h4>
                            <span class="text-secondary">Torneos</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 element-item pistas">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/padel4.jpeg">
                                <img src="/img/padel4.jpeg" alt="portfolio-4" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Pista 3 azul</h4>
                            <span class="text-secondary">Pistas</span>
                        </div>
                    </div>
                </div>





                <div class="col-lg-4 col-md-6 col-sm-12 element-item servicios">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/pala.jpg">
                                <img src="/img/pala.jpg" alt="portfolio-9" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Reparación y asesoramiento de compra</h4>
                            <span class="text-secondary">Servicios</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 element-item vestuarios">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/duchas.jpeg">
                                <img src="/img/duchas.jpeg" alt="portfolio-5" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Duchas individuales</h4>
                            <span class="text-secondary">Vestuarios</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 element-item servicios">
                    <div class="our-project">
                        <div class="img">
                            <a class="test-popup-link" href="/img/minibar.jpg">
                                <img src="/img/minibar.jpg" alt="portfolio-9" class="img-fluid">
                            </a>
                        </div>
                        <div class="title py-4">
                            <h4 class="text-uppercase">Minibar con bebidas y snacks</h4>
                            <span class="text-secondary">Servicios</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contacto -->

    <section id="contacto">
        <div class="container gx-0">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form action="#" class="row ">
                        <div class="col-12 heading mb-4 ">
                            <span class="mb-2">Contacto</span>
                            <h3>Disponibles para usted</h3>
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col-12 form-group">
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Correo electrónico">
                        </div>

                        <div class="col-12 form-group">
                            <textarea name="text" id="text" cols="30" rows="7" class="form-control"
                                placeholder="Mensaje"></textarea>
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" class="btn btn-brand mt-3">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- Footer -->
    <footer class="mt-2">
 <!-- Footer Top -->
        <div class="footer-top my-4">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-4">
                        <h3 class="brand text-center mb-3">Yo Soy Tu Pádel</h3>
                        <p class="texto text-center">
                            Reserva las mejores pistas del Valle de Ricote
                        </p>

                        <div class="">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.0042564823966!2d-3.6905223843105164!3d40.4530427613536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228e23705d39f%3A0xa8fff6d26e2b1988!2sEstadio%20Santiago%20Bernab%C3%A9u!5e0!3m2!1ses-419!2ses!4v1647534780416!5m2!1ses-419!2ses"
                                width="360" height="280" style="border:0; " allowfullscreen="" loading="lazy"
                                class="google-maps mb-4"></iframe>

                        </div>


                    </div>
                    <div class="col-lg-4 text-center">
                        <div>
                            <h4 class="mb-50 brand">Horario días laborables</h4>
                            <p class="texto">
                                Mañanas: 09:30 - 14:00
                            </p>
                            <p class="texto">
                                Tardes: 16:00 - 22:00
                            </p>

                        </div>
                        <div>
                            <h4 class="brand">Domingos y Festivos</h4>
                            <p class="texto">
                                Solo mañanas: 9:30 -14:00
                            </p>

                        </div>

                    </div>
                    <div class="col-lg-4 text-center">
                        <h4 class="brand mb-50">Contacto</h4>
                        <p class="texto">
                            <i class="fa fa-map-marker me-1"></i>
                            <span class="fs-6"> Virgen de los Remedios 3, Blanca</span>
                        </p>
                        <p class="texto">
                            <i class="fa fa-envelope me-1"></i>
                            <span>dostoievsky@gmail.com</span>
                        </p>
                        <p class="texto">
                            <i class="fa fa-phone me-1"></i>
                            <span> +34 666 55 44 33</span>
                        </p>

                        <div id='contact-info'>
                            <div class='links d-flex justify-content-center mt-4'>

                                <a class='orange-background  me-5' target='_blank'>
                                    <div>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span>
                                            <i class="fab fa-instagram insta "></i>
                                        </span>
                                    </div>
                                </a>

                                <a class='orange-background me-5' target='_blank'>
                                    <div>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span>
                                            <i class="fab fa-facebook face"></i>
                                        </span>
                                    </div>
                                </a>

                                <a class='orange-background m' target='_blank'>
                                    <div>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span>
                                            <i class="fab fa-whatsapp wat"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 py-3 d-flex  ">


                        <p class="texto">&copy; WonderWeb. All rights reserved</p>
                        <p class="ms-auto texto">Design by Javieles</p>


                    </div>
                </div>
            </div>
        </div>
    </footer>


    @endsection