<article class="content-header d-flex justify-content-between bg-light w-100">
    <div class="row content-header ">
        <div class="col-xs-12 col-md-3">
            <div class="input-group">
                <input wire:model="search" type="text" class="form-control" placeholder="Buscar por nombre" id="q" >
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" ><i class="fa fa-search"></i></button>
                </span>
            </div><!-- /input-group -->
        </div>
        <div class="col-md-3 hidden-xs"></div>
        <div class="col-md-1 col-xs-2">
            <div id="loader" class="text-center"></div>
        </div>
        <div class="col-xs-10 col-md-5 ">
            <div class="btn-group pull-right">
                <!-- /   <a href="/add_product" class="btn btn-default"><i class="fa fa-plus"></i> Nuevo</a> -->
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mostrar
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                    <li class="active" onclick="per_page(15);" id="15"><a href="#">15</a></li>
                    <li onclick="per_page(25);" id="25"><a href="#">25</a></li>
                    <li onclick="per_page(50);" id="50"><a href="#">50</a></li>
                    <li onclick="per_page(100);" id="100"><a href="#">100</a></li>
                    <li onclick="per_page(1000000);" id="1000000"><a href="#">Todos</a></li>
                </ul>
            </div>
        </div>
        <input type="hidden" id="per_page" value="15">
    </div>
</section>
<!-- Main content -->
<section class=" content" >
    <div class="row">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$componentName}} | {{$pageTitle}} </h3>
                <div class="box-tools pull-right">
                    <!--    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    -->
                    <!--    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>  -->
                    <button  class="btn-flat btn tabmenu bg-dark btn btn-sm" data-toggle="modal" data-target="#theModal">
                        + Agregar
                    </a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body" style="padding:0;">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover table-striped">
                        <tbody>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>ID </th>
                                <!-- <th>Nº de productos</th> -->
                                <th>DESCRIPCION</th>
                                <th>ACTIONS</th>
                                <th></th>
                            </tr>
                            @foreach($permisos as $permiso)
                            <tr>
                                <!-- <td>2</td> -->
                                <td>  <h6>{{ $permiso->id }}</h6></td>
                                <td class="text-center">
                                    <div class="n-check">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox"
                                            wire:change="SyncPermiso($('#p' + {{ $permiso->id }}).is(':checked'), '{{ $permiso->name }}' )"
                                            id="p{{ $permiso->id }}"
                                            value="{{ $permiso->id }}"
                                            class="new-control-input"
                                            {{ $permiso->checked == 1 ? 'checked' : '' }}
                                            >
                                            <span class="new-control-indicator"></span>
                                            <h6>{{ $permiso->name }}</h6>
                                        </label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <h6>{{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="9">
                                    Mostrando {{ $data->count() }} de   {{ $data->count() }} de registros
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin: 5px;">
                        {{ $data->links() }}
                    </div>
                </div>
                @include('livewire.permisos.form')
                <div class="box-footer">
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
            <!-- MODAL CREATE & EDIT -->
            <!--  END MODAL -->
        </div><!-- row -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.livewire.on('sync-error', Msg => {
                    noty(Msg)
                })
                window.livewire.on('permi', Msg => {
                    noty(Msg)
                })
                window.livewire.on('syncall', Msg => {
                    noty(Msg)
                })
                window.livewire.on('removeall', Msg => {
                    noty(Msg)
                })
            });
            function Revocar()
            {
                swal({
                    title: 'CONFIRMAR',
                    text: '¿CONFIRMAS REVOCAR TODOS LOS PERMISOS?',
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cerrar',
                    cancelButtonColor: '#fff',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#3B3F5C'
                }).then(function (result) {
                    if (result.value){
                        window.livewire.emit('revokeall')
                        swal.close()
                    }
                });
            }
        </script>
</article><!-- /.content -->