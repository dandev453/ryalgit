<article class="content-header  w-100">
    <div class="row content-header">
        <div class="col-md-3 col-xs-12">
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
        <div class="col-md-3 col-xs-12">
            <select class="form-control" wire:model.lazy="customer_id">
                <option >Seleccione Cliente</option>
               @foreach($customers as $customers)
                    <option value="{{ $customers->id }}"> {{$customers->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="input-group">

                <select class="form-control" wire:model.lazy="user_id">
                    <option >Seleccione Cajero</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}"> {{$user->name}} </option>
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
                    <button wire:click="Consultar()" class="btn btn-default"><span> <i class="fa fa-file"></i></span></button>
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
                                    <th>CLIENTE</th>
                                    <th>MÉTODO DE PAGO</th>
                                   
                                    <th>CAJERO</th>
                                    <th>TOTAL</th>
                                    <th class="text-center">FECHA</th> <!-- / -->
                                    <th class="text-center"></th>
                                </tr>
                              
                                    @foreach ($salesLists as $row)
                                        <tr>
                                            <td class="text-center"> 000{{ $row->s_id }} </td>
                                            <td>{{ $row->cliente }}</td>
                                            <td>
                                              @if($row->cash > 0)
                                             <span class="text-center"><b>EFECTIVO</b></span>
                                              @endif
                                            </td>
                                            <td>
                                               {{ $row->user }}
                                            </td>
                                            <td>
                                                <span
                                                class="label label-success">{{ number_format($row->total, 2) }}</span>
                                            </td>
                                            <td>
                                                {{ $row->fecha }}
                                            </td>
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
                    @include('livewire.reports.form')
                </div><!-- row -->
    </section>
</article><!-- /.content -->
