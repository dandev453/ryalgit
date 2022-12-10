<div class="login-box">
    <div class="login-logo">
        <a href="/login"><b>Punto </b>de venta</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Inicio de sesión</p>
        <form action="login.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="user_name" class="form-control" placeholder="Correo electrónico"
                    required="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="user_password" class="form-control" placeholder="Contraseña"
                    required="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">

                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
