<div class="content">
    <!-- <div class="col-md-12"> -->
    @include('livewire.compras.new_purchase.form')
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
            <div class="row">
                <!-- *********************** Purchase ************************** -->
                <div class="col-md-12 col-sm-12">
                    <form method="post" name="new_purchase" id="new_purchase">
                        <div class="box box-info">
                            <div class="box-header box-header-background-light with-border">
                                <h3 class="box-title  ">Detalles de la compra</h3>
                            </div>
                            <div class="box-background">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Proveedor</label>
                                            <div class="input-group">
                                                <select class="form-control " wire:model="suplier_id">
                                                    <option>Selecciona el proveedor</option>
                                                    @foreach ($supliers as $suplier)
                                                        <option value="{{ $suplier->id }}">{{ $suplier->name }}
                                                        </option>
                                                    @endforeach
                                                    @error('suplier_id')
                                                        <span class="text-danger er">{{ $message }}</span>
                                                    @enderror
                                                </select>

                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button" data-toggle="modal"
                                                        data-target="#supliers_modal"><i class="fa fa-plus"></i>
                                                        Nuevo</button>
                                                </span>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        livewire.on('change-supliers', action => {
                                                            $('#supliers').val()
                                                            consle.log($('#supliers').val())
                                                        })
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Fecha</label>
                                            <div class="input-group">
                                                <input type="date" wire:model="date_purchase"
                                                    class="form-control datepicker">
                                                <span class="input-group-btn ">
                                                    <button class="btn btn-default " type="button"><i
                                                            class="fa fa-calendar "></i></button>
                                                </span>
                                                @error('purchase_date')
                                                    <span class="text-danger er">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Compra Nº</label>
                                            <input type="text" class="form-control" name="order_number"
                                                id="order_number" required="" value="154">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Agregar productos</label>
                                            <button type="button" class="btn btn-block btn-info" data-toggle="modal"
                                                data-target="#myModal"><i class="fa fa-search"></i> Buscar
                                                productos</button>
                                        </div>
                                    </div>

                                </div><!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.box -->
                    </form>
                </div>
                <!--/.col end -->
            </div>
            <div id="resultados_ajax" class="col-md-12" style="margin-top:4px"></div><!-- Carga los datos ajax -->
            <div id="resultados" class="col-md-12" style="margin-top:4px">
                <div class="row">
                    <form id="barcode_form" method="">
                        <!-- <hr> -->
                        <div class="col-md-2 col-xs-2 col-sm-2">
                            <input class="form-control" type="text" name="barcode_qty" id="barcode_qty"
                                value="1" required="">
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
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
                <div class="table-responsive">
                    <table class="table">
                        <tbody>

                            <tr>
                                <th class="text-center">DESCRIPCION</th>
                                <th class="text-center">CANT.</th>

                                <th class="text-center"><span class="pull-right">PRECIO UNIT.</span></th>
                                <th class="text-center"><span class="pull-right">PRECIO TOTAL</span></th>
                                <th class="text-center"></th>
                            </tr>
                            @foreach ($cart as $item)
                                @if (count($item->attributes) > 0)
                                    <tr>
                                        <td class="text-center">{{ $item->name }}</td>

                                        <td class="text-center">
                                            <input type="number" id="r{{ $item->id }}"
                                                wire:change="updateQty({{ $item->id }}, $('#r' +{{ $item->id }}).val() )"
                                                style="font-size: 1rem!important" class="form-control text-center"
                                                value="{{ $item->quantity }}">
                                        </td>
                                        <td class="text-center"> ${{ number_format($item->price, 2) }}</td>
                                        <td class="text-center"><span class="pull-right"><span class="pull-right">
                                                    ${{ number_format($item->price * $item->quantity, 2) }} </td>
                                        <td class="text-center"><span class="pull-right"> </span></td>
                                        <td class="text-center"><button class="btn btn-danger btn-xs"
                                                onclick="Confirm('{{ $item->id }}', 'removeItem', '¿CONFIRMAS ELIMNAR EL REGISTRO?')"><i
                                                    class="fa fa-times"></i></button></td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td colspan="4"><span class="pull-right">NETO $</span></td>
                                <td><span class="pull-right">${{ number_format($total, 2) }}</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">
                                    <select name="taxes" id="taxes" onchange="tax_value(this.value)">
                                        <option value="10.00">IVA 10.00 %</option>
                                        <option value="0.00" selected="">IVA 0.00 %</option>
                                    </select>
                                </td>
                                <td><span class="pull-right">0,00</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4"><span class="pull-right">TOTAL $</span></td>
                                <td><span class="pull-right">${{ number_format($total, 2) }}</span></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- Carga los datos ajax -->

            <div class="box-footer">
                <button type="submit" wire:click.prevent="savePurchase" class="btn btn-success pull-right "><i
                        class="fa fa-floppy-o"></i> Guardar
                    datos</button>
            </div>

        </div>
        <div class="box-footer">
            <code>.box-footer</code>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
    <!-- </div> -->
    <!-- modal -->
    <div class="modal wire:ignore   fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
                </div>
                <div class="modal-body">
                    <form wire:ignore.self class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" wire:model.prevent.lazy="search" class="form-control" id="q"
                                    placeholder="Buscar productos">
                            </div>
                            <button type="button" class="btn btn-default" ><span
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
                                    @foreach ($data as $product)
                                        <tr>
                                            <td>{{ $product->barcode }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td class="col-xs-1">
                                                <div class="pull-right">
                                                    <input type="text" class="form-control"
                                                        style="text-align:right" id="cantidad_1" value="1">
                                                </div>
                                            </td>

                                            <td class="col-xs-2">
                                                <div class="input-group pull-right">
                                                    <div class="input-group-addon">$</div>
                                                    <input type="text" class="form-control"
                                                        style="text-align:right" id="precio_venta_1"
                                                        value="{{ $product->price }}">
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    wire:click.prevent="AddtoCart($('p' + {{ $product->id }}),  '{{ $product->id }}') "
                                                    id="p{{ $product->id }}" class="pull-right"><a
                                                        href="#"><i class="glyphicon glyphicon-shopping-cart "
                                                            style="font-size:24px;color: #5CB85C;"></i></a></span>
                                            </td>
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
        <script>
            function Confirm(id, eventName, text) {
                swal({
                    title: 'CONFIRMAR',
                    text: text,
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cerrar',
                    cancelButtonColor: '#fff',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#3b3f5c',
                }).then(function(result) {
                    if (result.value) {
                        window.livewire.emit(eventName, id)
                        swal.close()
                    }
                })
            }
        </script>
    </div>
    <script src="{{ asset('js/keypress.js') }}"></script>
    <script src="{{ asset('js/onscan.js') }}"></script>

    @include('livewire.compras.scripts.shortcuts')
    @include('livewire.compras.scripts.events')
    @include('livewire.compras.scripts.general')
    @include('livewire.compras.scripts.scan')

</div>
