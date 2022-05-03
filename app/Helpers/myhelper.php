<?php


function formatDate($date , $format ){
    if($date == '' || $date == null)
        return;

    return date($format,strtotime($date));
}

function calcPrecio($fecha,$hora){
     
    $dia_fecha=date('w', strtotime($fecha));
  // dd($dia_fecha);
      
   if($hora=='19:00'|| $hora=='20:30'){
       $precio =20;
   }elseif ($dia_fecha==0) {
       $precio =20;
   }else{
       $precio =12;
   }
   return $precio;

  }