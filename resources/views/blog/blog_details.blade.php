@extends('layouts.app')

@section('content')

@section('title')
{{ $blogpost->post_title}}
@endsection



 

<div class="body-content margen">
	<div class="container margen">
		<div class="row margen">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{ asset($blogpost->post_image) }}" alt="">


	<h1 class="texto"> {{$blogpost->post_title}}</h1>


	<h4 class="texto">Fecha <span class="titular">{{$blogpost->date}}</span></h4>

	
	
	<p class="texto"> {{$blogpost->post_details}}
		</p>
		<span class="date-time texto">Publicado el día {{ Carbon\Carbon::parse($blogpost->created_at)->formatLocalized('%d %B %Y')  }}</span>



	<div class="social-media">
		<span class="texto">Compartir post:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-rss"></i></a>
		<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>


			<div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<div class="row">
		<div class="col-md-12">
			<h4 class="titular">Dejar un comentario</h4>
		</div>
		<div class="col-md-3">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title texto" for="exampleInputName">Nombre <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-3">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title texto" for="exampleInputEmail1">Email  <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-3">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title texto" for="exampleInputTitle">Titulo <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-9">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title texto" for="exampleInputComments">Comentarios <span>*</span></label>
			    <textarea class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
			  </div>
			</form>
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<button type="submit" class="btn btn-brand checkout-page-button">Enviar Comentario</button>
		</div>
	</div>
</div>
				</div>
				<div class="col-md-3 sidebar">



					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    
</div>		




	
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title titular">Categorías</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

@foreach($blogcategory as $category)
	    	 <ul class="list-group">
             <a href="{{ url('blog/category/post/'.$category->id) }}"><li class="list-group-item ">{{ $category->blog_category_name }}</li></a>

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
</div>




@endsection 