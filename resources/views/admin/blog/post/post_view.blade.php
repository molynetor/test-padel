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
                <h4 class="box-title">Añadir Post </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">

                    <form method="post" action="{{ route('post-store') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="row">
                                <div class="col-12">





                                    <div class="row">
                                        <!-- start 2nd row  -->


                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Título del Post <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="post_title" class="form-control"
                                                        required="">
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
        <input type="text" name="date" class="form-control"
            required="">
        @error('post_date')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

</div> <!-- end col md 6 -->


                                    </div> <!-- end 2nd row  -->







                                    <div class="row">
                                        <!-- start 6th row  -->
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Seleccionar Categoría <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Seleccionar Categoría<a href="http://" target="_blank" rel="noopener noreferrer"></a>
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

                                        </div> <!-- end col md 6 -->

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Imagén para el post <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="post_image" class="form-control"
                                                        onChange="mainThamUrl(this)" required="">
                                                    @error('post_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThmb">
                                                </div>
                                            </div>


                                        </div> <!-- end col md 6 -->




                                    </div> <!-- end 6th row  -->









                                    <div class="row">
                                        <!-- start 8th row  -->
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Detalles del post <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="post_details" rows="10" cols="80"
                                                        required="" > Descripción Completa
		
						</textarea>
                                                </div>
                                            </div>

                                        </div> <!-- end col md 6 -->

                                        

                                    </div> <!-- end 8th row  -->


                                    <hr>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-brand mb-5" value="Añadir">
                                    </div>
                        </form>




                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

    </section>
    <!-- /.content -->
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