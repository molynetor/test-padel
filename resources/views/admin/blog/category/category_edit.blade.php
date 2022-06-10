@extends('admin.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->

<div class="container-full">

    <section class="content">
        <div class="row">




            <div class="col-3">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Categoría de Blog </h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('blogcategory.update') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $blogcategory->id }}">

                                <div class="form-group">
                                    <h5>Categoría <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name" class="form-control"
                                            value="{{ $blogcategory->blog_category_name }}">
                                        @error('blog_category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-brand mb-5" value="Actualizar">
                                </div>
                            </form>
                        </div>
                    </div>
               
                </div>
          
            </div>




        </div>
    
    </section>

</div>




@endsection