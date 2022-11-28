<div>
@include('common.modalHead')
<!-- Right side column. Contains the navbar and content of the page -->

<!-- Content Header (Page header) -->
<!-- Main content -->
<div class="content-wrapper" >
<!-- Content Header (Page header) -->
<section class="content-header">
<h3><i class="fa fa-edit"></i>AÑADIR DENOMINACIÓN </h3>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<div id="load_img">
					<img class=" img-responsive"  src="{{ asset('./assets/img/product.png')}}" alt="Bussines profile picture">
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
				<div class="tab-pane active">
						<div class="form-group ">
							<label for="name" class="col-sm-2 control-label">TIPO:</label>
							<div class="col-sm-4">
								    <select wire:model="type" class="form-control">
			                <option value="Seleccionar">Seleccionar</option>
			                <option value="BILLETE">BILLETE</option>
			                <option value="MONEDA">MONEDA</option>
			                <option value="OTRO">OTRO</option>
			            </select>
								@error('type') <span class="text-danger er">{{ $message }}</span>@enderror
							</div>
							<!-- <label for="presentation" class="col-sm-2 control-label">Presentación</label> -->
							<div class="col-sm-4">
							<!--	<input type="text" class="form-control" id="presentation" maxlength="100"> -->
							</div>
						</div>
						<div class="form-group">
							<label for="barcode" class="col-sm-2 control-label">VALOR</label>
							<div class="col-sm-10">
								<input type="text" wire:model.lazy="value" class="form-control"  pplaceholder="ej: 025974">
								@error('value') <span class="text-danger er">{{ $message }}</span>@enderror
							</div>
						</div>
						<div class="form-group">
							<!--<label for="note" class="col-sm-2 control-label">Descripción</label> -->
							<div class="col-sm-10">
							<!--	<textarea class="form-control" name="note" id="note"></textarea> -->
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">IMAGEN</label>
							<div class="col-sm-12 col-md-8">
				        <div class="form-group custom-file">
				            <input type="file" class="custom-file-input" wire:model="image"
				            accept="image/x-png, image/gif, image/jpeg">
				            <label class="custom-file-label">{{ $image }}</label>
				            @error('image') <span class="text-danger er">{{ $message }}</span>@enderror
				        </div>
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