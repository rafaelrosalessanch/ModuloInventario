
<?php
session_start();
$palabra = $_SESSION['usuario'];
$_SESSION['palabra'] = ucfirst($palabra);
//if (!isset($_SESSION['usuario'])) {
//
//    header("location:../index.php");
//    exit ();
//}
$_SESSION['ultimapagina'] = 'http://localhost/vistas/principal.php';
?>
<?php
if (!isset($_SESSION['usuario'])) {
    echo '<script language="javascript" type="text/javascript">

            alert("Usted no puede acceder a esta area")

history.go(-1);



</script>';


//    header("location:../vistas/principal.php");

    exit ();
}
$_SESSION['ultimapagina'] = 'http://localhost/vistas/informatica.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>

    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script>
        function atras(){
            location.href='http://localhost/vistas/personalizacion.php';
        }
        function impreSelec(contenidoo){


            
                var ficha=document.getElementById(contenidoo);
var p=0;
 { if ((navigator.appName == "Netscape")) {
        var ventimp=window.open('','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();

//}
//else
//{ var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
//document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
////WebBrowser1.ExecWB(6, -1);
////WebBrowser1.outerHTML = ficha.innerHTML;
//}


           
       }}}
        
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <title>Sistema Inventario</title>
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../slidemenu.css" />
    <script src="../jquery.js" type="text/javascript"></script>
    <script src="../javascript.js" type="text/javascript"></script>
    <script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


    <script language="javascript" type="text/javascript">


        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
        function isstringKey(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8,37,39,46];

            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }

            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }
    </script>





</head>

<body >

    <div class="content" style="width: 80%;" >

        <div class="header" id="header">
        <!-- <img alt="" width="256" height="84" class="logo_img" /> -->
            <div class="logo_img"><img src="/images/logo.jpg" alt="" width="256" height="84" class="logo_img" /></div>

        </div>
        <h3 style="width: 80%">  <div style="margin-left: 100%;">

                <h5 style="margin-top: -15px"><?php echo $_SESSION['palabra']; ?><a style="margin-top: -33px;margin-left: 10px;" href="Nueva%20carpeta/index.php" >Salir</a><a style="margin-top: -33px;margin-left: 10px;" href="../vistas/cambiar_contrasena.php" >Cambiar_contrase&ntilde;a</a></h5>
            </div></h3>
        <style TYPE="text/css">
            #menu{padding-left:0px; margin-top:-15px;width: 100%}
            #menu li{list-style:none; float:left;width: 25%}
            #menu li a{display:block;
                       height:20px; background:slategray; ;
                       border:0px solid; padding:2px;
                       text-decoration:none;
                       text-align:center; color:black;
                       font-family:arial; font-size:15px;
                       font-weight:bold;width: 100%;}
            #menu li a:hover{background-image: url(/images/fondo.png);
                             border-color:transparent;
                             color:black;width: 100%}
            #menu li ul{display:none; position:absolute;}
            #menu li ul li {display:block;
                            padding:0px;width: 25%}
            #menu li:hover ul{display:block; padding-left:0px;width: 100%}
            #menu li ul li a{display:block;width: 100%}

        </style>

 <script>
function leerDatos(){
  // Comprobamos que se han recibido los datos
  if (oXML.readyState == 4) {
    // Accedemos al XML recibido
    var xml  = oXML.responseXML.documentElement;
    // Accedemos al DIV
    var miDiv = document.getElementById('menu');
    // Vaciamos el DIV
    miDiv.innerHTML = '';
    // Iteramos cada usuario
    for (i = 0; i < xml.getElementsByTagName('usuario').length; i++){
      // Accedemos al objeto XML usuario
      var item = xml.getElementsByTagName('usuario')[i];
      // Recojemos el id
      var id = item.getElementsByTagName('id')[0].firstChild.data;
      // Recojemos el nombre
      var nombre = item.getElementsByTagName('nombre')[0].firstChild.data;
      var color = item.getElementsByTagName('color')[0].firstChild.data;
      // Mostramos el enlace
      miDiv.innerHTML += '<li ><a href='+id+' id='+id+' style="color:'+color+'">'+nombre+'</a></li>';
    }
  }
}
function AJAXCrearObjeto(){
var obj;
if(window.XMLHttpRequest) { // no es IE
obj = new XMLHttpRequest();
} else { // Es IE o no tiene el objeto
try {
obj = new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e) {
alert('El navegador utilizado no está soportado');
}
}
return obj;
}

oXML = AJAXCrearObjeto();
oXML.open('get', '../xml/menuprincipal.xml');
oXML.onreadystatechange = leerDatos;
oXML.send('');
</script>
        <div style="width: 100%">
            <ul id="menu" >
                
            </ul>
        </div>




        <div class="right"> <!-- Capa right -->
            <h3 style="height: 0px;background-image: url(/images/fondo.png);width: 100%"> <p style="margin-top: -8px;width: 100%">Impresi&oacute;n del codigo de barra personal</p></h3>

        </div>

        <div>

            <div class="left" style="width: 100%">

                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
                <title>jQuery UI Example Page</title>
                <link type="text/css" href="../css/ui-lightness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
                <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
                <script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>
                <script type="text/javascript">
                    $(function(){

                        // Accordion
                        $("#accordion").accordion({ header: "h3" });

                        // Tabs
                        $('#tabs').tabs();


                        // Dialog
                        $('#dialog').dialog({
                            autoOpen: false,

                            buttons: {
                                "Ok": function() {
                                    $(this).dialog("close");
                                },
                                "Cancel": function() {
                                    $(this).dialog("close");
                                }
                            }
                        });

                        // Dialog Link
                        $('#dialog_link').click(function(){
                            $('#dialog').dialog('open');
                            return false;
                        });

                        // Datepicker
                        $('#datepicker').datepicker({
                            inline: true
                        });

                        // Slider
                        $('#slider').slider({
                            range: true,
                            values: [17, 67]
                        });

                        // Progressbar
                        $("#progressbar").progressbar({
                            value: 20
                        });

                        //hover states on the static widgets
                        $('#dialog_link, ul#icons li').hover(
                        function() { $(this).addClass('ui-state-hover'); },
                        function() { $(this).removeClass('ui-state-hover'); }
                    );

                    });
                </script>
                <style type="text/css">
                    /*demo page css*/

                    .demoHeaders { margin-top: 2em; }
                    /*			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}*/
                </style>


                <div id="contenidoo" style=" margin-left:95px;height:810px;margin-top:-10px;width: 80%;background-color: slategray">

<input style="margin-left: 18%" value="Imprimir Anverso" type="button"  onclick="impreSelec('forminsertarusuariooo')"></input>
                    <input style="margin-left: 14%;margin-top: 5px" value="Atras" type="button"  onclick="atras()"></input>
                    <input style="margin-left: 14%"  value="Imprimir Reverso" type="button"  onclick="impreSelec('forminsertarusuarioo')"></input>



                    <form style="" id="forminsertarusuario" >
                        <div id="contenido" style=" margin-left:95px;height: 10px;margin-top:-10px;width: 80%;background-color: slategray"></div>
                        <div style="width: 90%;height:750px;background-color: white;overflow-y:scroll;margin-left: 5%;">
                            <strong style="margin-left: 21%">Anverso</strong>
                            <strong style="margin-left: 45%">Reverso</strong>
<?php
$cant = $_SESSION['cantidadvistapreliminar'];
$usuarios = $_SESSION['vistapreliminar'];
include_once '../modelo/ModeloLog.php';
$obj = new ModeloLog();
$mostrar = $obj->mostrar_usuarios();
$user = explode(",", $usuarios);
for ($ii = 0; $ii < $cant; $ii++) {
    foreach ($mostrar as $i) {
        if ($i->ci == $user[$ii]) {
            $numerobarra = $i->codigobarra;
            $imgSrc = "http://localhost/libreria/barcode_manager.php?id=" . $numerobarra;
            $nombreyapellidos = $i->nombreusuario . ' ' . $i->apellidos;
            $nombre = utf8_decode($nombreyapellidos);
            $cargo = utf8_decode($i->cargo);
            $departamento = utf8_decode($i->departamento);
            $conn = pg_connect("user=postgres password=postgres dbname=identificacion host=localhost");
            $res = pg_query("SELECT encode(fotousuario, 'base64') AS data FROM usuario WHERE
ci='$i->ci'");
            $raw = pg_fetch_result($res, 'data');
           echo "
           <fieldset id='file'  title='Datos del usuario' style='margin-top: 10px;margin-left: 5%;height: 190px;width: 40%;-moz-border-radius:30px 30px 0px 0px;
             -webkit-border-radius:30px 30px 0px 0px; border:1px solid #707070;border-radius:10px' >
                             <div style=''>
                            <div style='margin-top: 5px'>
                                <img src='../images/logosolapin.jpg' style='width:300px;height:70px;margin-left:0%;margin-top: 10px'></img>

   <img style='width:105px;height:85px;margin-left:65%;margin-top: -100px' src='data:image/png;base64,$raw' />
    <div style='margin-top: -10px'>
    <strong style='color: #00CCFF'>Nombre: </strong>$nombre


     </div>
    <div>
    <strong style='color: #00CCFF'>Cargo: </strong>$cargo
    </div>
    <div>
    <strong style='color: #00CCFF'>Departamento: </strong>$departamento
    </div>
          </div>
              <h3 style='height: 0px;background-image: url(/images/fondo.png);width: 103.1%;margin-left: -7px;margin-top: 5px'></h3>
              <h3 style='height: 2px;background-color: white;width: 104%;margin-left: -8px'></h3>
               <h3 style='height: 0px;background-image: url(/images/fondo.png);width: 103.7%;height:20px;margin-left: -8px;margin-top: -10px;
                   border-bottom-right-radius: 1em;border-bottom-left-radius: 1em;'><p style='color: white;margin-left: 33%'>ACCESO LIMITADO</p></h3>

        </fieldset>


                                 <fieldset id='file'  title='Datos del usuario' style='margin-top: -202px;margin-left: 55%;height: 190px;width: 40%;-moz-border-radius:30px 30px 0px 0px;
             -webkit-border-radius:30px 30px 0px 0px; border:1px solid #707070;border-radius:10px' >

                                     <div id='imprimir' >
                                     <img  src='$imgSrc' style='width: 250px;height: 50px;margin-top: 95px' ></img>
</div>
<h3 style='height: 0px;background-image: url(/images/fondo.png);width: 103.1%;margin-left: -7px;'></h3>
              <h3 style='height: 2px;background-color: white;width: 104%;margin-left: -8px'></h3>
               <h3 style='height: 0px;background-image: url(/images/fondo.png);width: 103.7%;height:20px;margin-left: -8px;margin-top: -10px;
                   border-bottom-right-radius: 1em;border-bottom-left-radius: 1em;'><p style='color: white;margin-left: 12%'>Documento PERSONAL e INTRANSFERIBLE</p></h3>

        </fieldset>
        ";
            pg_close($conn);
        }
    }
}
?>


                        </div>

                    </form>
                    <input style="margin-left: 18%" value="Imprimir Anverso" type="button"  onclick="impreSelec('forminsertarusuariooo')"></input>
                    <input style="margin-left: 14%;margin-top: 5px" value="Atras" type="button"  onclick="atras()"></input>
                    <input style="margin-left: 14%"  value="Imprimir Reverso" type="button"  onclick="impreSelec('forminsertarusuarioo')"></input>

                    <form style="visibility: hidden;margin-top: -900px" id="forminsertarusuarioo">

                       
                        <div id="contenido" style=" margin-left:95px;height: 10px;margin-top:100px;width: 80%;background-color: slategray"></div>
                        <div style="width: 90%;height:850px;background-color: white;overflow-y:scroll;margin-left: 60%;">
                            
<?php
$cant = $_SESSION['cantidadvistapreliminar'];
$usuarios = $_SESSION['vistapreliminar'];
include_once '../modelo/ModeloLog.php';
$obj = new ModeloLog();
$mostrar = $obj->mostrar_usuarios();
$user = explode(",", $usuarios);
for ($ii = 0; $ii < $cant; $ii++) {
    foreach ($mostrar as $i) {
        if ($i->ci == $user[$ii]) {
            $numerobarra = $i->codigobarra;
            $imgSrc = "http://localhost/libreria/barcode_manager.php?id=" . $numerobarra;
            $nombreyapellidos = $i->nombreusuario . ' ' . $i->apellidos;
            $nombre = utf8_decode($nombreyapellidos);
            $cargo = utf8_decode($i->cargo);
            $departamento = utf8_decode($i->departamento);
            $conn = pg_connect("user=postgres password=postgres dbname=identificacion host=localhost");
            $res = pg_query("SELECT encode(fotousuario, 'base64') AS data FROM usuario WHERE
ci='$i->ci'");
            $raw = pg_fetch_result($res, 'data');
          if($ii==0){
            echo "
           <div>
                                     <img  src='$imgSrc' style='width: 280px;height: 60px;' ></img>
              <p style='color: blue;margin-top:50px'>Documento PERSONAL e INTRANSFERIBLE</p>
</div>
        ";}  else {
                                  echo "
           <div>
                                     <img  src='$imgSrc' style='width: 280px;height: 60px;margin-top: 225px' ></img>
            <p style='color: blue;margin-top:50px'>Documento PERSONAL e INTRANSFERIBLE</p>
</div>
        ";
                                        }
            pg_close($conn);
        }
    }
}
?>



                        </div>

                    </form>
<form style="visibility: hidden" id="forminsertarusuariooo" >


                        <div id="contenido" style=" margin-left:95px;height: 10px;margin-top:-10px;width: 80%;background-color: slategray"></div>
                        <div style="width: 90%;height:850px;background-color: white;overflow-y:scroll;margin-left: 5%;">

<?php
$cant = $_SESSION['cantidadvistapreliminar'];
$usuarios = $_SESSION['vistapreliminar'];
include_once '../modelo/ModeloLog.php';
$obj = new ModeloLog();
$mostrar = $obj->mostrar_usuarios();
$user = explode(",", $usuarios);
for ($ii = 0; $ii < $cant; $ii++) {
    foreach ($mostrar as $i) {
        if ($i->ci == $user[$ii]) {
            $numerobarra = $i->codigobarra;
            $imgSrc = "http://localhost/libreria/barcode_manager.php?id=" . $numerobarra;
            $nombreyapellidos = $i->nombreusuario . ' ' . $i->apellidos;
            $nombre = utf8_decode($nombreyapellidos);
            $cargo = utf8_decode($i->cargo);
            $departamento = utf8_decode($i->departamento);
            $conn = pg_connect("user=postgres password=postgres dbname=identificacion host=localhost");
            $res = pg_query("SELECT encode(fotousuario, 'base64') AS data FROM usuario WHERE
ci='$i->ci'");
            $raw = pg_fetch_result($res, 'data');
     
            echo "
          <fieldset id='file'  title='Datos del usuario' style='margin-top:3px;height: 190px;width: 60%;-moz-border-radius:30px 30px 0px 0px;
             -webkit-border-radius:30px 30px 0px 0px; border:1px solid #707070;border-radius:10px' >
                             <div style=''>
                            <div style='margin-top: 5px'>
                                <img src='../images/logosolapin.jpg' style='width:300px;height:70px;margin-left:0%;margin-top: 10px'></img>

   <img style='width:105px;height:85px;margin-left:65%;margin-top: -60px' src='data:image/png;base64,$raw' />
    <div style='margin-top: -10px'>
    <strong style='color: #00CCFF'>Nombre: </strong>$nombre


     </div>
    <div>
    <strong style='color: #00CCFF'>Cargo: </strong>$cargo
    </div>
    <div>
    <strong style='color: #00CCFF'>Departamento: </strong>$departamento
    </div>
          </div>
              <div>
               <p style='color: white;margin-left: 20%'>ACCESO LIMITADO</p></h3>
</div>
        </fieldset>
        ";
                                  
            pg_close($conn);
        }
    }
}
?>



                        </div>

                    </form>

                </div>
               
            </div>


            <div class="footer" style="margin-top: 30px;background-color:slategray;" >
                <p>Copyright &copy; 2013, Centro Nacional de Cirug&iacute;a de M&iacute;nimo Acceso, <br />
                    Calle P&aacute;rraga #215, entre San Mariano y Vista Alegre |</font> La Vibora <font size="2">|</font>10 de Octubre <font size="2">|</font> La Habana <font size="2">|</font> Cuba<font face="Trebuchet MS"><font face="Trebuchet MS"> <br />

                            <img src="/images/telefonos.jpg" width="16" height="16" />Telf.: (537) 649-5328, (537) 649-5331, (537)
                            649-5332 <font size="2">|</font> FAX:
                            (537) 649-0150</font></font><font face="Trebuchet MS"><font face="Trebuchet MS"></font></font><br />
                </p>
            </div>

        </div>

        <script language="javascript" type="text/javascript">
            $(function() {
                $("#enlaces li a").click( function () {
                    $(this).toggleClass('activo');
                });
            });

            $("#enlaces li a").each(function(){
                var link = $(this);
                var href = link.attr("href");
                link.click(function(){
                    $("#contenido").hide().load(href).show();
                    return false;
                });


                $("#primer").addClass("normal");

                $("#enlaces li a").click( function () {
                    $("#enlaces li a") .addClass("elegido");
                    $("#primer").removeClass("normal");
                    $(this).removeClass("elegido");
                });
            });
        </script>
</body>
</html>