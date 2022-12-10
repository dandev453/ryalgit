<div class="content-wrapper">
    <section class="content-header" style="position: relative;
padding: 15px 15px 0 15px;">
        <h3><i class="fa fa-edit"></i>EDITAR PRODUCTO</h3>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div id="load_img">
                            <img class=" img-responsive" src="{{ asset('./assets/img/product.png') }}"
                                alt="Bussines profile picture">
                        </div>
                        <h3 class="profile-username text-center"></h3>
                        <p class="text-muted text-center mail-text"></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <form class="form-horizontal" role="form">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab" aria-expanded="false">Detalles del
                                    producto</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="resultados_ajax"></div>
                            <div class="tab-pane active">
                                <div class="form-group ">
                                    <label for="name" class="col-sm-2 control-label">Nombre:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="ej: Curso Laravel">

                                    </div>
                                    <!-- <label for="presentation" class="col-sm-2 control-label">Presentación</label> -->
                                    <div class="col-sm-4">
                                        <!--	<input type="text" class="form-control" id="presentation" maxlength="100"> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="barcode" class="col-sm-2 control-label">Código</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" pplaceholder="ej: 025974">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--<label for="note" class="col-sm-2 control-label">Descripción</label> -->
                                    <div class="col-sm-10">
                                        <!--	<textarea class="form-control" name="note" id="note"></textarea> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category" class="col-sm-2 control-label">Costo</label>
                                    <div class="col-sm-4">
                                        <input type="text" data-type="currency" class="form-control"
                                            placeholder="ej: 0.00">

                                    </div>
                                    <label for="cost" class="col-sm-2 control-label">Precio</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-usd"></i>
                                            </div>
                                            <input type="text" data-type="currency" class="form-control"
                                                placeholder="ej: 0.00">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profit" class="col-sm-2 control-label">Stock</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-usd"></i>
                                            </div>
                                            <input type="number" class="form-control" placeholder="ej: 0">

                                        </div>
                                    </div>
                                    <label for="selling_price" class="col-sm-2 control-label">Alertas</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                            <input type="text" class="form-control" pattern="\d+(\.\d{2})?"
                                                title="Alertas">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stock" class="col-sm-2 control-label">Categoría</label>
                                    <div class="col-sm-4">
                                        <select class="form-control">
                                            <option value="Seleccione">Seleccione</option>

                                        </select>

                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">IMAGEN</label>
                                <div class="col-sm-12 col-md-8">
                                    <div class="form-group custom-file">
                                        <input type="file" class="custom-file-input"
                                            accept="image/x-png, image/gif, image/jpeg">
                                        <label class="custom-file-label"></label>

                                    </div>
                                </div>
                                <div class="btn-group pull-right" style="margin-right:20px;">
                                    <button type="button" class="btn btn-primary btn-md">
                                        GUARDAR
                                    </button>
                                    <a class="btn btn-default btn-md">
                                        <span><i class="carret-left"></i></span> REGRESAR
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
            </form>
        </div>
    </section>
</div>
        <!-- /.col -->
