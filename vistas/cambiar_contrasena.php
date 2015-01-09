<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<script language="javascript" type="text/javascript">
    function impreSelect(){
            history.go(-1);return ""}
</script>
<script language="javascript" type="text/javascript">
    function validarcambiocontrasena(){

        var contrasena=document.getElementById('contrasena').value;
        var contrasenanueva=document.getElementById('contrasenaconf').value;
       var contrasenanuevaconfir=document.getElementById('c').value;
        if ((contrasenanueva!=contrasenanuevaconfir))
            alert("Las contrase\u00f1as no coinsiden");
       if ((contrasenanueva.length==0)||(contrasenanuevaconfir.length==0)||(contrasena.length==0)||(contrasenanueva!=contrasenanuevaconfir))
            return false;
       
           return true;
        }
    </script>
<html>
    <head>
        <!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        -->    <link rel="stylesheet" href="../css/style.css" type="text/css" /><!--
        -->    <title>Sistema Inventario</title>
        <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" /><!--
        -->    <link rel="stylesheet" type="text/css" href="../css/slidemenu.css" />
        <script src="../jquery.js" type="text/javascript"></script>
        <script src="../javascript.js" type="text/javascript"></script>
        <script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>



    </head>
    <body>

        <img src="/images/logo1.jpg" style="background-color:slategray; width: 27%;height: 210px;margin-top: 15%;border-radius:10px;margin-left: 35%;
              -moz-border-radius:30px 30px 0px 0px;
              -webkit-border-radius:30px 30px 0px 0px; border:1px solid #707070;;" />
        <form  onsubmit="return validarcambiocontrasena();" action="../controladores/cambiarContrasena.php" method="post" style="margin-top: -190px;margin-left: 52%;-moz-border-radius:15 px;" >

                <div style="margin-top: 50px;">
                     <strong> <h3 style="color: yellow;"> Usuario: <?php session_start();
echo $_SESSION['usuario'];
                    ?></h3></strong>

                </div>
                <div style="margin-left: -30%;margin-top: 5px;">
                    <strong> <h3 style="color: white;margin-top: 5px;"> Contrase&ntilde;a actual</h3></strong>
                    <input id="contrasena" type="password" name="contrasena" style="margin-top: -20px;margin-left: 18%;width:17%">
                   <strong> <h3 style="color: white;margin-top: 10px;"> Contrase&ntilde;a nueva</h3></strong>
                   <input type="password" name="contrasenaconf" id="contrasenaconf" style="margin-top: -15px;margin-left: 18%;;width:17%">
                <strong> <h3 style="color: white;margin-top: 10px;"> Confirmar contrase&ntilde;a</h3></strong>
                <input type="password" name="c" id="c" style="margin-top: -15px;margin-left: 18%;;width: 17%">
                </div>



                <div style="margin-left: -4%;margin-top: 1px;">


                    <input type="submit" value="Aceptar" style="margin-top: 5px;border-radius:4px" >
                   
                    <input type="button" value="Cancelar" style="margin-top: 5px;border-radius:4px" onclick="impreSelect()" >
                </div>
            </form>

        <?php
        // put your code here
        ?>
    </body>
</html>




