<div>
@include('common.modalHead')
<!-- Right side column. Contains the navbar and content of the page -->

<!-- Content Header (Page header) -->
<!-- Main content -->
<div class="content-wrapper" style="min-height: 557px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<h3><i class="fa fa-edit"></i>AÑADIR PRODUCTO</h3>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<div id="load_img">
					<img class=" img-responsive" src="{{ asset('./assets/img/product.png')}}" alt="Bussines profile picture">
				</div>
				<h3 class="profile-username text-center"></h3>
				<p class="text-muted text-center mail-text"></p>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
	<div class="col-md-9">
		<form  class="form-horizontal" role="form">
		
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#details" data-toggle="tab" aria-expanded="false">Detalles del producto</a></li>
				</ul>
				<div class="tab-content">
					<div id="resultados_ajax"></div>
				<div class="tab-pane active" id="details">
						<div class="form-group ">
							<label for="product_code" class="col-sm-2 control-label">Código</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" wire:model.lazy="barcode" id="barcode"   placeholder="ej: 025974">
								@error('barcode') <span class="text-danger er">{{ $message }}</span>@enderror
							</div>
							<label for="presentation" class="col-sm-2 control-label">Presentación</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="presentation" name="presentation" maxlength="100">
							</div>
						</div>
						<div class="form-group">
							<label for="product_name" class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" wire:model.lazy="name" class="form-control"name="name"  placeholder="ej: IMPRESORA.">
								@error('name') <span class="text-danger er">{{ $message }}</span>@enderror
							</div>
						</div>
						<div class="form-group">
							<label for="note" class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="note" id="note"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="category" class="col-sm-2 control-label">Categoría</label>
							<div class="col-sm-4">
								<select class="form-control">
									<option value="Seleccione">Seleccione</option>
										@foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									 @endforeach
								</select>
								@error('category_id') <span class="text-danger er">{{ $message }}</span>@enderror
							</div>
							<label for="cost" class="col-sm-2 control-label">Costo</label>
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-usd"></i>
									</div>
									<input type="text" class="form-control" name="cost"  pattern="\d+(\.\d{2})?" title="precio con 2 decimales"  >
										@error('cost') <span class="text-danger er">{{ $message }}</span>@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="profit" class="col-sm-2 control-label">Utilidad</label>
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-usd"></i>
									</div>
									<input type="text" wire:model.lazy="stock" class="form-control" name="stock"  pattern="\d+(\.\d{2})?" title="stock ej: 123" placeholder="ej: 0">
									@error('stock') <span class="text-danger er">{{ $message }}</span>@enderror
								</div>
							</div>
							<label for="selling_price" class="col-sm-2 control-label">Precio de venta</label>
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-usd"></i>
									</div>
									<input type="text" wire:model="" class="form-control" name="price"  pattern="\d+(\.\d{2})?" title="precio con 2 decimales">
										@error('price') <span class="text-danger er">{{ $message }}</span>@enderror
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="stock" class="col-sm-2 control-label">Stock inicial</label>
							<div class="col-sm-4">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-th-large" aria-hidden="true"></i>
									</div>
									<input wire:model.lazy="stock" type="text" class="form-control" id="stock" name="stock"  pattern="\d{1,11}" maxlength="11">
								</div>
							</div>
							<label for="status" class="col-sm-2 control-label">Estado</label>
							<div class="col-sm-4">
								<select class="form-control" name="status" id="status">
									<option value="1">Activo</option>
									<option value="0">Inactivo</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="image" class="col-sm-2 control-label">Imagen {{ $image }}</label>
							<div class="col-sm-4">
								<input wire:model="image" id="" type="file" class="form-control">
							</div>
							@error('image') <span class="text-danger er">{{ $message }}</span>@enderror
						</div><div class="form-group">
							<div class="col-sm-offset-2 col-sm-6">
							
							</div>
						</div>
						
					</div>
					<!-- /.tab-pane -->
						
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.nav-tabs-custom -->
		</form>
	</div>
	<!-- /.col -->
	@include('common.modalFooter')
</div>