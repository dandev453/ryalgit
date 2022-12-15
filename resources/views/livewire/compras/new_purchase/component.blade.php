<article class="content">
    <!-- <div class="col-md-12"> -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Default Box (button tooltip)</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title=""
                    data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title=""
                    data-original-title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Detalles de la compra</h3>
                    <div class="box-tools pull-right">
                        <div class="label bg-aqua">Label</div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-background">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Proveedor</label>
                                    <div class="input-group input-group-sm">
                                        <div class="form-group">
                                            <select class="form-control ">


                                            </select>
                                        </div>
                                        <span class="input-group-btn">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" data-toggle="modal"
                                                    data-target="#proveedor_modal"><i class="fa fa-plus"></i>
                                                    Nuevo</button>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Fecha</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker hasDatepicker"
                                            name="purchase_date" value="20/11/2022" id="dp1670956823912">
                                        <!--readonly="" -->
                                            <span class="input-group-btn ">
                                                <button class="btn btn-default " type="button"><i
                                                        class="fa fa-calendar "></i></button>
                                            </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Compra Nº</label>
                                    <input type="text" class="form-control" name="order_number" id="order_number"
                                        required="" value="2239">
                                </div>
                                <div class="col-md-2">
                                    <label>Agregar productos</label>
                                    <button type="button" class="btn btn-block btn-info" data-toggle="modal"
                                        data-target="#myModal"><i class="fa fa-search"></i> Buscar productos</button>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="box-footer">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>CODIGO</th>
                                    <th class="text-center">CANT.</th>
                                    <th>DESCRIPCION</th>
                                    <th><span class="pull-right">PRECIO UNIT.</span></th>
                                    <th><span class="pull-right">PRECIO TOTAL</span></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right">NETO $</span></td>
                                    <td><span class="pull-right">0,00</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <select name="taxes" id="taxes" onchange="tax_value(this.value)">
                                            <option value="18.00">ITBIS 18.00 %</option>
                                        </select>
                                    </td>
                                    <td><span class="pull-right">0,00</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right">TOTAL $</span></td>
                                    <td><span class="pull-right">0,00</span></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success pull-right "><i class="fa fa-floppy-o"></i>
                            Guardar datos</button>
                    </div>
                    <code>.box-footer</code>
                </div><!-- /.box-footer-->
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
            <code>.box-footer</code>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
    <!-- </div> -->
    <!-- modal -->
    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" wire:model="search" class="form-control" id="q"
                                    placeholder="Buscar productos" >
                            </div>
                            <button type="button" class="btn btn-default" onclick="load(1)"><span
                                    class="glyphicon glyphicon-search"></span> Buscar</button>
                        </div>
                    </form>
                    <div id="loader" style="position: absolute; text-align: center; top: 55px; width: 100%;"></div>
                    <!-- Carga gif animado -->
                    <div class="outer_div">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr class="warning">
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Categoría</th>
                                        <th><span class="pull-right">Cant.</span></th>
                                        <th><span class="pull-right">Costo</span></th>
                                        <th style="width: 36px;"></th>
                                    </tr>
                                    @foreach($data as $product)
                                    <tr>
                                        <td>{{ $product->barcode }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category}}</td>
                                        <td class="col-xs-1">
                                            <div class="pull-right">
                                                <input type="text" class="form-control" style="text-align:right"
                                                    id="cantidad_1" value="1">
                                            </div>
                                        </td>

                                        <td class="col-xs-2">
                                            <div class="input-group pull-right">
                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control" style="text-align:right"
                                                    id="precio_venta_1" value="{{ $product->price }}">
                                            </div>
                                        </td>
                                        <td><span class="pull-right"><a href="#" onclick="agregar('1')"><i
                                                        class="glyphicon glyphicon-shopping-cart "
                                                        style="font-size:24px;color: #5CB85C;"></i></a></span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- Datos ajax Final -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
        <!-- Footer -->

    </div>
</article>
