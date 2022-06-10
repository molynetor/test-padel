@extends('layouts.app')

@section('content')

@section('title')
Blog Page
@endsection



<div class="body-content margen">
    <div class="container margen">
        <div class="row ">
            <div class="blog-page">
                <div class="col-md-9">



                    @foreach($blogpost as $blog)
                    <div class="blog-post  wow fadeInUp my-5">
                        <a href="blog-details.html"><img class="img-responsive" src="{{ asset($blog->post_image) }}"
                                alt=""></a>

                        <h1 class="texto"><a href="blog-details.html"> {{ $blog->post_title }} </a></h1>

                        <span class="date-time texto">
                            {{  Carbon\Carbon::parse($blog->created_at)->formatLocalized('%d %B %Y') }}</span>

                        <p>@if(session()->get('language') == 'hindi') {!! Str::limit($blog->post_details_hin, 200 ) !!}
                            @else {!! Str::limit($blog->post_details_en, 200 ) !!} @endif</p>


                        <a href="{{ route('post.details',$blog->id) }}" class="btn btn-brand read-more mb-5">Leer más</a>


                    </div>
                    @endforeach


                    
                    <div class="col-md-3 sidebar">



                        <div class="sidebar-module-container">
                            
                       
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title titular">Categorías</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="accordion">

                                        @foreach($blogcategory as $category)
                                        <ul class="list-group">
                                            <a href="{{ url('blog/category/post/'.$category->id) }}">
                                                <li class="list-group-item">{{ $category->blog_category_name }} </li>
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