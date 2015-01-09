<?php
session_start();
if (!isset($_SESSION['usuario']) || ($_SESSION['departamento'] != "Informática") || ($_SESSION['administrador'] == "Invitado")) {
    echo '<script language="javascript" type="text/javascript">

            alert("Usted no puede acceder a esta area")

history.go(-1);



</script>';


//    header("location:../vistas/principal.php");

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


 var url = "../controladores/controladorMostrarCpu.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#aca").html(data); // show response from the php script.
                        }
                    });

                    var url = "../controladores/controladorMostrarhdd.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#acahdd").html(data); // show response from the php script.
                        }
                    });





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

            var url = "../controladores/controladorModificarComponenteExpediente.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponente0").html(data); // show response from the php script.
                }
            });


            $("#algo").click(function(){
                alert('hsjgdfhgdfgdfg');
                $('input[name="idcheckbox"]:checked').each(function() {
                    $inputmodificar=document.getElementById($(this).val());
                    alert($inputmodificar);

                });})

            //            $("#tipocomponenteregistrar").click(function(){
            //                var url = "../controladores/controladorComponente.php"; // the script where you handle the form input.
            //                $.ajax({
            //                    type: "POST",
            //                    url: url,
            //                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
            //                    success: function(data)
            //                    {
            //                        $("#marcacomponentemodificar").html(data); // show response from the php script.
            //                    }
            //                });

            //                var url = "../controladores/controladorModificarComponenteExpediente.php"; // the script where you handle the form input.
            //                $.ajax({
            //                    type: "POST",
            //                    url: url,
            //                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
            //                    success: function(data)
            //                    {
            //                        $("#marcacomponente0").html(data); // show response from the php script.
            //                    }
            //                });
            //                return false; // avoid to execute the actual submit of the form.
            //            });
          

            $("#activarfiltro").click(function(){


                document.getElementById('estadocomponenteregistrar').value='Seleccionar';
              
                
                document.getElementById("marcacomponentemodificar").value="Seleccionar";
                document.getElementById('fieldsetfiltro').style.visibility='hidden';
                if (document.getElementById('activarfiltro').checked)
                {

                    document.getElementById("marcacomponente0").style.height="223px";
                    document.getElementById('iddiv').style.marginTop='10px';
                    document.getElementById('fieldsetfiltro').style.visibility='visible';
//                    document.getElementById('estadocomponenteregistrar').value='Seleccionar';
//                    document.getElementById("tipocomponenteregistrar").value="Seleccionar";
//                    document.getElementById("departamentoconsultar").value="Seleccionar";
//                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                }else{
                    document.getElementById('fieldsetfiltro').style.visibility='hidden';
                    document.getElementById("marcacomponente0").style.height="284px";
                    document.getElementById('iddiv').style.marginTop='-51px';
                      document.getElementById('estadocomponenteregistrar').value='Seleccionar';
                    
                    
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
                     var url = "../controladores/controladorModificarComponenteExpediente.php"; // the script where you handle the form input.
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
            $("#marcacomponentemodificar").click(function(){
          

                var url = "../controladores/controladorModificarComponente_1Expediente.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#marcacomponente0").html(data); // show response from the php script.
                    }
                });
                return false; // avoid to execute the actual submit of the form.
            });

                $("#estadocomponenteregistrar").click(function(){
              var url = "../controladores/controladorModificarComponente_1Expediente.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#marcacomponente0").html(data); // show response from the php script.
                    }
                });
                return false; // avoid to execute the actual submit of the form.
            });


            $("#vercaracteristicas").click(function(){
 document.getElementById("agregarcpufieldset").style.visibility="hidden";
 document.getElementById("agregarhddfieldset").style.visibility="hidden";
                $('input[name="idcheckbox"]:checked').each(function() {
                    var url = "../controladores/controladorMostrarNuminventarioSeleccionado.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariomodificar").serialize(),// serializes the form's elements.
                        success: function(data)
                        {
                            $("#numeroinventario").html(data); // show response from the php script.
                        }
                    });

                    document.getElementById("trred11").style.visibility="visible";
                    document.getElementById("contenido").style.height="570px";
                     document.getElementById("agregarcpufieldset").style.visibility="visible";
                      document.getElementById("agregarhddfieldset").style.visibility="visible";
   var url = "../controladores/controladorMostrarhdd.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#acahdd").html(data); // show response from the php script.
                        }
                    });
                })
                   var url = "../controladores/controladorMostrarhdd.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#acahdd").html(data); // show response from the php script.
                        }
                    });
                 var url = "../controladores/controladorMostrarCpu.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#aca").html(data); // show response from the php script.
                        }
                    });

                    var url = "../controladores/controladorMostrarhdd.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#acahdd").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorMostrarhdd.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#acahdd").html(data); // show response from the php script.
                        }
                    });
 var url = "../controladores/controladorMostrarCpu.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#aca").html(data); // show response from the php script.
                        }
                    });

            })
            $("#aagregarcpu").click(function(){
                if($("#aagregarcpu").is(':checked')){

                    document.getElementById("divagregarhdd").style.marginTop="10px";
                    document.getElementById("contenido").style.height="700px";
                    document.getElementById("agregarcpufieldset").style.visibility="visible";

                }else{
                    document.getElementById("agregarcpufieldset").style.visibility="hidden";
                    document.getElementById("divagregarhdd").style.marginTop="-150px";
                    document.getElementById("contenido").style.height="550px";
                }
            })
            $("#aagregarhdd").click(function(){
                if($("#aagregarhdd").is(':checked')){

                    document.getElementById("divagregarram").style.marginTop="10px";
                    document.getElementById("contenido").style.height="700px";
                    document.getElementById("agregarhddfieldset").style.visibility="visible";
                }else{
                    document.getElementById("agregarhddfieldset").style.visibility="hidden";
                    document.getElementById("divagregarram").style.marginTop="-85px";
                    document.getElementById("contenido").style.height="550px";
                }
            })
            $("#aagregarramyperifericos").click(function(){
                if($("#aagregarramyperifericos").is(':checked')){

                    document.getElementById("divagregarnumeroserie").style.marginTop="10px";
                    document.getElementById("contenido").style.height="700px";
                    document.getElementById("agregarramyperifericosfieldset").style.visibility="visible";
                }else{
                    document.getElementById("agregarramyperifericosfieldset").style.visibility="hidden";
                    document.getElementById("divagregarnumeroserie").style.marginTop="-85px";
                    document.getElementById("contenido").style.height="550px";
                }
            })
            $("#aagregarnumeroserieperifericos").click(function(){
                if($("#aagregarnumeroserieperifericos").is(':checked')){

                    document.getElementById("divagregarnumeroserie").style.marginTop="10px";
                    document.getElementById("contenido").style.height="700px";
                    document.getElementById("agregarramyperifericosfieldset").style.visibility="visible";
                }else{
                    document.getElementById("agregarramyperifericosfieldset").style.visibility="hidden";
                    document.getElementById("divagregarnumeroserie").style.marginTop="-85px";
                    document.getElementById("contenido").style.height="550px";
                }
            })


         
        });
        function agregarram(){
            var url = "../controladores/controladorModificarComponenteExpedienteRam.php"; // the script where you handle the form input.

            $.ajax({

                type: "POST",

                url: url,

                data: $("#formulariomodificar").serialize(), // serializes the form's elements.

                success: function(data)

                {

                    $("#header").html(data); // show response from the php script.

                }

            });

            setTimeout("borrar()",3000);

        }
        function agregarcpuu(){
            if( document.getElementById("tipocpu").value!="Seleccionar"){

            if( document.getElementById("velocidadcpu").value!="Seleccionar"){
            var url = "../controladores/controladorModificarExpedienteTecnico.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            });
             setTimeout("actualizarlista()",100);
            setTimeout("borrar()",3000);
        }}
        }
         function eliminarcpuu(){
             $('input[name="orderBox"]:checked').each(function() {
            var url = "../controladores/controladorEliminarCpu.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            });
            setTimeout("actualizarlista()",100);
            setTimeout("borrar()",3000);
             })
        }
        function eliminarhd(){
            $('input[name="orderBoxhd"]:checked').each(function() {
            var url = "../controladores/controladorEliminarhdd.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            });
            setTimeout("actualizarlistahdd()",100);
            setTimeout("borrar()",3000);
             })
        }
      
           function actualizarlistahdd(){
         var url = "../controladores/controladorMostrarhdd.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#acahdd").html(data); // show response from the php script.
                        }
                    });
                      var url = "../controladores/controladorMostrarhdd.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#acahdd").html(data); // show response from the php script.
                        }
                    });
        }
        function actualizarlista(){
         var url = "../controladores/controladorMostrarCpu.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#aca").html(data); // show response from the php script.
                        }
                    });
                      var url = "../controladores/controladorMostrarCpu.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulariovincular").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#aca").html(data); // show response from the php script.
                        }
                    });
        }
        function agregarhddd(){

                                                               
if( document.getElementById("tipohdd").value!="Seleccionar"){

            if( document.getElementById("capacidadhdd").value!="Seleccionar"){
            var url = "../controladores/controladorModificarExpedienteTecnicohdd.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            });
              setTimeout("actualizarlistahdd()",100);
            setTimeout("borrar()",3000);
        }}}
        function isstringKeyy(){
         
            if(document.getElementById('buttonfiltrarpornuminventario').value==""||document.getElementById('buttonfiltrarpornuminventario').value.length==1){

                var url = "../controladores/controladorModificarComponenteExpediente.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#marcacomponente0").html(data); // show response from the php script.
                    }
                });
                var url = "../controladores/controladorModificarComponenteExpediente.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#marcacomponente0").html(data); // show response from the php script.
                    }
                });
            }else{
                var url = "../controladores/controladorModificarComponenteinventarioCompu.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#marcacomponente0").html(data); // show response from the php script.
                    }
                });
                setTimeout("numinventario()",100);}
        }
        function numinventario(){
            var url = "../controladores/controladorModificarComponenteinventarioCompu.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponente0").html(data); // show response from the php script.
                }
            });}
//        function actualizarfiltromarca(){
//
//            var url = "../controladores/controladorComponente2Expediente.php"; // the script where you handle the form input.
//            $.ajax({
//                type: "POST",
//                url: url,
//                data: $("#formulariomodificar").serialize(), // serializes the form's elements.
//                success: function(data)
//                {
//                    $("#marcacomponentemodificar").html(data); // show response from the php script.
//                }
//            });
//        }
        function validarDatosModificarComponente(){
            $bandera=0;
            $('input[name="idcheckbox"]:checked').each(function() {
                $inputmodificar=document.getElementById($(this).val());
                if($inputmodificar==null){
                    $bandera=1;
                }

            });
            if ($bandera==0) {
                document.getElementById('mensajeeee').style.visibility='visible';
                setTimeout("borrarr()",3000);
                return false;
            } else {
                var url = "../controladores/controladorModificarComponente1.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#header").html(data); // show response from the php script.
                    }
                });
                setTimeout("borrar()",3000);
                setTimeout("actcualizarmodificaractivo()",3000);
            }


        }
        function borrarr(){
            document.getElementById('mensajeeee').style.visibility='hidden';

            return true;
        }
        function borrar(){
            document.getElementById('mensaje').style.visibility='hidden';

            return true;
        }
        function actcualizarmodificaractivo(){
            var url = "../controladores/controladorModificarComponenteExpediente.php"; // the script where you handle the form input.
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
        <div class="header" id="header">


            <p style='color:red;margin-left: 450px;visibility: hidden' id='mensajeeee'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Seleccione un activo</strong></p>
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
function agregarnumeroserieboard(){
 var url = "../controladores/controladorModificarNumeroSerieBoard.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formulariomodificar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#header").html(data); // show response from the php script.
                    }
                });
                setTimeout("borrar()",3000);
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
                <div id="contenido" style=" margin-left:250px;height: 390px;margin-top: -400px;width: 80%;">

                    <form id="formulariomodificar" name="form" method="post" onsubmit="return validarDatosModificarComponente()" >
                        <strong style="color: black;font-size:12px;margin-left: -50px">Modificar Computadoras</strong>
                        <strong style="color: black;font-size:12px;margin-left: 150px">Num serie del board: </strong>
                   
                       
                        <input type="text" id="numeroserieboard" name="numeroserieboard">
                        <strong><td><a id='agregarhdd'onclick="agregarnumeroserieboard()" style='margin-left:15px 'href='#'><img src='/images/agregar.jpg' alt='' width='15px' height='15px'/>Agregar</a></td></strong>

                        <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px;margin-left: -50px"></div>
                        <!--                        <div>
                                                    <input type="checkbox" value="buttonfiltrarportipocomponente"  id="buttonfiltrarportipocomponente" style="margin-left: -50px"><strong>Filtrar por tipo</strong>
                                                    <table id="tabladefiltro" width="40%" border="1" style=" border: 1px solid #000;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;margin-left: -50px;visibility: hidden">

                                                        <tr>
                                                            <td style="width: 150px"><strong style="font-size:12px">Tipo de componente:</strong></td>
                                                            <td><select name="tipocomponenteregistrar" id="tipocomponenteregistrar"  style="width: 100%;margin-top: 0px">
                                                                    <option>Seleccionar</option>
                        <?php
                                include_once '../modelo/ModeloLog.php';
                                $extract = extract($_GET);
                                $obj = new ModeloLog();
                                $mostrar = $obj->mostrar_tipo_de_componente();

                                foreach ($mostrar as $i) {
                                    if ('Computadora' == utf8_decode($i->nombretipoobjeto)) {
                                        $tipo = utf8_decode($i->nombretipoobjeto);
                                        echo "<option>$tipo</option>";
                                    }
                                }
                        ?>
                                                                                                </select></td>
                                                                                        </tr>

                                                                                    </table>
                                                                                </div>-->

                               <div style="margin-left: -50px">
                          <input style="margin-left: 0px;" type="checkbox" id="activarfiltro"><strong>Activar o desactivar filtro</strong>

                            <fieldset id="fieldsetfiltro" style="margin-left: 0px;width: 65%;visibility: hidden"><legend>
                                Filtrar por:
                            </legend>

                                                    <div id="divmarca" style="margin-left: 10px;margin-top: 0px">
                                                        <strong>Marca:</strong>

                                                        <select name="marcacomponentemodificar" id="marcacomponentemodificar"  style="width: 20%;margin-top: 0px">
                                                            
                                                            <?php
                                                            $nombreregistrar = 'Computadora';

 include_once '../modelo/ModeloLog.php';
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_marca_de_todos_componentes();
echo"<option>Seleccionar</option>";
foreach ($mostrar as $i) {
    $compo = $i->componentepertenece;
    if (preg_match("/$nombreregistrar/", $compo)) {

        echo "<option>$i->nombremarca</option>";
    }
}
                                                           
                                                       
                                                         
                                                            ?>

                                                        </select>


                                                    </div>
                                                    <div id="divmarca" style="margin-left: 200px;margin-top: -20px">
                                                        <strong>Estado:</strong>


                                                        <select name="estadocomponenteregistrar" id="estadocomponenteregistrar"  style="width: 30%;margin-top: 0px">
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
<!--                                                    <div id="divmarca" style="margin-left: 390px;margin-top: -20px">
                                                        <strong>Departamento:</strong>


                                                        <select name="departamentoconsultar" id="departamentoconsultar"  style="width: 27%;margin-top: 0px">
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

                                                    </div>-->
<!--                                                </fieldset>-->
 <div style="margin-left: 470px;margin-top: -18px;width: 100px">
     <strong style="margin-left: -70px">Num Inv:</strong>
     <input style="margin-top: -20px;width: 100px" type="text" name="buttonfiltrarpornuminventario" id="buttonfiltrarpornuminventario" onkeyup="return isstringKeyy()" >


                        </div>
</fieldset>
                        </div>

                                <div id='iddiv' style='margin-top:-52px;margin-left: -50px;'><strong><p style='font-size:12px'>Lista de activos</p></strong></div>
                                <table width='840px' border='1' style=' border: 1px solid #000;
                                       border-collapse: collapse;
                                       padding: 0.3em;
                                       caption-side: bottom;margin-left: -50px;'>
                                    <tr style='background-image: url(/images/fondo.png)'>
                                        <td style='width: 74px'><strong><p style='font-size:12px;color:white'>Seleccionar</p></strong></td>
                                        <td style='width: 75px'><strong><p style='font-size:12px;color:white'>Tipo</p></strong></td>
                                        <td style='width: 148px'><strong><p style='font-size:12px;color:white'>Marca</p></strong></td>
                                        <td style='width:104px'><strong><p style='font-size:12px;color:white'>Modelo</p></strong></td>
                                        <td style='width:144px'><strong><p style='font-size:12px;color:white'>Num serie</p></strong></td>
                                        <td style='width: 144px'><strong><p style='font-size:12px;color:white'>Num Inventario</p></strong></td>
                                        <td style='width:284px'><strong><p style='font-size:12px;color:white'>Observaciones</p></strong></td>
                                        <td style='width: 54px'><strong><p style='font-size:12px;color:white'>Estado</p></strong></td>
                                    </tr>
                                </table>
                                <div  id="marcacomponente0" style="margin-left: -50px;margin-top: 0px;overflow: scroll;height: 285px;width: 102%"></div>
<div id='iddiv' style="margin-left: 670px;width: 150px;margin-top: 10px"><strong><a  id='vercaracteristicas'style='margin-left:10px 'href='#'><img src='/images/modificar.jpg' alt='' width='15px' height='15px'/>Ver caracter&iacute;sticas</a></strong>

                        </div>
<!--                                <input style="margin-left: 70%" type="button" value="Modificar activo" id="vercaracteristicas" name="vercaracteristicas">-->
                                
                                <div id="trred11" style="visibility: hidden;border-color: white;margin-left: -50px;margin-top:0%">
                                  
                                   <strong style="color: red">Acciones a realizar en el activo con num inventario:<p style="margin-top: -16px;margin-left:295px;color: black" id="numeroinventario"></p></strong>
                                    <div id="error" style="margin-top: 0px;">
                                        
                                        <div style="margin-left: 0px">
                                            <div>
                                                <fieldset id="agregarcpufieldset" style="width: 350px;visibility: hidden">
                                                    <legend><strong style="color: #0067B0">Agregar y Eliminar CPU</strong></legend>
                                                    <div><strong style="color: red">CPU incluido(s) en el activo</strong>
                                                        <div id="aca" style='overflow-y: scroll;height: 75px;width: 42%;border-color: black;border-right-color: black' >


                                                        </div>
<!--<input type="button" value="Eliminarrr" id="eliminarcpu" name="eliminarcpu" style="margin-top:1%; margin-left: 10%" onclick="return eliminarcpuu()">-->
 <div id='iddiv' style="margin-left: 5%;width: 100px;margin-top: 1%"><strong style='font-size:12px;margin-top: 10px'><td style='width: 10px'><a id='eliminarcpu'onclick="eliminarcpuu()" style='margin-left:15px 'href='#'><img src='/images/eliminar.jpg' alt='' width='15px' height='15px'/>Eliminar</a></td></strong>

                        </div>
                                                    </div>
                                                    <div style="margin-left: 42%;margin-top: -34%">

                                                        <strong style="color: red;margin-left: 55px">CPU a incluir en el activo</strong>
                                                        <div style="margin-top: 5px;margin-left:53px">
                                                        <strong>Tipo: </strong>
                                                        <select id="tipocpu" name="tipocpu" style="width:68%;">
                                                            <option>Seleccionar</option>
                                                    <?php
                                                    include_once '../modelo/ModeloLog.php';
                                                    $extract = extract($_GET);
                                                    $obj = new ModeloLog();
                                                    $mostrar = $obj->mostrar_tipocpu();

                                                    foreach ($mostrar as $i) {
                                                        $nombretipocpu = utf8_decode($i->nombretipocpu);
                                                        echo "<option>$nombretipocpu</option>";
                                                    }
                                                    ?>
                                                </select>
</div>
                                                        <div style="margin-top: 5px;margin-left: 45.5px">
                                                <strong style="margin-left: 2px">Serie: </strong>
                                                <input style="width: 64%" id="seriecpu" name="seriecpu" type="text"></div>
                                                        <div style="margin-top: 5px;margin-left: 10%">
                                                <strong  style="margin-left: 2px">Velocidad: </strong>
                                                <select id="velocidadcpu" name="velocidadcpu" style="width: 55%;">
                                                    <option>Seleccionar</option>
                                                    <?php
                                                    include_once '../modelo/ModeloLog.php';
                                                    $extract = extract($_GET);
                                                    $obj = new ModeloLog();
                                                    $mostrar = $obj->mostrar_velocidadcpu();

                                                    foreach ($mostrar as $i) {
                                                        $nombretipocpu = utf8_decode($i->nombrevelocidadcpu);
                                                        echo "<option>$nombretipocpu</option>";
                                                    }
                                                    ?>
                                                </select>
                                                </div>
<!--                                                <input type="button" value="Agegar" id="agregarcpu" name="agregarcpu" style="margin-top:1%; margin-left: 45%" onclick="return agregarcpuu()">-->
                                                                                         <div id='iddiv' style="margin-left: 35%;width: 100px;margin-top: 4%"><strong style='font-size:12px;margin-top: 10px'><td style='width: 10px'><a id='agregarcpu'onclick="agregarcpuu()" style='margin-left:15px 'href='#'><img src='/images/agregar.jpg' alt='' width='15px' height='15px'/>Agregar</a></td></strong>

                        </div>
                                                    </div>
                                        </fieldset>
                                    </div>
                                    <div id="divagregarhdd" style="margin-top: -152px;margin-left: 420px">
                                      

                                          <fieldset id="agregarhddfieldset" style="width: 350px;visibility: hidden">
                                                    <legend><strong style="color: #0067B0">Agregar y Eliminar HDD</strong></legend>
                                                    <div><strong style="color: red">HDD incluido(s) en el activo</strong>
                                                        <div id="acahdd" style='overflow-y: scroll;height: 75px;width: 42%;border-color: black;border-right-color: black' >


                                                        </div>
<!--                                                        <input type="button" value="Eliminar" id="eliminarhdd" name="eliminarhdd" style="margin-top:1%; margin-left: 10%" onclick="return eliminarhdd()">-->

                                                        <div id='iddiv' style="margin-left: 5%;width: 100px;margin-top: 1%"><strong style='font-size:12px;margin-top: 10px'><td style='width: 10px'><a id='eliminarhdd'onclick="eliminarhd()" style='margin-left:15px 'href='#'><img src='/images/eliminar.jpg' alt='' width='15px' height='15px'/>Eliminar</a></td></strong>

                        </div>
                                                    </div>
                                                    <div style="margin-left: 42%;margin-top: -34%">

                                                        <strong style="color: red;margin-left: 55px">HDD a incluir en el activo</strong>
                                                        <div style="margin-top: 5px;margin-left:50px">
                                                        <strong>Marca: </strong>
                                                        <select id="tipohdd" name="tipohdd" style="width:68%;">
                                                            <option>Seleccionar</option>
                                                    <?php
                                                    include_once '../modelo/ModeloLog.php';
                                                    $extract = extract($_GET);
                                                    $obj = new ModeloLog();
                                                    $mostrar = $obj->mostrar_marcahdd();

                                                    foreach ($mostrar as $i) {
                                                        $nombretipocpu = utf8_decode($i->nombremarcahdd);
                                                        echo "<option>$nombretipocpu</option>";
                                                    }
                                                    ?>
                                                </select>
</div>
                                                        <div style="margin-top: 5px;margin-left: 53px">
                                                <strong style="margin-left: 2px">Serie: </strong>
                                                <input style="width: 69%" id="seriehdd" name="seriehdd" type="text"></div>
                                                        <div style="margin-top: 5px;margin-left: 10%">
                                                <strong  style="margin-left: 6px">Capacidad: </strong>
                                                <select id="capacidadhdd" name="capacidadhdd" style="width: 55%;">
                                                    <option>Seleccionar</option>
                                                    <?php
                                                    include_once '../modelo/ModeloLog.php';
                                                    $extract = extract($_GET);
                                                    $obj = new ModeloLog();
                                                    $mostrar = $obj->mostrar_capacidadhdd();

                                                    foreach ($mostrar as $i) {
                                                        $nombretipocpu = utf8_decode($i->capacidadhdd);
                                                        echo "<option>$nombretipocpu</option>";
                                                    }
                                                    ?>
                                                </select>
                                                </div>
                                               
                                                                         <div id='iddiv' style="margin-left: 40%;width: 100px;margin-top: 4%"><strong style='font-size:12px;margin-top: 10px'><td style='width: 10px'><a id='agregarhdd'onclick="agregarhddd()" style='margin-left:15px 'href='#'><img src='/images/agregar.jpg' alt='' width='15px' height='15px'/>Agregar</a></td></strong>

                        </div>
                                                    </div>
                                        </fieldset>
                                        </div>
<!--                                        <div id="divagregarram" style="margin-top: 10px;">
                                        

                                            
                                         <fieldset id="agregarramyperifericosfieldset" style="width: 40%;visibility: hidden">
                                                    <legend><strong style="color: #0067B0">Agregar y Eliminar CPU</strong></legend>
                                                    <div><strong style="color: red">CPU incluido(s) en el activo</strong>
                                                        <div id="aca" style='overflow-y: scroll;height: 75px;width: 42%;border-color: black;border-right-color: black' >


                                                        </div>
<input type="button" value="Eliminar" id="eliminarcpu" name="eliminarcpu" style="margin-top:1%; margin-left: 10%" onclick="return eliminarcpuu()">

                                                    </div>
                                                    <div style="margin-left: 42%;margin-top: -34%">

                                                        <strong style="color: red;margin-left: 55px">CPU a incluir en el activo</strong>
                                                        <div style="margin-top: 5px;margin-left:53px">
                                                        <strong>Tipo: </strong>
                                                        <select id="tipocpu" name="tipocpu" style="width:68%;">
                                                            <option>Seleccionar</option>
                                                    <?php
                                                    include_once '../modelo/ModeloLog.php';
                                                    $extract = extract($_GET);
                                                    $obj = new ModeloLog();
                                                    $mostrar = $obj->mostrar_tipocpu();

                                                    foreach ($mostrar as $i) {
                                                        $nombretipocpu = utf8_decode($i->nombretipocpu);
                                                        echo "<option>$nombretipocpu</option>";
                                                    }
                                                    ?>
                                                </select>
</div>
                                                        <div style="margin-top: 5px;margin-left: 45.5px">
                                                <strong style="margin-left: 2px">Serie: </strong>
                                                <input style="width: 64%" id="seriecpu" name="seriecpu" type="text"></div>
                                                        <div style="margin-top: 5px;margin-left: 10%">
                                                <strong  style="margin-left: 2px">Velocidad: </strong>
                                                <select id="velocidadcpu" name="velocidadcpu" style="width: 55%;">
                                                    <option>Seleccionar</option>
                                                    <?php
                                                    include_once '../modelo/ModeloLog.php';
                                                    $extract = extract($_GET);
                                                    $obj = new ModeloLog();
                                                    $mostrar = $obj->mostrar_velocidadcpu();

                                                    foreach ($mostrar as $i) {
                                                        $nombretipocpu = utf8_decode($i->nombrevelocidadcpu);
                                                        echo "<option>$nombretipocpu</option>";
                                                    }
                                                    ?>
                                                </select>
                                                </div>
                                                <input type="button" value="Agegar" id="agregarcpu" name="agregarcpu" style="margin-top:1%; margin-left: 45%" onclick="return agregarcpuu()">
                                            </div>
                                        </fieldset>

                                    </div>-->
<!--                                    <div id="divagregarnumeroserie" style="margin-top: -85px">
                                        <input id="aagregarnumserie" type="checkbox" ><strong style="color: #0067B0">Agregar numero de serie de los perifericos</strong></input>


                                        <fieldset id="agregarnumeroseriefieldset" style="margin-left: -2%;width: 86%;margin-top: 5px;visibility: hidden">
                                            <legend>Numero de serie de los perif&eacute;ricos</legend>

                                            <div>
                                                <input style="border-color:blue;margin-left: 1%" type="text" id="mouse" name="mouse" >
                                                <input style="border-color:red;margin-top: 1%;margin-left: 1%" type="text" id="teclado" name="teclado" >
                                                <input style="border-color:#fbd850;margin-left: 1%" type="text" id="bocinas" name="bocinas" >
                                                <input style="border-color:green;margin-top: 1%;margin-left: 1%" type="text" id="lectorcd" name="lectorcd" >
                                                <strong style="color: blue;margin-left: 1%">1.Mouse</strong>
                                                <strong style="color: red;margin-left: 16.3%">2.Teclado</strong>
                                                <strong style="color: #fbd850;margin-left: 15.5%">3.Bocinas</strong>
                                                <strong style="color: green;margin-left: 15.5%">4.Lector CD</strong>

                                            </div>
                                                                                                <div>
                                                                                                    <strong style="color: blue">1</strong>
                                                                                                    <strong style="margin-left: 7%;color: red">2 </strong>
                                                                                                    <strong style="margin-left: 7%;color: #fbd850">3 </strong>
                                                                                                    <strong style="margin-left: 7%;color: green">4 </strong>
                                                                                                    <strong style="margin-left: 7%;color: violet">5</strong>
                                                                                                    <strong style="margin-left: 7%;color: dimgray">6</strong>
                                                                                                    <strong style="margin-left: 7%;color: #e78f08">7 </strong>
                                                                                                    <strong style="margin-left: 7%;color: black">8 </strong>
                                                                                                </div>
                                            <div style="margin-top: 2%">
                                                <input style="border-color:violet;margin-left: 1%" type="text" id="quemadorcd" name="quemadorcd" >
                                                <input style="border-color:dimgray;margin-top: 1%;margin-left: 1%" type="text" id="lectordvd" name="lectordvd" >
                                                <input style="border-color:#e78f08;margin-left:1%" type="text" id="quemadordvd" name="quemadordvd" >
                                                <input style="border-color:black;margin-top: 1%;margin-left: 1%" type="text" id="fuente" name="fuente" >

                                                <strong style="color: violet;margin-left: 1%">5.Quemador CD</strong>
                                                <strong style="color: dimgray;margin-left: 9.5%">6.Lector DVD</strong>
                                                <strong style="color: #e78f08;margin-left: 12.5%">7.Quemador DVD</strong>
                                                <strong style="color: black;margin-left: 8.5%">8.Fuente</strong>

                                            </div>
                                        </fieldset>
                                    </div>-->




                                </div>


                            </div>

                                </div>

                                
                    </form>

                </div>




            </div>
        </div>
        <div class="right" style="margin-top: -10px;background-color: blueviolet"> <!-- Capa right -->
        </div>
        <div class="footer" style="background-color:slategray;" >
            <p>Copyright &copy; 2013, Centro Nacional de Cirug&iacute;a de M&iacute;nimo Acceso, <br />
                Calle P&aacute;rraga #215, entre San Mariano y Vista Alegre |</font> La Vibora <font size="2">|</font>10 de Octubre <font size="2">|</font> La Habana <font size="2">|</font> Cuba<font face="Trebuchet MS"><font face="Trebuchet MS"> <br />
                        <img src="/images/telefonos.jpg" width="16" height="16" />Telf.: (537) 649-5328, (537) 649-5331, (537)
                        649-5332 <font size="2">|</font> FAX:
                        (537) 649-0150</font></font><font face="Trebuchet MS"><font face="Trebuchet MS"></font></font><br />
            </p>
        </div>
        <div id="headerr"> </div>
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







