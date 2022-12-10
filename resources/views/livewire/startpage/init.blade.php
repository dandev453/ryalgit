<div>
    <!-- Main content -->
    <section class="content ">
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
                                <!-- MODEL CHARTS -->
                                <div class="chart"><canvas id="myChart"></canvas>
                                </div>
                                <!-- END CHARTS -->
                            </div><!-- /.col -->
                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box bg-purple">
                                    <span class="info-box-icon"><i class="fa fa-tags"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">INVENTARIO NETO</span>
                                        <span class="info-box-number">457,416.61</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">
                                            Facturas emitidas: 350 </span>
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
            <!-- LASTEST ORDER -->
            <div class="col-md-8">
                <!-- TABLE: LATEST ORDERS -->
                @include('livewire.products.lastsales')
            </div>
            <!-- END LASTEST ORDER -->
            <!-- /.col -->
            <!-- LASTEST PRODUCTS -->
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
                    <!--   /<div class="box-body">
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
                    <!--   /  <li class="item">
                                <div class="product-img">
                                    <img src="img/productos/1545277347_033744500.1433346759.jpg" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="edit_product.php?id=20" class="product-title">Cámara fotográfica Sony <span class="label label-info pull-right">274.00</span></a>
                                    <span class="product-description">
                                    </span>
                                </div>
                            </li><!-- /.item -->
                    <!--   /  <li class="item">
                                <div class="product-img">
                                    <img src="img/productos/1545277243_393791-7.jpg" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="edit_product.php?id=19" class="product-title">Canon Cámara Fotográfica <span class="label label-info pull-right">500.00</span></a>
                                    <span class="product-description">
                                    </span>
                                </div>
                            </li><!-- /.item -->
                    <!--   /  <li class="item">
                                <div class="product-img">
                                    <img src="img/productos/1545277174_estuche.jpg" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="edit_product.php?id=18" class="product-title">Estuche para Cámara <span class="label label-info pull-right">29.00</span></a>
                                    <span class="product-description">
                                    </span>
                                </div>
                            </li><!-- /.item -->
                    <!--   /   <li class="item">
                                <div class="product-img">
                                    <img src="img/productos/1545277096_amgo.jpg" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="edit_product.php?id=17" class="product-title">Celular Amgoo 530 <span class="label label-info pull-right">60.00</span></a>
                                    <span class="product-description">
                                    </span>
                                </div>
                            </li><!-- /.item -->
                    <!--   /  </ul> ><!-- /.item -->
                    @include('livewire.products.lastproducts')
                </div><!-- /.box -->
            </div><!-- /.col -->
            <!-- END LASTEST -->
            @include('livewire.products.lastSaleDetail')
        </div>
       
    </section><!-- /.content -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</div>
