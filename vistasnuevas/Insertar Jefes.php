<?php
session_start();
if (!isset($_SESSION['usuario']) || ($_SESSION['administrador'] != "superuser") && ($_SESSION['administrador'] != "Super administrador")) {
    echo '<script language="javascript" type="text/javascript">

            alert("Usted no tiene permiso para acceder a la administracion")

history.go(-1);


   
</script>';

    exit ();
}
$_SESSION['ultimapagina'] = 'localhost/vistas/administracion.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
             oXML = AJAXCrearObjeto();
oXML.open('get', '../xml/menuprincipal.xml');
oXML.onreadystatechange = leerDatos;
oXML.send('');
            op = $("select#opciones option");
            // esta funcion compara todos los elementos del array
            // si devolvemos true "a" irá antes,
            // si devolvemos false "b" irá antes.

            op.sort(function (a,b) {
                return ( $(a).html().toUpperCase() < $(b).html().toUpperCase() ) ? -1 : ( $(a).html().toUpperCase() > $(b).html().toUpperCase() ) ? 1 : 0;
            });

            html="<option>Seleccionar</option>";
            for(i=0;i<op.length;i++)
            {
                html += "<option value='" + $(op[i]).val() + "'>" + $(op[i]).html() + "</option>";
            }
            $("select#opciones").html(html);

        });
         
    </script>
    <script language="javascript" type="text/javascript">
        function validarinsertarusuario(){


           var url = "../controladores/controladorRegistroJefes.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_lo").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#header").html(data); // show response from the php script.
                    }
                });

document.getElementById('contrasena').value='';
document.getElementById('confirmarcontrasena').value='';
 op = $("select#opciones option");
            // esta funcion compara todos los elementos del array
            // si devolvemos true "a" irá antes,
            // si devolvemos false "b" irá antes.

            op.sort(function (a,b) {
                return ( $(a).html().toUpperCase() < $(b).html().toUpperCase() ) ? -1 : ( $(a).html().toUpperCase() > $(b).html().toUpperCase() ) ? 1 : 0;
            });

        
            for(i=0;i<op.length;i++)
            {
                html += "<option value='" + $(op[i]).val() + "'>" + $(op[i]).html() + "</option>";
            }
            $("select#opciones").html(html);
op=null;
html=null;
op = $("select#opcionesprivilegios option");
            // esta funcion compara todos los elementos del array
            // si devolvemos true "a" irá antes,
            // si devolvemos false "b" irá antes.

            op.sort(function (a,b) {
                return ( $(a).html().toUpperCase() < $(b).html().toUpperCase() ) ? -1 : ( $(a).html().toUpperCase() > $(b).html().toUpperCase() ) ? 1 : 0;
            });

         
            for(i=0;i<op.length;i++)
            {
                html += "<option value='" + $(op[i]).val() + "'>" + $(op[i]).html() + "</option>";
            }
            $("select#opcionesprivilegios").html(html);



            setTimeout("borrar()",3000);

    }
    function borrar(){
document.getElementById('mensaje').style.visibility='hidden';
return true;
    }
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


        /*
       +-------------------------------------------------------------------------------------+
       |                                                                                     |
       | DHTML Tabsets                                                                       |
       |                                                                                     |
       | Copyright and Legal Notices:                                                        |
       |                                                                                     |
       |   All source code, images, programs, files included in this distribution            |
       |   Copyright (c) 1996,1997,1998,1999,2000                                            |
       |                                                                                     |
       |          John C. Cokos  iWeb, Inc.                                                  |
       |          All Rights Reserved.                                                       |
       |                                                                                     |
       |                                                                                     |
       |   Web: http://www.iwebsoftware.com      Email: info@iwebsoftware.com                |
       |                                                                                     |
       +-------------------------------------------------------------------------------------+

         **
             Original Tabset Scripts were obtained from another source.  Cannot remember
             where I got them from.  I've manipulated the daylights out of it, to make it
             work in all browsers, and behave the way that I wanted it to.   If you are,
             or if you know the originater, please email me at the address noted above, and
             I will be happy to change the copyright notices herein to include you as
             the original source.
         **
             Traduccion y funcion IniciaTabs(): Iván Nieto Pérez
             El Código - http://www.elcodigo.com
         **

         */


        /*
          Cambia las variables que aparecen a continuacion para adaptar el aspecto visual de las pestañas
         */

        var rows = new Array;
        var num_rows = 2;		//numero de filas
        var top = 330;		//posicion de las pestañas con respecto al borde superior
        //OJO, si cambia, hay que cambiar tambien el atributo top de tab-body del CSS
        var left = 335;		//posicion de las pestañas con respecto al borde izquierdo
        var width = 502;		//anchura

        var tab_off = "#fff";	//color pestaña no seleccionada
        var tab_on = "#fff";	//color pestaña seleccionada

        // ¡¡ no edites o cambies esta linea !!
        for ( var x = 1; x <= num_rows; x++ ) { rows[x] = new Array; }


        /*
            Define tantas filas como quieras en el bloque a continuacion.
            Observa que cada fila debe corresponderse con una etiqueta "DIV"
            en el codigo HTML, y que esta etiqueta debe tener como identificador
            T seguido de los numeros que indican fila y columna

            Por ejemplo:  row[1][5] necesita un div con un id igual a "T15"

            Observar los ejemplos que se muestran en los comentarios:
         */


        rows[2][1] = "2012";	// Requires: <div id="T21" class="tab-body">  ... </div>
        rows[2][2] = "2011";	// Requires: <div id="T22" class="tab-body">  ... </div>
        rows[2][3] = "2010";	// Requires: <div id="T23" class="tab-body">  ... </div>
        rows[2][4] = "2009";	// Requires: <div id="T24" class="tab-body">  ... </div>
        rows[2][5] = "2008";	//nuevo//    <div id="T25" class="tab-body">  ... </div>
        rows[2][6] = "2007";   //nuevo//    <div id="T26" class="tab-body">  ... </div>

        /* No cambies nada a partir de aqui */

        var NS4 = (document.layers) ? 1 : 0;
        var IE = (document.all) ? 1 : 0;
        var DOM = 0;
        if (parseInt(navigator.appVersion) >=5) {DOM=1};

        var lastHeader;
        var currShow;

        function changeCont(tgt,header) {

            target=('T' +tgt);

            if (DOM) {

                // Esconde el ultimo y cambia el color de la pestaña al valor original
                currShow.style.visibility="hidden";
                if ( lastHeader ) {
                    lastHeader.style.background = tab_off;
                    lastHeader.style.fontWeight="normal";
                }

                // Muestra este y cambia el color de la pestaña a color de seleccionada
                var flipOn = document.getElementById(target);
                flipOn.style.visibility="visible";

                var thisTab = document.getElementById(header);
                thisTab.style.background = tab_on;
                thisTab.style.fontWeight = "bolder";

                // Guarda para la proxima vez
                currShow=document.getElementById(target);
                lastHeader = document.getElementById(header);

                return false;
            }

            else if (IE) {

                // Esconde el ultimo y cambia el color de la pestaña al valor original
                currShow.style.visibility = 'hidden';
                if (lastHeader) {
                    lastHeader.style.background = tab_off;
                    lastHeader.style.fontWeight="normal";
                }

                // Muestra este y cambia el color de la pestaña a color de seleccionada
                document.all[target].style.visibility = 'visible';
                document.all[header].style.background = tab_on;
                document.all[header].style.fontWeight = 'bold';

                // Guarda para la proxima vez
                currShow=document.all[target];
                lastHeader=document.all[header];

                return false;
            }

            else if (NS4) {

                // Esconde el ultimo y cambia el color de la pestaña al valor original
                currShow.visibility = 'hide';
                // if (lastHeader) { lastHeader.bgColor = tab_off; }

                // Muestra este y cambia el color de la pestaña a color de seleccionada
                document.layers[target].visibility = 'show';
                // document.layers[header].bgColor  = tab_on;

                // Guarda para la proxima vez
                currShow=document.layers[target];
                // lastHeader=document.layers[header];

                return false;
            }

            // && (version >=4)
            else {
                window.location=('#A' +target);
                return true;
            }


        }

        function DrawTabs() {

            var output = '';

            for ( var x = 1; x <= num_rows; x++ ) {

                if( x > 1 ) {
                    top = top + 20;
                    left = left - 15;
                    width = width + 15;
                }

                output += '<div id="tabstop" style="position:static; ';
                output += 'left:' + left + 'px;';
                output += 'top:' + top + 'px; ';
                output += 'width:' + width + 'px; z-index:1;">\n';
                output += '<table border="0" cellpadding="0" cellspacing="1">\n';
                output += '<tr valign="top">\n';

                for ( var z = 1; z < rows[x].length; z++ ) {

                    var tid = "tab" + x + z;
                    var did = x + z;
                    output += '<td id="' + tid +'" class="tab-button"><a href="#" onClick="changeCont(\'' + x + z + '\', \'' + tid + '\'); return false;" onFocus="if(this.blur)this.blur()">' + rows[x][z] + '</a></td>\n';
                }

                output += '</tr>\n';
                output += '</table>\n';
                output += '</div>\n\n';

            }

            self.document.write(output);

        }


        function IniciaTabs() {

            if (DOM) { currShow=document.getElementById('T21');}
            else if (IE) { currShow=document.all['T21'];}
            else if (NS4) { currShow=document.layers["T21"];};
            changeCont("21", "tab21");

        }

        window.onload = IniciaTabs;
        if (document.captureEvents) {			//N4 requiere invocar la funcion captureEvents
            document.captureEvents(Event.LOAD)
        }



    </script>


    <style TYPE="text/css">

        /*
         +-------------------------------------------------------------------------------------+
         |                                                                                     |
         | DHTML Tabsets                                                                       |
         | Copyright and Legal Notices:                                                        |
         |                                                                                     |
         |   All source code, images, programs, files included in this distribution            |
         |   Copyright (c) 1996,1997,1998,1999,2000                                            |
         |                                                                                     |
         |          John C. Cokos  iWeb, Inc.                                                  |
         |          All Rights Reserved.                                                       |
         |                                                                                     |
         |   Web: http://www.iwebsoftware.com      Email: info@iwebsoftware.com                |
         |                                                                                     |
         +-------------------------------------------------------------------------------------+
            **
               Original Tabset Scripts were obtained from another source.  Cannot remember
               where I got them from.  I've manipulated the daylights out of it, to make it
               work in all browsers, and behave the way that I wanted it to.   If you are,
               or if you know the originater, please email me at the address noted above, and
               I will be happy to change the copyright notices herein to include you as
               the original source.
            **
               Traduccion: Iván Nieto Pérez
               El Código - http://www.elcodigo.com
            **
        */


        /*
            Modifica la siguiente hoja de estilos como desees para conseguir el diseño deseado
            y el esquema de colores que mas te guste. Observar que para cada definicion de pestaña
            debes tambien cambiar el atributo "width" para que encaje con el diseño
        */

        .tab-button	 {
            width: 60px;
            height: 20px;
            font-weight: normal;
            cursor: hand;
            padding-top: 2px;
            padding: 3px;

        }
        .tab-button a  {
            text-decoration:none;
            margin-left:0px;
            font-size:12px;

        }

        .tab-body	{

            border-top: 0px solid buttonhighlight;
            border-left: 0px solid buttonhighlight;
            border-bottom: 0px solid buttonshadow;
            border-right: 0px solid buttonshadow;
            border-style: ridge;
            padding: 10;
            position: absolute;
            float:left
                left:323px;
            top: 420px;
            width:502px;
            z-index:1;
            visibility: hidden;
        }
        /*Modificar el LOAD*/
        #enlaces li a{
            /*font-weight:bold;*/
            font-size:11px;
            text-decoration:none;
            margin-top: 50px;
            margin:5px;
        }
        #enlaces li a:hover{
            text-decoration:none;
            color:#999;
        }

        #contenido{

            clear:both;
        }
        #contenido p a{
            text-decoration:none;
        }
        /*para el script del load*/
        .normal{
            font-weight:bold;
        }
        .elegido{
            font-weight:bold;
        }
        #down{
            padding-bottom:150px;

        }

    </style>

</head>

<body id="body">

    <div class="content" style="width: 1050px" >

        <div class="header" id="header">
        <!-- <img alt="" width="256" height="84" class="logo_img" /> -->
            <div class="logo_img"><img src="/images/logo.jpg" alt="" width="256" height="84" class="logo_img" /></div>

        </div>
        <h3 style="width: 80%">  <div style="margin-left: 95%;">

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
    var miDivv = document.getElementById('right_articles1');
    var miDivvv = document.getElementById('right_articles2');
    var miDivvvv = document.getElementById('right_articles3');
    // Vaciamos el DIV
    miDiv.innerHTML = '';
    miDivv.innerHTML = '';
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



     for (i = 0; i < xml.getElementsByTagName('usuarioo').length; i++){
      // Accedemos al objeto XML usuario
      var item = xml.getElementsByTagName('usuarioo')[i];
      // Recojemos el id
      var id = item.getElementsByTagName('id')[0].firstChild.data;
      // Recojemos el nombre
      var nombre = item.getElementsByTagName('nombre')[0].firstChild.data;
      var color = item.getElementsByTagName('color')[0].firstChild.data;
      // Mostramos el enlace
      miDivv.innerHTML += '<ul id="enlaces"><div style="margin-top: 10px;width: 150px;margin-left:-10px;"><a href='+id+' id='+id+' style="color:'+color+'">'+nombre+'</a></div></ul>';
    }



      for (i = 0; i < xml.getElementsByTagName('usuariooo').length; i++){
      // Accedemos al objeto XML usuario
      var item = xml.getElementsByTagName('usuariooo')[i];
      // Recojemos el id
      var id = item.getElementsByTagName('id')[0].firstChild.data;
      // Recojemos el nombre
      var nombre = item.getElementsByTagName('nombre')[0].firstChild.data;
      var color = item.getElementsByTagName('color')[0].firstChild.data;
      // Mostramos el enlace
      miDivvv.innerHTML += '<ul id="enlaces"><div style="margin-top: 10px;margin-left:-10px"><a href='+id+' id='+id+' style="color:'+color+';width: 100%">'+nombre+'</a></div></ul>';
    }



      for (i = 0; i < xml.getElementsByTagName('usuarioooo').length; i++){
      // Accedemos al objeto XML usuario
      var item = xml.getElementsByTagName('usuarioooo')[i];
      // Recojemos el id
      var id = item.getElementsByTagName('id')[0].firstChild.data;
      // Recojemos el nombre
      var nombre = item.getElementsByTagName('nombre')[0].firstChild.data;
      var color = item.getElementsByTagName('color')[0].firstChild.data;
      // Mostramos el enlace
      miDivvvv.innerHTML += '<ul id="enlaces"><div style="margin-top: 10px;margin-left:-10px"><a href='+id+' id='+id+' style="color:'+color+';width: 100%">'+nombre+'</a></div></ul>';
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
</script>

        <div style="width: 100%">
        <ul id="menu" >
           
        </ul>
            </div>
        <div class="right"> <!-- Capa right -->
            <h3 style="height: 0px;background-image: url(/images/fondo.png);width: 100%"> <p style="margin-top: -8px;width: 20px">Home</p></h3>
        </div>
        <div>

            <div class="left">

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

                <div style="width: 20px">
                   <div id="accordion" style="width: 180px; margin-top: -12px;">

                        <h3><a href="#" style="color: black">Gestionar objetos</a></h3>
                        <div class="right_articles" >
                            <div id="right_articles1" ></div>
                        </div>

                        <h3><a href="#" style="color: black">Gestionar atributos</a></h3>
                        <div class="right_articles" >
                         <div id="right_articles2" ></div>
                        </div>

                        <h3><a href="#" style="color: black">Consultas</a></h3>
                        <div class="right_articles" >
                          <div id="right_articles3" ></div>
                        </div>



                    </div>
                    
                </div>
                <div id="contenido" style=" margin-left:200px;height: 355px;margin-top: -385px;width: 500px;">

                    <form id="form_lo" name="form" onsubmit="return validarinsertarusuario()"  method="post">
                        <strong style="color: black;font-size:12px">Insertar Jefes de las Vicedirecciones</strong>

                        <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px"></div>
                        <table  width="100%" border="2" style=" border: 1px solid #000;
                                border-collapse: collapse;
                                padding: 0.3em;
                                caption-side: bottom;margin-top: 10px;">
                            <tr>
                                <td colspan="2" style="background-image: url(/images/fondo.png);;border:0px"><strong style="color: white;font-size: 12px">Datos del usuario </strong></td>
                            </tr>
                            <tr>
                                <td><strong style="font-size:12px;">Usuario</strong></td>
                                <td><input type="text" name="usuario" id="usuario" style="width: 98%;"/></td>
                            </tr>
                            <tr>
                                <td><strong style="font-size:12px;">Contrase&ntilde;a</strong></td>
                                <td><input type="password" name="contrasena" id="contrasena" style="width: 98%;"/></td>
                            </tr>
                            <tr>
                                <td><strong style="font-size:12px;">Confirmar contrase&ntilde;a</strong></td>
                                <td><input type="password" name="confirmarcontrasena" id="confirmarcontrasena" style="width: 98%;"/></td>
                            </tr>

                            <tr>
                                <td><strong style="font-size:12px;">Departamento</strong></td>
                                <td>
                                    <select id="opciones" name="opciones" style="width: 100%;">

                                        <?php
                                        include_once '../modelo/ModeloLog.php';

                                        $departamento = $_SESSION['departamento'];
                                        $admin = $_SESSION['administrador'];

                                        if (($admin == 'Administrador') || ($admin == 'Super administrador')) {

                                            echo "<option>$departamento</option>";
                                        } else {
                                            $obj = new ModeloLog();
                                            $mostrar = $obj->mostrar_departamentos();
                                            foreach ($mostrar as $i) {
                                                $depa = utf8_decode($i->nombredepartamento);
                                                echo "<option>$depa</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td><strong style="font-size:12px;">Vicedireccion</strong></td>
                                <td>
                                    <select id="opcionesprivilegios" name="opcionesprivilegios" style="width: 100%;">
                                        <?php
                                        include_once '../modelo/ModeloLog.php';
                                $extract = extract($_GET);
                                $obj = new ModeloLog();
                                $mostrar = $obj->mostrar_vicedirecciones();
                                echo "<option>Seleccionar</option>";
                                foreach ($mostrar as $i) {
                                    $depa = utf8_decode($i->nombrevicedirecciones);
                                    echo "<option>$depa</option>";
                                }?>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="button" name="registrar" value="Registrar" onclick="validarinsertarusuario()"/>
                                    <input type="reset" name="resetear" value="Resetear"  /></td>
                            </tr>
                        </table>

                        <div id="error"></div>
                    </form>

                </div>
            </div>

        </div>

        <div class="right" style="margin-top: 10px;background-color: blueviolet"> <!-- Capa right -->

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

