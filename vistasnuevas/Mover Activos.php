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
<head>
    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
             oXML = AJAXCrearObjeto();
oXML.open('get', '../xml/menuprincipal.xml');
oXML.onreadystatechange = leerDatos;
oXML.send('');
                  $("#fieldsetfiltro").fadeOut(0);

$("#activarfiltro").click(function(event){

  document.getElementById('estadocomponenteregistrar').value='Seleccionar';
                document.getElementById("tipocomponenteregistrar").value="Seleccionar";
                document.getElementById("departamentoconsultar").value="Seleccionar";
                document.getElementById("marcacomponentemodificar").value="Seleccionar";
if (document.getElementById('activarfiltro').checked){

    $("#fieldsetfiltro").fadeIn(2000);
    document.getElementById("contenido").style.height="695px";
                    document.getElementById('iddiv').style.marginTop='0px';

//                    document.getElementById('estadocomponenteregistrar').value='Seleccionar';
//                    document.getElementById("tipocomponenteregistrar").value="Seleccionar";
//                    document.getElementById("departamentoconsultar").value="Seleccionar";
//                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
}else{
      document.getElementById('estadocomponenteregistrar').value='Seleccionar';
                    document.getElementById("tipocomponenteregistrar").value="Seleccionar";
                    document.getElementById("departamentoconsultar").value="Seleccionar";
                    document.getElementById("marcacomponentemodificar").value="Seleccionar";
    $("#fieldsetfiltro").fadeOut(0);
document.getElementById("contenido").style.height="650px";
    document.getElementById('iddiv').style.marginTop='5px';
//    document.getElementById("marcacomponente0").style.height="214px";
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
}

});












            var url = "../controladores/controladorComponente.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponenteregistrar").html(data); // show response from the php script.
                }

            });

            var url = "../controladores/controladorModificarComponenteConsultaMover.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponente0").html(data); // show response from the php script.
                }
            });
//            setTimeout("actualizarcantidadfiltrados()",1);

             op = $("select#tipocomponenteregistrarasignar option");
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
            $("select#tipocomponenteregistrarasignar").html(html);


            html=null;
            op = $("select#tipocomponenteregistrar option");
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
            $("select#tipocomponenteregistrar").html(html);



            html=null;
            ops = $("select#estadocomponente option");

            ops.sort(function (a,b) {
                return ( $(a).html().toUpperCase() < $(b).html().toUpperCase() ) ? -1 : ( $(a).html().toUpperCase() > $(b).html().toUpperCase() ) ? 1 : 0;
            });


            for(i=0;i<ops.length;i++)
            {
                html += "<option value='" + $(ops[i]).val() + "'>" + $(ops[i]).html() + "</option>";
            }
            $("select#estadocomponente").html(html);


//            html=null;
//            ops = $("select#opcionesestaciones option");
//
//            ops.sort(function (a,b) {
//                return ( $(a).html().toUpperCase() < $(b).html().toUpperCase() ) ? -1 : ( $(a).html().toUpperCase() > $(b).html().toUpperCase() ) ? 1 : 0;
//            });
//
//            html += "<option>Seleccionar</option>";
//            for(i=0;i<ops.length;i++)
//            {
//                html += "<option value='" + $(ops[i]).val() + "'>" + $(ops[i]).html() + "</option>";
//            }
//            $("select#opcionesestaciones").html(html);


            html=null;
            ops = $("select#opcionesestacionesasignar option");

            ops.sort(function (a,b) {
                return ( $(a).html().toUpperCase() < $(b).html().toUpperCase() ) ? -1 : ( $(a).html().toUpperCase() > $(b).html().toUpperCase() ) ? 1 : 0;
            });

            html += "<option>Seleccionar</option>";
            for(i=0;i<ops.length;i++)
            {
                html += "<option value='" + $(ops[i]).val() + "'>" + $(ops[i]).html() + "</option>";
            }
            $("select#opcionesestacionesasignar").html(html);





            $("#estadocomponenteregistrar").click(function(){
                if(document.getElementById('estadocomponenteregistrar').value!='Seleccionar'){
                    var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                 
//                    setTimeout("actualizarcantidadfiltrados()",1);
                }else{
                    var url = "../controladores/controladorModificarComponenteConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                  
//                    setTimeout("actualizarcantidadfiltrados()",1);
                }
            })

            $("#departamentoconsultar").click(function(){
                if(document.getElementById('departamentoconsultar').value!='Seleccionar'){
                    var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorMostrarCantidadConsultados.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
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
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorMostrarCantidadConsultados.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#cantidadseleccionados").html(data); // show response from the php script.
                        }
                    });
                    setTimeout("actualizarcantidadfiltrados()",1);
                }
            })







            $("#tipocomponenteregistrar").click(function(){
                document.getElementById("departamentoconsultar").value="Seleccionar";

                document.getElementById("estadocomponenteregistrar").value="Seleccionar";
                if(document.getElementById("tipocomponenteregistrar").value!="Seleccionar"){
                    var url = "../controladores/controladorComponente.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponentemodificar").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    })
                    
                }else{
                    var url = "../controladores/controladorComponente2.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponentemodificar").html(data); // show response from the php script.
                        }
                    });
                    var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            $("#marcacomponente0").html(data); // show response from the php script.
                        }
                    })
                   
                }



            });




            $("#opcionesestacionesasignar").click(function(){
                    var url = "../controladores/controladorMostrarEstacion_2_1.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#estacionesasignar").html(data); // show response from the php script.
                }
            });
                });
   
            $("#marcacomponentemodificar").click(function(){
                document.getElementById("estadocomponenteregistrar").value="Seleccionar";
                var url = "../controladores/controladorModificarComponente_1ConsultaMover.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#marcacomponente0").html(data); // show response from the php script.
                    }
                });
             });


            var url = "../controladores/controladorMostrarEstacion_2.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#estacionesasignar").html(data); // show response from the php script.
                }
            });

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
        function buscarcomponente(){
            var url = "../controladores/controladorMostrarfiltroComponente.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#divmostrarfiltrocomponente").html(data); // show response from the php script.
                }
            });
            setTimeout("mostrarresult()",1);
        }
        function mostrarresult(){
            var url = "../controladores/controladorMostrarfiltroComponente.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#divmostrarfiltrocomponente").html(data); // show response from the php script.
                }
            });
        }
        function borrarmover(){
            document.getElementById('mensajeee').style.visibility='hidden';
            return true;
        }
        function valirasignar(){

            var radiocomponenteasignar=null;
            var radioestacionasignar=null;
            var bandera=false;
            $('input[name="radioestacionasignar"]:checked').each(function() {
                radioestacionasignar=document.getElementById($(this).val());});

            $('input[name="radiocomponenteasignar"]:checked').each(function() {
                radiocomponenteasignar=document.getElementById($(this).val());});

            if((radioestacionasignar!=null)&&(radiocomponenteasignar!=null)){
                
                radiocomponenteasignar.setAttribute('name', 'componenteasignar');
                 
                 
                bandera=true;
            }
            if((radioestacionasignar==null)||(radiocomponenteasignar==null)){
                document.getElementById('mensajeee').style.visibility='visible';
              setTimeout("borrarmover()",3000);
                bandera=false;
            }
//            if((radioestacionasignar==null)&&(radiocomponenteasignar!=null)){
//                alert('Debe seleccione una estacion');
//                bandera=false;
//            }
//            if((radiocomponenteasignar==null)&&(radioestacionasignar!=null)){
//                alert('Debe seleccione un componente');
//                bandera=false;
//            }
            if (bandera==false) {
                return false;
            } else {
        
                var url = "../controladores/controladorComponenteAsignar.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#header").html(data); // show response from the php script.
                    }
                });


                document.formularioregistrarasignar.radioestacionasignar.checked=false;
                document.formularioregistrarasignar.componenteasignar.checked=false;
                setTimeout("borrar()",3000);
                setTimeout("imprimir()",100);
                setTimeout("actual()",100);
   



           
            }}
            
 
        function imprimir(){
            if (!confirm("Desea imprimir el modelo del movimiento")){
                history.go(+1);
                var url = "../controladores/controladorMostrarfiltroComponente_1.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#divmostrarfiltrocomponente").html(data); // show response from the php script.
                    }
                });
                return ""
            }

            else{
                history.go(+1);
                var ficha=document.getElementById('contenidoo');
                var ventimp=window.open('','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();
                setTimeout("actualizar()",1);

            }}
        function actualizar(){
            //            history.go(1);
            var url = "../controladores/controladorMostrarfiltroComponente_1.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#divmostrarfiltrocomponente").html(data); // show response from the php script.
                }
            });
        }
        function actualizarfiltromarca(){

            var url = "../controladores/controladorComponente.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponentemodificar").html(data); // show response from the php script.
                }
            });
        }

        function actual(){
            var url = "../controladores/controladorModificarComponenteConsultaMover.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponente0").html(data); // show response from the php script.
                }
            });
        }


        function actcualizarmodificaractivo(){
            var url = "../controladores/controladorModificarComponenteConsultaMover.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponente0").html(data); // show response from the php script.
                }
            });
        }
        function actualizarcantidadfiltrados(){
            var url = "../controladores/controladorMostrarCantidadConsultados.php";
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#cantidadseleccionados").html(data); // show response from the php script.
                }
            });
        }
        function valir(){
            var tipocomponente=document.getElementById('tipocomponenteregistrar').value;
            var marcacomponenteMonitor=document.getElementById('marcacomponenteregistrar').value;
            var numeroseriecomponente=document.getElementById('numeroseriecomponente').value;
            var numeroinventariocomponente=document.getElementById('numeroinventariocomponente').value;
            var estadocomponente=document.getElementById('estadocomponente').value;
            var modelocomponente=document.getElementById('modelocomponente').value;

            var radio='';
            $('input[name="radio"]:checked').each(function() {
                radio=document.getElementById($(this).val());});
            if(radio!="")
                radio.setAttribute('name', 'radioo');
            if(numeroinventariocomponente.length>10){
                alert("El numero de inventario solo puede tener 10 digitos");
                document.formularioregistrar.radioo.checked=false;
                $('input[name="radioo"]:checked').each(function() {
                    radio=document.getElementById($(this).val());});
                if(radio!="")
                    radio.setAttribute('name', 'radio');
              
                document.formularioregistrar.radio.checked=false;
                numeroinventariocomponente=null;
                return false;
            }
            if(numeroseriecomponente.length>15){
                alert("El numero de serie solo puede tener 15 digitos");
                document.formularioregistrar.radioo.checked=false;
                $('input[name="radioo"]:checked').each(function() {
                    radio=document.getElementById($(this).val());});
                if(radio!="")
                    radio.setAttribute('name', 'radio');
                document.formularioregistrar.radio.checked=false;
                numeroseriecomponente=null;
                return false;
            }
            if(modelocomponente.length>30){
                alert("El modelo solo puede tener 10 letras");
                document.formularioregistrar.radioo.checked=false;
                $('input[name="radioo"]:checked').each(function() {
                    radio=document.getElementById($(this).val());});
                if(radio!="")
                    radio.setAttribute('name', 'radio');
                document.formularioregistrar.radio.checked=false;
                modelocomponente=null;
                return false;
            }

            if(numeroinventariocomponente.length==0||estadocomponente=="Seleccionar"||tipocomponente=="Seleccionar"||radio==''){
               
                alert("Error al introducir los datos");
                document.formularioregistrar.radioo.checked=false;
                $('input[name="radioo"]:checked').each(function() {
                    radio=document.getElementById($(this).val());});
                if(radio!="")
                    radio.setAttribute('name', 'radio');
                document.formularioregistrar.radio.checked=false;


                return false;
            }
            if(marcacomponenteMonitor=="Seleccionar")
            {
                tipocomponente=null;
                marcacomponenteMonitor=null;
                numeroinventariocomponente=null;
                estadocomponente=null;
                alert("Error al introducir los datos");
                document.formularioregistrar.radioo.checked=false;
                $('input[name="radioo"]:checked').each(function() {
                    radio=document.getElementById($(this).val());});
                if(radio!="")
                    radio.setAttribute('name', 'radio');
                document.formularioregistrar.radio.checked=false;
                return false;
            }
            var url = "../controladores/controladorComponente1.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data); // show response from the php script.
                }
            });

            document.getElementById('tipocomponenteregistrar').value=null;
            document.getElementById('marcacomponenteregistrar').value=null;
            document.getElementById('numeroseriecomponente').value=null;
            document.getElementById('numeroinventariocomponente').value=null;
            document.getElementById('estadocomponente').value=null;
            document.getElementById('modelocomponente').value=null;
            document.formularioregistrar.radioo.checked=false;
            radio.setAttribute('name', 'radio');
            setTimeout("borrar()",3000);

        }
        function borrar(){
            document.getElementById('mensaje').style.visibility='hidden';
history.go(+1);
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
<body>
    <div class="content" style="width: 1050px" >
        <div class="header" id="header" >
            <p style='color:red;margin-left: 450px;visibility: hidden' id='mensajeee'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Seleccione un activo y una estaci&oacute;n </strong></p>
        <!-- <img alt="" width="256" height="84" class="logo_img" /> -->
            <div style="margin-top: -26px" class="logo_img"><img src="/images/logo.jpg" alt="" width="256" height="84" class="logo_img" /></div>
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
            <div class="left" id="left" >
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
                <div id="contenido" style=" margin-left:220px;height: 650px;margin-top: -400px;width: 100%;">
         

                                            <form style="visibility: visible;margin-top: -391px;margin-left: -20px;height: 400px;width: 100%" id="formularioregistrarasignar" name="formularioregistrarasignar" method="post" onsubmit="return valirasignar();" >

                                                <strong style="color: black;font-size:12px">Mover Activos</strong>


                                                <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px"></div>
                                                <div style="">
                                                    <strong style="color: red;">Activo ha reasignar:</strong>
                                                </div>
                                                <div style="width: 250px">
                                                <input style="margin-left: 0px;" type="checkbox" id="activarfiltro">
                                                <strong  >Activar o desactivar filtro</strong></div>
                                                <fieldset id="fieldsetfiltro" style="margin-left: 0px;width: 835px;">
                                                    <legend>
                                                        Filtrar activos por:
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
                                                    <div id="divmarca" style="margin-left: 170px;margin-top: -20px">
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
                                                    <div id="divmarcaa" style="margin-left: 370px;margin-top: -20px">
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
                                                    <div id="divmarcaaa" style="margin-left: 580px;margin-top: -20px">
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

                                                <div id='iddiv' style='margin-top:5px;margin-left: 0px;'><strong><p style='font-size:12px'>Lista de activos</p></strong></div>
                                                <table width='840px' border='1' style=' border: 1px solid #000;
                                                       border-collapse: collapse;
                                                       padding: 0.3em;
                                                       caption-side: bottom;margin-left: 0px;'>
                                                    <tr style='background-image: url(/images/fondo.png)'>
                                                        <td style='width: 76px'><strong><p style='font-size:12px;color:white'>Seleccionar</p></strong></td>
                                                        <td style='width: 112px'><strong><p style='font-size:12px;color:white'>Tipo</p></strong></td>
                                                        <td style='width: 150px'><strong><p style='font-size:12px;color:white'>Marca</p></strong></td>
                                                        <td style='width: 154px'><strong><p style='font-size:12px;color:white'>Num Inventario</p></strong></td>
                                                        <td style='width: 153px'><strong><p style='font-size:12px;color:white'>Num Serie</p></strong></td>
                                                        <td style='width: 48px'><strong><p style='font-size:12px;color:white'>Estado</p></strong></td>
                                                        <td style='width:88px'><strong><p style='font-size:12px;color:white'>Trabajador</p></strong></td>
                                                        <td style='width:148px'><strong><p style='font-size:12px;color:white'>Estaci&oacute;n</p></strong></td>
                                                        <td style='width:330px'><strong><p style='font-size:12px;color:white'>Departamento</p></strong></td>
                                                    </tr>
                                                </table>
                                                <div  id="marcacomponente0" style="margin-left: 0px;margin-top: 0px;overflow-y: scroll;height: 100px;width: 857px"></div>



                                                <div id="divasignara" style="margin-top: 10px">
                                                    <strong style="color: red">Reasignar a:</strong>
                                                    <div>
                                                        <legend>
                                                        Filtrar estaciones por:
                                                    </legend>
                                                        <div style="width: 250px">
                                                        <strong style="font-size:12px;">Departamento:</strong>

                                                        <select id="opcionesestacionesasignar" name="opcionesestacionesasignar" style="width: 150px;">
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

                                                </div>
                                                <div id="estacionesasignarfila1" style="height: 155px;width:840px;margin-top: 5px">


                                                    <strong>Estaciones de trabajos:</strong>

                                                    <table width='840px' border='1' style=' border: 1px solid #000;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;margin-left: 0px;'> <tr style='background-image: url(/images/fondo.png);'>
                                                            <td style='width: 69px'><strong style='font-size:12px;color:white;'>Seleccionar</strong></td>
                                                            <td style='width: 200px'><strong style='font-size:12px;color:white'>Nombre Estaci&oacute;n</strong></td>
                                                            <td style='width: 200px'><strong style='font-size:12px;color:white'>Ubicaci&oacute;n</strong></td>
                                                            <td style='width: 200px'><strong style='font-size:12px;color:white'>Trabajador</strong></td>
                                                            <td style='width: 200px'><strong style='font-size:12px;color:white'>Departamento</strong></td>
                                                        </tr>

                                                    </table>





                                                </div>

                                                <div id="estacionesasignar" style="overflow-y:scroll;height: 130px;width:857px;margin-top: -119px;margin-left: 0px;position: static"></div>
<!--                                                <td style="border-color: white"><input type="button" id="registrarcomponenteasignar" name="registrarcomponenteasignar" value="Mover" style="margin-left: 78%;margin-top: 10px" onclick="valirasignar()" />
                                                    <input type="reset" id="resetearasignar" name="resetearasignar" value="Resetear"  /></td>-->

                                                <div id='iddiv' style="margin-left: 787px;width: 100px;margin-top: 10px"><strong><a onclick="valirasignar()" id='registrarcomponenteasignar'style='margin-left:10px 'href='#'><img src='/images/mover.jpg' alt='' width='15px' height='15px'/>Mover</a></strong>

                                                </div>

                                            </form>



                                           
                                                                                            </div>

                      




                                            <div id="contenidoo" style="visibility: hidden;margin-top:-500%;">
                                            <div style="width: 100%;height: 600px;margin-left: 5%;">
                                               <img src='/images/movimiento.jpg' alt='' width='1000' height='300' />
                                               <img src='/images/movimiento.jpg' alt='' width='1000' height='300' style="margin-top: 50px" />
                                             
                                                </div>
                                            </div>





                                            </div>


                                            </div>
                                           
                                            <div class="footer" id="footer" style="background-color:slategray;margin-top: -49%" >
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