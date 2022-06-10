<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostCategory;
use App\Models\BlogPost;

class WelcomeBlogController extends Controller
{
    public function AddBlogPost(){

    	$blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::latest()->get();
    	return view('blog.blog_list',compact('blogpost','blogcategory'));

    }
    public function DetailsBlogPost($id){

        $blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::findOrFail($id);
    	return view('blog.blog_details',compact('blogpost','blogcategory'));
    }
    public function HomeBlogCatPost($category_id){

    	$blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
    	return view('blog.blog_cat_list',compact('blogpost','blogcategory'));

    }
}
