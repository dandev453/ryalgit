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
    </button>
</div>
</div><!-- /.box-header -->

<div class="box-body" style="padding:0;">
<div class="table-responsive">
    <table class="table table-condensed table-hover table-striped">
        <tbody>
            <th class="text-center">ID</th>
            <th class="text-center">Nombres </th>
            <!-- <th>Nº de productos</th> -->
            <th class="text-center">Email</th>
            <th class="text-center">Grupo</th>
            <th class="text-center">Agregado</th>
            <th class="text-center">Estado</th>
            <th class="text-center"></th>
        </tr>
        @foreach($data as $user)
        <tr>
            <td class="text-center">{{$user->id}}</td>
            <td class="text-center">{{$user->name}}</td>
            <td class="text-center">{{$user->email}}</td>
            <td class="text-center">{{$user->profile}}</td>
            <td class="text-center">{{\Carbon\Carbon::parse($user->created_at)->format('Y-m-d')}}</td>
            <td class="text-center ">
                @if($user->status = 'ACTIVE')
                <span class="label label-success">ACTIVO</span>
              @else
                <span class="label label-danger">BLOQUEADO</span>
                @endif
            </td>
            <td class="text-center ">
                   <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button"
                    id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">
                    Acciones
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="javascript::void()"  wire:click.prevent="Edit({{ $user->id }})">Editar <span><i class="fa fa-carret-down"></i></span></a></li>
                    <li><a href="javascript::void()"  onclick="Confirm('{{ $user->id }}')">Borraar</a></li>
                    
                </ul>
            </div>
        </td>
        @endforeach
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
@include('livewire.users.form')

<!-- /<div class="box-footer">
</div>--><!-- /.box-footer -->
</div><!-- /.box -->
<!-- MODAL CREATE & EDIT -->
<!--  END MODAL -->
</div><!-- row -->
<script>
document.addEventListener('DOMContentLoaded', function() {
window.livewire.on('user-added', msg =>{
$('#theModal').modal('hide');
});
window.livewire.on('user-updated', msg =>{
$('#theModal').modal('hide');
});
window.livewire.on('user-deleted', msg =>{
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