<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        	@vite(['resources/css/app.css', 'resources/js/app.js']) 
    </head>
     <body class="skin-blue">
     	<!-- header logo: style can be found in header.less -->
     	@include('layouts.theme.header')
     	  <aside class="left-side sidebar-offcanvas">
     	  	   <section class="sidebar">
     	  	   	<!-- sidebar: style can be found in sidebar.less -->
								@include('layouts.theme.sidebar')
						  </section>
						   <!-- /.sidebar -->
     	  </aside>
     	  <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
            	  	<section class="content-header">
            	  		 <h1>
                        Blank page
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol>

            	  	</section>
           <!-- Main content -->
             <section class="content">
             		 @yield('content')
           	</section><!-- /.content -->
           </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
     	@include('layouts.theme.footer')
 </body>
</html>
