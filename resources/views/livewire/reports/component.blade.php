<article class="content-header  w-100">
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
                @error('toDate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div><!-- /input-group Date from -->
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="input-group">
                <select wire:model="userid" id="sale_by" class="form-control">
                    <option value="">Selecciona tipo de reporte </option>
                </select>
            </div>
        </div>
        <!-- <div class="col-md-3 col-xs-12">
    / <select class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el cliente" name="customer_id" id="customer_id" tabindex="-1" aria-hidden="true">
    </select> -->
        <!-- /
    <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 619px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-customer_id-container"><span class="select2-selection__rendered" id="select2-customer_id-container"><span class="select2-selection__placeholder">Selecciona el cliente</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
</div>-->

        @if ($userid > 0 && $fromDate != null && $toDate != null)
            <div class="col-md-2 col-sm-12 col-xs-12 ">
                <div class="d-flex flex-wrap justify-content-space-bettween align-items-center">
                    <button wire:click.prevent="Consultar()" type="button"
                        class="btn btn-flat btn-sm">Consultar</button>
                    @if ($total > 0)
                        <button wire:click.prevent="Print()" type="button" class="btn btn-flat btn-sm"><span><i
                                    class="fa fa-print class="text-light></i> </span>Imprimir</button>
                    @endif
                </div>
            </div>
        @endif

        <div class="col-md-3 col-sm-12 col-xs-12 float-right">
            <div class="input-group">
                <select wire:model="userid" id="sale_by" class="form-control">
                    <option value="">Selecciona cajero </option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                </span>
                @error('userid')
                    <span class="text-danger"><i class="fa fa-warning-symbol"></i> {{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- / <div class="col-xs-10 col-md-3 ">
    <div class="btn-group pull-right">
        <button type="button" onclick="reporte();" class="btn btn-default"><i class="fa fa-print"></i> PDF
        </button><button type="button" onclick="ventas_excel();" class="btn btn-default"><i class="fa fa-file-excel-o"></i>   Excel
    </button></div>
</div>-->
        <input type="hidden" id="per_page" value="15">
    </div>
    <!-- Main content -->
    <section class=" content">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $componentName }} | {{ $pageTitle }}</h3>
                    <div class="box-tools pull-right">
                        <!--    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    -->
                        <!--    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>  -->
                        <!-- / <button  class="btn-flat btn tabmenu bg-dark btn btn-sm" data-toggle="modal" data-target="#theModal">
                + Agregar
            </button> -->
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="padding:0;">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped">
                            <tbody>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th class="text-center">DOCUMENTO Nº </th>
                                    <!-- <th>Nº de productos</th> -->
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center">ITEMS</th>
                                    <th class="text-center">FECHA</th> <!-- / -->
                                    <th class="text-center"></th>
                                </tr>
                                @if ($total <= 0)
                                    <h6>
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <h6>
                                                    no hay ventas en la fecha seleccionada
                                                </h6>
                                            </td>
                                        </tr>
                                    </h6>
                                @else
                                    @foreach ($sales as $row)
                                        <tr>
                                            <td class="text-center"> {{ $row->id }} </td>
                                            <td class="text-center"><span
                                                    class="label label-success">{{ number_format($row->total, 2) }}</span>
                                            </td>
                                            <td class="text-center"> {{ $row->items }} </td>
                                            <td class="text-center"> {{ $row->created_at }} </td>
                                            <td class="text-center">
                                                <button wire:click.prevent="viewDetails({{ $row }})"
                                                    class="btn btn-flat"><span><i
                                                            class="fa fa-list"></i></span></button>
                                            </td>
                                    @endforeach
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                        </td>
                                        <td>
                                            <span> <b> ventas totales: </b>
                                                <h5><b>$ </b>{{ number_format($total, 2) }}</h5>
                                            </span>
                                            articulos totales: {{ $items }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div style="margin: 5px;">
                        </div>
                        <script>
                            var f1 = flatpickr(document.getElementById('basicFlatpickr'));
                            var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
                                enableTime: true,
                                dateFormat: "Y-m-d H:i",
                            });
                            $('input[id="dates"]').daterangepicker();
                            document.addEventListener('DOMContentLoaded', function() {
                                window.livewire.on('show-modal', Msg => {
                                    $('#modal-details').modal('show')
                                })
                            })
                            window.livewire.on('show-modal', msg => {
                                $('#theModal').modal('show');
                            });
                        </script>
                    </div>
                    <!-- /SCRIPTS -->
                    <!-- /<div class="box-footer">
                </div>-->
                    <!-- /.box-footer -->
                </div><!-- /.box -->
                <!-- MODAL CREATE & EDIT -->
                <!--  END MODAL -->
            </div><!-- row -->
    </section>
</article><!-- /.content -->
