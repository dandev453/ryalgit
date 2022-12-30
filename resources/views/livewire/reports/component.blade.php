<article class="content-header  w-100">
    <div class="row content-header">
        <div class="col-md-3 col-xs-12">
          @include('common.searchbox')
        </div>
        <div class="col-md-3 col-xs-12">
            <select class="form-control" wire:model.lazy="customer_id">
                <option value="">Seleccione Cliente</option>
                @foreach ($customers as $customers)
                    <option value="{{ $customers->id }}"> {{ $customers->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 col-xs-12">
        </div>
        <div class="col-xs-12 col-md-3 ">
            <div class="btn-group pull-right">
               
               <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
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
                                    <th class="text-center">CLIENTE</th>
                                    <th class="text-center">MÉTODO DE PAGO</th>
                                    
                                    <th class="text-center">FECHA</th> <!-- / -->
                                    <th class="text-center">CAJERO</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center"></th>
                                </tr>

                                @foreach ($salesLists as $row)
                                    <tr>
                                        <td class="text-center"> 000{{ $row->id }} </td>
                                        <td class="text-center">{{ $row->cliente }}</td>
                                        <td class="text-center">
                                            @if ($row->cash > 0)
                                                <span class="text-center">CASH</span>
                                            @endif
                                            @if ($row->card > 0)
                                            <span class="text-center">CARD</span>
                                            @endif
                                            @if ($row->check > 0)
                                            <span class="text-center">CHECK</span>
                                            @endif
                                        </td>
                                         <td class="text-center">
                                            {{ $row->created_at }}
                                        </td>
                                        <td class="text-center">
                                            {{ $row->cajero }}
                                        </td>
                                        <td class="text-center">
                                            {{ number_format($row->total, 2) }}
                                        </td>
                                       
                                        <td class="text-center">
                                            <div class="btn-group pull-right">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button"
                                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="true">
                                                        Acciones
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="javascript::void()">Ver pdf</a></li>
                                                    </ul>
                                                </div>
                                               
                                            </div>
                                          
                                        </td>
                                @endforeach
                                </tr>
                           
                                <tr>
                                   
                                </tr>

                            </tbody>

                        </table>
                        <div style="margin: 5px;">
                            {{ $salesLists->links() }}
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
