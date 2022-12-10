<article class="content-header w-100">
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
                <a href="javascript::void(0)" class="btn btn-default"><i class="fa fa-plus"></i> Nuevo</a>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $componentName }} | {{ $pageTitle }} </h3>
                    <div class="box-tools pull-right">
                        <!--    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    -->
                        <!--    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>  -->
                        <button class="btn-flat btn tabmenu bg-dark btn btn-sm" data-toggle="modal"
                            data-target="#theModal">
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
                                    <th>TYPO </th>
                                    <!-- <th>Nº de productos</th> -->
                                    <th>VALOR</th>
                                    <th>IMAGEN</th>
                                    <th></th>
                                </tr>
                                @foreach ($data as $coins)
                                    <tr>
                                        <!-- <td>2</td> -->
                                        <td> {{ $coins->type }} </td>
                                        <td>
                                            {{ $coins->value }}
                                        </td>
                                        <td>
                                            <span>
                                                <img src="{{ asset('storage/denominations/' . $coins->image) }}"
                                                    alt="imagen de ejemplo" height="70" width="80"
                                                    class="rounded">
                                            </span>
                                        <td>
                                            <div class="btn-group">
                                                <a href="javascript:void(0)"
                                                    wire:click.prevent="Edit({{ $coins->id }})"
                                                    class="btn btn-default" title="Edit"><span>
                                                        <i class="fa fa-edit"></i></span> EDITAR
                                                </a>
                                                <a href="javascript:void(0)" onclick="Confirm('{{ $coins->id }}')"
                                                    class="btn btn-default" title="Delete">
                                                    <span> <i class="fa fa-trash"></i></span> ELIMINAR
                                                </a>
                                            </div>
                                @endforeach
                                </td>
                                </tr>
                                <tr>
                                    <td colspan="9">
                                        Mostrando {{ $data->count() }} de {{ $data->count() }} de registros
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="9">
                                        {{ $data->links() }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="">

                        </div>
                    </div>
                </div>
                @include('livewire.denominations.form')
                <div class="box-footer">
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
            <!-- MODAL CREATE & EDIT -->
            <!--  END MODAL -->
        </div><!-- row -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.livewire.on('item-added', msg => {
                    $('#theModal').modal('hide');
                });
                window.livewire.on('item-updated', msg => {
                    $('#theModal').modal('hide');
                });
                window.livewire.on('item-deleted', msg => {
                    //noty
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
