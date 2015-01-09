<?php
session_start();
$depa = utf8_decode($_SESSION['departamento']);
$infor = 'Informática';
$infor = utf8_decode($infor);
if (!isset($_SESSION['usuario']) || ($depa != $infor) || ($_SESSION['administrador'] == "Invitado")) {
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
    <script language="javascript" type="text/javascript">
        function validarmodificaresta(){
       var radioestacionasignar=null;
            $('input[name="radio"]:checked').each(function() {
              radioestacionasignar=document.getElementById($(this).val());});

   

            if(radioestacionasignar==null){
                document.getElementById("mensajee").style.visibility="visible";
                setTimeout("borrarr()",2000);
                return false;
               
               
            }
           
            
                var url="../controladores/controladorModificarEstacion.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificarestacion").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#header").html(data); // show response from the php script.
                    }
                });

                setTimeout("borrar()",2000);

            }

              function isstringKeyy(){
   
        }


            function validareliminaresta() {

         var radioestacionasignar=null;
            $('input[name="radio"]:checked').each(function() {
              radioestacionasignar=document.getElementById($(this).val());});



            if(radioestacionasignar==null){
                document.getElementById("mensajee").style.visibility="visible";
                setTimeout("borrarr()",2000);
                radioestacionasignar=null;
                return false;


            }
var url = "../controladores/controladorEliminarEstacion.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificarestacion").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            });
radioestacionasignar=null;
            setTimeout("borrar()",3000);
          setTimeout("actualizarselect()",3000);
        }
        function borrar(){
            document.getElementById('mensaje').style.visibility='hidden';
            history.go(0);
            actualizar();
        }
        function borrarr(){
            document.getElementById('mensajee').style.visibility='hidden';

        }
 function actualizar(){
             var url = "../controladores/controladorMostrarEstacion.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificarestacion").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#estaciones").html(data); // show response from the php script.
                }
            });
        }


    </script>
    <script>

        $(document).ready(function(){
            oXML = AJAXCrearObjeto();
oXML.open('get', '../xml/menuprincipal.xml');
oXML.onreadystatechange = leerDatos;
oXML.send('');
            var url = "../controladores/controladorMostrarEstacion.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificarestacion").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#estaciones").html(data); // show response from the php script.
                }
            });
            $("#resetear").click(function(){
                var url = "../controladores/controladorMostrarEstacion.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificarestacion").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#estaciones").html(data); // show response from the php script.
                    }
                });});

            $("#opcionesestaciones").click(function(){
                var url = "../controladores/controladorMostrarEstacion.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificarestacion").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#estaciones").html(data); // show response from the php script.
                    }
                });



            });


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

   function  validarDatosEstacionn(){

            var url = "../controladores/controladorEstacion.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificarestacion").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#header").html(data); // show response from the php script.
                    }
                });




            setTimeout("borrar()",3000);

    }
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

<body>

    <div class="content" style="width: 1050px" >

        <div class="header" id="header">
           <p style='color:red;margin-left: 450px;visibility: hidden' id='mensajee'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Seleccione una estacion</strong></p>
        <!-- <img alt="" width="256" height="84" class="logo_img" /> -->
           <div class="logo_img" style="margin-top: -26px"><img src="/images/logo.jpg" alt="" width="256" height="84" class="logo_img" /></div>

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
                <div id="contenido" style=" margin-left:200px;height: 370px;margin-top: -480px;width: 810px;">

                    <!--                    <div id="registrarobjetos" style="visibility: visible">
                                        <a id="registrardepa" href="#" style="margin-left: 50px;font-size:larger">Registrar Departamento</a>
                        <a  id="registraresta" href="#" style="margin-left: 20px;font-size:larger">Registrar Estacion</a>

                    <a id="registrarcompo" href="#"style="margin-left: 20px;font-size:larger" >Registrar Componente</a>

                    </div>-->

                    <form id="formulariomodificarestacion" style="visibility: visible;" name="formulariomodificarestacion"  onsubmit="return validarmodificaresta()">
                        <div id="divasignara" style="margin-top: 80px">
                            <strong style="color: black;font-size:12px">Gestionar Estaci&oacute;n</strong>

                            <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px"></div>
                            <div style="margin-top: 10px">
                                <strong style="font-size:12px;">Departamento:</strong>

                                <select id="opcionesestaciones" name="opcionesestaciones" style="width: 24.5%;">
                                    <option>Seleccionar</option>
                                    <?php
                                    include_once '../modelo/ModeloLog.php';
                                    $extract = extract($_GET);
                                    $obj = new ModeloLog();
                                    $mostrar = $obj->mostrar_departamentos();
                                    foreach ($mostrar as $i) {
                                        $depa = utf8_decode($i->nombredepartamento);
                                        echo "<option>$depa</option>";
                                    }
                                    ?>
                                </select>

                            </div>

                        </div>
                        <div id="estacionesasignarfila1" style="height: 150px;width:102%;margin-top: 5px">


                            <strong>Estaciones de trabajos:</strong>
                            <table width='840px' border='1' style=' border: 1px solid #000;
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;margin-left: 0px;'>
                                 <tr style='background-image: url(/images/fondo.png)'>
                                    <td style='width: 69px'><strong style='font-size:12px;color:white;'>Seleccionar</strong></td>
                                    <td style='width: 200px'><strong style='font-size:12px;color:white'>Nombre Estaci&oacute;n</strong></td>
                                    <td style='width: 200px'><strong style='font-size:12px;color:white'>Ubicaci&oacute;n</strong></td>
                                    <td style='width: 200px'><strong style='font-size:12px;color:white'>Trabajador</strong></td>
                                    <td style='width: 200px'><strong style='font-size:12px;color:white'>Departamento</strong></td>
                                </tr>

                            </table>
<div  id="estaciones" style="margin-top: 0px;overflow-y: scroll;height: 220px;width: 103.6%"></div>





                        </div>
                         
                        
                        <div id="error" style="margin-top: 120px;">
                            <strong style="color: red;margin-left: 0px;">Atributos de la estacion ha insertar o modificar</strong>


                        </div>
                        <div style="width: 900px">

                            <strong style="font-size: 12px;margin-left: 0px">Nombre:</strong>
                            <input type='text' name='nombremodificar'id='nombremodificar' style="margin-top: 10px; width: 115px" onkeypress="return isstringKeyy()"  />
                            <strong style="font-size: 12px;margin-left: 10px">Ubicacion:</strong>
                                   <select id="ubicacionmodificar" name="ubicacionmodificar" style="width: 15%;">

<?php
                                include_once '../modelo/ModeloLog.php';
                                $extract = extract($_GET);
                                $obj = new ModeloLog();
                                $mostrar = $obj->mostrar_ubicacion();
                                echo "<option>Seleccionar</option>";
                                foreach ($mostrar as $i) {
                                    $ubicacion = utf8_decode($i->nombreubicacion);
                                    echo "<option>$ubicacion</option>";
                                }
?>
                                    </select>
                            
                            <strong style="font-size: 12px;margin-left: 10px">Trabajador:</strong>
                            <input type='text' name='trabajadormodificar'id='trabajadormodificar' style="margin-top: 10px; width: 115px"  />


                            <strong style="font-size: 12px;margin-left: 12px">Departamento:</strong>
                            <select name="departamentomodificar" id="departamentomodificar"  style="width: 120px;margin-top: 0px">
                                <option>Seleccionar</option>
                                <?php
                                    include_once '../modelo/ModeloLog.php';
                                    $extract = extract($_GET);
                                    $obj = new ModeloLog();
                                    $mostrar = $obj->mostrar_departamentos();

                                    foreach ($mostrar as $i) {
                                        $depa = utf8_decode($i->nombredepartamento);
                                        echo "<option>$depa</option>";
                                    }
                                ?>
                            </select>
                        </div>


                        <div style="width: 900px">
                           
                            <div id='iddiv' style="margin-left: 620px;margin-top: 5px"><strong><a id='agregaruser' onclick="validarDatosEstacionn()" style='margin-left:10px 'href='#'><img src='/images/agregar.jpg' alt='' width='15px' height='15px'/>Agregar</a></strong><strong style='font-size:12px;margin-top: 10px'><td style='width: 144px'><a id='eliminaruser'onclick="validareliminaresta()" style='margin-left:15px 'href='#'><img src='/images/eliminar.jpg' alt='' width='15px' height='15px'/>Eliminar</a><a id="modificaruser" onclick="validarmodificaresta()" style='margin-left:10px 'href='#'><img src='/images/modificar.jpg' alt='' width='15px' height='15px' />Modificar</a></td></strong>

                        </div>

                        </div>
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
