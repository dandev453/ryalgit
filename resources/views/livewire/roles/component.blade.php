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
            <a href="/permisos" class="btn btn-default"><i class="fa fa-plus"></i>PERMISOS</a>
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
                            @foreach($roles as $role) 
                            <tr>
                             
                                <!-- <td>2</td> -->
                                <td>  <h6>{{ $role->id }}</h6></td>
                                <td class="text-center">
                                    {{ $role->name }}
                                </td>
                                
                                <td>
                                    <a href="javascript:void(0)"
                                    wire:click="Edit({{$role->id}})"
                                    class="btn btn-dark mtmobile" title="Editar Registro">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)"
                                onclick="Confirm({{$role->id}})"
                                class="btn btn-dark" title="Eliminar Registro">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        @endforeach

                        <td colspan="9">
                         
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9">
                            Mostrando {{ $roles->count() }} de {{ $roles->count() }} de registros

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style=" margin:5px">
           {{ $roles->links() }}
       </div>
       @include('livewire.roles.form')
         <!--/  <div class="box-footer">
         </div> --><!-- /.box-footer -->
     </div><!-- /.box -->
     <!-- MODAL CREATE & EDIT -->
     <!--  END MODAL -->
 </div><!-- row -->
 <script>
  document.addEventListener('DOMContentLoaded', function() {
    window.livewire.on('role-added', Msg => {
       $('#theModal').modal('hide')
       noty(Msg)
   });
    window.livewire.on('role-updated', Msg => {
        $('#theModal').modal('hide')
        noty(Msg)
    });
    window.livewire.on('role-deleted', Msg => {
        noty(Msg)
    });
    window.livewire.on('role-exists', Msg => {
        noty(Msg)
    });
    window.livewire.on('role-error', Msg => {
        noty(Msg)
    });
    window.livewire.on('hide-modal', Msg => {
        $('#theModal').modal('hide')
    });
    window.livewire.on('show-modal', Msg => {
        $('#theModal').modal('show')
    });
});
  function Confirm(id)
  {
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
            window.livewire.emit('destroy', id)
            swal.close()
        }
    });
}
</script>
</article><!-- /.content -->