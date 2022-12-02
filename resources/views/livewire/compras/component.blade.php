<div class="content-wrapper">
<section class="content-header" style="position: relative;
  padding: 15px 15px 0 15px;">
<h3><i class="fa fa-edit"></i>Agregar nuevo producto</h3>
</section>
<!-- Main content -->

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Default Box (button tooltip)</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
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
                                            <button class="btn btn-default" type="button" data-toggle="modal" data-target="#proveedor_modal"><i class="fa fa-plus"></i> Nuevo</button>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Fecha</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker hasDatepicker" name="purchase_date" value="20/11/2022" id="dp1669944740178"><!--readonly="" -->
                                    <span class="input-group-btn ">
                                        <button class="btn btn-default " type="button"><i class="fa fa-calendar "></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Compra Nº</label>
                                <input type="text" class="form-control" name="order_number" id="order_number" required="" value="2239">
                            </div>
                            <div class="col-md-2">
                                <label>Agregar productos</label>
                                <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Buscar productos</button>
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
                    <button type="submit" class="btn btn-success pull-right "><i class="fa fa-floppy-o"></i> Guardar datos</button>
                </div>
                <code>.box-footer</code>
            </div><!-- /.box-footer-->
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <code>.box-footer</code>
    </div><!-- /.box-footer-->
</div>