<?php

namespace App\Models;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function bookings(){
        return $this->belongsTo(Booking::class,'id','order_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
        
    
    }
   
}
