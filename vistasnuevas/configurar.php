<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '<script language="javascript" type="text/javascript">
location.href="../index.php";
</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Inventario Artint</title>
        <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css">
        <style type="text/css">
            //Escritorio grande
            @media(min-width:1200px){
                body{color: black;}
            }
            @media(min-width: 1200px){
                body{color: black;} 
                #acciones{margin-top: 20px;}
                #configurar{margin-left: 10px;}
                #salir{margin-left: 10px;}
            }
            @media(min-width:980px) and (max-width:1199px){
                body{color: black;}
                .row-fluid{width: 320px}
                #pepe{margin-top: 10px;}
            }
            @media(min-width:768px) and (max-width:979px){
                body{color: black;}
            }
            @media(min-width:768px) and (max-width:979px){
                body{color: black;}
                .row-fluid{width: 320px}
                /*               #registrate{margin-top: 50px;}*/
                #pepe{margin-top: 20px;}
            }
            //Table o smartphone
            @media(max-width:767px){
                body{color: black;}
            }
            @media(max-width:767px){
                body{color: black;}
                .row-fluid{width: 260px}
                #divregistrar{margin-left: -45%;}
                #pepe{margin-left: 30px;}
                #pepe{margin-top: 10px;}
            }
            //Smartphone
            @media(max-width:480px){
                body{color: black;}
            }
            @media(max-width:480px){
                body{color: black;}
                #divregistrar{margin-left: -45%;}
                .row-fluid{width: 260px;}
                #pepe{margin-left: 30px;}
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span3">
                    <img class="img-rounded" src="/images/artint.jpg"/>
                    <legend></legend>
                </div>
                <div class="span6"></div>
                <div class="span3">
                    <div class="icon-user">
                    </div>
                    <?php
                    $usuario = $_SESSION['usuario'];
                    echo "<strong>$usuario</strong>";
                    ?>
                    <a id="configurar" href="configurar.php" ><strong>Configurar</strong></a>
                    <a id="salir" href="http://localhost/controladores/controladorSalirUser.php" ><strong>Salir</strong></a>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                </div>
                <div class="span3"></div>
                <div class="span6">
                    <div id="acciones" class="row-fluid">
                        <legend>Configura tu cuenta</legend>
                        <div id="divregistrar"  class="span6">
                            <form  id="formloguiar" name="formloguiar"  method="post" style="margin-top: -10px;-moz-border-radius:15 px;">

                                <div class="span12" >
                                    <div id="pepe">
                                    </div>


                                    <strong>Nombre: <input id="nombre" name="nombre" type="text" placeholder="Nombre" onkeydown="return isstringKeyy()" onfocus="return tab()"> </strong>
                                    <strong><input id="apellidos" name="apellidos" type="text" placeholder="Apellidos" onkeydown="return isstringKeyy()" onfocus="return tab()"></strong>
                                    <div >
                                        <strong> Correo Electronico: <input id="email" name="email" type="text" placeholder="@gmail.com" onkeydown="return isstringKeyy()" onfocus="return tab()"></strong>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12" >
                                            <strong> Contrase&ntilde;a anterior: <input id="contrasena" type="password" name="contrasena" onkeydown="return isstringKeyy()" onfocus="return tab()"></strong>
                                        </div>
                                    </div>
                                    <div >
                                        <strong>Contrase&ntilde;a nueva:  <input id="confirmarcontrasena" type="password" name="confirmarcontrasena" onkeydown="return isstringKeyy()" onfocus="return tab()"></strong>
                                    </div>
                                    <div class="form-inline">
                                        <input class="btn" type="button" id="cambiar" name="cambiar" value="Cambiar"  onclick="return validarlogeoooo()">
                                        <input class="btn" type="button" id="cancelar" name="cancelar" value="Cancelar"  onclick="return informatica()">
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span3">
            </div>
        </div> 
    </div>
</body>
<script language="javascript" type="text/javascript">
    function informatica() {
location.href="informatica.php";
    }
</script>
</html>