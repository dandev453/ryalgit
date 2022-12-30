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
                <a href="/add_product" class="btn btn-default"><i class="fa fa-plus"></i> Nuevo</a>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Mostrar
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                    <li class="active" wire:click="pagiante1"><a href="javascript::void()">15</a></li>
                    <li wire:click="pagiante2"><a href="javascript::void()">25</a></li>
                    <li><a href="#">Todos</a></li>
                </ul>
            </div>
        </div>

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
                        <span wire:click="$refresh">
                            <i class="fa fa-refresh">

                            </i>
                        </span>
                        <button class="btn-flat btn tabmenu bg-dark btn btn-sm" data-toggle="modal"
                            data-target="#theModal">
                            + Agregar
                        </button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding:0;">
                    @if ($data)
                        <span wire:loading class="text-center">
                            <img src="{{ asset('assets/img/ajax-loader.gif') }}" alt="">
                        </span>

                        <div class="table-responsive ">
                            <table class="table table-condensed table-hover table-striped">
                                <tbody>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th class="text-center">CODIGO </th>
                                        <!-- <th>Nº de productos</th> -->
                                        <th class="text-center">IMAGEN</th>
                                        <th class="text-center">PRODUCTO</th>
                                        <th class="text-center">CATEGORÍA</th>
                                        <th class="text-center">ESTADO</th>
                                        <th class="text-center">STOCK</th>
                                        <th class="text-center">PRECIO</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    @foreach ($data as $product)
                                        <tr>
                                            <!-- <td>2</td> -->
                                            <td class="text-center"> {{ $product->barcode }} </td>
                                            <td class="text-center">
                                                <span>
                                                    <img src="{{ asset('storage/products/' . $product->imagen) }}"
                                                        alt="imagen de ejemplo" height="70" width="80"
                                                        class="rounded">
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                {{ $product->name }}
                                            </td>
                                            <td class="text-center">{{ $product->category }}</td>

                                            <td class="text-center"><span class="label label-success">Activo</span></td>
                                            <td class="text-center">{{ $product->stock }}</td>
                                            <td class="text-center">{{ $product->price }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button"
                                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="true">
                                                        Acciones
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="javascript::void()"
                                                                wire:click.prevent="Edit({{ $product->id }})">Edit
                                                                <span><i class="fa fa-carret-down"></i></span></a></li>
                                                        <li><a href="javascript::void()"
                                                                onclick="Confirm('{{ $product->id }}')">Borraar</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                    @endforeach
                                    </td>
                                    </tr>
                                    <tr>
                                        <td colspan="9">
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="margin: 5px;">
                                {{ $data->links() }}
                            </div>

                        </div>
                    @else
                        <span class="text-center">No se han encontrado productos</span>
                    @endif
                    @include('livewire.products.form')
                    @include('livewire.pos.scripts.events')
                    <!-- /<div class="box-footer">
        </div>-->
                    <!-- /.box-footer -->
                </div><!-- /.box -->
                <!-- MODAL CREATE & EDIT -->
                <!--  END MODAL -->
            </div><!-- row -->
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('show-modal', msg => {
                $('#theModal').modal('show');
            });
            window.livewire.on('product-added', msg => {
                $('#theModal').modal('hide');
            });
            window.livewire.on('product-updated', msg => {
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
