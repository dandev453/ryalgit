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
                    <h3 class="box-title">{{ $componentName }} | {{ $pageTitle }}</h3>
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
                                    <th class="text-center">Categoría </th>
                                    <!-- <th>Nº de productos</th> -->
                                    <th>
                                    </th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Agregado</th>
                                    <th class="text-center"></th>
                                </tr>
                                @foreach ($categories as $category)
                                    <tr>
                                        <!-- <td>2</td> -->
                                        <td class="text-center"> {{ $category->name }} </td>
                                        <td class="text-center">
                                            <span>
                                                <img src="{{ asset('storage/categories/' . $category->imagen) }}"
                                                    alt="imagen de ejemplo" height="70" width="80"
                                                    class="rounded">
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-success">Activo</span>
                                        </td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($category->created_at)->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="javascript:void(0)" wire:click="Edit({{ $category->id }})"
                                                    class="btn btn-default" title="Edit"><span>
                                                        <i class="fa fa-edit"></i></span> EDITAR
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="Confirm('{{ $category->id }}', '{{ $category->products->count() }}')"
                                                    class="btn btn-default" title="Delete">
                                                    <span> <i class="fa fa-trash"></i></span> ELIMINAR
                                                </a>
                                            </div>
                    </div><!-- /btn-group -->
                    </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            Mostrando {{ $categories->count() }} de {{ $categories->count() }} de registros
                            {{ $categories->links() }}
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            @include('livewire.category.form')
            <!--/<div class="box-footer">
        </div>-->
            <!-- /.box-footer -->
        </div><!-- /.box -->
    </section>
        <!-- MODAL CREATE & EDIT -->
        <!--  END MODAL -->
        
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                window.livewire.on('show-modal', msg => {
                    $('#theModal').modal('show');
                });
                window.livewire.on('category-added', msg => {
                    $('#theModal').modal('hide');
                });
                window.livewire.on('category-updated', msg => {
                    $('#theModal').modal('hide');
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
