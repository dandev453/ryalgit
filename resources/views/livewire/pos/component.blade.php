<div>
<div class="container">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            
            <a href="index.php" class="btn btn-info waves-effect waves-light m-t-15">
                <span class="btn-label"><i class="fa fa-exclamation"></i></span>Inicio
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card-box">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10">
                            <select required="" class="form-control select2 select2-hidden-accessible" name="customer_id" id="customer_id" tabindex="-1" aria-hidden="true">
                                <option value="">Selecciona Cliente</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 332px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-customer_id-container"><span class="select2-selection__rendered" id="select2-customer_id-container" title="Selecciona Cliente">Selecciona Cliente</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <div class="col-md-2">
                                <button data-toggle="modal" data-target="#cliente_modal" class="btn btn-success"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="sale_number" id="sale_number" required="" value="3249">
                        <div class="input-group m-t-5 col-md-12">
                            <form id="barcode_form" method="">
                                <!-- <hr> -->
                                <div class="col-md-2">
                                    <input class="form-control" type="text" name="barcode_qty" id="barcode_qty" value="1" required="">
                                </div>
                                
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="barcode" id="barcode" required="" placeholder="Ingresa el código de barras">
                                        <span class="input-group-btn">
                                            <button class="btn " style="height: 38px" type="submit"><i class="fa fa-barcode"></i> </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="resultados" class="">
                        <table class=" table" id="cartTable">
                            <thead>
                                <tr>
                                    <th width=""><h5><b>#</b></h5></th>
                                    <th width=""><h5>PRODUCTO </h5></th>
                                    <th width=""><h5> CANT.</h5></th>
                                    <th width=""><h5> P. UNIT. </h5></th>
                                    <th width=""><h5> P.TOTAl</h5></th>
                                    <th width=""></th>
                                    
                                </tr>
                            </thead>
                            <tbody class="">
                            </tbody>
                        </table>
                        
                        <hr>
                        <div class="m-t-10">
                            <div class="row">
                                <div class="col-md-4"><label class="control-label">Total Item(s) </label></div>
                                <div class="col-md-2">: <span id="total"><label class="control-label">0</label></span></div>
                                <div class="col-md-3"> <label class="control-label">NETO:</label> </div>
                                <div class="col-md-3">: <span id="price"><label class="control-label">0,00</label></span></div>
                                
                            </div>
                        </div>
                        <div class="m-t-10">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4"> <label class="control-label">Descuento(%) </label></div>
                                    <!-- <div class="col-md-2"></div> -->
                                    <div class="col-md-4"><input class="form-control input-sm" required="" pattern="\d+(\.\d{2})?" type="number" id="descuento" value="0" onblur="descuento(this.value)"></div>
                                    <div class="col-md-3 col-md-offset-1">: <span id="price"> <label class="control-label">0,00</label></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-10">
                            <div class="row">
                                <div class="col-md-4"><label class="control-label">IVA(%)</label> </div>
                                <div class="col-md-4">
                                    <select name="taxes" class="form-control input-sm" id="taxes" onchange="tax_value(this.value)">
                                        <option value="18.00">ITBIS 18.00 %</option>
                                    </select>
                                </div>
                                <!-- <div class="col-md-2"></div> -->
                                <div class="col-md-3 col-md-offset-1">: <span id="price"><label class="control-label">0,00</label></span></div>
                            </div>
                        </div>
                        <div class="m-t-10">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-6">
                                    <h3> <label class="control-label">TOTAL</label> </h3>
                                </div>
                                <div class="col-md-3">
                                    <h3>
                                    <label class="control-label">
                                        0,00
                                    </label>
                                    </h3>
                                    <!-- <input type="hidden" id="total" name="total"  value="0,00">
                                    -->
                                </div>
                            </div>
                        </div>
                        
                        <!-- <form  method="post" name="save_sale" id="save_sale"> -->
                        <div class="button-list pull-right">
                            
                            
                            <button data-toggle="modal" data-target="#paymentModel" value="0.00" onclick="modalPago(this.value);" id="payButton" class="btn btn-success waves-effect waves-light">
                            <span class="btn-label"><i class="fa fa-money"></i></span>Pagar
                            </button>
                        </div>
                    <hr></div>
                    <!-- <form  method="post" name="save_sale" id="save_sale">
                        <div class="button-list pull-right">
                            <button  onclick="" type="button" class="btn btn-danger waves-effect waves-light">
                            <span class="btn-label"><i class="fa fa-ban"></i></span>Cancelar
                            </button>
                            data-toggle="modal" data-target="#paymentModel"
                            <button type="submit" id="payButton" class="btn btn-success waves-effect waves-light">
                            <span class="btn-label"><i class="fa fa-money"></i></span>Pagar
                            </button>
                        </div>
                        <hr>
                    </form>    -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="q" class="form-control" placeholder="Buscar Productos" onkeyup="load(1)">
                        </div>
                        <div class="col-md-6">
                            <select onchange="load(1);" class="form-control" name="category_id" id="category_id">
                                <option value="">Selecciona Categoría</option>
                                <option value="3"> AUDIO</option>
                                <option value="4">CAMARAS</option>
                                <option value="2">CÓMPUTO</option>
                                <option value="1">TELÉFONOS</option>
                                
                            </select>
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row  outer_div" id="outer_div" style="height: 600px; overflow: scroll;">
                        
                        <div class="col-lg-2 box Oil">
                            <div class="widget-panel widget-style-2 ">
                                <center>
                                <img src="img/productos/1545228087_101578356-1.jpg" onclick="agregar('4')" height="100px" width="100px" alt="">
                                </center>
                                <div class="text-muted m-t-5 text-center" style="height: 40px"><span class="name">Audífonos JBL junior Bluetooth</span> <br>
                                <input type="hidden" value="1" id="cantidad_4" name="">
                                <span class="sku"></span></div>
                                <h4 class="text-success text-center">
                                <input type="hidden" value="74.00" id="precio_venta_4" name="">
                                <b data-plugin="counterup">74.00 $ </b>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-2 box Oil">
                            <div class="widget-panel widget-style-2 ">
                                <center>
                                <img src="img/productos/1545229040_101578398_2.jpg" onclick="agregar('11')" height="100px" width="100px" alt="">
                                </center>
                                <div class="text-muted m-t-5 text-center" style="height: 40px"><span class="name">Auriculares Inalámbricos</span> <br>
                                <input type="hidden" value="1" id="cantidad_11" name="">
                                <span class="sku"></span></div>
                                <h4 class="text-success text-center">
                                <input type="hidden" value="30.00" id="precio_venta_11" name="">
                                <b data-plugin="counterup">30.00 $ </b>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-2 box Oil">
                            <div class="widget-panel widget-style-2 ">
                                <center>
                                <img src="img/productos/1545227977_101464684.jpg" onclick="agregar('7')" height="100px" width="100px" alt="">
                                </center>
                                <div class="text-muted m-t-5 text-center" style="height: 40px"><span class="name">Bluetooth TV Sound Bar</span> <br>
                                <input type="hidden" value="1" id="cantidad_7" name="">
                                <span class="sku"></span></div>
                                <h4 class="text-success text-center">
                                <input type="hidden" value="149.00" id="precio_venta_7" name="">
                                <b data-plugin="counterup">149.00 $ </b>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-2 box Oil">
                            <div class="widget-panel widget-style-2 ">
                                <center>
                                <img src="img/productos/1545277243_393791-7.jpg" onclick="agregar('19')" height="100px" width="100px" alt="">
                                </center>
                                <div class="text-muted m-t-5 text-center" style="height: 40px"><span class="name">Canon Cámara Fotográfica</span> <br>
                                <input type="hidden" value="1" id="cantidad_19" name="">
                                <span class="sku"></span></div>
                                <h4 class="text-success text-center">
                                <input type="hidden" value="500.00" id="precio_venta_19" name="">
                                <b data-plugin="counterup">500.00 $ </b>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-2 box Oil">
                            <div class="widget-panel widget-style-2 ">
                                <center>
                                <img src="img/productos/1545277347_033744500.1433346759.jpg" onclick="agregar('20')" height="100px" width="100px" alt="">
                                </center>
                                <div class="text-muted m-t-5 text-center" style="height: 40px"><span class="name">Cámara fotográfica Sony</span> <br>
                                <input type="hidden" value="1" id="cantidad_20" name="">
                                <span class="sku"></span></div>
                                <h4 class="text-success text-center">
                                <input type="hidden" value="274.00" id="precio_venta_20" name="">
                                <b data-plugin="counterup">274.00 $ </b>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
$('.wrapper ').delay(5000);
$('section.header,article,.left-side,.sidebar').fadeOut();
$('aside ').removeClass('right-side')
$('div.container').removeClass("container");
})
</script>