<div class="box box-info">
  <div class="box-header with-border">
      <h3 class="box-title">Últimas ventas</h3>
      <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
  </div><!-- /.box-header -->
  <div class="box-body">
      <div class="table-responsive">
          <table class="table no-margin">
              <thead>
                  <tr>
                      <th>Factura Nº</th>
                      <th>Cliente</th>
                      <th>Fecha</th>
                      <th class="text-right">Total </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($lsales as $lastsale)
                  <tr>
                      <td><a href="javascript::void(0)" >{{ $lastsale->s_id }}</a></td>
                      <td>{{ $lastsale->cliente }}</td> <!-- /change for client -->
                      <td>{{ $lastsale->fecha }}</td>
                      <td class="text-right">{{ $lastsale->total }}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
      </div><!-- /.table-responsive -->
  </div><!-- /.box-body -->
  <div class="box-footer clearfix">
      <a href="/pos" class="btn btn-sm btn-default btn-flat pull-left">Nueva venta</a>
      <a href="/manage_invoice" class="btn btn-sm btn-default btn-flat pull-right">Ver todas las
          facturas</a>
  </div><!-- /.box-footer -->
</div><!-- /.box -->