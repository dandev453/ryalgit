<article class="content-header bg-light w-100">
    <div class="row content-header ">
        <div class="col-xs-12 col-md-3">
            @include('common.searchbox')
        </div>
        <div class="col-md-3 hidden-xs"></div>
        <div class="col-md-1 col-xs-2">
            <div id="loader"></div>
        </div>
        <div class="col-xs-10 col-md-5 ">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
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

    <!-- Main content -->
    <section class=" content">
        <div class="row">
            <div class="form-inline">
                <div class="form-group mr-5">
                    <select wire:model="role" class="form-control">
                        <option value="Elegir">Seleccione Rol</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" wire:click.prevent="SyncAll()" class="btn btn-default   mr-5">
                    Sincronizar Todos
                </button>
                <button type="button" onclick="Revocar()" class="btn btn-default  mr-5">
                    Revocar Todos
                </button>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> </h3>
                    <div class="box-tools pull-right">

                    </div>
                </div><!-- /.box-header -->


                <div class="table-responsive">
                    <table class="table table-condensed table-hover table-striped">
                        <tbody>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>ID </th>
                                <!-- <th>Nº de productos</th> -->
                                <th>PERMISO</th>
                                <th>ROLES CON EL PERMISO</th>
                                <th></th>
                            </tr>
                            @foreach($permisos as $permiso)
                            <tr>
                                <td><h6 class="text-center">{{$permiso->id}}</h6></td>
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
                            @endforeach
                            <tr>
                                <td colspan="9">
                                    Mostrando de de registros
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin: 5px;">

                    </div>
                </div>
            </div>
        </div>
    </section>
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

        function Revocar() {
            swal({
                title: 'CONFIRMAR',
                text: '¿CONFIRMAS REVOCAR TODOS LOS PERMISOS?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cerrar',
                cancelButtonColor: '#fff',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#3B3F5C'
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('revokeall')
                    swal.close()
                }
            });
        }
    </script>


</article><!-- /.content -->
