@extends('admin.layouts.master')

@section('content')

 <!-- Content Wrapper. Contains page content -->

 <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Lista de Post <span class="badge badge-pill badge-danger"> {{ count($blogpost) }} </span></h3>
<a href="{{ route('add.post') }}" class="btn btn-brand" style="float: right;">Añadir</a>				  
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>

								<th>Post Categoría </th>
								<th>Post Imagen </th>
								<th>Post Título </th>
                                <th>Fecha</th>
								<th>Acción</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($blogpost as $item)
	 <tr>

		 <td>{{ $item->categorias->blog_category_name}}</td>
		 <td> <img src="{{asset('images')}}/{{$item->post_image}}" style="width: 60px; height: 60px;"> </td>
		<td>{{ $item->post_title }}</td>
        <td>{{ $item->date }}</td>
		<td width="20%">
 <a href="{{ route('blogpost.edit',$item->id) }}" class="btn " title="Edit Data"><i class="ik ik-edit-2 text-success"></i> </a>
 <a href="{{ route('blogpost.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>

	 </tr>
	  @endforeach
						</tbody>

					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->






		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection