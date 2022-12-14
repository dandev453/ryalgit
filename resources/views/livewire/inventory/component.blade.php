<article class="content-header  bg-light w-100">
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" placeholder="Buscar por código" id="product_code" wire:model="searchBybarcode">
        </div>
        <div class="col-md-3 col-xs-12">
            <input type="text" class="form-control" wire:model.lazy="search" placeholder="Buscar por nombre" id="q" onkeyup="load(1);">
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input-group">
            
                <select class="form-control" wire:model.lazy="categoryName">
                    <option value="">Seleccione Categoría</option>
                     @foreach($categories as $category)
                    <option value="{{$category->name}}"> {{$category->name}}</option>
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="load(1);"><i
                            class="fa fa-search"></i></button>
                </span>
            </div><!-- /input-group -->
        </div>

        <div class="col-xs-12 col-md-3 ">
            <div class="btn-group pull-right">
                <button type="button" onclick="reporte();" class="btn btn-default"><i class="fa fa-print"></i> PDF
                </button><button type="button" onclick="inventario_excel();" class="btn btn-default"><i
                        class="fa fa-file-excel-o"></i> Excel
                </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
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
        <div class="col-xs-12">
            <div id="loader" class="text-center"></div>
        </div>
        <input type="hidden" id="per_page" value="15">
    </div>
    <section class=" content">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Productos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped ">
                            <tbody>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th>Producto </th>
                                    <th>Categoría </th>
                                    <th class="text-right">Existencia</th>
                                    <th class="text-right">Costo</th>
                                    <th class="text-right">Total</th>
                                </tr>
                                @foreach ($data as $product)
                                    <tr>
                                        <td class="text-center">000{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td> {{ $product->category }}</td>
                                        <td class="text-right">{{ $product->stock }}</td>
                                        <td class="text-right">{{ $product->price }}</td>
                                        <td class="text-right">8.856,00</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                        {{ $data->links() }}
                    Mostrando 1 al 15 de 20 registros
                    
                </div>
            </div><!-- /.box -->
        </div><!-- /.row -->
    </section>


</article>
