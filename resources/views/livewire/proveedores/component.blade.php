<article class="content-header  bg-light w-100">
    <div class="row content-header ">
        <div class="col-xs-12 col-md-3">
            @include('common.searchbox')
        </div>
        <div class="col-md-3 hidden-xs"></div>
        <div class="col-md-1 col-xs-2">
            <div id="loader" class="text-center"></div>
        </div>
        <div class="col-xs-10 col-md-5 ">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Mostrar
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                    <li class="active" wire:model="pagination"><a href="#">15</a></li>
                    <li wire:click.prevent="load()"><a href="#">25</a></li>
                    <li wire:model="pagination"><a href="#">Todos</a></li>
                </ul>
            </div>
        </div>
        <input type="hidden" id="per_page" value="15">
    </div>
    <!-- Main content -->
    <section class=" content">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ $componentName }} | {{ $pageTitle }} </h3>
                    <div class="box-tools pull-right">
                        <!--    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    -->
                        <!--    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>  -->
                        <button class="btn-flat btn tabmenu bg-dark btn btn-sm" data-toggle="modal"
                            data-target="#theModal">
                            + Agregar
                        </button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding:0;">
                    <div class="table-responsive ">
                        <table class="table table-condensed table-hover table-striped">
                            <tbody>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th class="text-center">ID </th>
                                    <!-- <th>Nº de productos</th> -->
                                    <th class="text-center">REGISTRO FISCAL #</th>
                                    <th class="text-center">PROVEEDOR</th>
                                    <th class="text-center">DIRECCIÓN</th>
                                    <th class="text-center">AGREGADO</th>
                                    <th class="text-center"></th>
                                </tr>
                                @foreach ($data as $suplier)
                                    <tr>
                                        <!-- <td>2</td> -->
                                        <td class="text-center"> {{ $suplier->id }} </td>
                                        <td class="text-center">
                                            {{ $suplier->registro_fiscal }}
                                        </td>
                                        <td class="text-center">
                                            {{ $suplier->name }}
                                        </td>
                                        <td class="text-center">{{ $suplier->address }} </td>
                                        <td class="text-center">
                                            {{ $suplier->created_at }}
                                        </td>
                                        <td class="text-center">
                                               <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle" type="button"
                                                    id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    Acciones
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                    <li><a href="javascript::void()"  wire:click.prevent="Edit({{ $suplier->id }})">Edit <span><i class="fa fa-carret-down"></i></span></a></li>
                                                    <li><a href="javascript::void()"  onclick="Confirm('{{ $suplier->id }}')">Borraar</a></li>
                                                   
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="margin: 5px;">
                            {{ $data->links() }}
                        </div>
                    </div>

                    <!-- /<div class="box-footer">
                    </div>-->
                    <!-- /.box-footer -->
                </div><!-- /.box -->
                <!-- MODAL CREATE & EDIT -->
                @include('livewire.proveedores.form')
                <!--  END MODAL -->
            </div><!-- row -->
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('product-added', msg => {
                $('#theModal').modal('hide');
                noty(Msg)
            });
            window.livewire.on('product-updated', msg => {
                $('#theModal').modal('hide');
            });
            window.livewire.on('product-deleted', msg => {
                //noty
                noty(Msg)
            });
            window.livewire.on('show-modal', msg => {
                $('#theModal').modal('show');
            });
            window.livewire.on('hide-modal', msg => {
                $('#theModal').modal('hide');
            });
            window.livewire.on('hidden.bs.modal', msg => {
                $('.er').css('display', 'none')
            });
        });

        function Confirm(id, products) {
            if (products > 0) {
                swal('No se puede eliminar la categoria porque tiene productos relacionados.')
                return;
            }
            swal({
                title: 'CONFIRMAR',
                text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cerrar',
                cancelButtonColor: '#fff',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#3B3F5C'
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('deleteRow', id)
                    swal.close()
                }
            });
        }
    </script>
</article><!-- /.content -->
