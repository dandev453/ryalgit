<article class="content-header  bg-light w-100">
    <div class="row content-header">

        <div class="col-xs-12 col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="date" wire:model.lazy="fromDate" id="basicFlatpickr"
                    class="form-control flatpickr pull-right active">
                @error('fromDate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="date" wire:model.lazy="toDate" id="dateTimeFlatpickr"
                    class="form-control flatpickr pull-right active">
                @error('fromDate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-3 hidden-xs">
            <select class="form-control select2 select2-hidden-accessible" name="supplier_id" id="supplier_id"
                data-placeholder="Selecciona el proveedor" tabindex="-1" aria-hidden="true">
                <option value="" default>Selecciona el proveedor</option>
                @foreach($supliers as $suplier)
                <option value="" default>{{$suplier->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="col-xs-12 col-md-3">
            <div class="input-group">
                <select id="purchase_by" class="form-control" wire:model.lazy="userid">
                    <option value="">Selecciona usuario</option>	
                    @foreach($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>	
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="load(1);"><i class="fa fa-search"></i></button>
                  </span>
            </div>	
            </div>


        <div class="col-xs-2 col-md-1">
            <div id="loader" class="text-center"></div>

        </div>
        <div class="col-xs-10 col-md-2 ">
            <div class="btn-group pull-right">
                <button wire:click.prevent="Consultar" type="button"
                class="btn btn-flat btn-md">Consultar</button>
                <button type="button" onclick="reporte();" class="btn btn-default"><i class="fa fa-print"></i> PDF
                </button><button type="button" onclick="compras_excel();" class="btn btn-default"><i class="fa fa-file-excel-o"></i>   Excel
                </button>
            </div>
        </div>
        <input type="hidden" id="per_page" value="15">
    </div>
    <!-- Main content -->
    <section class=" content">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> | </h3>
                    <div class="box-tools pull-right">
                        <!--    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    -->
                        <!--    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>  -->
                        <button class="btn-flat btn tabmenu bg-dark btn btn-sm" data-toggle="modal"
                            data-target="#theModal">
                            + Agregar
                        </button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding:0;">
                    <div class="table-responsive ">
                        <table class="table table-condensed table-hover table-striped">
                            <tbody>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th class="text-center">COMPRA Nº </th>
                                    <!-- <th>Nº de productos</th> -->
                                    <th class="text-center">PROVEEDOR</th>
                                    <th class="text-center">FECHA</th>
                                    <th class="text-center">USUARIO</th>
                                    <th class="text-center">NETO</th>
                                    <th class="text-center">IVA</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center"></th>
                                </tr>
                          
                             
                                <tr>
                                
                                    @foreach ($purchases as $row)
                                    <tr>
                                        <td class="text-center"> {{ $row->id }} </td>
                                        <td class="text-center"> {{ $suplier->id }} </td>
                                        <td class="text-center"><span
                                                class="label label-success">{{ number_format($row->total, 2) }}</span>
                                        </td>
                                        <td class="text-center"> {{ $row->items }} </td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }} </td>
                                        <td class="text-center">
                                            <button wire:click.prevent="viewDetails({{ $row }})"
                                                class="btn btn-flat"><span><i
                                                        class="fa fa-list"></i></span></button>
                                        </td>
                                    @endforeach
                                </tr>
                         
                                <tr>
                                    <td colspan="9">
                                        de registros
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin: 5px;">

                        </div>
                    </div>

                    <!-- /<div class="box-footer">
      </div>-->
                    <!-- /.box-footer -->
                </div><!-- /.box -->
                <!-- MODAL CREATE & EDIT -->
                <!--  END MODAL -->
            </div><!-- row -->
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('product-added', msg => {
                $('#theModal').modal('hide');
                noty(Msg)
            });
            window.livewire.on('product-updated', msg => {
                $('#theModal').modal('hide');
            });
            window.livewire.on('product-deleted', msg => {
                //noty
                noty(Msg)
            });
            window.livewire.on('show-modal', msg => {
                $('#theModal').modal('show');
            });
            window.livewire.on('hide-modal', msg => {
                $('#theModal').modal('hide');
            });
            window.livewire.on('hidden.bs.modal', msg => {
                $('.er').css('display', 'none')
            });
        });

        function Confirm(id, products) {
            if (products > 0) {
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
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit('deleteRow', id)
                    swal.close()
                }
            });
        }
    </script>
</article><!-- /.content -->
