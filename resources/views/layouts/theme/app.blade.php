<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>config('app.name', 'Ryalpos') }} | Dashboard</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      @include('layouts.theme.styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
   <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
</head>
<body class="skin-blue">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
       @include('layouts.theme.header')
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
        @include('layouts.theme.sidebar')
            <!-- /.sidebar -->
        </aside>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Panel de Control <small> Version 1.2</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Reporte de ventas 2022</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart"><canvas id="myChart"></canvas>
                                        </div>
                                    </div><!-- /.col -->
                                    <div class="col-md-4">
                                        <!-- Info Boxes Style 2 -->
                                        <div class="info-box bg-purple">
                                            <span class="info-box-icon"><i class="fa fa-tags"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Inventario Neto</span>
                                                <span class="info-box-number">680,357.00</span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 100%"></div>
                                                </div>
                                                <span class="progress-description">
                                                    Productos en stock: 13 </span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                        <div class="info-box bg-green">
                                            <span class="info-box-icon"><i class="fa fa-money"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Ventas 2022</span>
                                                <span class="info-box-number">457,416.61</span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 100%"></div>
                                                </div>
                                                <span class="progress-description">
                                                    Facturas emitidas: 350 </span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                        <div class="info-box bg-yellow">
                                            <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Compras 2022</span>
                                                <span class="info-box-number">303,586.95</span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 100%"></div>
                                                </div>
                                                <span class="progress-description">
                                                    Compras realizadas: 34 </span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                        <div class="info-box bg-aqua">
                                            <span class="info-box-icon"><i class="fa fa-users "></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Clientes</span>
                                                <span class="info-box-number">260</span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 100%"></div>
                                                </div>
                                                <span class="progress-description">
                                                    Clientes nuevos: 1 </span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- ./box-body -->
                            <div class="box-footer">
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div>
                    <!-- Left col -->
                    <div class="col-md-8">
                        <!-- TABLE: LATEST ORDERS -->
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
                                            <tr>
                                                <td><a href="edit_pos.php?id=3244">3244</a></td>
                                                <td></td>
                                                <td>19-11-2022</td>
                                                <td class="text-right">87.32</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3243">3243</a></td>
                                                <td></td>
                                                <td>19-11-2022</td>
                                                <td class="text-right">87.32</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3242">3242</a></td>
                                                <td></td>
                                                <td>19-11-2022</td>
                                                <td class="text-right">87.32</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3241">3241</a></td>
                                                <td></td>
                                                <td>19-11-2022</td>
                                                <td class="text-right">5,263.98</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3240">3240</a></td>
                                                <td></td>
                                                <td>14-11-2022</td>
                                                <td class="text-right">87.32</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3239">3239</a></td>
                                                <td></td>
                                                <td>11-11-2022</td>
                                                <td class="text-right">87.32</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3238">3238</a></td>
                                                <td></td>
                                                <td>11-11-2022</td>
                                                <td class="text-right">87.32</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3237">3237</a></td>
                                                <td></td>
                                                <td>11-11-2022</td>
                                                <td class="text-right">573.48</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3236">3236</a></td>
                                                <td>Gonza</td>
                                                <td>10-11-2022</td>
                                                <td class="text-right">4,125.28</td>
                                            </tr>
                                            <tr>
                                                <td><a href="edit_pos.php?id=3235">3235</a></td>
                                                <td>PEDRO AL</td>
                                                <td>10-11-2022</td>
                                                <td class="text-right">436.60</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <a href="pos.php" class="btn btn-sm btn-default btn-flat pull-left">Nueva venta</a>
                                <a href="manage_invoice.php" class="btn btn-sm btn-default btn-flat pull-right">Ver todas las facturas</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <!-- PRODUCT LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Nuevos productos</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="img/productos/1545277406_sony.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="edit_product.php?id=21" class="product-title">Cámara Sony DSC-HX400V <span class="label label-info pull-right">450.00</span></a>
                                            <span class="product-description">
                                            </span>
                                        </div>
                                    </li><!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="img/productos/1545277347_033744500.1433346759.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="edit_product.php?id=20" class="product-title">Cámara fotográfica Sony <span class="label label-info pull-right">274.00</span></a>
                                            <span class="product-description">
                                            </span>
                                        </div>
                                    </li><!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="img/productos/1545277243_393791-7.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="edit_product.php?id=19" class="product-title">Canon Cámara Fotográfica <span class="label label-info pull-right">500.00</span></a>
                                            <span class="product-description">
                                            </span>
                                        </div>
                                    </li><!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="img/productos/1545277174_estuche.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="edit_product.php?id=18" class="product-title">Estuche para Cámara <span class="label label-info pull-right">29.00</span></a>
                                            <span class="product-description">
                                            </span>
                                        </div>
                                    </li><!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="img/productos/1545277096_amgo.jpg" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="edit_product.php?id=17" class="product-title">Celular Amgoo 530 <span class="label label-info pull-right">60.00</span></a>
                                            <span class="product-description">
                                            </span>
                                        </div>
                                    </li><!-- /.item -->
                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="products.php" class="uppercase">Ver todos los productos</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                    
                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->

    </div><!-- ./wrapper -->

    @include('layouts.theme.scripts')
    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>

</html>