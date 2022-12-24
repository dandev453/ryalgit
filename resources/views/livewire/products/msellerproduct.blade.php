<article class="content-header  bg-light w-100">
    <div class="row content-header ">
        <div class="col-xs-12 col-md-3">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" value="01/12/2022 - 14/12/2022" id="range"
                    readonly="">

            </div><!-- /input-group -->
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="input-group">
                <select class="form-control" wire:model.lazy="categoryName">

                    <option value="" default>Selecciona Categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="load(1);"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
        <div class="col-xs-2 col-md-1">
            <div id="loader" class="text-center"></div>
        </div>
        <div class="col-xs-10 col-md-5 ">
            <div class="btn-group pull-right">
                <button type="button" onclick="reporte();" class="btn btn-default"><i class="fa fa-print"></i> PDF
                </button><button type="button" onclick="inventario_excel();" class="btn btn-default"><i
                        class="fa fa-file-excel-o"></i> Excel
                </button>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class=" content">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $componentName }} | {{ $pageTitle }} </h3>
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
                                    <th class="text-center">PRODUCTO </th>
                                    <!-- <th>Nº de productos</th> -->
                                    <th class="text-center">CATEGORÍA</th>
                                    <th class="text-center">VENTAS</th>
                                    <th class="text-center"></th>
                                </tr>
                                <tr>
                                    <!-- <td>2</td> -->
                                    <td class="text-center"> </td>
                                    <td class="text-center">
                                       
                                    </td>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-center">
                                   
                                    </td>

                                </tr>
                               
                                <tr>
                                    <td colspan="9">
                                      
                                        Mostrando de registros
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

</article><!-- /.content -->
