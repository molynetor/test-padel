<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostCategory;
use Carbon\Carbon;
use App\Models\BlogPost;
use Image;

class BlogController extends Controller
{
    public function BlogCategory(){

    	$blogcategory = BlogPostCategory::latest()->get();
    	return view('admin.blog.category.category_view',compact('blogcategory'));
    }

    public function BlogCategoryStore(Request $request){

        $request->validate([
             'blog_category_name' => 'required',
             
 
         ],[
             'blog_category_name.required' => 'Input Blog Category ',
            
         ]);
 
 
 
     BlogPostCategory::insert([
         'blog_category_name' => $request->blog_category_name,
         
         'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
        
         'created_at' => Carbon::now(),
 
 
         ]);
 
         $notification = array(
             'message' => 'Categoría de Blog creada',
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
 
     } // end method 
 
 
 
     public function BlogCategoryEdit($id){
 
    $blogcategory = BlogPostCategory::findOrFail($id);
         return view('admin.blog.category.category_edit',compact('blogcategory'));
     }
 
     public function BlogCategoryDestroy($id)
     {
        
         /* if(auth()->user()->id == $id){
             abort(401);
        } */
        $cat = BlogPostCategory::find($id);
        $catdelete = $cat->delete();
        
         return redirect()->back()->with('message','La categoría se ha borrado con exito');
     }
 
 
 
 public function BlogCategoryUpdate(Request $request){
 
        $blogcar_id = $request->id;
 
 
     BlogPostCategory::findOrFail($blogcar_id)->update([
         'blog_category_name' => $request->blog_category_name,
        
         'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
        
         'created_at' => Carbon::now(),
 
 
         ]);
 
         $notification = array(
             'message' => 'Categoría de Blog actualizada',
             'alert-type' => 'info'
         );
 
         return redirect()->route('blog.category')->with($notification);
 
     } 
 
  

  public function ListBlogPost(){
    $blogpost = BlogPost::with('categorias')->latest()->get();
    return view('admin.blog.post.post_list',compact('blogpost'));
}


public function AddBlogPost(){

$blogcategory = BlogPostCategory::latest()->get();
  $blogpost = BlogPost::latest()->get();
  return view('admin.blog.post.post_view',compact('blogpost','blogcategory'));

}   


public function BlogPostStore(Request $request){

  $request->validate([
        'post_title' => 'required',
        
        'post_image' => 'required',
    ],[
        'post_title.required' => 'Titulo del post',
        
    ]);

    $image = $request->file('post_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(780,433)->save('images/'.$name_gen);
    $save_url = 'images/'.$name_gen;

BlogPost::insert([
    'category_id' => $request->category_id,
    'post_title' => $request->post_title,
    'date' => $request->date,
   
    'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
   
    'post_image' => $save_url,
    'post_details' => $request->post_details,
    'created_at' => Carbon::now(),
    

    ]);

    $notification = array(
        'message' => 'Post insertado correctamente',
        'alert-type' => 'success'
    );

    return redirect()->route('list.post')->with($notification);

} 
}