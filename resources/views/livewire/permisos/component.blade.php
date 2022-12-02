<article class="content-header d-flex justify-content-between bg-light w-100">
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
                <h3 class="box-title">{{$componentName}}  </h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-box-tool" href="/asignar"><i class="fa fa-plus"></i> ASIGNAR</a>
                    <!--    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    -->
                    <!--    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>  -->
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
                            </tr>
                            @foreach($permisos as $permiso)
                            <tr>
                                <!-- <td>2</td> -->
                                <td>  <h6>{{ $permiso->id }}</h6></td>
                                  <td class="text-center">
                                       {{$permiso->name}}
                                    </td>
                                <td>
                                    <a href="javascript:void(0)"
                                    wire:click="Edit({{$permiso->id}})"
                                    class="btn btn-dark mtmobile" title="Editar Registro">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)"
                                onclick="Confirm({{$permiso->id}})"
                                class="btn btn-dark" title="Eliminar Registro">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                     @endforeach
                    </tr>
                    <tr>
                        <td colspan="9">
                            Mostrando {{ $permisos->count() }} de   {{ $permisos->count() }} de registros
                        </td>

                    </tr>
                </tbody>
            </table>
            <div style="margin: 5px;">
                {{ $permisos->links() }}
            </div>
        </div>
        @include('livewire.permisos.form')
       <!-- / <div class="box-footer">
        </div> --><!-- /.box-footer -->
    </div><!-- /.box -->
    <!-- MODAL CREATE & EDIT -->
    <!--  END MODAL -->
</div><!-- row -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('permiso-added', msg =>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('permiso-updated', msg =>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('permiso-deleted', msg =>{
                        //noty
        });
        window.livewire.on('show-modal', msg =>{
            $('#theModal').modal('show');
        });
        window.livewire.on('hide-modal', msg =>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('hidden.bs.modal', msg =>{
            $('.er').css('display', 'none')
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
</article><!-- /.content -->