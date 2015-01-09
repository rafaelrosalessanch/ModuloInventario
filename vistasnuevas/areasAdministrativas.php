<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '<script language="javascript" type="text/javascript">
            alert("Usted no puede acceder a esta area")
history.go(-1);
</script>';
    exit ();
}
$_SESSION['ultimapagina'] = 'http://localhost/vistas/informatica.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>


    <script>
        $(document).ready(function(){
                 var url = "../controladores/controladorMostrarEsta_1.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formreportes").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#aca").html(data); // show response from the php script.
                }
            })
        
 if(document.getElementById('tipocomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverdepartamentos').value!="Todos"||document.getElementById('marcacomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverestado').value!="Seleccionar"){
                    document.getElementById('resetear').style.visibility='visible';
                }else{
                    document.getElementById('resetear').style.visibility='hidden';
                }
            var url = "controladorReportes_1.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formreportes").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#reporte").html(data); // show response from the php script.
                }
            })

            $("#tipocomponenteregistrar").click(function(){
               if(document.getElementById('tipocomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverdepartamentos').value!="Todos"||document.getElementById('marcacomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverestado').value!="Seleccionar"){
                    document.getElementById('resetear').style.visibility='visible';
                }else{
                    document.getElementById('resetear').style.visibility='hidden';
                }

               
                    var url = "controladorReportes.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formreportes").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#reporte").html(data); // show response from the php script.
                        }
                    });
                   
                
//                var url = "../controladores/controladorMostrarEsta_1_1.php"; // the script where you handle the form input.
//                $.ajax({
//                    type: "POST",
//                    url: url,
//                    data: $("#formreportes").serialize(), // serializes the form's elements.
//                    success: function(data)
//                    {
//                        $("#aca").html(data); // show response from the php script.
//                    }
//                })


            })




            $("#opcionesverdepartamentos").click(function(){

if(document.getElementById('tipocomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverdepartamentos').value!="Todos"||document.getElementById('marcacomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverestado').value!="Seleccionar"){
                    document.getElementById('resetear').style.visibility='visible';
                }else{
                    document.getElementById('resetear').style.visibility='hidden';
                }
                var url = "controladorReportes.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formreportes").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#reporte").html(data); // show response from the php script.
                        }
                    });


                var url = "../controladores/controladorMostrarEsta_1_1.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formreportes").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#aca").html(data); // show response from the php script.
                    }
                })

//                var url = "../controladores/controladorPreportes.php"; // the script where you handle the form input.
//                $.ajax({
//                    type: "POST",
//                    url: url,
//                    data: $("#formreportes").serialize(), // serializes the form's elements.
//                    success: function(data)
//                    {
//                        $("#prportes").html(data); // show response from the php script.
//                    }
//                })

            })



            $("#marcacomponenteregistrar").click(function(){
            if(document.getElementById('tipocomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverdepartamentos').value!="Todos"||document.getElementById('marcacomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverestado').value!="Seleccionar"){
                    document.getElementById('resetear').style.visibility='visible';
                }else{
                    document.getElementById('resetear').style.visibility='hidden';
                }
                var url = "controladorReportes.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formreportes").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#reporte").html(data); // show response from the php script.
                        }
                    });


//                var url = "../controladores/controladorMostrarEsta_1_1.php"; // the script where you handle the form input.
//                $.ajax({
//                    type: "POST",
//                    url: url,
//                    data: $("#form_link").serialize(), // serializes the form's elements.
//                    success: function(data)
//                    {
//                        $("#aca").html(data); // show response from the php script.
//                    }
//                })



            })

$("#resetear").click(function(){
document.getElementById('opcionesverestado').value='Seleccionar';
                    document.getElementById("tipocomponenteregistrar").value="Seleccionar";
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                    document.getElementById("opcionesverdepartamentos").value="Todos";
                     
               
//                    history.go(0);

})

            $("#opcionesverestado").click(function(){
            if(document.getElementById('tipocomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverdepartamentos').value!="Todos"||document.getElementById('marcacomponenteregistrar').value!="Seleccionar"||document.getElementById('opcionesverestado').value!="Seleccionar"){
                    document.getElementById('resetear').style.visibility='visible';
                }else{
                    document.getElementById('resetear').style.visibility='hidden';
                }
               var url = "controladorReportes.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formreportes").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#reporte").html(data); // show response from the php script.
                        }
                    });


//                var url = "../controladores/controladorMostrarEsta_1_1.php"; // the script where you handle the form input.
//                $.ajax({
//                    type: "POST",
//                    url: url,
//                    data: $("#form_link").serialize(), // serializes the form's elements.
//                    success: function(data)
//                    {
//                        $("#aca").html(data); // show response from the php script.
//                    }
//                })

            })

            
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
        function ver(){
           
                    var url = "controladorReportes.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formreportes").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#reporte").html(data); // show response from the php script.
                        }
                    });

        }
        function verexpediente(){
            var url = "../controladores/controladorMostrarReporte.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formreportes").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            })


            setTimeout("actualizarfoto()",3000);

        }
        function exportar(){
            var text = prompt("Escriba el Tipo de listado a exportar");
            if(text==null){
                text="";}
            document.getElementById("prompt").setAttribute("value",text);

            var url = "../controladores/controladorMostrarReportee.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formreportes").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            })


            setTimeout("actualizarfoto()",100);

        }
        function actualizarfoto(){
            var url = "../controladores/controladorActualizarFoto.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#form_link").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            })
        }
        function resetear(){
     var url = "../controladores/controladorMostrarEsta_1_1.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formreportes").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#aca").html(data); // show response from the php script.
                    }
                })

                var url = "../controladores/controladorPreportes.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formreportes").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#prportes").html(data); // show response from the php script.
                    }
                })
            setTimeout("actualizarrrr()",100);

        }

        function actualizarrr(){
            var url = "../controladores/controladorActivar.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#form_link").serialize()// serializes the form's elements.

            });

        }
        function actualizarrrr(){

            history.go(0);
        }

        function impreSelecc(reporte){


            if (!confirm("Esta seguro que desea imprimir")){
                history.go(+1);return ""}
            else{
                var ficha=document.getElementById(reporte);
                var ventimp=window.open('','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();
            }}
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
        <script type="text/javascript">
            function parpadeo() {
                var imagen = document.images["parpadeante"];
                imagen.style.visibility = (imagen.style.visibility == "visible") ? "hidden" : "visible";
            }
            setInterval("parpadeo()", 500);
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

        <div style="width: 100%">
            <ul id="menu" >

            </ul>
        </div>
        <div class="right"> <!-- Capa right -->
<!--            <h3 style="height: 0px;background-image: url(/images/fondo.png);width: 100%"> <p style="margin-top: -8px;width: 20px">Home</p></h3>-->
        </div>
        <div>
            <div class="left" style="width: 80%;height: 400px">
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
                   
                </div>
                <div id="contenido" style=" margin-left:0px;height: 10px;margin-top: 0px;width:80%;">
                    <form id="formreportes">
                       
                     <div style="background-image:url(/images/fondo.png) ;width: 760px;height: 22px;margin-left: 0px;margin-top: 0px">
                                    <strong style="color: white;font-size:12px;">Filtrar por:</strong>
                                    <strong style="color: white;margin-left: 5px">Tipo:</strong>


                                    <select name="tipocomponenteregistrar" id="tipocomponenteregistrar"  style="width: 80px;margin-top: 1px">
                                        <option>Seleccionar</option>
                                        <?php
                                        include_once '../modelo/ModeloLog.php';
                                        $extract = extract($_GET);
                                        $obj = new ModeloLog();
                                        $mostrar = $obj->mostrar_tipo_de_componente();

                                        foreach ($mostrar as $i) {
                                            $tipo = utf8_decode($i->nombretipoobjeto);
                                            echo "<option>$tipo</option>";
                                        }
                                        ?>
                                    </select>

                                    <strong style="color: white;margin-left: 5px">Marca:</strong>


                                    <select name="marcacomponenteregistrar" id="marcacomponenteregistrar"  style="width: 80px;margin-top: 1px">
                                        <option>Seleccionar</option>
                                        <?php
                                        include_once '../modelo/ModeloLog.php';
                                        $extract = extract($_GET);
                                        $obj = new ModeloLog();
                                        $mostrar = $obj->mostrar_marca_de_todos_componentes();

                                        foreach ($mostrar as $i) {
                                            $tipo = utf8_decode($i->nombremarca);
                                            echo "<option>$tipo</option>";
                                        }
                                        ?>
                                        </select>
            <!--                            <strong style="color: white;margin-left: 5px">Marca:</strong>

                                        <select name="marcacomponentemodificar" id="marcacomponentemodificar"  style="width: 110px;margin-top: 1px">
                                            <option>Seleccionar</option>
                                    <?php
                                        include_once '../modelo/ModeloLog.php';
                                        $extract = extract($_GET);
                                        $obj = new ModeloLog();
                                        $mostrar = $obj->mostrar_marca_de_todos_componentes();

                                        foreach ($mostrar as $i) {
                                            $tipo = utf8_decode($i->nombremarca);
                                            echo "<option>$tipo</option>";
                                        }
                                    ?>

                                                                        </select>-->
                                    <strong style="color: white;margin-left: 5px">Estado:</strong>


                                    <select name="opcionesverestado" id="opcionesverestado"  style="width: 80px;margin-top: 1px">
                                        <option>Seleccionar</option>
                                        <?php
                                        include_once '../modelo/ModeloLog.php';
                                        $extract = extract($_GET);
                                        $obj = new ModeloLog();
                                        $mostrar = $obj->mostrar_estados();

                                        foreach ($mostrar as $i) {
                                            $tipo = utf8_decode($i->nombreestado);
                                            echo "<option>$tipo</option>";
                                        }
                                        ?>
                                    </select>

                                    <strong style="color: white;margin-left: 5px">Departamento:</strong>


                                    <select name="opcionesverdepartamentos" id="opcionesverdepartamentos"  style="width: 80px;margin-top: 1px">
                                      
                                        <option>Todos</option>
                                        <?php
                                        include_once '../modelo/ModeloLog.php';
                                        $extract = extract($_GET);
                                        $obj = new ModeloLog();
                                        $mostrar = $obj->mostrar_departamentos();

                                        foreach ($mostrar as $i) {
                                            $tipo = utf8_decode($i->nombredepartamento);
                                            echo "<option>$tipo</option>";
                                        }
                                        ?>
                                        </select>
            <!--                            <strong  style="color: white;font-size:11px;margin-left: 8px">Estaciones departamento:
                                            </strong>-->
                                    
                                    <?php
                                       

                                            echo '<div id="resetear" style="margin-top:-20px;margin-left:650px;visibility:hidden"><img onclick="resetear()" src="/images/filtrar.png" alt="" style="width: 20px;heigth:20px"><div style="margin-top:-26px;margin-left:13px"><img onclick="resetear()" src="/images/cerrar1.png" name="parpadeante1" style="width: 10px;heigth:10px;"></img></div><div style="margin-top:-10px;margin-left:15px" name="parpadeante"><a  style="color:white" href="#" onclick="resetear()">Desactivar filtro</a></div></div>';
                                     
                                    ?>

                                    </div>
                    <?php


                                            echo ' <div style="margin-top:10px"><strong style="font-size: 15px;width: 100%;margin-top:10px;color: #666666">Listado de activos</strong></div>
                                ';
                                           

                                ?>
                                                            <table  border="0" style="width:800px;height: 10px;margin-top: 0px;" >


                                            <tr>
                                                <td style="width: 50px"><strong style="font-size: 12px;color: #666666">Tipo</strong></td>
                                                <td style="width: 50px"><strong style="font-size: 12px;color: #666666;margin-left: 5px">Marca</strong></td>
                                                <td style="width: 50px"><strong style="font-size: 12px;color: #666666;margin-left: 10px">Modelo</strong></td>
                                                <td style="width: 50px;"><strong style="font-size: 12px;color: #666666;margin-left: 0px">Num Serie</strong></td>
                                                <td style="width: 50px"><strong style="font-size: 12px;color: #666666;margin-left: 4px">Num Inv</strong></td>
                                                <td style="width: 50px"><strong style="font-size: 12px;color: #666666;margin-left: 8px">Estado</strong></td>
                                                <td style="width: 50px"><strong style="font-size: 12px;color: #666666;margin-left: 10px">Departamento</strong></td>
                                        </table>
                         <?php


                                         
                                            echo ' <div style="margin-top:-18px"><strong style="font-size: 15px;width: 100%;margin-top:-20px">_______________________________________________________________________</strong></div>
                                ';

                                ?>
                    <div style="overflow: scroll;height: 300px;width: 760px">
                         

                    
                        <div id="reporte"></div>
                    </div>
                        <table   width="40%" border="2" style=" border: 1px solid #000;
                                     border-collapse: collapse;border-color: white;
                                     padding: 0.3em;
                                     caption-side: bottom;margin-top: -373px;height: 22px;margin-left: 780px">
                                <tr>
                                    <td colspan="2" style="border: 0%;background-image: url(/images/fondo.png);width: 20%"><strong style="color: white;font-size:12px">Estaciones departamento: <p id="prportes">Todos</p></strong></td>
                            </tr></table>

                        <div id="aca" style='overflow-y: scroll;margin-top: 0px;height: 330px;width: 40%;border-color: black;border-right-color: black;margin-left: 780px' >
                            <!--                            <div id="todaslasmarcasdecomponentes"></div>-->

                        </div>
                         <div style="width: 1030px;margin-top: 10px">
<!--                            <strong><a onclick="impreSelecc('reporte')" id='agregaruser'style='margin-left:300px 'href='#'><img src='/images/imprimir.jpg' alt='' width='15px' height='15px'/>Imprimir listado</a></strong>-->
                            <strong><a onclick="exportar()" id='agregaruser'style='margin-left:300px 'href='#'><img src='/images/exportar.jpg' alt='' width='15px' height='15px'/>Exportar listado</a></strong>
                            <input type="text" value="" id="prompt" name="prompt" style="visibility: hidden"></input>
                            <strong><a onclick="ver()" id='listar'style='margin-left:240px 'href='#'><img src='/images/listar.jpg' alt='' width='15px' height='15px'/>Listar Activos</a></strong>
                            <strong><a onclick="verexpediente()" id='listar'style='margin-left:10px 'href='#'><img src='/images/expediente.jpg' alt='' width='15px' height='15px'/>Expediente Tecnico</a></strong>
                        </div>
                        </form>
                </div>

            </div>
            
            <div class="footer" style="margin-top: 100px;background-color:slategray;" >
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