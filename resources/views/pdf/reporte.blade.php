<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/adminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_styles.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="outer_div">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listado de Ventas</h3>
                        @if($reportType == 0)
                        <span><strong>Reporte de ventas del día</strong></span>
                         @else
                        <span><strong>Reporte de ventas por fecha</strong></span>
                        @endif
                        @if ($reportType != 0)
                            <span><strong>Fecha de consulta: {{ $dateFrom }} al {{ $dateTo }}</strong></span>
                        @else
                            <span><strong>Fecha de consulta: {{ \Carbon\Carbon::now()->format('d-M-Y') }} al
                                    {{ $dateTo }}</strong></span>
                            <span><strong>Reporte de ventas por fecha</strong></span>
                        @endif
                        usuario: {{ $user }}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-condensed table-hover table-striped ">
                                <tbody>
                                    <tr>
                                        <th class="text-center" width="10%">Documento Nº</th>
                                        <th width="12%">IMPORTE</th>
                                        <th width="10%" class="text-center">ITEMS </th>
                                        <th width="12%">STATUS</th>
                                        <th class="text-right">USUARIO</th>
                                        <th class="text-right">FECHA</th>
                                    </tr>

                                    <tr>
                                        <td>
                                            @if ($reportType == 0)
                                                <span><strong>Reporte de ventas del día</strong></span>
                                            @else
                                                <span><strong>Reporte de ventas por fecha</strong></span>
                                            @endif
                                            @if ($reportType != 0)
                                                <span><strong>Fecha de consulta: {{ $dateFrom }} al
                                                        {{ $dateTo }}</strong></span>
                                            @else
                                                <span><strong>Fecha de consulta:
                                                        {{ \Carbon\Carbon::now()->format('d-M-Y') }} al
                                                        {{ $dateTo }}</strong></span>
                                                <span><strong>Reporte de ventas por fecha</strong></span>
                                            @endif
                                            usuario: {{ $user }}
                                        </td>
                                        <td class="text-center">02-12-2022</td>
                                        <td>Obed Alvarado</td>
                                        <td class="text-right">531,00</td>

                                    </tr>
                                    @foreach($data as $item)
                                    <tr>
                                        <td class="text-center">{{$item->id}}</td>
                                        <td class="text-center">{{number_forma($item->total, 2)}}</td>
                                        <td class="text-center">{{$item->items }}</td>
                                        <td class="text-center">{{$item->status }}</td>
                                        <td class="text-center">{{$item->user }}</td>
                                        <td class="text-center">{{$item->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                      <span><b>TOTALES</b></span>
                        <span></span>
                       
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


    </div><!-- Datos ajax Final -->
</body>

</html>
