<div class="col-md-4"></div>
<div class="col-md-4">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Acceso</h3>
        </div>
        <form id="frmIngresar" class="form-horizontal">
            
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="email" class="form-control" id="Usuario" name="Usuario" placeholder="Email*" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" id="Contrasena" name="Contrasena" placeholder="Contraseña*">
                    </div>
                </div>
                <div class="col-md-12" >
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" placeholder="No soy un robot" id="chkRobot" name="chkRobot"> No soy un robot
                        </label>
                    </div>
                </div>
            
                <div id="msg" class="col-md-12" ></div>

                <div class="box-footer">
                    <button type="btnIngresar" class="btn btn-info pull-right">INGRESAR</button>
                </div>

                <div class="col-md-12" > 
                    <a href="#"> Olvidaste tu contraseña?</a>
                </div> 
            </div>
            
            
        </form>
    </div>
</div>
<div class="col-md-4"></div>

<script>
    var master_url = base_url + "CtrlSesion/";
    var btnIngresar = $("#btnIngresar");
    var Usuario = $("#Usuario");
    var Contrasena = $("#Contrasena");
    var chkRobot = $("#chkRobot");
    $(document).ready(function () {
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
                        if (parseInt(data) === 1) {
                            location.reload(true);
                        } else {
                            onNotify('x', data, 'danger');
                        }
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }, 1000);
            } else {
                $("#msg").html('<div  class="alert alert-dismissible alert-danger">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>ERROR!</strong> Verifique su usuario y contraseña</div>');
            }
        });
    });
</script>





