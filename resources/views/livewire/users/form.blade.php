<div>
	@include('common.modalHead')
	<!-- Right side column. Contains the navbar and content of the page -->
	<!-- Content Header (Page header) -->
	<!-- Main content -->
	<div class="content-wrapper" style="min-height: 557px;">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h3><i class="fa fa-edit"></i>{{ $selected_id > 0 ? 'Editar' : 'Crear' }} Usuario</h3>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-3">
					<!-- Profile Image -->
					<div class="box box-primary">
						<div class="box-body box-profile">
							<div id="load_img">
								<img id='img1' src="{{ asset('./assets/img/avatar.png')}}" >
								<img id='img2' src="{{ asset('./assets/img/avatar2.png')}}" >
								<script>
									$('#img2').hide()
								</script>
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
								<li class="active"><a href="#details" data-toggle="tab" aria-expanded="false">Detalles del usuario</a></li>
							</ul>
							<div class="tab-content">
								<div id="resultados_ajax"></div>
								<div class="tab-pane active">
									<!-- <label for="presentation" class="col-sm-2 control-label">Presentación</label> -->
									<div class="form-group">
										<label for="barcode" class="col-sm-2 control-label">Nombre:</label>
										<div class="col-sm-10  mt-2">
											<input type="text" wire:model.lazy="name" class="form-control"  pplaceholder="ej: Saske uchijja..">
											@error('name') <span class="text-danger er">{{ $message }}</span>@enderror
										</div>
										<label for="email" class="col-sm-2 control-label">Email:</label>
										<div class="col-sm-10  mt-2">
											
											<input type="text" wire:model.lazy="email" class="form-control"  placeholder="ej: mail@example.com">
											@error('email') <span class="text-danger er">{{ $message }}</span>@enderror
										</div>
										<label for="profile" class="col-sm-2 control-label">perfil:</label>
										<div class="col-sm-10 mt-2">
											@if($user->profile != "null")
											<select wire:model="profile" class="form-control">
												<option value="{{ $user->profile }}" default>{{$user->profile}}</option>
												<option value="ADMIN">Admin</option>
												<option value="EMPLOYEE">Employee</option>
											</select>
											@endif
											@error('profile') <span class="text-danger er">{{ $message }}</span>@enderror
										</div>
										@if($user->status != "null")
										<label for="status" class="col-sm-2 control-label">Estado</label>
										<div class="col-sm-10  mt-2">
											<select wire:model.lazy="status" class="form-control">
												<option  default>{{$user->status}}</option>
												<option value="ACTIVE">ACTIVO</option>
												<option value="INACTIVE">INACTIVO</option>
											</select>
											@else
											<label for="status" class="col-sm-2 control-label">Estado</label>
											<div class="col-sm-10  mt-2">
												<select wire:model.lazy="status" class="form-control">
													<option  default>Seleccionar:</option>
													<option  value="ACTIVE">ACTIVO</option>
													<option value="INACTIVE">INACTIVO</option>
												</select>
												@endif
												@error('status') <span class="text-danger er">{{ $message }}</span>@enderror
											</div>
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
			<script>
				/*** ONCHANGE ACTIVE - INACTIVE USERS (STATUS) ***/


				/*** ***/
			</script>
		</div>