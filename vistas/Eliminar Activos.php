<?php
session_start();
if (!isset($_SESSION['usuario']) ||($_SESSION['administrador'] !="superuser")&&($_SESSION['administrador'] !="Super administrador")) {
    echo '<script language="javascript" type="text/javascript">

            alert("Usted no tiene permiso para acceder a la administracion")

history.go(-1);



</script>';

    exit ();
}
$_SESSION['ultimapagina']='localhost/vistas/administracion.php';
?>
<head>
    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>


    <script>
      $(document).ready(function(){
oXML = AJAXCrearObjeto();
oXML.open('get', '../xml/menuprincipal.xml');
oXML.onreadystatechange = leerDatos;
oXML.send('');
            var url = "../controladores/controladorComponente.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponenteregistrar").html(data); // show response from the php script.
                }

            });

            var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponente0").html(data); // show response from the php script.
                }
            });

$("#activarfiltro").click(function(){


                document.getElementById('estadocomponenteregistrar').value='Seleccionar';
                document.getElementById("tipocomponenteregistrar").value="Seleccionar";
                document.getElementById("departamentoconsultar").value="Seleccionar";
                document.getElementById("marcacomponentemodificar").value="Seleccionar";
                document.getElementById('fieldsetfiltro').style.visibility='hidden';
                if (document.getElementById('activarfiltro').checked)
                {

                    document.getElementById("marcacomponente0").style.height="154px";
                    document.getElementById('iddiv').style.marginTop='10px';
                    document.getElementById('fieldsetfiltro').style.visibility='visible';
//                    document.getElementById('estadocomponenteregistrar').value='Seleccionar';
//                    document.getElementById("tipocomponenteregistrar").value="Seleccionar";
//                    document.getElementById("departamentoconsultar").value="Seleccionar";
//                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                }else{
                    document.getElementById('fieldsetfiltro').style.visibility='hidden';
                    document.getElementById("marcacomponente0").style.height="214px";
                    document.getElementById('iddiv').style.marginTop='-50px';
                      document.getElementById('estadocomponenteregistrar').value='Seleccionar';
                    document.getElementById("tipocomponenteregistrar").value="Seleccionar";
                    document.getElementById("departamentoconsultar").value="Seleccionar";
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                     var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponente0").html(data); // show response from the php script.
                }
            });
                }


            })

            $("#algo").click(function(){
                alert('hsjgdfhgdfgdfg');
                $('input[name="idcheckbox"]:checked').each(function() {
                    $inputmodificar=document.getElementById($(this).val());
                    alert($inputmodificar);

                });})

           $("#tipocomponenteregistrar").click(function(){
                document.getElementById("departamentoconsultar").value="Seleccionar";

                document.getElementById("estadocomponenteregistrar").value="Seleccionar";
                if(document.getElementById("tipocomponenteregistrar").value!="Seleccionar"){
                    var url = "../controladores/controladorComponente.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponentemodificar").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    })
                    setTimeout("actualizarcantidadfiltrados()",1);
                    setTimeout("actualizarcantidadfiltrados()",1);
                }else{
                    var url = "../controladores/controladorComponente2.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponentemodificar").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    })
                    setTimeout("actualizarcantidadfiltrados()",1);
                    setTimeout("actualizarcantidadfiltrados()",1);
                }



            });
            $("#marcacomponentemodificar").click(function(){
                document.getElementById("estadocomponenteregistrar").value="Seleccionar";
                //                if(document.getElementById('tipocomponenteregistrar').value=='Seleccionar'){
                //
                //                    var url = "../controladores/controladorComponente2.php"; // the script where you handle the form input.
                //                    $.ajax({
                //                        type: "POST",
                //                        url: url,
                //                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                //                        success: function(data)
                //                        {
                //                            $("#marcacomponentemodificar").html(data); // show response from the php script.
                //                        }
                //                    });
                //                }

                var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#marcacomponente0").html(data); // show response from the php script.
                    }
                });
                var url = "../controladores/controladorMostrarCantidadConsultados.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#cantidadseleccionados").html(data); // show response from the php script.
                    }
                });

                setTimeout("actualizarcantidadfiltrados()",1);
            });
$("#estadocomponenteregistrar").click(function(){
                if(document.getElementById('estadocomponenteregistrar').value!='Seleccionar'){
                    var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorMostrarCantidadConsultados.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#cantidadseleccionados").html(data); // show response from the php script.
                        }
                    });
                    setTimeout("actualizarcantidadfiltrados()",1);
                }else{
                    var url = "../controladores/controladorModificarComponenteConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorMostrarCantidadConsultados.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#cantidadseleccionados").html(data); // show response from the php script.
                        }
                    });
                    setTimeout("actualizarcantidadfiltrados()",1);
                }
            })
            $("#buttonfiltrarportipocomponente").click(function(){
                document.getElementById("marcacomponentemodificar").value="Seleccionar";
                if($("#buttonfiltrarportipocomponente").is(':checked')){
                    document.getElementById("buttonfiltrarpormarcacomponente").style.marginTop="30px";
                    if($("#buttonfiltrarpormarcacomponente").is(':checked')){
                        document.getElementById("buttonfiltrarpornuminventario").style.marginLeft="400px";
                        document.getElementById("buttonfiltrarpornuminventarioo").style.marginLeft="409px";}
                    else{document.getElementById("iddiv").style.marginTop="30px";
                        document.getElementById("buttonfiltrarpornuminventario").style.marginLeft="200px";
                        document.getElementById("buttonfiltrarpornuminventarioo").style.marginLeft="209px";}
                    document.getElementById("tabladefiltro").style.visibility="visible";
                    document.getElementById("marcacomponente0").style.marginTop="-2px";
                    document.getElementById("marcacomponente0").style.height="170px";


                    document.getElementById("divmarca").style.marginTop="-70px";
                    document.getElementById("divmarca").style.marginLeft="320px";
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                }else{
                    setTimeout("actualizarfiltromarca()",1000);
                    document.getElementById("tipocomponenteregistrar").value="Seleccionar";
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                    if($("#buttonfiltrarpormarcacomponente").is(':checked')){
                        document.getElementById("buttonfiltrarpornuminventario").style.marginLeft="200px";
                        document.getElementById("buttonfiltrarpornuminventarioo").style.marginLeft="209px";
                    }
                    else{document.getElementById("iddiv").style.marginTop="10px";
                        document.getElementById("marcacomponente0").style.height="190px";
                        document.getElementById("buttonfiltrarpornuminventario").style.marginLeft="0px";
                        document.getElementById("buttonfiltrarpornuminventarioo").style.marginLeft="9px";
                        document.getElementById("marcacomponentemodificar").value="Seleccionar";}
                    document.getElementById("divmarca").style.marginTop="-40px";
                    document.getElementById("divmarca").style.marginLeft="120px";
                    document.getElementById("tabladefiltro").style.visibility="hidden";
                    document.getElementById("tipocomponenteregistrar").value="Seleccionar";
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                    var url = "../controladores/controladorModificarComponente.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });

                    document.getElementById("buttonfiltrarpormarcacomponente").style.marginTop="0px";
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                }
            });
             $("#departamentoconsultar").click(function(){
                if(document.getElementById('departamentoconsultar').value!='Seleccionar'){
                    var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorMostrarCantidadConsultados.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#cantidadseleccionados").html(data); // show response from the php script.
                        }
                    });
                    setTimeout("actualizarcantidadfiltrados()",1);
                }else{
                    var url = "../controladores/controladorModificarComponenteConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorMostrarCantidadConsultados.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#cantidadseleccionados").html(data); // show response from the php script.
                        }
                    });
                    setTimeout("actualizarcantidadfiltrados()",1);
                }
            })
            $("#buttonfiltrarpormarcacomponente").click(function(){
                if($("#buttonfiltrarpormarcacomponente").is(':checked')){
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                    document.getElementById("buttonfiltrarpornuminventario").style.marginLeft="200px";
                    document.getElementById("buttonfiltrarpornuminventarioo").style.marginLeft="209px";
                    document.getElementById("tabladefiltromarca").style.visibility="visible";
                    document.getElementById("marcacomponente0").style.height="170px";

                    document.getElementById("iddiv").style.marginTop="30px";
                    if($("#buttonfiltrarportipocomponente").is(':checked')){
                        document.getElementById("buttonfiltrarpornuminventario").style.marginLeft="400px";
                        document.getElementById("buttonfiltrarpornuminventarioo").style.marginLeft="409px";
                    }
                }else{
                    //                     document.getElementById("marcacomponente0").style.height="260px";
                    document.getElementById("buttonfiltrarpornuminventario").style.marginLeft="0px";
                    document.getElementById("buttonfiltrarpornuminventarioo").style.marginLeft="9px";
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                    document.getElementById("tabladefiltromarca").style.visibility="hidden";
                    if($("#buttonfiltrarportipocomponente").is(':checked')){
                        document.getElementById("buttonfiltrarpornuminventario").style.marginLeft="200px";
                        document.getElementById("buttonfiltrarpornuminventarioo").style.marginLeft="209px";
                        document.getElementById("iddiv").style.marginTop="30px";}else{
                        document.getElementById("iddiv").style.marginTop="10px";
                        document.getElementById("marcacomponente0").style.height="190px";

                    }
                    var url = "../controladores/controladorModificarComponente.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                }
            })
            //                 html=null;
            //                 html=null;
            //            op = $("select#tipocomponenteregistrar option");
            //            // esta funcion compara todos los elementos del array
            //            // si devolvemos true "a" irá antes,
            //            // si devolvemos false "b" irá antes.
            //
            //            op.sort(function (a,b) {
            //                return ( $(a).html().toUpperCase() < $(b).html().toUpperCase() ) ? -1 : ( $(a).html().toUpperCase() > $(b).html().toUpperCase() ) ? 1 : 0;
            //            });
            //
            //            html="<option>Seleccionar</option>";
            //            for(i=0;i<op.length;i++)
            //            {
            //                html += "<option value='" + $(op[i]).val() + "'>" + $(op[i]).html() + "</option>";
            //            }
            //            $("select#tipocomponenteregistrar").html(html);

        });
  function eliminaratributo() {
           var url = "../controladores/controladorEliminarAtributos.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioeliminaratributo").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            });



 setTimeout("actualizarselectestado()",1000);
 setTimeout("actualizarselectmarca()",1000);
 setTimeout("actualizarselecttipo()",1000);
            setTimeout("borrar()",3000);

        }
        function borrar(){
            document.getElementById('mensaje').style.visibility='hidden';
            return true;
        }
           function actualizarselectestado(){

 var url = "../controladores/controladorActualizarselectestado.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioeliminaratributo").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#opcioneseliminarestado").html(data); // show response from the php script.
                    }

                });
    }
           function actualizarselectmarca(){

 var url = "../controladores/controladorActualizarselectmarca.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioeliminaratributo").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#opcioneseliminarmarca").html(data); // show response from the php script.
                    }

                });
    }
           function actualizarselecttipo(){

 var url = "../controladores/controladorActualizarselecttipo.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioeliminaratributo").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#opcioneseliminartipo").html(data); // show response from the php script.
                    }

                });
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
<body>
    <div class="content" style="width: 1050px" >
        <div class="header" >
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
        <ul id="menu">
            
        </ul>
</div>
        <div class="right"> <!-- Capa right -->
            <h3 style="height: 0px;background-image: url(/images/fondo.png);width: 100%"> <p style="margin-top: -8px;width: 20px">Inform&aacute;tica</p></h3>
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
                <div id="contenido" style=" margin-left:250px;height: 360px;margin-top: -390px;width: 700px;">

                   
                        <form id="formulariomodificar" name="formulariomodificar"  method="post">

            
                        <strong style="color: black;font-size:12px;margin-left: -50px">Eliminar Activos</strong>

                        <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px;margin-left: -50px"></div>
                        <input style="margin-left: -50px;" type="checkbox" id="activarfiltro"><strong>Activar o desactivar filtro</strong>
                        <fieldset id="fieldsetfiltro" style="margin-left: -50px;width: 120%;visibility: hidden"><legend>
                                Filtrar por:
                            </legend>
                            <div>
                                <strong>Tipo:</strong>


                                <select name="tipocomponenteregistrar" id="tipocomponenteregistrar"  style="width: 16%;margin-top: 0px">
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

                            </div>
                            <div id="divmarca" style="margin-left: 190px;margin-top: -20px">
                                <strong>Marca:</strong>

                                <select name="marcacomponentemodificar" id="marcacomponentemodificar"  style="width: 22%;margin-top: 0px">
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


                            </div>
                            <div id="divmarca" style="margin-left: 400px;margin-top: -20px">
                                <strong>Estado:</strong>


                                <select name="estadocomponenteregistrar" id="estadocomponenteregistrar"  style="width: 32%;margin-top: 0px">
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

                            </div>
                            <div id="divmarca" style="margin-left: 610px;margin-top: -20px">
                                <strong>Departamento:</strong>


                                <select name="departamentoconsultar" id="departamentoconsultar"  style="width: 60%;margin-top: 0px">
                                    <option>Seleccionar</option>
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

                            </div>
                        </fieldset>
                        <div id='iddiv' style='margin-top:-50px;margin-left: -50px;'><strong><p style='font-size:12px'>Lista de activos</p></strong></div>
                                                <table width='840px' border='1' style=' border: 1px solid #000;
                                                       border-collapse: collapse;
                                                       padding: 0.3em;
                                                       caption-side: bottom;margin-left: -50px;'>
                                                    <tr style='background-image: url(/images/fondo.png)'>
                                                        <td style='width: 76px'><strong><p style='font-size:12px;color:white'>Seleccionar</p></strong></td>
                                                        <td style='width: 98px'><strong><p style='font-size:12px;color:white'>Tipo</p></strong></td>
                                                        <td style='width: 205px'><strong><p style='font-size:12px;color:white'>Marca</p></strong></td>
                                                        <td style='width: 154px'><strong><p style='font-size:12px;color:white'>Num Inventario</p></strong></td>
                                                        <td style='width: 52px'><strong><p style='font-size:12px;color:white'>Estado</p></strong></td>
                                                        <td style='width:91px'><strong><p style='font-size:12px;color:white'>Trabajador</p></strong></td>
                                                        <td style='width:148px'><strong><p style='font-size:12px;color:white'>Estaci&oacute;n</p></strong></td>
                                                        <td style='width:318px'><strong><p style='font-size:12px;color:white'>Departamento</p></strong></td>
                                                    </tr>
                                                </table>
                        <div  id="marcacomponente0" style="margin-left: -50px;margin-top: 0px;overflow-y: scroll;height: 275px;width: 122.2%"></div>

                       
                        
                       
                       
<div id='iddiv' style="margin-left: 722px;width: 250px;margin-top: 10px"><strong style='font-size:12px;margin-top: 10px'><td style='width: 10px'><a id='eliminaruser'onclick="eliminaratributo()" style='margin-left:15px 'href='#'><img src='/images/eliminar.jpg' alt='' width='15px' height='15px'/>Eliminar</a></td></strong>

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




