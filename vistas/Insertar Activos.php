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
    <!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            oXML = AJAXCrearObjeto();
oXML.open('get', '../xml/menuprincipal.xml');
oXML.onreadystatechange = leerDatos;
oXML.send('');
            var url = "../controladores/controladorMostrarEstacionInserAct.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#estaciones").html(data); // show response from the php script.
                }
            });

            var url = "../controladores/controladorMostrarEstacion_2.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#estacionesasignar").html(data); // show response from the php script.
                }
            });


            var url = "../controladores/controladorMostrarComponentesAsignar_1.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#marcacomponenteregistrarasignar").html(data); // show response from the php script.
                }
            });


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


            html=null;
            ops = $("select#opcionesestaciones option");

            ops.sort(function (a,b) {
                return ( $(a).html().toUpperCase() < $(b).html().toUpperCase() ) ? -1 : ( $(a).html().toUpperCase() > $(b).html().toUpperCase() ) ? 1 : 0;
            });

            html += "<option>Seleccionar</option>";
            for(i=0;i<ops.length;i++)
            {
                html += "<option value='" + $(ops[i]).val() + "'>" + $(ops[i]).html() + "</option>";
            }
            $("select#opcionesestaciones").html(html);


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


            //$("#asignardesdealmacen").click(function(){
            //   document.getElementById("footer").style.marginLeft=100px;
            //
            //})
            $("#resetear").click(function(){
                var url = "../controladores/controladorMostrarEstacion.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#estaciones").html(data); // show response from the php script.
                    }
                });});

            $("#resetear").click(function(){
                document.getElementById("divmostrarfiltrocomponente").style.visibility="hidden";
                document.getElementById("filtrarcomponentenuminven").style.visibility="hidden";
                html='';
                html += "<option>Seleccionar</option>";
                document.getElementById("trred1").style.visibility="hidden";
                document.getElementById("trred11").style.visibility="hidden";
                document.getElementById("marcacomponenteregistrar").value=null;
               
                $("select#marcacomponenteregistrar").html(html);

                
   


            });
            $("#ainsertarcomponente").click(function(){
                document.getElementById("footer").style.marginTop='-600px';
                document.getElementById("filtrarcomponentenuminven").style.visibility="hidden";
                document.getElementById("filtrobuscarcomponente").style.visibility="hidden";
                document.getElementById("divmostrarfiltrocomponente").style.visibility="hidden";
                document.getElementById("formularioregistrarasignar").style.visibility="hidden";

            });

            $("#opcionesesfiltrarbuscarcomponente").click(function(){

                if(document.getElementById("opcionesesfiltrarbuscarcomponente").value=='Componente'){
                    document.getElementById("divmostrarfiltrocomponente").style.visibility="visible";
                    document.getElementById("filtrarcomponentenuminven").style.visibility="visible";}
                else{

                    document.getElementById("divmostrarfiltrocomponente").style.visibility="hidden";
                    document.getElementById("filtrarcomponentenuminven").style.visibility="hidden";
                }
            });


            $("#botonfiltrarcomponente").click(function(){
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
            
            })








          
            $("#asignardesdealmacen").click(function(){

                html='';
                html += "<option>Seleccionar</option>";
                document.getElementById("trred1").style.visibility="hidden";
                document.getElementById("trred11").style.visibility="hidden";
                document.getElementById("marcacomponenteregistrar").value=null;
                $("select#marcacomponenteregistrar").html(html);
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
                $('#Formulario').each (function(){
  
 
                });
                document.getElementById("formularioregistrarasignar").style.visibility="visible";
                if(document.getElementById("tipocomponenteregistrar").value=="Seleccionar"){
                    //                 document.getElementById("formularioregistrarasignar").style.marginTop="-75.2%";
                    document.getElementById("contenido").style.height='59.4%';
                    document.getElementById("divasignar").style.marginTop='-30%';
                }
                document.getElementById("formularioregistrar").style.visibility="hidden";
                document.getElementById("formularioregistrarasignardepartamento").style.visibility="hidden";
                document.getElementById("trred1").style.visibility="hidden";
                document.getElementById("trred11").style.visibility="hidden";
                //                document.getElementById("footer").style.marginTop='600px';
                document.getElementById("filtrobuscarcomponente").style.visibility="visible";

            });

            $("#asignardesdedepartamento").click(function(){
                html='';
                html += "<option>Seleccionar</option>";
                document.getElementById("trred1").style.visibility="hidden";
                document.getElementById("trred11").style.visibility="hidden";
                document.getElementById("marcacomponenteregistrar").value=null;
                $("select#marcacomponenteregistrar").html(html);
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
                $('#Formulario').each (function(){


                });
                document.getElementById("formularioregistrarasignar").style.visibility="hidden";
                document.getElementById("formularioregistrar").style.visibility="hidden";
                document.getElementById("formularioregistrarasignardepartamento").style.visibility="visible";
                document.getElementById("trred1").style.visibility="hidden";
                document.getElementById("trred11").style.visibility="hidden";
            });

            $("#ainsertarcomponente").click(function(){
                document.getElementById("formularioregistrar").style.visibility="visible";
                document.getElementById("formularioregistrarasignardepartamento").style.visibility="hidden";
                document.getElementById("formularioregistrarasignar").style.visibility="hidden";
                
                if(document.getElementById("modelocomponente").value=='Computadora'){
                    document.getElementById("divasignar").marginTop='40%';
                    document.getElementById("trred1").style.visibility="visible";}
                //                document.getElementById("trred11").style.visibility="visible";
            });
            $("#tipocomponenteregistrar").click(function(){
               
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
                


            });

            $("#tipocomponenteregistrarasignar").click(function(){

                var url = "../controladores/controladorMostrarComponentesAsignar.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#marcacomponenteregistrarasignar").html(data); // show response from the php script.
                    }

                });



            });
            $("#opcionesestacionesasignardeparta").click(function(){
                var url = "../controladores/controladorMostrarEstacionAsignar.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#estacionesasignarotro").html(data); // show response from the php script.
                    }
                });});

            $("#opcionesestacionesasignar").click(function(){
                var url = "../controladores/controladorMostrarEstacionAsignar.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioregistrarasignar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#estacionesasignar").html(data); // show response from the php script.
                    }
                });});

            $("#tipocomponenteregistrar").click(function(){
                if(document.getElementById("tipocomponenteregistrar").value=="Computadora"){
                    document.getElementById("divasignar").style.marginTop='0%';
                    document.getElementById("contenido").style.height='97.3%';
                    $div1=document.getElementById("trred11");
                    $div=document.getElementById("trred1");
                    $div.style.visibility='visible';
                    $div1.style.visibility='visible';




                }
                else{

                    document.getElementById("contenido").style.height='369px';
                    document.getElementById("divasignar").style.marginTop='-28%';
                    if(document.getElementById("tipocomponenteregistrar").value!="Seleccionar"){
                        document.getElementById("divasignar").style.marginTop='-28%';
    
                    }
                    $div=document.getElementById("trred1");
                    $div.style.visibility='hidden';
                    $div1.style.visibility='hidden';
                }
            });
            $("#opcionesestaciones").click(function(){
                var url = "../controladores/controladorMostrarEstacionInserAct.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#estaciones").html(data); // show response from the php script.
                    }
                });

               
               
            });
               $("#agregaruser").click(function(){
   
            setTimeout("valir()",1);
        })
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
            if((radioestacionasignar==null)&&(radiocomponenteasignar==null)){
                alert('Debe seleccione un componente y una estacion');
                bandera=false;
            }
            if((radioestacionasignar==null)&&(radiocomponenteasignar!=null)){
                alert('Debe seleccione una estacion');
                bandera=false;
            }
            if((radiocomponenteasignar==null)&&(radioestacionasignar!=null)){
                alert('Debe seleccione un componente');
                bandera=false;
            }
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

//            if(numeroinventariocomponente.length==0||estadocomponente=="Seleccionar"||tipocomponente=="Seleccionar"||radio==''){
//
//                alert("Error al introducir los datos");
//                document.formularioregistrar.radioo.checked=false;
//                $('input[name="radioo"]:checked').each(function() {
//                    radio=document.getElementById($(this).val());});
//                if(radio!="")
//                    radio.setAttribute('name', 'radio');
//                document.formularioregistrar.radio.checked=false;
//
//
//                return false;
//            }
//            if(marcacomponenteMonitor=="Seleccionar")
//            {
//                tipocomponente=null;
//                marcacomponenteMonitor=null;
//                numeroinventariocomponente=null;
//                estadocomponente=null;
//                alert("Error al introducir los datos");
//                document.formularioregistrar.radioo.checked=false;
//                $('input[name="radioo"]:checked').each(function() {
//                    radio=document.getElementById($(this).val());});
//                if(radio!="")
//                    radio.setAttribute('name', 'radio');
//                document.formularioregistrar.radio.checked=false;
//                return false;
//            }
            var url = "../controladores/controladorComponente1.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#header").html(data);
                     // show response from the php script.
                }
            }); setTimeout("borrar()",3000);
                var url = "../controladores/controladorComponenteError.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $("#headerr").html(data); // show response from the php script.
                }
            });
             setTimeout("error()",1);
            setTimeout("borrar()",3000);
setTimeout("actualizarcpu()",1);
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
document.getElementById('mensajeee').style.visibility='hidden';
            return true;

        }
         function actualizarcpu(){
             document.getElementById('seriecpu').value=null;
             document.getElementById('seriehdd').value=null;
              document.getElementById('mouse').checked=0;
              document.getElementById('teclado').checked=0;
              document.getElementById('bocinas').checked=0;
              document.getElementById('lectorcd').checked=0;
              document.getElementById('quemadorcd').checked=0;
              document.getElementById('lectordvd').checked=0;
              document.getElementById('quemadordvd').checked=0;
              var url = "../controladores/controladorActualizarselectCpu.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $("#tipocpu").html(data); // show response from the php script.
                }
            });
   var url = "../controladores/controladorActualizarselectVelocidadCpu.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $("#velocidadcpu").html(data); // show response from the php script.
                }
            });
             var url = "../controladores/controladorActualizarselectTipoHdd.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $("#tipohdd").html(data); // show response from the php script.
                }
            });
                 var url = "../controladores/controladorActualizarselectCapacidadHdd.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $("#capacidadhdd").html(data); // show response from the php script.
                }
            });
               var url = "../controladores/controladorActualizarselectTipoRam.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $("#tiporam").html(data); // show response from the php script.
                }
            });
                 var url = "../controladores/controladorActualizarselectCapacidadRam.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $("#capacidadram").html(data); // show response from the php script.
                }
            });
        }
            function error(){
         var url = "../controladores/controladorComponenteError.php"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#formularioregistrar").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $("#headerr").html(data); // show response from the php script.
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
                <div id="contenido" style=" margin-left:200px;height: 369px;margin-top: -470px;width: 810px;">
<!--                    <div style="margin-top: -10px;margin-left: 200px;width: 100%">
                        <a id="ainsertarcomponente"  href="#" style="margin-top: 10px;width: 100%">Insertar Activos</a>
                        <div style="margin-top: -15.5px;margin-left: 100px;width: 100%">
                            <a id="asignardesdealmacen" href="#" style="margin-left:75px;width: 100%">Mover Activos</a>

                                                    <a  id="asignardesdedepartamento" href="#" style="margin-top: 10px;height: 50px;margin-left:75px">Asignarlo desde un departamento</a>
                            
                        </div>
                    </div>-->


                    <form style="visibility: visible;margin-top:70px;width: 830px" id="formularioregistrar" name="formularioregistrar" method="post" onsubmit="return valir();">

                        <strong style="color: black;font-size:12px">Insertar Activos </strong>

                        <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px"></div>

                        <strong style="color: red">Datos del activo:</strong>
                        <div style="margin-left: 10px;margin-top: 5px">
                            <table  width="50%" border="1" style=" border: 1px solid #000;
                                    border-collapse: collapse;
                                    padding: 0.3em;
                                    caption-side: bottom;">


                                <strong style="font-size:12px;margin-left: 39px">Tipo de activo: </strong>
                                <select name="tipocomponenteregistrar" id="tipocomponenteregistrar"  style="width: 25%;margin-top: 0px;">

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


                                <strong style="font-size:12px;margin-left: 56px">Marca del activo: </strong>
                                <select name="marcacomponenteregistrar" id="marcacomponenteregistrar"  style="width: 25%;margin-top: 0px">
                                    <option>Seleccionar</option>
                                </select>



                                <div style="width: 650px;margin-left: 80.5px;margin-top: 5px">
                                    <strong><strong style="font-size:12px">Modelo:</strong>
                                        <input type="text" name="modelocomponente" id="modelocomponente" placeholder="Campo no obligatorio" style="width: 31.5%;"/>


                                        <strong style="font-size:12px;margin-left: 56.5px">N&uacute;mero de serie:</strong>
                                        <input type="text" name="numeroseriecomponente" id="numeroseriecomponente" placeholder="Campo no obligatorio" style="width: 31.5%;"/>
                                </div>
                                <div style="margin-top: 5px">
                                    <strong  style="width: 150px;margin-left: -8px"><strong style="font-size:12px">N&uacute;mero de Inventario:</strong>
                                        <input type="text" name="numeroinventariocomponente" id="numeroinventariocomponente" placeholder="Campo obligatorio"style="width: 25%;"/>


                                        <strong  style="width: 150px;margin-left: 111px"><strong style="font-size:12px">Estado:</strong>
                                            <select id="estadocomponente" name="estadocomponente" style="width: 25%;">
                                                <option>Seleccionar</option>
                                                <?php
                                                include_once '../modelo/ModeloLog.php';
                                                $extract = extract($_GET);
                                                $obj = new ModeloLog();
                                                $mostrar = $obj->mostrar_estados();

                                                foreach ($mostrar as $i) {
                                                    $estado = utf8_decode($i->nombreestado);
                                                    echo "<option>$estado</option>";
                                                }
                                                ?>
                                            </select>
                                            <div id="trred1" style="visibility: hidden;border-color: white;margin-left: 472px;margin-top:5px">
                                                <strong>Red:</strong>
                                                <select id="red" name="red" value="Computadora" style="width: 59%;">
                                                    <option>Si</option>
                                                    <option>No</option>
                                                </select>


                                            </div>
                                            <div id="trred11" style="visibility: hidden;border-color: white;margin-left: 115px;margin-top:-20px">
                                                <strong>IP: </strong>
                                                <input id="ip" name="ip" value="0.0.0.0" style="width: 29%;"/>
                                                <div style="margin-top: 5px"></div>

                                                <fieldset style="margin-left: -2%;width: 86%">
                                                    <legend>CPU</legend>
                                                    <strong>Tipo: </strong>
                                                    <select id="tipocpu" name="tipocpu" style="width: 25%;">
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

                                                    <strong style="margin-left: 2px">Serie: </strong>
                                                    <input style="width: 25%" id="seriecpu" name="seriecpu" type="text">
                                                    <strong  style="margin-left: 2px">Velocidad: </strong>
                                                    <select id="velocidadcpu" name="velocidadcpu" style="width: 25%;">
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

                                                </fieldset>

                                                <fieldset style="margin-left: -2%;width: 86%;margin-top: 5px">
                                                    <legend>HDD</legend>
                                                    <strong>Marca: </strong>
                                                    <select id="tipohdd" name="tipohdd" style="width: 25%;">
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

                                                    <strong style="margin-left: 2px">Serie: </strong>
                                                    <input style="width: 24%" id="seriehdd" name="seriehdd" type="text">
                                                    <strong  style="margin-left: 2px">Capacidad: </strong>
                                                    <select id="capacidadhdd" name="capacidadhdd" style="width: 24%;">
                                                        <option>Seleccionar</option>
                                                        <?php
                                                        include_once '../modelo/ModeloLog.php';
                                                        $extract = extract($_GET);
                                                        $obj = new ModeloLog();
                                                        $mostrar = $obj->mostrar_capacidadhdd();
                                                        foreach ($mostrar as $i) {
                                                            $capacidadhddd = utf8_decode($i->capacidadhdd);
                                                            echo "<option>$capacidadhddd</option>";
                                                        }
                                                        ?>
                                                    </select>

                                                </fieldset>

                                                <fieldset style="margin-left: -2%;width: 86%;margin-top: 5px">
                                                    <legend>RAM y Perifericos</legend>
                                                    <strong>Tipo: </strong>
                                                    <select id="tiporam" name="tiporam" style="width: 25%;">
                                                        <option>Seleccionar</option>
                                                        <?php
                                                        include_once '../modelo/ModeloLog.php';
                                                        $extract = extract($_GET);
                                                        $obj = new ModeloLog();
                                                        $mostrar = $obj->mostrar_tiporam();
                                                        foreach ($mostrar as $i) {
                                                            $nombretiporam = utf8_decode($i->nombretiporam);
                                                            echo "<option>$nombretiporam</option>";
                                                        }
                                                        ?>
                                                    </select>

                                                    <strong  style="margin-left: 2px">Capacidad: </strong>
                                                    <select id="capacidadram" name="capacidadram" style="width: 25%;">
                                                        <option>Seleccionar</option>
                                                        <?php
                                                        include_once '../modelo/ModeloLog.php';
                                                        $extract = extract($_GET);
                                                        $obj = new ModeloLog();
                                                        $mostrar = $obj->mostrar_capacidadram();
                                                        foreach ($mostrar as $i) {
                                                            $capacidadram = utf8_decode($i->capacidadram);
                                                            echo "<option>$capacidadram</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <div style="margin-left: 68%;margin-top: -3%">
                                                        <input type="checkbox" id="mouse" name="mouse" value="no">
                                                        <input type="checkbox" id="teclado" name="teclado" value="no">
                                                        <input type="checkbox" id="bocinas" name="bocinas" value="no">
                                                        <input type="checkbox" id="lectorcd" name="lectorcd" value="no">
                                                        <input type="checkbox" id="quemadorcd" name="quemadorcd" value="no">
                                                        <input type="checkbox" id="lectordvd" name="lectordvd" value="no">
                                                        <input type="checkbox" id="quemadordvd" name="quemadordvd" value="no">
                                                        <input type="checkbox" id="fuente" name="fuente" value="no">
                                                    </div>
                                                    <div style="margin-left: 69%;margin-top: -6%">
                                                        <strong style="color: blue">1</strong>
                                                        <strong style="margin-left: 7%;color: red">2 </strong>
                                                        <strong style="margin-left: 7%;color: #fbd850">3 </strong>
                                                        <strong style="margin-left: 7%;color: green">4 </strong>
                                                        <strong style="margin-left: 7%;color: violet">5</strong>
                                                        <strong style="margin-left: 7%;color: dimgray">6</strong>
                                                        <strong style="margin-left: 7%;color: #e78f08">7 </strong>
                                                        <strong style="margin-left: 7%;color: black">8 </strong>
                                                    </div>
                                                    <div style="margin-top: 5%">
                                                        <strong style="color: blue">1.Mouse</strong>
                                                        <strong style="color: red;margin-left: 8px">2.Teclado</strong>
                                                        <strong style="color: #fbd850;margin-left: 8px">3.Bocinas</strong>
                                                        <strong style="color: green;margin-left: 8px">4.Lector CD</strong>
                                                        <strong style="color: violet;margin-left: 8px">5.Quemador CD</strong>
                                                        <strong style="color: dimgray;margin-left: 8px">6.Lector DVD</strong>
                                                        <strong style="color: #e78f08;margin-left: 8px">7.Quemador DVD</strong>
                                                        <strong style="color: black;margin-left: 8px">8.Fuente</strong>

                                                    </div>
                                                </fieldset>


                                            </div>
                                            </div>
                                            </div>

<!--                               <strong  style="width: 150px;margin-top: 5px"><strong style="font-size:12px">Observaciones:</strong>
     <input type="" name="observacionescomponentes" id="observaciones" placeholder="Campo no obligatorio" style="width: 40%;height: 80%"/>
                                            -->

                                            </tr>

                                            </tr>

                                            </table>



                                            <div>

                                            </div>
                                            <div id="divasignar" style="margin-top: -28%">
                                                <strong style="color: red">Asignar a:</strong>
                                                <div>

                                                    <strong style="font-size:12px;">Departamento:</strong>

                                                    <select id="opcionesestaciones" name="opcionesestaciones" style="width: 25%;">
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
                            <table width='828px' border='1' style=' border: 1px solid #000;
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
<div  id="estaciones" style="margin-top: 0px;overflow-y: scroll;height: 165px;width: 845px"></div>





                        </div>
                                            <td style="border-color: white">&nbsp;</td>
                                             <div id='iddiv' style="margin-left: 658px;width: 200px;margin-top: 41px"><strong><a id='agregaruser'style='margin-left:10px 'href='#'><img src='/images/agregar.jpg' alt='' width='15px' height='15px'/>Agregar</a></strong><td></strong>

                        </div>

                                            </form>














                                            <form style="visibility: hidden;margin-top: -371px;margin-left: -10px;height: 400px;width: 100%" id="formularioregistrarasignar" name="formularioregistrarasignar" method="post" onsubmit="return valirasignar();" >

                                                <strong style="color: black;font-size:12px">Asignar activos desde un departamento </strong>


                                                <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px"></div>
                                                <div style="">
                                                    <strong style="color: red;">Activo ha reasignar:</strong>
                                                </div>
                                                <div id="filtrobuscarcomponente" style="visibility: hidden;margin-top: 5px"></div>
                                                <strong style="font-size:12px;margin-left: 12px">Filtrar por:</strong>

                                                <select id="opcionesesfiltrarbuscarcomponente" name="opcionesesfiltrarbuscarcomponente" style="width: 15%;">
                                                    <option>Seleccionar</option>
                                                    <option>Departamento</option>
                                                    <option>Componente</option>

                                                </select>
                                                <div id="filtrarcomponentenuminven" style="visibility: hidden;margin-left: 230px;margin-top: -20px">
                                                    <strong style="color: black;font-size:12px">Numero de Inventario: </strong>
                                                    <input id="filtrarcomponentenumeroinventario" name="filtrarcomponentenumeroinventario" type="text" onkeypress="buscarcomponente()">
                                                    <a id="botonfiltrarcomponente" href="#" style="margin-left:10px;margin-top:5px">Buscar</a>

                                                </div>
                                                <div id="divmostrarfiltrocomponente" style="height:20px;">



                                                </div>
                                                <div id="divasignara" style="margin-top: 80px">
                                                    <strong style="color: red">Reasignar a:</strong>
                                                    <div>
                                                        <strong style="font-size:12px;margin-left: 12px">Departamento:</strong>

                                                        <select id="opcionesestacionesasignar" name="opcionesestacionesasignar" style="width: 24.5%;">
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
                                                <div id="estacionesasignarfila1" style="height: 150px;width:99.5%;margin-top: 5px">


                                                    <strong>Estaciones de trabajos:</strong>
                                                    <table width='840px' border='1' style=' border: 1px solid #000;
                               border-collapse: collapse;
                               padding: 0.3em;
                               caption-side: bottom;margin-left: 0px;'>
                                 <tr style='background-image: url(/images/fondo.png)'>
                                    <td style='width: 69px'><strong style='font-size:12px;color:white;'>Sele</strong></td>
                                    <td style='width: 200px'><strong style='font-size:12px;color:white'>Nombre Estaci&oacute;n</strong></td>
                                    <td style='width: 200px'><strong style='font-size:12px;color:white'>Ubicaci&oacute;n</strong></td>
                                    <td style='width: 200px'><strong style='font-size:12px;color:white'>Trabajador</strong></td>
                                    <td style='width: 200px'><strong style='font-size:12px;color:white'>Departamento</strong></td>
                                </tr>

                            </table>





                                                </div>

                                                <div id="estacionesasignar" style="overflow-y:scroll;height: 90px;width:101%;margin-top: -115px;margin-left: 1.6;position: static"></div>
                                                 <div id='iddiv' style="margin-left: 220px;width: 800px;margin-top: -22px"><strong><a id='agregaruser'style='margin-left:10px 'href='#'><img src='/images/agregar.jpg' alt='' width='15px' height='15px'/>Agregar</a></strong><strong style='font-size:12px;margin-top: 10px'><td style='width: 144px'><a id='eliminaruser'onclick="validareliminaruser()" style='margin-left:15px 'href='#'><img src='/images/eliminar.jpg' alt='' width='15px' height='15px'/>Eliminar</a><td></strong>

                        </div>



                                            </form>



                                            <!--













                                                                                        <form style="visibility: hidden;margin-top: -372.5px;margin-left: 0px ;width: 830px" id="formularioregistrarasignardepartamento" name="formularioregistrarasignardepartamento" method="post" onsubmit="return valirasignar();" action="../controladores/cambiarContrasena_1.php">

                                                                                            <strong style="color: black;font-size:12px">Asignar componente desde un departamento</strong>

                                                                                            <div style="background-image:url(/images/fondo.png) ;width: 830px;height: 5px"></div>

                                                                                            <strong style="color: red">Componentes a asignar:</strong>
                                                                                            <div style="margin-left: 10px;margin-top: 5px;height: 100px">


                                                                                                <strong style="font-size:12px">Departamento:</strong>

                                                                                                <select id="opciones" name="opciones" >

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


                                                                                                                                                    <div id="marcacomponenteregistrarasignardepartamento" style="overflow-y:scroll;height: 117px;margin-left: -10px;width:103.2%;margin-top: 5px"></div>
                                                                                                                                                </div>
                                                                                                                                                <div style="margin-top: 36px">
                                                                                                                                                    <strong style="color: red">Asignar a:</strong>
                                                                                                                                                    <div>
                                                                                                                                                        <strong style="font-size:12px;margin-left: 12px">Departamento:</strong>

                                                                                                                                                        <select id="opcionesestacionesasignardepartamento" name="opcionesestacionesasignardepartamento" style="width: 24.5%;">
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

                                                                                            <div id="estacionesasignardepartamento" style="overflow-y:scroll;height: 117px;width:102%;margin-top: 5px"></div>


                                                                                            <td style="border-color: white">&nbsp;</td>
                                                                                            <td style="border-color: white"><input type="submit" id="registrarcomponenteasignardepartamento" name="registrarcomponenteasignardepartamento" value="Registrar" style="margin-left: 662px;margin-top: 10px" />
                                                                                                <input type="reset" name="resetearasignardepartamento" value="Resetear"  /></td>

                                                                                        </form>-->




                                            <div id="contenidoo" style="visibility: hidden;margin-top: -900%">
                                                <div style="width: 100%;height: 80%;margin-left: 5%;">
                                                    <table width='60%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%'><strong style="font-size: 10px">ENTIDAD:</strong></td>
                                                            <td style='width: 20%;height: 2%'><strong style="font-size: 10px">CODIGO:</strong></td>

                                                        </tr>

                                                    </table>
                                                    <table width='60%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">DIRECCION:</strong></td></tr>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">AREA:</strong></td></tr>


                                                    </table>


                                                    <table width='13%' border='1' style='margin-left: 60%;margin-top: -6%;height: 9%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 15%' align="center"><strong>MOVIMIENTO DE MEDIOS BASICOS</strong></td></tr>

                                                    </table>
                                                    <table width='73%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">Descripcion:</strong></td></tr>

                                                    </table>
                                                    <table width='30%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 5%;height: 35px'><strong style="font-size: 10px">CNMB</strong></td></tr>
                                                        <tr><td style='width: 5%;height: 20px'><strong style="font-size: 10px">Inventario No:</strong></td></tr>
                                                        <tr><td style='width: 5%;height: 34px'><strong style="font-size: 10px">SUB CUENTA No:</strong></td></tr>

                                                    </table>

                                                    <table width='43%' border='1' style=';margin-left: 30%;margin-top: -8.6%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 11%' align="center"><strong style="font-size: 10px">ADQUISICION</strong></td><td style='width: 21%'  align="center">
                                                                <strong style="font-size: 10px">ALQUILER</strong></td><td style='width: 5%'  align="center"><strong style="font-size: 10px">DEPRECIACION</strong></td></tr>


                                                    </table>
                                                    <table width='43%' border='1' style=';margin-left: 30%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 4.5%;height: 19px'><strong style="font-size: 10px">D</strong></td><td style='width: 4.5%'>
                                                                <strong style="font-size: 10px">M</strong></td>
                                                            <td style='width: 4%'><strong style="font-size: 10px">A</strong></td>
                                                            <td style='width: 7%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 11%'><strong style="font-size: 10px">DEVOLUCION</strong></td>
                                                            <td style='width: 10.8%'><strong style="font-size: 10px">$</strong></td>
                                                        </tr>


                                                    </table>
                                                    <table width='33%' border='1' style=';margin-left: 30%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 3.5%;height: 21px'><strong style="font-size: 10px"></strong></td><td style='width: 3.5%'>
                                                                <strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 3.2%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 2.7%'><strong style="font-size: 10px">TIEMPO</strong></td>
                                                            <td style='width: 3.5%'><strong style="font-size: 10px">D</strong></td>
                                                            <td style='width: 3.5%'><strong style="font-size: 10px">M</strong></td>
                                                            <td style='width: 3.5%'><strong style="font-size: 10px">A</strong></td>

                                                        </tr>


                                                    </table>
                                                    <table width='33%' border='1' style=';margin-left: 30%;height: 34px;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 12%;height: 14px'><strong style="font-size: 10px">VALOR</strong></td>
                                                            <td style='width: 6.5%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 4.4%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 4.2%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 4.2%'><strong style="font-size: 10px"></strong></td>

                                                        </tr>


                                                    </table>
                                                    <table width='10%' border='1' style=';margin-left: 63%;margin-top: -5.3%;height: 55px;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 11.6%;height: 30px'><strong style="font-size: 10px"></strong></td>


                                                        </tr>


                                                    </table>

                                                    <table width='73%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">ENTIDAD</strong></td></tr>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">DIRECCION</strong></td></tr>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">AREA:</strong></td></tr>

                                                    </table>
                                                    <table width='20%' border='1' style=';margin-top: -1.5%;margin-left: 53%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">FIRMA:</strong></td></tr>

                                                    </table>
                                                    <table width='73%' border='1' style='height: 30px;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 20%;height: 15px' align="center"><strong style="font-size: 10px;margin-top: -4%">TIPO DE MOVIMIENTO</strong>
                                                                <div style="margin-left: -90%">
                                                                    <input stype="" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                </div>
                                                                <div style="margin-top: -10%;margin-left: -20%">
                                                                    <input type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                </div>
                                                                <div style="margin-top: -11%;margin-left: 35%"><input type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                </div>
                                                                <div style="margin-top: -11%;margin-left: 70%"><input type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                </div>
                                                            </td>
                                                            <td style='width: 5%' align="center"><strong style="font-size: 10px;" >FUNDAMENTACION DE LA OPERACION</strong></td></tr>

                                                    </table>
                                                    <table width='20%' border='1' style=';margin-left: 74%;margin-top: -27%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;height: 30%'>

                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%' align="center"><strong style="font-size: 10px">INFORME TECNICO</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 20px'><strong style="font-size: 10px">NOMBRE:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 20px'><strong style="font-size: 10px">CARGO:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 40px'><strong style="font-size: 10px">Hecho:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 40px'><strong style="font-size: 10px">Transportador o Receptor</strong><p style="font-size: 10px">Firma:</p></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 40px'><strong style="font-size: 10px">Autorizado Firma:</strong><p style="font-size: 10px">Cargo:</p></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 40px'><strong style="font-size: 10px">Aprobado Firma:</strong><p style="font-size: 10px">Cargo:</p></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 20px'><strong style="font-size: 10px">ANOTADO:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 25px'><strong style="font-size: 10px">COMPROBANTE DE OPERACIONES No:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 20px'><strong style="font-size: 10px">ENTIDAD:</strong></td>
                                                        </tr>

                                                    </table>
                                                </div>

                                                <div style="width: 100%;height: 80%;margin-left: 5%;margin-top: -160px">
                                                    <table width='60%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%'><strong style="font-size: 10px">ENTIDAD:</strong></td>
                                                            <td style='width: 20%;height: 2%'><strong style="font-size: 10px">CODIGO:</strong></td>

                                                        </tr>

                                                    </table>
                                                    <table width='60%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">DIRECCION:</strong></td></tr>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">AREA:</strong></td></tr>


                                                    </table>


                                                    <table width='13%' border='1' style='margin-left: 60%;margin-top: -6%;height: 9%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 15%' align="center"><strong>MOVIMIENTO DE MEDIOS BASICOS</strong></td></tr>

                                                    </table>
                                                    <table width='73%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">Descripcion:</strong></td></tr>

                                                    </table>
                                                    <table width='30%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 5%;height: 35px'><strong style="font-size: 10px">CNMB</strong></td></tr>
                                                        <tr><td style='width: 5%;height: 20px'><strong style="font-size: 10px">Inventario No:</strong></td></tr>
                                                        <tr><td style='width: 5%;height: 34px'><strong style="font-size: 10px">SUB CUENTA No:</strong></td></tr>

                                                    </table>

                                                    <table width='43%' border='1' style=';margin-left: 30%;margin-top: -8.6%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 11%' align="center"><strong style="font-size: 10px">ADQUISICION</strong></td><td style='width: 21%'  align="center">
                                                                <strong style="font-size: 10px">ALQUILER</strong></td><td style='width: 5%'  align="center"><strong style="font-size: 10px">DEPRECIACION</strong></td></tr>


                                                    </table>
                                                    <table width='43%' border='1' style=';margin-left: 30%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 4.5%;height: 19px'><strong style="font-size: 10px">D</strong></td><td style='width: 4.5%'>
                                                                <strong style="font-size: 10px">M</strong></td>
                                                            <td style='width: 4%'><strong style="font-size: 10px">A</strong></td>
                                                            <td style='width: 7%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 11%'><strong style="font-size: 10px">DEVOLUCION</strong></td>
                                                            <td style='width: 10.8%'><strong style="font-size: 10px">$</strong></td>
                                                        </tr>


                                                    </table>
                                                    <table width='33%' border='1' style=';margin-left: 30%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 3.5%;height: 21px'><strong style="font-size: 10px"></strong></td><td style='width: 3.5%'>
                                                                <strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 3.2%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 2.7%'><strong style="font-size: 10px">TIEMPO</strong></td>
                                                            <td style='width: 3.5%'><strong style="font-size: 10px">D</strong></td>
                                                            <td style='width: 3.5%'><strong style="font-size: 10px">M</strong></td>
                                                            <td style='width: 3.5%'><strong style="font-size: 10px">A</strong></td>

                                                        </tr>


                                                    </table>
                                                    <table width='33%' border='1' style=';margin-left: 30%;height: 34px;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 12%;height: 14px'><strong style="font-size: 10px">VALOR</strong></td>
                                                            <td style='width: 6.5%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 4.4%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 4.2%'><strong style="font-size: 10px"></strong></td>
                                                            <td style='width: 4.2%'><strong style="font-size: 10px"></strong></td>

                                                        </tr>


                                                    </table>
                                                    <table width='10%' border='1' style=';margin-left: 63%;margin-top: -5.3%;height: 55px;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 11.6%;height: 30px'><strong style="font-size: 10px"></strong></td>


                                                        </tr>


                                                    </table>

                                                    <table width='73%' border='1' style=';
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">ENTIDAD</strong></td></tr>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">DIRECCION</strong></td></tr>
                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">AREA:</strong></td></tr>

                                                    </table>
                                                    <table width='20%' border='1' style=';margin-top: -1.5%;margin-left: 53%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 20%'><strong style="font-size: 10px">FIRMA:</strong></td></tr>

                                                    </table>
                                                    <table width='73%' border='1' style='height: 30px;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;'>

                                                        <tr><td style='width: 20%;height: 15px' align="center"><strong style="font-size: 10px;margin-top: -4%">TIPO DE MOVIMIENTO</strong>
                                                                <div style="margin-left: -90%">
                                                                    <input stype="" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                </div>
                                                                <div style="margin-top: -10%;margin-left: -20%">
                                                                    <input type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                </div>
                                                                <div style="margin-top: -11%;margin-left: 35%"><input type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                </div>
                                                                <div style="margin-top: -11%;margin-left: 70%"><input type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                    <input style="margin-top: -8px" type="checkbox" /><p style="font-size: 8px"></p>
                                                                </div>
                                                            </td>
                                                            <td style='width: 5%' align="center"><strong style="font-size: 10px;" >FUNDAMENTACION DE LA OPERACION</strong></td></tr>

                                                    </table>
                                                    <table width='20%' border='1' style=';margin-left: 74%;margin-top: -27%;
                                                           border-collapse: collapse;
                                                           padding: 0.3em;
                                                           caption-side: bottom;height: 30%'>

                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%' align="center"><strong style="font-size: 10px">INFORME TECNICO</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 20px'><strong style="font-size: 10px">NOMBRE:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 20px'><strong style="font-size: 10px">CARGO:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 40px'><strong style="font-size: 10px">Hecho:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 40px'><strong style="font-size: 10px">Transportador o Receptor</strong><p style="font-size: 10px">Firma:</p></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 40px'><strong style="font-size: 10px">Autorizado Firma:</strong><p style="font-size: 10px">Cargo:</p></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 40px'><strong style="font-size: 10px">Aprobado Firma:</strong><p style="font-size: 10px">Cargo:</p></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 20px'><strong style="font-size: 10px">ANOTADO:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 25px'><strong style="font-size: 10px">COMPROBANTE DE OPERACIONES No:</strong></td>
                                                        </tr>
                                                        <tr style='width: 80%'>
                                                            <td  style='width:35%;height: 20px'><strong style="font-size: 10px">ENTIDAD:</strong></td>
                                                        </tr>

                                                    </table>
                                                </div>
                                                 
                                            </div>





                                            </div>


                                            </div>
                                            </div>
                                            <div class="right" style="margin-top: -5px;background-color: blueviolet"> <!-- Capa right -->
                                            </div>
         
                                            <div class="footer" id="footer" style="background-color:slategray;margin-top: -49%" >

                                                <p>Copyright &copy; 2013, Centro Nacional de Cirug&iacute;a de M&iacute;nimo Acceso, <br />
                                                    Calle P&aacute;rraga #215, entre San Mariano y Vista Alegre |</font> La Vibora <font size="2">|</font>10 de Octubre <font size="2">|</font> La Habana <font size="2">|</font> Cuba<font face="Trebuchet MS"><font face="Trebuchet MS"> <br />
                                                            <img src="/images/telefonos.jpg" width="16" height="16" />Telf.: (537) 649-5328, (537) 649-5331, (537)
                                                            649-5332 <font size="2">|</font> FAX:
                                                            (537) 649-0150</font></font><font face="Trebuchet MS"><font face="Trebuchet MS"></font></font><br />
                                                </p>
                                            </div>
      <div style="margin-left: 43%"  id="headerr" ></div>
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