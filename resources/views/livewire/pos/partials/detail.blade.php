<div class="row" >
    <div class="col-md-4">
        <div class="card-box" style="min-height: 720px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-xs-10">
                      <select wire:model="customer_id" class="form-control " >
                        <option default>Seleccionar Cliente</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer')
                    <span class="text-danger er">{{ $message }}</span>
                     @enderror
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <button data-toggle="modal" data-target="#cliente_modal" class="btn btn-success"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="sale_number" id="sale_number" required=""
                    value="3251">
                <div class="input-group m-t-5 col-md-12 col-sm-12 col-xs-12">
                    <form id="barcode_form" method="">
                        <!-- <hr> -->
                        <div class="col-md-2 col-xs-2 col-sm-2">
                            <input class="form-control" type="text" name="barcode_qty" id="barcode_qty"
                                wire:model="quantityOnScan">
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <div class="input-group">
                                <input class="form-control" type="text"
                                    wire:keydown.enter.prevent="$emit('scan-code', $('#code').val())" id="code"
                                    required="" placeholder="Ingresa el código de barras">
                                <span class="input-group-btn">
                                    <button class="btn " style="height: 38px" type="submit"><i
                                            class="fa fa-barcode"></i> </button>
                                </span>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    livewire.on('scan-code', action => {
                                        $('#code').val('')
                                    });
                                });
                            </script>
                        </div>
                    </form>
                </div>
            </div>
            <div id="resultados" >
                <table class=" table" id="cartTable">
                    <thead>
                        <tr>
                            <th width="">
                                <h5><b>#</b></h5>
                            </th>
                            <th width="">
                                <h5>PRODUCTO </h5>
                            </th>
                            <th width="">
                                <h5> CANT.</h5>
                            </th>
                            <th width="">
                                <h5> P. UNIT. </h5>
                            </th>
                            <th width="">
                                <h5> P.TOTAl</h5>
                            </th>
                            <th width=""></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($cart as $item)
                            <tr >
                                @if (count($item->attributes) > 0)
                                    <td width="">1</td>
                                    <!-- <td>
                                    <span>
                                        <img src="{{ asset('storage/products/' . $item->attributes[0]) }}" alt="Imagen Del Producto" height="90" width="90" class="rounded">
                                    </span>
                                </td> -->
                                @else
                                    <h5>Agregar producto</h5>
                                @endif
                                <td width="">{{ $item->name }}</td>
                                <td class="" width="">
                                    <!-- <div class="input-group"> -->
                                    <!-- <div class="input-group-btn btn-xs"> -->
                                    <!-- </div> -->
                                    <input type="number" id="r{{ $item->id }}"
                                        wire:change="updateQty({{ $item->id }}, $('#r' +{{ $item->id }}).val() )"
                                        style="font-size: 1rem!important" class="form-control text-center"
                                        value="{{ $item->quantity }}">
                                    <!--
                                    <button wire:click.prevent="decreaseQty({{ $item->id }})" class="btn btn-dark mbmobile">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button wire:click.prevent="increaseQty({{ $item->id }})" class="btn btn-dark mbmobile">
                                    <i class="fas fa-plus"></i>
                                    </button>
                                    -->
                                    <!-- </div> -->
                                </td>
                                <td><span class="pull-right"> ${{ number_format($item->price, 2) }} </span></td>
                                <td><span class="pull-right">
                                        ${{ number_format($item->price * $item->quantity, 2) }}</span></td>
                                <td><button class="btn btn-danger btn-xs"
                                        onclick="Confirm('{{ $item->id }}', 'removeItem', '¿CONFIRMAS ELIMNAR EL REGISTRO?')"><i
                                            class="fa fa-times"></i></button></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="m-t-10">
                    <div class="row">
                        <div class="col-md-4"><label class="control-label">Total Item(s) </label></div>
                        <div class="col-md-2">: <span id="total"><label
                                    class="control-label">{{ $itemsQuantity }}</label></span></div>
                        <div class="col-md-3"> <label class="control-label">NETO:</label> </div>
                        <div class="col-md-3">: <span id="price"><label class="control-label">
                                    ${{ number_format($total, 2) }}</label></span></div>
                    </div>
                </div>
                <div class="m-t-10">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4"> <label class="control-label">Descuento(%) </label></div>
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col-md-4"><input class="form-control input-sm" wire:model="desc" required=""
                                    pattern="\d+(\.\d{2})?" type="number" min="0" id="descuento" 
                                   ></div>
                                    <!-- DESCUENTO - TOTAL -->
                                    @php $desc =   $total  -  ( number_format($desc,2) / 100) * $total ;
                                    @endphp
                            <div class="col-md-3 col-md-offset-1">: <span id="price"> <label
                                        class="control-label"> $ {{$desc}} </label></span></div>
                        </div>
                    </div>
                </div>
                <div class="m-t-10" >
                    <div class="row" wire:model="iva" >
                        <div class="col-md-4" ><label class="control-label">IVA(%)</label> </div>
                        <div class="col-md-4">
                            @if($total)
                            @php $total_wPercen =  ($iva / 100) * $total;  @endphp 
                            <select name="taxes" class="form-control input-sm" id="taxes"
                                wire:model="iva">
                                <option default selected value="0">Seleccionar</option>
                                <option value="18" >ITBIS 18.00 %</option>
                                <option value="20">ITBIS 20.00 %</option>
                            </select>
                            @else
                            <select  name="taxes" class="form-control input-sm" id="taxes">
                            <option default selected value="0">Debes agregar un producto</option>
                            </select>
                            @endif
                        </div>
                        <!-- IVA + TOTAL -->
                        <div class="col-md-3 col-md-offset-1">: <span id="iva"> <label
                            class="control-label">
                            @php $ivapercentage = $iva;  @endphp
                            @php $total_wPercen =  ($ivapercentage / 100) * $total;  @endphp 
                           ${{ number_format($total_wPercen, 2) }}</label></span></div>
                        <div class="m-t-10">
                            <div class="row">           
                                <div class="col-md-3 col-md-offset-6">
                                        <h3> <label class="control-label">TOTAL</label> </h3>
                                    </div>
                                <div class="col-md-3">
                                        <h3>
                                            @php $total=   $desc + $total_wPercen ; @endphp
                                           ${{ number_format($total, 2) }} <br>
                                             <label class="control-label">
                                                ${{ number_format($total, 2) }}         		 			
                                             </label>
                                         </h3>
                                         <!-- <input type="hidden" id="total" name="total"  value="0,00">
                                          -->
                                    </div>
                             </div>	
                         </div>
                    </div>
                </div>
                <!-- <form  method="post" name="save_sale" id="save_sale"> -->
                <div class="button-list pull-right">
                    <button data-toggle="modal" data-target="#paymentModel" value="0.00"
                        onclick="modalPago(this.value);" id="payButton"
                        class="btn btn-success waves-effect waves-light">
                        <span class="btn-label"><i class="fa fa-money"></i></span>Pagar
                    </button>
                </div>
                <hr>
            </div>
            <div class="row justify-content-between mt-5">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    @if ($total > 0)
                        <button onclick="Confirm('','clearCart', '¿SEGURO QUE DESEA ELIMINAR EL CARRITO?')"
                            class="btn btn-dark" mtmobile>
                            CANCELAR F4
                        </button>
                    @endif
                </div>
                <div class="input-group input-group-md mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text input-gp hideonsm"
                            style="background: #3b3f5c;
                            color: white">
                            EFECTIVO F8
                        </span>
                    </div>
                    <input type="number" id="cash" wire:model="efectivo" wire:keydown.enter="saveSale"
                        class="form-control text-center" value="{{ $efectivo }}">
                    <div class="input-group-append">
                        <span wire:click="$set('efectivo',0)" class="input-group-text"
                            style="background: #3b3f5c; color:white">
                            <i class="fas fa-backspace fa-2x"></i>
                        </span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    @if ($efectivo >= $total && $total > 0)
                        <button wire:click.prevent="saveSale" class="btn btn-dark btn-md btn-block">
                            GUARDAR F6</button>
                    @endif
                </div>
            </div>
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
                    <input type="text" wire:model="search" id="q" class="form-control" placeholder="Buscar Productos" onkeyup="load(1)">
                </div>
                <div class="col-md-6">

                    <!-- onchange="load(1);" class="form-control" name="category_id" id="category_id" -->
                    <select class="form-control" wire:model.lazy="categoryName">
                        <option value="" default>Selecciona Categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="row  outer_div" id="outer_div" style="height: 600px; overflow: scroll;">
                <div class="col-md-12" style="display:flex; flex-wrap: wrap;">
                    @foreach ($products as $product)
                        <div wire:click.prevent="AddtoCart($('p' + {{ $product->id }}),  '{{ $product->id }}') "
                            id="p{{ $product->id }}"
                            class="widget-panel widget-style-2 col-md-2 col-lg-2 col-sm-6 col-xs-6">
                            <center>
                                <a href="javascript::void(0)"> <img
                                        src="{{ asset('storage/products/' . $product->image) }}" width="100px"
                                        height="100px" walt="Imagen Del Producto" class="rounded"></a>
                            </center>
                            <div class="text-muted m-t-5 text-center" style="height: 40px">
                                <span class="name">
                                    {{ $product->name }}
                                </span> <br>
                                <input type="hidden" value="1" id="" name="">
                                <span class="sku"></span>
                            </div>
                            <h4 class="text-success text-center">
                                <input type="hidden" value="{{ $product->price }}" id="precio_venta_4">
                                <b data-plugin="counterup">$ {{ $product->price }} </b>
                            </h4>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-12 text-center" >
                      @if($products->hasMorePages())
                    <button wire:click="loadMore" class="btn btn-lg btn-flat" >Cargar Más</button><br><h6 class="text-center text-primary" wire:loading>POR FAVOR ESPERE</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
