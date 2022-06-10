@extends('layouts.app')

@section('content')


@section('title')
Blog Category Page
@endsection



<div class="body-content margen">
    <div class="container margen">
        <div class="row margen">
            <div class="blog-page">
                <div class="col-md-9">



                    @foreach($blogpost as $blog)
                    <div class="blog-post  wow fadeInUp">
                        <a href="blog-details.html"><img class="img-responsive" src="{{ asset($blog->post_image) }}"
                                alt=""></a>

                        <h1 class="texto"><a href="blog-details.html"> {{ $blog->post_title}}</a></h1>

                        <span class="date-time texto">
                            {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>

                        <p class="texto"> {!! Str::limit($blog->post_details_en, 200 ) !!} </p>


                        <a href="{{ route('post.details',$blog->id) }}" class="btn btn-upper btn-primary read-more">Leer
                            Más</a>


                    </div>
                    @endforeach


                    <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                        style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                       

                    </div>
                </div>
                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                    
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title texto">Categorías</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">

                                    @foreach($blogcategory as $category)
                                    <ul class="list-group">
                                        <a href="{{ url('blog/category/post/'.$category->id) }}">
                                            <li class="list-group-item texto">
                                               
                                                {{ $category->blog_category_name }}</li>
                                        </a>

                                    </ul>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection