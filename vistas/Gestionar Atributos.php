<?php
session_start();
$infor = 'Informática';
$depa = utf8_decode($_SESSION['departamento']);
$infor = utf8_decode($infor);
if (!isset($_SESSION['usuario']) || ($depa != $infor) || ($_SESSION['administrador'] == "Invitado")) {
    echo '<script language="javascript" type="text/javascript">
            alert("Usted no puede acceder a esta area")
history.go(-1);
</script>';
    exit ();
}
$_SESSION['ultimapagina'] = 'http://localhost/vistas/informatica.php';
?>
<head>
    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>


    <script>
        $(document).ready(function(){
             oXML = AJAXCrearObjeto();
oXML.open('get', '../xml/menuprincipal.xml');
oXML.onreadystatechange = leerDatos;
oXML.send('');
            $("#registrarAtributosdeComponentes").click(function(){
                document.getElementById("atributosMarca").style.visibility="visible";
                document.getElementById("atributosTipo").style.visibility="visible";
                document.getElementById("atributosEstado").style.visibility="visible";
                document.getElementById("divareadepartamento").style.visibility="hidden";
            });

            //            $("#atributodepartamento").click(function(){
            //                document.getElementById("divareadepartamento").style.visibility="visible";
            //               document.getElementById("atributosMarca").style.visibility="hidden";
            //                document.getElementById("atributosTipo").style.visibility="hidden";
            //                 document.getElementById("atributosEstado").style.visibility="hidden";
            //                 document.getElementById("tablamarca").style.visibility="hidden";
            //                 document.getElementById("tablatipo").style.visibility="hidden";
            //                 document.getElementById("tablaestado").style.visibility="hidden";
            //            })
            $("#atributoMarca").click(function(){
                if($("#atributoMarca").is(':checked')){
                    document.getElementById("tablamarca").style.visibility="visible";

                    document.getElementById("atributosTipo").style.marginTop="10px";
                }else{ document.getElementById("tablamarca").style.visibility="hidden";
                    document.getElementById("atributosTipo").style.marginTop="-73px";
                }
            })
            $("#agregaruser").click(function(){
            setTimeout("validarAdicionarAtributos()",1);
        })
            $("#eliminaruser").click(function(){
            setTimeout("eliminarAtributos()",1);
        })
            $("#tipoatributo").click(function(){
                if(document.getElementById("tipoatributo").value=='Computadora'){
                    document.getElementById("divatributospc").style.visibility="visible";
                    document.getElementById("atributosMarca").style.visibility="hidden";
                }else{
                    document.getElementById("divatributospc").style.visibility="hidden";
                    document.getElementById("atributosMarca").style.visibility="visible";
                }
            })

            $("#atributoTipo").click(function(){
                if($("#atributoTipo").is(':checked')){
                    document.getElementById("tablatipo").style.visibility="visible";

                    document.getElementById("atributosEstado").style.marginTop="10px";
                }else{ document.getElementById("tablatipo").style.visibility="hidden";
                    document.getElementById("atributosEstado").style.marginTop="-72px";
                }
            })
            $("#atributoEstado").click(function(){
                if($("#atributoEstado").is(':checked')){
                    document.getElementById("tablaestado").style.visibility="visible";


                }else{ document.getElementById("tablaestado").style.visibility="hidden";
   
                }
            });
        });
        function validarAdicionarAtributos(){
                  
            if(document.getElementById('tipoatributo').value=='Generales'){
                var url = "../controladores/controladorAdicionarAtributos.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formadicionaratrib").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#header").html(data); // show response from the php script.
                    }
                });}else{
                var url = "../controladores/controladorAdicionarAtributosComputadora.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formadicionaratrib").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#header").html(data); // show response from the php script.
                    }
                });

            }

            setTimeout("borrar()",3000);
               
        }
        function eliminarAtributos(){
            var url = "../controladores/controladorEliminarAtributosComputadora.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formadicionaratrib").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            });

            setTimeout("borrar()",3000);
    
        }
        function borrar(){
            document.getElementById('mensaje').style.visibility='hidden';
 history.go(0);
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
<body style="width: 100%">
    <div class="content" style="width: 1050px" >
        <div class="header" id="header" >
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
                <div id="contenido" style="height: 370px;margin-top: -400px;">
<strong style="color: black;font-size:12px;margin-left: 200px">Gestionar Atributos</strong>

                    <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px;margin-left: 200px"></div>

                    <form style="margin-left: 190px;margin-top: 10px" id="formadicionaratrib" name="formadicionaratrib" onsubmit="return validarAdicionarAtributos()"  >

                        <strong style="margin-left: 30px;margin-top: 10px">Atributos:</strong>
                        <select id="tipoatributo" name="tipoatributo" style="width: 15%;margin-top: -20px;margin-left: 0%">

                            <option>Generales</option>
                            <option>Computadora</option>
                        </select>
                        
                       





                        <div style="visibility:visible;margin-top: 10px;margin-left: 30px" id="atributosMarca" >
                            <div style="width: 100%">
                                <table id="tablamarca" width="15%" border="1" style=" border: 1px solid #000;
                                       border-collapse: collapse;
                                       padding: 0.3em;
                                       caption-side: bottom">
                                    <tr>
                                        <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Adicionar Marca</strong></td>
                                    </tr>
                                    <tr>
<!--                                        <td style="width: 43px"><strong style="font-size:12px;">Marca</strong></td>
                                        -->
                                        <td><input type="text" name="nombremarca" id="nombremarca" style="width:100%;" placeholder="Nueva marca"/></td>
                                    </tr>
                                    <tr >


                                    </tr>
                                </table>
<!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                            border-collapse: collapse;
                                            padding: 0.3em;
                                            caption-side: bottom;">
                                        <tr>
                                            <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                        </tr></table>-->

                                <div id="aca" style='overflow-y: scroll;height: 269px;width: 15%;border-color: black;border-right-color: black' >
                                    <?php
                                     include_once '../modelo/ModeloLog.php';
                                    $objregistrarrr = new ModeloLog();

                                    $mostrar = $objregistrarrr->mostrar_marca_de_todos_componentes();

                                    foreach ($mostrar as $i) {
                                        $marca = utf8_decode($i->nombremarca);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                        echo "<p><input id='inputvincular$marca' type='checkbox' value='$marca' name='marcageneral[]'>$marca</p>";
//
                                    }
                                    ?>
                                    <div id="todaslasmarcasdecomponentes"></div>


                                </div>

                            </div>

                         <!--                            <input type="checkbox" id="atributoMarca"><strong>Adicionar Marca</strong>-->

                            <!--                        </div>-->
                            <!--                        <div style="margin-left: -140px;visibility: visible;margin-top: -73px" id="atributosTipo">-->
                            <!--                            <input type="checkbox" id="atributoTipo"><strong>Adicionar Tipo</strong>-->


                            <!--                        </div>
                                                    <div style="margin-left: -140px;visibility: visible;margin-top: -72px" id="atributosEstado">-->
                            <!--                            <input type="checkbox" id="atributoEstado"><strong>Adicionar Estado</strong>-->


                            <div style="margin-top: -314px;margin-left: 145px;width: 100%">
                                <table id="tablatipo" width="15%" border="2" style=" border: 1px solid #000;
                                       border-collapse: collapse;
                                       padding: 0.3em;
                                       caption-side: bottom">
                                    <tr>
                                        <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Adicionar Tipo</strong></td>
                                    </tr>
                                    <tr>

                                        <td><input type="text" name="nombretipo" id="nombretipo" style="width:100%;" placeholder="Nuevo tipo"/></td>
                                    </tr>
                                    <tr >


                                    </tr>
                                </table>
    <!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                            <tr>
                                                <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                            </tr></table>-->

                                <div>
                                    <table  width="15%" border="2" style=" border: 1px solid #000;
                                            border-collapse: collapse;
                                            padding: 0.3em;
                                            caption-side: bottom;">
                                    </table>

                                    <div id="aca" style='overflow-y: scroll;height: 269px;width: 15%;border-color: black;border-right-color: black' >
                                        <?php
                                        $objregistrarrr = new ModeloLog();

                                        $mostrar = $objregistrarrr->mostrar_tipo_de_componente();

                                        foreach ($mostrar as $i) {
                                            $tipo = utf8_decode($i->nombretipoobjeto);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                            echo "<p><input id='inputvincular$tipo' type='checkbox' value='$tipo' name='tipogeneral[]'>$tipo</p>";
//
                                        }
                                        ?>
                                        <div id="todaslasmarcasdecomponentes"></div>

                                    </div>
                                </div>

                            </div>





















                            <div style="margin-top: -314px;margin-left: 290px;width: 100%">
                                <table id="tablatipo" width="15%" border="2" style=" border: 1px solid #000;
                                       border-collapse: collapse;
                                       padding: 0.3em;
                                       caption-side: bottom">
                                    <tr>
                                        <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Adicionar Estado</strong></td>
                                    </tr>
                                    <tr>

                                        <td><input type="text" name="nombreestado" id="nombreestado" style="width:100%;" placeholder="Nuevo estado"/></td>
                                    </tr>
                                    <tr >


                                    </tr>

                                </table>
<!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                            border-collapse: collapse;
                                            padding: 0.3em;
                                            caption-side: bottom;">
                                        <tr>
                                            <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                        </tr></table>-->

                                <div>
                                    <table  width="18%" border="2" style=" border: 1px solid #000;
                                            border-collapse: collapse;
                                            padding: 0.3em;
                                            caption-side: bottom;">
                                    </table>

                                    <div id="aca" style='overflow-y: scroll;height: 269px;width: 15%;border-color: black;border-right-color: black' >
                                        <?php
                                        $objregistrarrr = new ModeloLog();

                                        $mostrar = $objregistrarrr->mostrar_estados();

                                        foreach ($mostrar as $i) {
                                            $estado = utf8_decode($i->nombreestado);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                            echo "<p><input id='inputvincular$estado' type='checkbox' value='$estado' name='estadogeneral[]'>$estado</p>";
//
                                        }
                                        ?>
                                        <div id="todaslasmarcasdecomponentes"></div>

                                    </div>
                                </div>

                            </div>










                            <div id="divatributospc" style="margin-top: -100px;margin-left: -48.5%;visibility: hidden">

                                <div style="margin-top: -314px;margin-left: 404px;">
                                    <table id="tablatipopc" width="15%" border="2" style=" border: 1px solid #000;
                                           border-collapse: collapse;
                                           padding: 0.3em;
                                           caption-side: bottom">
                                        <tr>
                                            <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Tipo CPU</strong></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text" name="nombretipocpu" id="nombretipocpu" style="width:100%;" placeholder="Nuevo tipo"/></td>
                                        </tr>
                                        <tr >


                                        </tr>

                                    </table>
    <!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                            <tr>
                                                <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                            </tr></table>-->

                                    <div>
                                        <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                        </table>

                                        <div id="aca" style='overflow-y: scroll;height: 269px;width: 15%;border-color: black;border-right-color: black' >
                                            <?php
                                            $objregistrarrrr = new ModeloLog();

                                            $mostrar = $objregistrarrrr->mostrar_tipocpu();

                                            foreach ($mostrar as $i) {
                                                $tipocpu = utf8_decode($i->nombretipocpu);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                                echo "<p><input id='inputvincular$tipocpu' type='checkbox' value='$tipocpu' name='tipocpu[]'>$tipocpu</p>";
//
                                            }
                                            ?>
                                            <div id="todaslasmarcasdecomponentes"></div>

                                        </div>
                                    </div>
                                </div>




















                                <div style="margin-top: -314px;margin-left: 545px;width: 100%">
                                    <table id="tablavelocidadcpu" width="10%" border="2" style=" border: 1px solid #000;
                                           border-collapse: collapse;
                                           padding: 0.3em;
                                           caption-side: bottom">
                                        <tr>
                                            <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Velocidad CPU</strong></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text" name="nombrevelocidadcpu" id="nombrevelocidadcpu" style="width:100%;" placeholder="Nueva velocidad"/></td>
                                        </tr>
                                        <tr >


                                        </tr>

                                    </table>
    <!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                            <tr>
                                                <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                            </tr></table>-->

                                    <div>
                                        <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                        </table>

                                        <div id="aca" style='overflow-y: scroll;height: 269px;width: 10%;border-color: black;border-right-color: black' >
                                            <?php
                                            $objregistrarrr = new ModeloLog();

                                            $mostrar = $objregistrarrr->mostrar_velocidadcpu();

                                            foreach ($mostrar as $i) {
                                                $velocidadcpu = utf8_decode($i->nombrevelocidadcpu);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                                echo "<p><input id='inputvincular$velocidadcpu' type='checkbox' value='$velocidadcpu' name='velocidadcpu[]'>$velocidadcpu</p>";
//
                                            }
                                            ?>
                                            <div id="todaslasmarcasdecomponentes"></div>

                                        </div>
                                    </div>

                                </div>

















                                <div style="margin-top: -314px;margin-left: 685px;width: 100%">
                                    <table id="tablamarcahdd" width="10%" border="2" style=" border: 1px solid #000;
                                           border-collapse: collapse;
                                           padding: 0.3em;
                                           caption-side: bottom">
                                        <tr>
                                            <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Marca HDD</strong></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text" name="nombremarcahdd" id="nombremarcahdd" style="width:100%;" placeholder="Nueva marca"/></td>
                                        </tr>
                                        <tr >


                                        </tr>

                                    </table>
    <!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                            <tr>
                                                <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                            </tr></table>-->

                                    <div>
                                        <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                        </table>

                                        <div id="aca" style='overflow-y: scroll;height: 269px;width: 10%;border-color: black;border-right-color: black' >
                                            <?php
                                            $objregistrarrr = new ModeloLog();

                                            $mostrar = $objregistrarrr->mostrar_marcahdd();

                                            foreach ($mostrar as $i) {
                                                $marcahdd = utf8_decode($i->nombremarcahdd);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                                echo "<p><input id='inputvincular$marcahdd' type='checkbox' value='$marcahdd' name='marcahdd[]'>$marcahdd</p>";
//
                                            }
                                            ?>
                                            <div id="todaslasmarcasdecomponentes"></div>

                                        </div>
                                    </div>

                                </div>



















                                <div style="margin-top: -314px;margin-left: 825px;width: 100%">
                                    <table id="tablacapacidadhdd" width="10%" border="2" style=" border: 1px solid #000;
                                           border-collapse: collapse;
                                           padding: 0.3em;
                                           caption-side: bottom">
                                        <tr>
                                            <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Capacidad HDD</strong></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text" name="nombrecapacidadhdd" id="nombrecapacidadhdd" style="width:100%;" placeholder="Nueva capacidad"/></td>
                                        </tr>
                                        <tr >


                                        </tr>

                                    </table>
    <!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                            <tr>
                                                <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                            </tr></table>-->

                                    <div>
                                        <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                        </table>

                                        <div id="aca" style='overflow-y: scroll;height: 269px;width: 10%;border-color: black;border-right-color: black' >
                                            <?php
                                            $objregistrarrr = new ModeloLog();

                                            $mostrar = $objregistrarrr->mostrar_capacidadhdd();

                                            foreach ($mostrar as $i) {
                                                $capacidadhdd = utf8_decode($i->capacidadhdd);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                                echo "<p><input id='inputvincular$capacidadhdd' type='checkbox' value='$capacidadhdd' name='capacidadhdd[]'>$capacidadhdd</p>";
//
                                            }
                                            ?>
                                            <div id="todaslasmarcasdecomponentes"></div>

                                        </div>
                                    </div>

                                </div>


















                                <div style="margin-top: -314px;margin-left: 965px;width: 100%">
                                    <table id="tablatiporam" width="10%" border="2" style=" border: 1px solid #000;
                                           border-collapse: collapse;
                                           padding: 0.3em;
                                           caption-side: bottom">
                                        <tr>
                                            <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Tipo RAM</strong></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text" name="nombretiporam" id="nombretiporam" style="width:100%;" placeholder="Nuevo tipo"/></td>
                                        </tr>
                                        <tr >


                                        </tr>

                                    </table>
    <!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                            <tr>
                                                <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                            </tr></table>-->

                                    <div>
                                        <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                        </table>

                                        <div id="aca" style='overflow-y: scroll;height: 269px;width: 10%;border-color: black;border-right-color: black' >
                                            <?php
                                            $objregistrarrr = new ModeloLog();

                                            $mostrar = $objregistrarrr->mostrar_tiporam();

                                            foreach ($mostrar as $i) {
                                                $tiporam = utf8_decode($i->nombretiporam);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                                echo "<p><input id='inputvincular$tiporam' type='checkbox' value='$tiporam' name='tiporam[]'>$tiporam</p>";
//
                                            }
                                            ?>
                                            <div id="todaslasmarcasdecomponentes"></div>

                                        </div>
                                    </div>

                                </div>


















                                <div style="margin-top: -314px;margin-left: 1105px;width: 100%">
                                    <table id="tablacapacidadram" width="10%" border="2" style=" border: 1px solid #000;
                                           border-collapse: collapse;
                                           padding: 0.3em;
                                           caption-side: bottom">
                                        <tr>
                                            <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);"><strong style="color: white;font-size: 12px">Capacidad RAM</strong></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text" name="nombrecapacidadram" id="nombrecapacidadram" style="width:100%;" placeholder="Nueva capacidad"/></td>
                                        </tr>
                                        <tr >


                                        </tr>

                                    </table>
    <!--                                    <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                            <tr>
                                                <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 150px"><strong style="color: white;font-size:12px">Marcas Insertadas</strong></td>
                                            </tr></table>-->

                                    <div>
                                        <table  width="150px" border="2" style=" border: 1px solid #000;
                                                border-collapse: collapse;
                                                padding: 0.3em;
                                                caption-side: bottom;">
                                        </table>

                                        <div id="aca" style='overflow-y: scroll;height: 269px;width: 10%;border-color: black;border-right-color: black' >
                                            <?php
                                            $objregistrarrr = new ModeloLog();

                                            $mostrar = $objregistrarrr->mostrar_capacidadram();

                                            foreach ($mostrar as $i) {
                                                $capacidadram = utf8_decode($i->capacidadram);
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
// echo "<p>$i->nombredepartamento</p>";
                                                echo "<p><input id='inputvincular$capacidadram' type='checkbox' value='$capacidadram' name='capacidadram[]'>$capacidadram</p>";
//
                                            }
                                            ?>
                                            <div id="todaslasmarcasdecomponentes"></div>

                                        </div>
                                    </div>

                                </div>


                            </div>

























                        </div>
                        <div id='iddiv' style="margin-left: 710px;width: 800px;margin-top: 10px"><strong><a id='agregaruser'style='margin-left:10px 'href='#'><img src='/images/agregar.jpg' alt='' width='15px' height='15px'/>Agregar</a></strong><strong style='font-size:12px;margin-top: 10px'><td style='width: 144px'><a id='eliminaruser'onclick="validareliminaruser()" style='margin-left:15px 'href='#'><img src='/images/eliminar.jpg' alt='' width='15px' height='15px'/>Eliminar</a><td></strong>

                        </div>

                        <!--                        </div>-->
                        <!--                        <div style="margin-left: -140px;visibility: visible;margin-top: -73px" id="atributosTipo">-->
                        <!--                            <input type="checkbox" id="atributoTipo"><strong>Adicionar Tipo</strong>-->




                    </form>

                </div>
            </div>
        </div>
        <div class="right" style="margin-top: 10px;background-color: blueviolet"> <!-- Capa right -->
        </div>
        <div class="footer" style="margin-top: -42px;background-color:slategray;" >
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




