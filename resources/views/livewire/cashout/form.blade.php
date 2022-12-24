<div>
    <div wire:ignore.self class="modal fade" id="modal-details" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">

                    <h6><i class="fa fa-list"></i>DETALLE DE FACTURAS</h6>
                    <h6 class="text-center text-warning">° nro factura</h6>
                </div>
                <div class="modal-body">
                    <!-- Right side column. Contains the navbar and content of the page -->
                    <!-- Content Header (Page header) -->
                    <!-- Main content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">

                        </section>
                        <!-- Main content -->
                        <section class="content">
                            <div class="row">

                                <!-- /.col -->
                                <div class="col-md-12">
                                    <form class="form-horizontal" role="form">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active text-info"><a href="#details" data-toggle="tab"
                                                        aria-expanded="false"> Detalles de la venta</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="resultados_ajax"></div>
                                                <div class="tab-pane active">
                                                    <div class="table-responsive">
                                                        <table class="table table-condensed table-hover table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <!-- <th>ID</th> -->
                                                                    <th class="text-center">PRODUCTO </th>
                                                                    <!-- <th>Nº de productos</th> -->
                                                                    <th class="text-center">CANT</th>
                                                                    <th class="text-center">PRECIO</th>
                                                                    <th class="text-center">IMPORTE</th> <!-- / -->
                                                                </tr>
                                                                @foreach ($details as $d)
                                                                    <tr>
                                                                        <td class="text-center"> {{ $d->product }}
                                                                        </td>
                                                                        <td class="text-center">{{ $d->quantity }}</td>
                                                                        <td class="text-center"> ${{ $d->price }}
                                                                        </td>
                                                                        <td class="text-center">
                                                                            {{ number_format($d->quantity * $row->price, 2) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <td>
                                                                    @if($details)
                                                                    @php $mytotal =0; 
                                                                    @endphp
                                                                        @foreach($details as $d)
                                                                    @php
                                                                    $mytotal += $d->quantity * $d->price;
                                                                    @endphp
                                                                    @endforeach
                                                                </td>
                                                                <tr class="text-center">
                                                                    <td colspan="4">
                                                                        <h6 class="text-info float-right ">total: <span
                                                                                class="bg-success">${{ number_format($mytotal), 2 }}
                                                                        </h6></span>
                                                                    </td>
                                                                    @endif
                                                                </tr>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <!-- /.tab-pane -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div>
                                        <!-- /.nav-tabs-custom -->
                                    </form>
                                    <div class="box-body" style="padding:0;">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark close-btn text-info"
                                                data-dismiss="modal">
                                                CERRAR
                                            </button>

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
