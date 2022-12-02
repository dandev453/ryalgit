<div>
<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
	<div class="modal-header bg-dark">
		<h5 class="modal-title text-white">
			<b>{{$componentName}}</b> | {{ $selected_id > 0 ? 'Editar' : 'Crear' }}
		</h5>
		<h6 class="text-center text-warning" wire:loading>POR FAVOR ESPERE</h6>
	</div>
	<div class="modal-body">
		<!-- Right side column. Contains the navbar and content of the page -->
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<div class="content-wrapper">
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
												<input type="text" wire:model.lazy="permissionName" class="form-control" placeholder="ej: category_index">
											     @error('permissionName') <span class="text-danger er">{{ $message }}</span>@enderror
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
				</div>
				<div class="modal-footer">
					<button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn text-info" data-dismiss="modal">
						CERRAR
					</button>
					@if($selected_id < 1)
					<button type="button" wire:click.prevent="CreatePermission()" class="btn btn-dark close-modal">
						GUARDAR
					</button>
					@else
					<button type="button" wire:click.prevent="UpdatePermission()" class="btn btn-dark close-modal">
						ACTUALIZAR
					</button>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>