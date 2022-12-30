<div>
    @include('common.modalHead')

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Datos del cliente</a></li>
            <li><a href="#settings" data-toggle="tab">Dirección</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane"  id="activity">
                <div class="row">
                    <div class='col-md-12'>
                        <label for="bussines_name">Nombre</label>
                        <input type="text" wire:model.lazy.prevent.lazy.prevent="name" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-5'>
                        <label for="website">Sitio web</label>
                        <input type="url" wire:model.lazy.prevent="website" class="form-control">
                    </div>
                    <div class='col-md-4'>
                        <label for="work_phone">Teléfono</label>
                        <input type="text" class="form-control" wire:model.lazy.prevent="phone">
                    </div>
                    <div class='col-md-3'>
                        <label for="tax_number">Registro fiscal Nº</label>
                        <input type="text" class="form-control" wire:model.lazy.prevent="registro_fiscal">
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
                        <input type="text" class="form-control" wire:model.lazy.prevent="fullname">
                    </div>
                    <div class='col-md-6'>
                        <label for="last_name">Apellidos</label>
                        <input type="text" class="form-control" wire:model.lazy.prevent="lastname">
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-6'>
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" wire:model.lazy.prevent="email">
                    </div>
                    <div class='col-md-6'>
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control" wire:model.lazy.prevent="phone_contact">
                    </div>
                </div>
            </div><!-- /.tab-pane -->
            <div class="tab-pane"  id="settings">
                <div class="row">
                    <div class='col-md-12'>
                        <label for="address1">Calle</label>
                        <input type="text" class="form-control" wire:model.lazy.prevent="address">
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-6'>
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control"wire>
                    </div>
                    <div class='col-md-6'>
                        <label for="state">Región/Provincia</label>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-6'>
                        <label for="postal_code">Código Postal</label>
                        <input type="number" class="form-control" wire:model.lazy.prevent="postal_code">
                    </div>
                    <div class='col-md-6'>
                        <label for="country_id">País</label>
                        <select class='form-control' wire:model.lazy.prevent="country">
                            <option>Selecciona</option>
                        </select>
                    </div>
                </div>
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->

    @include('common.modalFooter')
</div>
