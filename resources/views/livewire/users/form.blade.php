<div>

<div class="content-wrapper" style="min-height: 557px;">
<!-- Content Header (Page header) -->
<section class="content-header">
<h3><i class="fa fa-edit"></i>AÑADIR USUARIO</h3>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-3">
<!-- Profile Image -->
<div class="box box-primary">
	<div class="box-body box-profile">
		<div id="load_img">
			<script>
				$('document').ready(function(){ 
					var counter = 1; //instantiate a counter
					var maxImage = 5; //the total number of images that are available
					setInterval(function() {
						document.querySelector('header').style.backgroundImage = "url('images/" + (counter + 1) + ".jpg')";
						if (counter + 1 == maxImage) {
					        counter = 0; //reset to start
					        <span>
					        <img src="{{ asset('assets/img/avatar1.png') }}" alt="imagen de ejemplo"class="rounded">
					        </span>
					      } else {
					      	++counter; //iterate to next image
					      	<span>
					      	<img src="{{ asset('assets/img/avatar2.png') }}" alt="imagen de ejemplo"class="rounded">
					      	</span>
					      }
					    }, 10000);
					  })
					</script>
				</div>
				<h3 class="profile-username text-center"></h3>
				<p class="text-muted text-center mail-text"></p>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<tr>
		<!-- /.col -->
		<div class="col-md-9">
			<form  class="form-horizontal" role="form">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#details" data-toggle="tab" aria-expanded="false">DETALLES DEL USUARIO</a></li>
					</ul>
					<div class="tab-content">
						<div id="resultados_ajax"></div>
						<div class="tab-pane active">
							<div class="form-group ">
								<label for="name" class="col-sm-2 control-label">Nombre:</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" wire:model.lazy="name" placeholder="ej: Curso Laravel">
									@error('name') <span class="text-danger er">{{ $message }}</span>@enderror
								</div>
								<!-- <label for="presentation" class="col-sm-2 control-label">Presentación</label> -->
								<div class="col-sm-4">
									<!--	<input type="text" class="form-control" id="presentation" maxlength="100"> -->
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">E-mail:</label>
								<div class="col-sm-10">
									<input type="text" wire:model.lazy="email" class="form-control"  pplaceholder="ej: example@mail...">
									@error('email') <span class="text-danger er">{{ $message }}</span>@enderror
								</div>
							</div>
							<div class="form-group">
								<!--<label for="note" class="col-sm-2 control-label">Descripción</label> -->
								<div class="col-sm-10">
									<!--	<textarea class="form-control" name="note" id="note"></textarea> -->
								</div>
							</div>
							<div class="form-group">
								<label for="category" class="col-sm-2 control-label">Contraseña:</label>
								<div class="col-sm-4">
									<input type="text" data-type="currency" wire:model.lazy="cost" class="form-control" placeholder="ej: 0.00">
									@error('cost') <span class="text-danger er">{{ $message }}</span>@enderror
								</div>
								<label for="cost" class="col-sm-2 control-label">Precio</label>
								<div class="col-sm-4">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="text" data-type="currency" wire:model.lazy="profile" class="form-control" placeholder="ej: ADMIN">
										@error('profile') <span class="text-danger er">{{ $message }}</span>@enderror
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="profit" class="col-sm-2 control-label">Phone</label>
								<div class="col-sm-4">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="number" wire:model.lazy="stock" class="form-control" placeholder="ej: +1999999999.. ">
										@error('phone') <span class="text-danger er">{{ $message }}</span>@enderror
									</div>
								</div>
								<label for="selling_price" class="col-sm-2 control-label">Estatus:</label>
								<div class="col-sm-4">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-tasks"></i>
										</div>
										<input type="text" wire:model="status" class="form-control" pattern="\d+(\.\d{2})?" title="Estatus">
										@error('status') <span class="text-danger er">{{ $message }}</span>@enderror
									</div>
								</div>
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