
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php print base_url(); ?>">
                CFDI's
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse navbar-responsive-collapse" id="">
            <ul class="nav navbar-nav">
                <li class="" id="liUsuarios"><a href="<?php print base_url('CtrlUsuario') ?>">Usuarios</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $this->session->userdata('Nombre') . ' ' . $this->session->userdata('Apellidos'); ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li onclick="onCambiarContrasena();"><a href="#">Cambiar Contraseña</a></li> 
                        <li><a href="">Reportar un problema</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php print base_url('CtrlSesion/onSalir'); ?>" >Salir</a></li> 
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<script>


    var master_url = base_url + 'CtrlSesion/';
    $(document).ready(function () {



    });




</script>