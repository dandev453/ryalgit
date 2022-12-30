<div>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pos/core.css') }}">
    <!--  component css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pos/components.css') }}">
    <form id="guardar_cliente">
        <div class="modal fade" id="cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Nuevo Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Datos del cliente</a></li>
                                <li><a href="#settings" data-toggle="tab">Dirección</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="row">
                                        <div class='col-md-12'>
                                            <label for="bussines_name">Nombre</label>
                                            <input type="text" class="form-control" wire:model.lazy.prevent="name" required>
                                            @error('name')
                                                    <span class="text-danger er">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-5'>
                                            <label for="website">Sitio web</label>
                                            <input type="url" class="form-control"  wire:model.lazy.prevent="website">
                                            @error('website')
                                            <span class="text-danger er">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class='col-md-4'>
                                            <label for="phone">Teléfono</label>
                                            <input type="text" class="form-control" wire:model.lazy="phone"
                                                required>
                                            @error('phone')
                                                <span class="text-danger er">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class='col-md-3'>
                                            <label for="tax_number">Registro fiscal Nº</label>
                                            <input type="text" class="form-control" wire:model.lazy="registro_fiscal">
                                            @error('registro_fiscal')
                                                <span class="text-danger er">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-12'>
                                            <br>
                                            <div
                                                style="font-size:14px; font-weight:bold;border-bottom: 1px solid #ddd;padding: 5px 5px 5px 0px;width:100%;margin-bottom:10px">
                                                Datos de contacto</div>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="first_name">Nombres</label>
                                            <input type="text" class="form-control" wire:model.lazy="fullname"
                                                required>
                                            @error('fullname')
                                                <span class="text-danger er">{{ $message }}</span>
                                            @enderror  
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="last_name">Apellidos</label>
                                            <input type="text" class="form-control" wire:model.lazy="lastname"
                                                required>
                                            @error('lastname')
                                                <span class="text-danger er">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-6'>
                                            <label for="email">Correo Electrónico</label>
                                            <input type="email" class="form-control" wire:model.lazy="email">
                                        @error('email')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="phone">Teléfono</label>
                                            <input type="text" class="form-control"  wire:model.lazy="phone_contact"
                                                required>
                                            @error('phone_contact')
                                                <span class="text-danger er">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- /.tab-pane -->
                                <div class="tab-pane" id="settings">
                                    <div class="row">
                                        <div class='col-md-12'>
                                            <label for="address">Calle</label>
                                            <input type="text" class="form-control" wire:model.lazy="address">
                                             @error('address')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-6'>
                                            <label for="city">Ciudad</label>
                                            <input type="text" class="form-control"
                                                name="country">
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="state">Región/Provincia</label>
                                            <input type="text" class="form-control"
                                                >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class='col-md-6'>
                                            <label for="postal_code">Código Postal</label>
                                            <input type="text" class="form-control" wire:model.lazy="postal_code">
                                        </div>
                                        <div class='col-md-6'>
                                            <label for="country">País</label>
                                            <select class='form-control' wire:model.lazy="country">
                                                <option >Selecciona</option>
                                                <option >VE</option>
                                                
                                            @error('country')
                                                <span class="text-danger er">{{ $message }}</span>
                                            @enderror
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary close-modal">
                            GUARDAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container" style="padding: 0px 15px;">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <a href="/" class="btn btn-info waves-effect waves-light m-t-15">
                    <span class="btn-label"><i class="fa fa-exclamation"></i></span>Inicio
                </a>
            </div>
        </div>
        <br>
        @include('livewire.pos.partials.detail')
    </div>
</div>
<!--  Modal content for the above example -->
<div id="paymentModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Pago</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="list-group" >
                            <a href="javascript:void(0)" id="cash" 
                                class="list-group-item ">
                                Efectivo
                            </a>
                            <a href="javascript:void(0)" id="check" 
                                class="list-group-item">Cheque</a>
                            <a href="javascript:void(0)" id="card" 
                                class="list-group-item">Tarjeta</a>
                            <input type="hidden" id="typeDocument" value="1">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">Precio $ </span>
                            <input id="payablePrice" readonly type="text" class="form-control"
                                aria-describedby="basic-addon3">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">Pago $ </span>
                            <input type="text" placeholder="0.0"  class="form-control" id="payment"
                                aria-describedby="basic-addon3"   oninput="$(this).calculateChange();">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(1,false);"
                                            class="btn btn-success btn-lg btn-block">1</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(2,false);"
                                            class="btn btn-success btn-lg btn-block">2</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(3,false);"
                                            class="btn btn-success btn-lg btn-block">3</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(4,false);"
                                            class="btn btn-success btn-lg btn-block">4</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(5,false);"
                                            class="btn btn-success btn-lg btn-block">5</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(6,false);"
                                            class="btn btn-success btn-lg btn-block">6</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(7,false);"
                                            class="btn btn-success btn-lg btn-block">7</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="input" onclick="$(this).go(8,false);"
                                            class="btn btn-success btn-lg btn-block">8</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(9,false);"
                                            class="btn btn-success btn-lg btn-block">9</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button
                                            onclick="$('#payment').val($('#payment').val().substr(0,$('#payment').val().length -1));$(this).calculateChange();"
                                            class="btn btn-success btn-lg btn-block">⌫</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(0,false);"
                                            class="btn btn-success btn-lg btn-block">0</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).digits()"
                                            class="btn btn-success btn-lg btn-block">.</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button onclick="$('#payment').val('');$(this).calculateChange();"
                                    class="btn btn-danger btn-block btn-lg">AC</button>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <form >
                <div class="modal-footer">
                    <div class="btn btn-primary btn-block btn-lg waves-effect waves-light">Cambio $<span
                            id="change"></span> </div>
                    <button type="submit" id="confirmPayment"
                        class="btn btn-primary btn-block btn-lg waves-effect waves-light"
                        style="display: none;">Confirmar</button>
                </div>
                </form>
        </div><!-- /.modal-content -->
        
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.wrapper ').delay(5000);
        $('section.header,article,.left-side,.sidebar').hide();
        $('aside ').removeClass('right-side')
        $('div.container').removeClass("container");
    })
</script>
<!--/ <script>
    function descuento(value) {
        var taxes = $("#taxes").val();
        $("#resultados").load("./ajax/agregar_tmp_pos.php?descuento=" + value + "&tax=" + taxes);
        $("#descuento").val(value);
    }

    function updateCant(value, idproducto) {
        var taxes = $("#taxes").val();
        //console.log(value);
        //console.log(idproducto);
        var descuento = $("#descuento").val();
        $("#resultados").load("./ajax/agregar_tmp_pos.php?cantidad=" + value + "&idproducto=" + idproducto + "&tax=" +
            taxes + "&descuento=" + descuento);
    }
</script>-->
<script>
    function modalPago(value) {
        var totalModal = $("#payablePrice").val(value);
    }

    function paymentType(payment) {
        var paymentType = 1;
        switch (payment) {
            case 1:
                $('#cash').addClass('active');
                $('#check').removeClass('active');
                $('#card').removeClass('active');
                paymentType = 1;
                //console.log(paymentType);
                break;
            case 2:
                $('#check').addClass('active');
                $('#cash').removeClass('active');
                $('#card').removeClass('active');
                // console.log(paymentType);
                paymentType = 2;
                // console.log(paymentType);
                break;
            case 3:
                $('#card').addClass('active');
                $('#cash').removeClass('active');
                $('#check').removeClass('active');
                // console.log(paymentType);
                paymentType = 3;
                // console.log(paymentType);
                break;
        }
        type = $('#typeDocument').val(paymentType);
    }
</script>
<script>
    //teclado
    $.fn.go = function(value, isDueInput) {
        if (isDueInput) {} else {
            $("#payment").val($("#payment").val() + "" + value);
            $(this).calculateChange();
        }
    }
    $.fn.digits = function() {
        $("#payment").val($("#payment").val() + ".");
        $(this).calculateChange();
    }
    $.fn.calculateChange = function() {
        var change = $("#payablePrice").val() - $("#payment").val();
        if (change <= 0) {
            $("#change").text(change.toFixed(2));
        } else {
            $("#change").text('Nada que cambiar');
        }
        if (change <= 0) {
            $("#confirmPayment").show();
        } else {
            $("#confirmPayment").hide();
        }
    }
</script>

<div>
    <div class="row layout-top-spacing">
      

        <div class="col-sm-12 col-md-4">
            <!--TOTAL-->
            @include('livewire.pos.partials.total')

            <!--DENOMIACIONES-->
            @include('livewire.pos.partials.coins')
        </div>
    </div>
</div>

<script src="{{ asset('js/keypress.js') }}"></script>
<script src="{{ asset('js/onscan.js') }}"></script>

@include('livewire.pos.scripts.shortcuts')
@include('livewire.pos.scripts.events')
@include('livewire.pos.scripts.general')
@include('livewire.pos.scripts.scan')
