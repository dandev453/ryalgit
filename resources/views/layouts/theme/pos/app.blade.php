<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title intertia>{{ config('app.name', 'Ryalpos') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('layouts.theme.pos.styles')
    <script src="{{ asset('js/keypress.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
@php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, token, Content-Type, cache-control");

@endphp
</head>

<body class="skin-blue">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        @include('layouts.theme.pos.header')
    </header>
    <div class="wrapper row-offcanvas ">
            <!-- Main content -->
            @include('layouts.theme.pos.scripts')
            @yield('content')
             
      <!-- /.right-side -->
    </div><!-- ./wrapper -->
</body>

</html>
