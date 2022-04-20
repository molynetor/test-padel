<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Horas;
use App\Models\Pista;
class Citas extends Model
{
    protected $guarded= [];

    public function horas(){
         return $this->hasMany(Horas::class,'cita_id','id')->where('status', '=',0); 
       
    }
    public function pistas(){
        return $this->belongsTo(Pista::class,'pista_id','id');
    }
}
