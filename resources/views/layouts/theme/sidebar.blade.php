<section class="sidebar">
    <!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="{{ asset('assets/img/avatar.png') }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>{{ auth()->user()->name }}</p> <!-- / Name user in login -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." />
            <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active">
            <a href="/">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="Javascript::void(0)">
                <i class="fa fa-truck"></i> <span>compras</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li> <a href="/new_purchase"><li><i class="glyphicon glyphicon-shopping-cart"></i> Nueva compra</a></li>
                <li><a href="/purchase_list"><i class="glyphicon glyphicon-th-list"></i> Historial de compras</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="Javascript::void(0)">
                <i class="fa fa-th-large"></i>
                <span>catalogo</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="/products"><i class="glyphicon glyphicon-barcode"></i> Productos</a></li>
                <li><a href="/categories"><i class="fa fa-tags"></i> Categorias</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="Javascript::void(0)">
                <i class="fa fa-user"></i>
                <span>contactos</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="customers"><i class="glyphicon glyphicon-user"></i> Clientes</a></li>
                <li><a href="supliers"><i class="glyphicon glyphicon-briefcase"></i> Proveedores</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dollar"></i> <span>Facturación</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="/manage_invoice"><i class="glyphicon glyphicon-list-alt"></i> Administrar facturas</a></li>
            </ul>
        </li>
        <li class="active">
            <a href="/pos">
                <i class="fa fa-dollar"></i> <span>POS</span>
            </a>
        </li>
        <li class="treeview">
            <a href="Javascript::void(0)">
                <i class="glyphicon glyphicon-signal"></i> <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="sales_report"><i class="fa fa-bar-chart"></i> Reportes de ventas</a></li>
                <li><a href="purchases_report"><i class="fa fa-line-chart"></i> Reportes de compras </a></li>
                <li><a href="inventory_report"><i class="fa fa-bar-chart"></i> Reportes de inventarios </a></li>
                <li><a href="products_mas_vendidos_report"><i class="fa fa-bar-chart"></i> Productos más vendidos</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="javascript::void(0)">
                <i class="fa fa-wrench"></i> <span>Configuración</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="business_profile"><i class="glyphicon glyphicon-briefcase"></i> Perfil de la empresa</a></li>
                <li><a href="/coins"><i class="fa fa-usd"></i> Monedas </a></li>
                <li><a href="javascript::void(0)"><i class="fa fa-align-justify"></i>Impuestos</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="mailbox.html">
                <i class="fa fa-lock"></i> <span>Administrar accesos</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="/roles" style="margin-left: 10px;"><i class="glyphicon glyphicon-briefcase"></i> Grupos de usuarios</a></li>
                <li><a href="/users" style="margin-left: 10px;"><i class="fa fa-users"></i> Usuarios</a></li>
            </ul>
        </li>
        <ul class="treeview-menu">
            <li><a href="/roles"><i class="glyphicon glyphicon-briefcase"></i> Grupos de usuarios</a></li>
            <li><a href="/users"><i class="fa fa-users"></i> Usuarios</a></li>
        </ul>
    </li>
</ul>
</section>