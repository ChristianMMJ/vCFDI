<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>vCFDI</b>1.0</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Iniciar Sesión</p>

            <form id="frmIngresar">
                <div class="form-group has-feedback">
                    <input type="text" id="Usuario" name="Usuario" class="form-control" placeholder="Usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="Contrasena" type="password" class="form-control" placeholder="Contraseña">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkbox icheck">
                            <label>
                                <input id="chkRobot" name="chkRobot" type="checkbox">No soy un robot
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-success btn-block btn-flat" id="btnIngresar">ACCEDER</button>
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <script>
        var master_url = base_url + 'ctrlSesion/';
        var btnIngresar = $("#btnIngresar");
        var Usuario = $("#Usuario");
        var Contrasena = $("#Contrasena");
        var chkRobot = $("#chkRobot");
        $(document).ready(function () {

            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-red',
                radioClass: 'iradio_flat-red'
            });

            btnIngresar.click(function () {
                if (Usuario.val() !== '' && Contrasena.val() !== '' && chkRobot.is(':checked')) {
                    HoldOn.open({
                        theme: 'sk-bounce',
                        message: 'ESPERE...'
                    });
                    setTimeout(function () {
                        var frm = $("#frmIngresar");
                        $.ajax({
                            url: master_url + "onIngreso",
                            type: "POST",
                            data: {
                                USUARIO: frm.find("#Usuario").val(),
                                CONTRASENA: frm.find("#Contrasena").val()
                            }
                        }).done(function (data, x, jq) {
                            location.reload(true);
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }, 1000);
                } else {
                    swal('ERROR', 'INTENTELO DE NUEVO O MÁS TARDE', 'error');
                }
            });
        });
    </script>





