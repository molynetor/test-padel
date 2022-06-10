@extends('admin.layouts.master')

@section('content')

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content ">
		  <div class="row">



			<div class="col-8 ">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Lista de Cupones</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr class="bg">
								<th class="texto2">Nombre </th>
								<th class="texto2">Descuento %</th>
								<th class="texto2">Validez </th>
								<th class="texto2">Estado </th>
								<th class="texto2">Acción</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($coupons as $item)
	 <tr>
		<td> {{ $item->coupon_name }}  </td>
		<td> {{ $item->coupon_discount }}% </td>
		<td width="25%">
       {{ Carbon\Carbon::parse($item->coupon_validity)->formatLocalized('%A %d %B %Y') }}

		<td>
		
		@if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
		 	<span class="badge badge-pill badge-success"> Activo </span>
		 	@else
          
           <span class="badge badge-pill badge-danger"> Inactivo </span>
		 	@endif

		 </td>

		 <td class="text-center">
 <a href="{{ route('cupon.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="ik ik-edit-2"></i> </a>
 <a href="{{ route('cupon.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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


<!--   ------------ Add Category Page -------- -->


          <div class="col-2">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Añadir </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('cupon.store') }}" >
	 	@csrf
		 @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif

	 <div class="form-group">
		<h5>Nombre del Cupón  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="coupon_name" class="form-control  @error('coupon_name') is-invalid @enderror" > 
	 @error('coupon_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	<div class="form-group">
		<h5>Descuento(%) <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="coupon_discount" class="form-control @error('coupon_discount') is-invalid @enderror" >
     @error('coupon_discount') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>


	<div class="form-group">
		<h5>Válido hasta  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="coupon_validity" class="form-control"  min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
     @error('coupon_validity') 
	 <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
	 @enderror 
	  </div>
	</div> 


			 <div class="text-xs-right">
			 <button type="submit" class="btn btn-brand " style="width: 100px !important; font-size: 16px !important; color: #babfe0 !important;height:40px !important;padding:5px !important;">Añadir</button>					 
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
