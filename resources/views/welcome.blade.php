@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
      <!-- Landing Page -->
            <div class="landing-div">
                <div
                    class="landing-wrapper d-flex flex-column h-100 align-items-center justify-content-center text-center">
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
    <!-- courses section starts  -->
<section class="courses" id="noticias">
   <div class="heading mt-5 pt-4">
      <span>Noticias</span>
      <h3>Nuestros últimos torneos</h3>
   </div>
   <div class="box-container mb-3">
      <div class="box">
         <div class="image">
            <img src="/img/padel1.jpg">
         </div>
         <div class="content">
            <div class="icons">
               <span><i class="fas fa-calendar"></i>Sábado 14 Mayo</span>
               <span><i class="fas fa-calendar"></i>4 horas</span>
              
            </div>
            <h3>Torneo Sábado 14 Mayo Rey de La Pista</h3>
            <a href="#" class="btn btn-outline-brand">Leer Más</a>
         </div>
      </div>
      <div class="box">
         <div class="image">
         <img src="/img/padel2.jpg">
         </div>
         <div class="content">
            <div class="icons">
               <span><i class="fas fa-calendar"></i>Sábado 14 Mayo</span>
               <span><i class="fas fa-calendar"></i>4 horas</span>
              
            </div>
            <h3>Torneo infantil de Pádel Valle de Ricote</h3>
            <a href="#" class="btn btn-outline-brand">Leer Más</a>
         </div>
      </div>
      <div class="box">
         <div class="image">
         <img src="/img/padel3.jpg">
         </div>
         <div class="content">
            <div class="icons">
               <span><i class="fas fa-calendar"></i>Sábado 14 Mayo</span>
               <span><i class="fas fa-calendar"></i>4 horas</span>
              
            </div>
            <h3>Maratón de pádel Sábado Santo</h3>
            <a href="#" class="btn btn-outline-brand">Leer Más</a>
         </div>
      </div>
      
   </div>
</section>

<!-- courses section ends -->
  
   
        

            <find-pista id="reservar"></find-pista>
       
  
    <!-- DatePicker VueJs -->
    <!--date picker component-->
</div>
@endsection