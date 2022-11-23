<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="input-group">
                <input type="text" class="form-control" wire:model="search" placeholder="Buscar por nombre" id="q" >
                <span class="input-group-btn">
                    <button class="btn btn-default" disabled="disabled" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div><!-- /input-group -->
        </div>
        <div class="col-md-3 hidden-xs"></div>
        <div class="col-md-1 col-xs-2">
            <div id="loader" class="text-center"></div>
        </div>
        <div class="col-xs-10 col-md-5 ">
            <div class="btn-group pull-right">
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
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$componentName}} | {{$pageTitle}}</h3>
                    <div class="box-tools pull-right">
                        <!--    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    -->
                        <!--    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>  -->

                        <button  class="btn-flat btn tabmenu bg-dark btn btn-sm" data-toggle="modal" data-target="#theModal">
                            + Agregar
                        </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped">
                            <tbody>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Categoría </th>
                                    <!-- <th>Nº de productos</th> -->
                                    <th>
                                    </th>
                                    <th>Estado</th>
                                    <th>Agregado</th>
                                    <th></th>
                                </tr>
                                @foreach($categories as $category)
                                <tr>
                                    <!-- <td>2</td> -->
                                    <td> {{$category->name}} </td>
                                    <td>5.00</td>
                                    <td>
                                        <span class="label label-success">Activo</span>
                                    </td>
                                    <td>{{$category->created_at}}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">Action</button>
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="javascript:void(0)"
                                                        wire:click="Edit({{$category->id}})"
                                                        class="btn btn-dark mtmobile" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </li> <li class="divider"></li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                    onclick="Confirm('{{$category->id}}', '{{$category->products->count()}}')"
                                                    class="btn btn-dark" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- /btn-group -->
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="6">
                                Mostrando 1 al 4 de 4 registros

                            </tr>
                        </tbody></table>
                    </div>
                </div>
                @include('livewire.category.form')
                <div class="box-footer">
                </div><!-- /.box-footer -->
            </div><!-- /.box -->

        </div> <!-- col -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Versión</b> 1.2
            </div>
            <strong>Copyright © 2015-2022 <a href="" target="_blank">Ryalpos</a></strong> All rights reserved.
        </footer>
        <!-- MODAL CREATE & EDIT -->
        <!--  END MODAL -->
    </div><!-- row -->
</section><!-- /.content -->
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('show-modal', msg =>{
           $('#theModal').modal('show');
        });
        window.livewire.on('category-added', msg =>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('category-updated', msg =>{
            $('#theModal').modal('hide');
        });
    });

    function Confirm(id, products)
    {
        if (products > 0)
        {
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
        }).then(function (result) {
           if (result.value){
               window.livewire.emit('deleteRow', id)
               swal.close()
           }
        });
    }

</script>