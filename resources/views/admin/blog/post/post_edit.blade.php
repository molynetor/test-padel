@extends('admin.layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Actualizar Post </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">

                        <form method="post" action="{{ route('post.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                <input type="hidden" name="id" class="form-control" r value="{{ $blogpost->id}}">




                                    <div class="row">
                                        <!-- start 2nd row  -->


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Título del Post <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="post_title" class="form-control"
                                                        required=""  value="{{ $blogpost->post_title}}">
                                                    @error('post_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 6 -->
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Fecha <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="date" class="form-control" required="" value="{{ $blogpost->date}}">
                                                    @error('post_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <!-- start 6th row  -->
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Seleccionar Categoría <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Seleccionar Categoría<a
                                                                href="http://" target="_blank"
                                                                rel="noopener noreferrer"></a>
                                                        </option>
                                                    
                                                        @foreach($blogcategory as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->blog_category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Imagén para el post <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="post_image" class="form-control"
                                                        onChange="mainThamUrl(this)" >
                                                    @error('post_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    @if(!$blogpost->image)
                                                    <img src="{{asset('images')}}/{{$blogpost->post_image}}" class="mt-3" id="mainThmb" style="width: 120px; height: 100px;">
                        
                        @endif
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="row">
                                   
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Detalles del post <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea class="text-dark" id="editor1" name="post_details" rows="10" cols="80"
                                                        required=""> {{ $blogpost->post_details}}
		
						</textarea>
                                                </div>
                                            </div>

                                        </div>



                                    </div>


                                    <hr>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-brand mb-5" value="Editar">
                                    </div>
                        </form>




                    </div>

                </div>


    </section>

</div>




<script type="text/javascript">
function mainThamUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#mainThmb').attr('src', e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>






@endsection