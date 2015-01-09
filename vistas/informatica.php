<?php

session_start();
$palabra = $_SESSION['usuario'];
$_SESSION['palabra'] = $palabra;
//if (!isset($_SESSION['usuario'])) {
//
//    header("location:../index.php");
//    exit ();
//}
$_SESSION['ultimapagina']='http://localhost/vistas/principal.php';
?>
<?php

if (!isset($_SESSION['usuario']) ) {
    echo '<script language="javascript" type="text/javascript">
location.href="Nueva carpeta/index.php";


   
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
        $(document).ready(function(){
            $("#registrardepa").click(function(evento){
                document.getElementById("registrardepartamento").style.visibility="visible";
                document.getElementById("registrarcomponente").style.visibility="hidden";
                document.getElementById("registrarestacion").style.visibility="hidden";
                //alert("Has pulsado el enlace...nAhora serás enviado a DesarrolloWeb.com");
            });
            $("#registraresta").click(function(evento){
                document.getElementById("registrardepartamento").style.visibility="hidden";
                document.getElementById("registrarcomponente").style.visibility="hidden";
                document.getElementById("registrarestacion").style.visibility="visible";
                //alert("Has pulsado el enlace...nAhora serás enviado a DesarrolloWeb.com");
            });
            $("#registrarcompo").click(function(evento){
                document.getElementById("registrardepartamento").style.visibility="hidden";
                document.getElementById("registrarcomponente").style.visibility="visible";
                document.getElementById("registrarestacion").style.visibility="hidden";
                //alert("Has pulsado el enlace...nAhora serás enviado a DesarrolloWeb.com");
            });
            $("#registrarobj").click(function(evento){
                document.getElementById("registrardepartamento").style.visibility="hidden";
                document.getElementById("registrarcomponente").style.visibility="hidden";
                document.getElementById("registrarestacion").style.visibility="hidden";
                //alert("Has pulsado el enlace...nAhora serás enviado a DesarrolloWeb.com");
            });
        });
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


        function validar() {
            var marca=document.getElementById('marca').value;
            var modelo=document.getElementById('modelo').value;
            var numeroserie=document.getElementById('numeroserie').value;
            var numeroinventario=document.getElementById('numeroinventario').value;
            var estado=document.getElementById('estado').value;
            var observaciones=document.getElementById('observaciones').value;
            var tipocomponente=document.getElementById('tipocomponente').value;

            var retorno=true;
            if( marca == null || marca.length == 0 ||modelo == null ||modelo.length == 0||numeroinventario==null||numeroinventario.length==0||numeroserie==null||numeroserie.length==0||estado==null||estado.length==0) {
                retorno=false;
                alert("Error en los datos")
            }else{alert("Se inserto correctamente")}

            return retorno;

        }


    </script>

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



</head>

<body >

    <div class="content" style="width: 1050px;" >

        <div class="header" >
        <!-- <img alt="" width="256" height="84" class="logo_img" /> -->
            <div class="logo_img"><img src="/images/artint.jpg" alt="" style="width:200px" class="logo_img" /></div>

        </div>
        <h3 style="width: 80%">  <div style="margin-left: 95%;">

                <h5 style="margin-top: -15px"><?php echo $_SESSION['palabra']; ?><a style="margin-top: -33px;margin-left: 10px;" href="../index.php" >Salir</a><a style="margin-top: -33px;margin-left: 10px;" href="../vistas/cambiar_contrasena.php" >Cambiar_contrase&ntilde;a</a></h5>
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


        <div style="width: 100%">
        <ul id="menu" >
            
        </ul>
            </div>
        <div class="right"> <!-- Capa right -->
            <h3 style="height: 0px;background-image: url(/images/fondo.png);width: 100%"> <p style="margin-top: -8px;width: 20px">Home</p></h3>
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

        
                 <div id="contenido" style=" margin-left:45px;height: 200px;margin-top: 10px;width: 95%;">
                    
                     <img src="/images/inventarios.png" width="260px" style="height: 180px" ></img>
                         
                         <p style="margin-left: 260px;font-size: 14px;margin-top: -170px">
                             El sistema desarrollado tiene como objetivo administrar todo los medios inform&aacuteticos que son distribuidos en los diferentes departamentos del <strong>Centro Nacional de Cirug&iacutea de M&iacutenimo Acceso</strong> , permitiendo de esta manera un mejor control de estos medios y una mejora en cuanto a eficiencia y calidad de la administrac&iacuteon de los mismos.
                        

                     </p>
                     <p style="margin-left: 260px;font-size: 14px;margin-top: 10px">

El sistema es capaz de gestionar usuarios, departamentos, puestos de trabajos y medios inform&aacuteticos, asi como generar un conjunto de documentos relacionados con la distribuci&oacuten y el manejo de los activos.

                     </p>
                       
                         <p style="font-size: 14px;margin-left: 260px;margin-top: 15px">

Todo estas acciones conforman al Subsistema de inventario del departamento de inform&aacutetica, el cual es desarrollado a la medida de las necesidades existentes en el departamento en cuanto a la administraci&oacuten de sus medios.
</p>

           

                    <!--                    <div id="registrarobjetos" style="visibility: visible">
                                        <a id="registrardepa" href="#" style="margin-left: 50px;font-size:larger">Registrar Departamento</a>
                        <a  id="registraresta" href="#" style="margin-left: 20px;font-size:larger">Registrar Estacion</a>

                    <a id="registrarcompo" href="#"style="margin-left: 20px;font-size:larger" >Registrar Componente</a>

                    </div>-->
                    <script language="javascript" type="text/javascript">
                        function validarcomponente(){
                            var nombreDepartamento=document.getElementById('nombreDepartamento').value;
                            var retorno=true;
                            if(nombreDepartamento.length==0){

                                alert("Error en los datos")
                                return false;
                            }else{
                                alert("Se inserto correctamente")}
                            return true;
                        }
                    </script>
                

                </div>
            </div>

        </div>

       
        <div class="footer" style="margin-top: -50px;background-color:slategray;" >
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
