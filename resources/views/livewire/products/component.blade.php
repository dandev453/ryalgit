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
                        <th>CODIGO </th>
                        <!-- <th>Nº de productos</th> -->
                        <th>IMAGEN</th>
                        <th>PRODUCTO</th>
                        <th>CATEGORÍA</th>
                        <th>ALERTAS</th>
                        <th>STOCK</th>
                        <th>ESTADO</th>
                        <th>PRECIO</th>
                        <th></th>
                    </tr>
                    @foreach($data as $product)
                    <tr>
                        <!-- <td>2</td> -->
                        <td> {{$product->barcode}} </td>
                        <td>
                            <span>
                                <img src="{{ asset('storage/products/' . $product->imagen ) }}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                            </span>
                        </td>
                        <td>
                            {{$product->name}}
                        </td>
                        <td>{{$product->category}}</td>
                        <td> <h6>{{$product->alerts}}</h6></td>
                        <td>{{$product->stock}}</td>
                        <td><span class="label label-success">Activo</span></td>
                        <td>{{$product->price}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="javascript:void(0)"
                                 wire:click.prevent="Edit({{$product->id}})"
                                class="btn btn-default" title="Edit"><span>
                                    <i class="fas fa-edit"></i></span> EDITAR
                                </a>
                                <a href="javascript:void(0)"
                                onclick="Confirm('{{$product->id}}')"
                                class="btn btn-default" title="Delete">
                                <span> <i class="fas fa-trash"></i></span> ELIMINAR
                            </a>
                        </div>
                    @endforeach
                    </td>
                </tr>

                <tr>
                    <td colspan="9">
                        Mostrando de    de registros

                    </td>
                </tr>
              
            </tbody></table>
        </div>
    </div>
    @include('livewire.products.form')
    <div class="box-footer">
    </div><!-- /.box-footer -->
</div><!-- /.box -->
<!-- MODAL CREATE & EDIT -->
<!--  END MODAL -->
</div><!-- row -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    window.livewire.on('product-added', msg =>{
        $('#theModal').modal('hide');
    });
    window.livewire.on('product-updated', msg =>{
        $('#theModal').modal('hide');
    });
    window.livewire.on('product-deleted', msg =>{
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