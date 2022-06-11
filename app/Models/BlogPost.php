<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPostCategory; 
class BlogPost extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function categorias(){
        return $this->belongsTo(BlogPostCategory::class,'category_id','id'); 
      
   }
   public function userAvatar($request){
    $image = $request->file('post_image');
    $name = $image->hashName();
    $destination = public_path('/images');
    $image->move($destination,$name);
    return $name;
    
}
}
