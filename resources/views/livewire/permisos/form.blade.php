<div>
	@include('common.modalHead')
	<!-- Right side column. Contains the navbar and content of the page -->
	<!-- Content Header (Page header) -->
	<!-- Main content -->
	<div class="content-wrapper" style="min-height: 557px;">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h3><i class="fa fa-edit"></i>AÑADIR PERMISOS DE USUARIO</h3>
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
								<li class="active"><a href="#details" data-toggle="tab" aria-expanded="false">DETALLES DEL PERMISO DEL USUARIO</a></li>
							</ul>
							<div class="tab-content">
								<div id="resultados_ajax"></div>
								<div class="tab-pane active">
									<div class="form-group ">
										<label for="name" class="col-sm-2 control-label">Nombre:</label>
										<div class="col-sm-4">
											<input type="text" wire:model.lazy="roleName" class="form-control" placeholder="ej: Admin">
											@error('roleName') <span class="text-danger er">{{ $message }}</span>@enderror
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