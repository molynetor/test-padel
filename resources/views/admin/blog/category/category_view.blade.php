@extends('admin.layouts.master')

@section('content')

@if(Session::has('message'))
<div class="alert bg-success alert-success text-white col-md-5" role="alert">
    {{Session::get('message')}}
</div>
@endif
@foreach($errors->all() as $error)
<div class="alert alert-danger">
    {{$error}}

</div>
@endforeach

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lista de Categorías de Blog <span class="badge badge-pill badge-danger">
                                {{ count($blogcategory) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Categoría</th>

                                        <th>Acción</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogcategory as $item)
                                    <tr>

                                        <td>{{ $item->blog_category_name }}</td>

                                        <td>
                                            <a href="{{ route('blog.category.edit',$item->id) }}" 
                                                title="Edit Data"><i class="ik ik-edit-2 text-success"></i></a>
												<a href="{{ route('blog.category.delete',$item->id) }}" 
												title="Delete Data">  <i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>



            </div>



            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Añadir Categoría </h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">


                            <form method="post" action="{{ route('blogcategory.store') }}">
                                @csrf


                                <div class="form-group">
                                    <h5>Nombre Categoría<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="blog_category_name" class="form-control">
                                        @error('blog_category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-brand mb-5" value="Añadir">
                                </div>
                            </form>





                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>




        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>






@endsection