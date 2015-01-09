<?php
session_start();

    $_SESSION['usuario']=NULL;
    session_destroy();
?>
<html>
    <head>




         <script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
                <script type="text/javascript" src="/js/jquery-ui-1.7.2.custom.min.js"></script>
        <!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        -->    <link rel="stylesheet" href="/css/style.css" type="text/css" /><!--
        -->    <title>Sistema Inventario</title>
        <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
         <link rel="stylesheet" type="text/css" href="/css/slidemenu.css" />
     

        <script language="javascript" type="text/javascript">
            window.onload = function() {
  document.onkeyup = muestraInformacion;
  document.onkeypress = muestraInformacion;
  document.onkeydown = muestraInformacion;
}
            function muestraInformacion(elEvento) {
        var evento = window.event || elEvento;


              
               var as=evento.keyCode;
              
if(as=='13'){
 
                var url = "/controladores/controladorLoginUser.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formloguiar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#pepe").html(data); // show response from the php script.
                    }

                });

             setTimeout("borrar()",3000);
            return true;}
            }
            function validarlogeoo() {

                var url = "/controladores/controladorLoginUser.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formloguiar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#pepe").html(data); // show response from the php script.
                    }

                });

             setTimeout("borrar()",3000);
            return true;
            }
            function borrar(){
            
                document.getElementById('mensaje').style.visibility='hidden';

                return true;
            }




        </script>
    </head>
    <body>

        <img src="/images/logo1.jpg" style="background-color:#00CCFF; width: 360px;height: 190px;margin-top: 15%;border-radius:10px;margin-left: 35%;
             -moz-border-radius:30px 30px 0px 0px;
             -webkit-border-radius:30px 30px 0px 0px; border:1px solid #707070;;" />
        <form  id="formloguiar" name="formloguiar" onsubmit="return validarlogeoo()"  method="post" style="margin-top: -190px;margin-left: 40%;-moz-border-radius:15 px;">
            <div style="margin-top: 80px;">
                <strong> <h3 style="color: white;margin-left: 25px;font-size: 15px"> Usuario:</h3></strong>
                <input id="usuario" name="usuario" type="text" style="margin-top: -2%;margin-left:90px" >
            </div>
            <div style="margin-top: 10px;">
                <strong> <h3 style="color: white;margin-left: -2px;font-size: 15px"> Contrase&ntilde;a:</h3></strong>
                <input id="contrasena" type="password" name="contrasena" style="margin-top: -2%;margin-left:90px">
            </div>



<!--            <div style="margin-left: 8px;margin-top: 1px;">-->


<input type="button" value="Aceptar" style="margin-left:20%;margin-top: 1%;border-radius:4px" onclick="return validarlogeoo()">
<!--
            </div>-->
<?php
$_SESSION['estadoimprimirr']='Seleccionar';
if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) &&
   $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
{
echo "IP: " . $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else{
    $ip=$_SERVER['REMOTE_ADDR'];
echo "<p>Usted esta conectado desde el IP: $ip </p>";}
?>
        </form>
        <div id="pepe" style="margin-top: 1%;margin-left: 44%"></div>
       
    </body>
</html>
