<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Inventario Artint</title>
        <link rel="stylesheet" type="text/css" href="../css/ejemplo/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/ejemplo/common.css" />
        <link rel="stylesheet" type="text/css" href="../css/ejemplo/style7.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="../js/ejemplo/modernizr.custom.79639.js"></script> 
        
                <title>Sistema Inventario Artint</title>
        <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css">
       <style type="text/css">
            //Escritorio grande
            @media(min-width:1200px){
                body{color: black;}
            }
            @media(min-width: 1200px){
                body{color: black;} 
                #devices{margin-top: 120px;}
                #divregistrar{margin-top: 40px}
                #divregistrar{margin-left: -20px}
                #pepe{margin-left: 70px}
            }
            @media(min-width:980px) and (max-width:1199px){
                body{color: black;}
                .row-fluid{width: 320px}
                #pepe{margin-top: 10px;}
                #devices{margin-top: 60px}
                #divregistrar{margin-top: 10px}
            }
            @media(min-width:768px) and (max-width:979px){
                body{color: black;}
            }
            @media(min-width:768px) and (max-width:979px){
                body{color: black;}
                .row-fluid{width: 320px}
                /*               #registrate{margin-top: 50px;}*/
                #pepe{margin-top: 20px;}
                #formloguiarr{margin-left: -80px;}
                #devices{margin-top: 30px}
                 #divregistrar{margin-left: -15px;}
            }
            //Table o smartphone
            @media(max-width:767px){
                body{color: black;}
            }
            @media(max-width:767px){
                body{color: black;}
                .row-fluid{width: 260px}
                #divregistrar{margin-left: -15%;}
                #pepe{margin-left: 30px;}
                #pepe{margin-top: 10px;}
                #formloguiarr{width: 200px;}
                #formloguiarr{margin-left: 200px;}
            }
            //Smartphone
            @media(max-width:480px){
                body{color: black;}
            }
            @media(max-width:480px){
                body{color: black;}
                #divregistrar{margin-left: -45%;}
                .row-fluid{width: 260px;}
                #pepe{margin-left: 30px;}
                #formloguiarr{margin-left: 0px;}
            }
        </style>
    </head>
    <body>
        <div class="container">
                    <div class="row">
                <div class="span1"></div>
                <div class="span10">
<!--                    <div>
                        <h2 style="color: blue" class="text-center">Gestiona tus activos sobre el sistema de inventario de Artint</h2>
                    </div>-->
                </div>
            </div>
            <div class="codrops-top">
            <div  class="row">
                <div class="span1">
                </div>
                <div class="span2">
                    <div style="background-color:blue">
                        <img src="/images/artint.jpg"/>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="span3" ></div>
                    <div class="span6" >
                        <div class="span6" >
                            <form class="form-inline"  id="formloguiarr" name="formloguiarr"  method="post" >
                                <div class="row">
                                    <div class="span2" style="margin-top: 10px;">
                                        <strong>Nombre: </strong>
                                        <input style="width: 100%" id="usuarioregistrado" name="usuarioregistrado" type="text" placeholder="Usuario" onfocus="tabbb()"> 
                                    </div>
                                    <div class="span2" >
                                        <div style="margin-top: 10px;">
                                            <strong> Contrase&ntilde;a: <input style="width: 100%" id="contrasenaregistrada" type="password" name="contrasenaregistrada" onfocus="tabbb()"></strong>
                                        </div>
                                    </div>
                                    <div class="span2" style="margin-top: 30px;">
                                        <input class="btn" type="button" value="Iniciar sesion"  onclick="return validarlogeooo()">
                                    </div>
                                </div>
                            </form> 
                             <div id="pepe">
                                </div>
                        </div>
                    </div>
                </div>
            </div>    </div>
            <div class="span1"></div>
            <div id="devices" class="span4">
                <legend class="text-center">Administra tus activos desde cualquier dispositivo<img src="/images/devices.png"/></legend>
                
                </div>
                <div id="divregistrar"  class="span6">
                    
                    <form  id="formloguiar" name="formloguiar"  method="post" style="margin-top: -10px;margin-left: 45%;-moz-border-radius:15 px;">
                        <div class="row-fluid">
                            <div class="span10" >
                               
                                <h2 id="registrate">Registrate</h2>
                                <div class="well" >
                                    <strong>Nombre: <input id="nombre" name="nombre" type="text" placeholder="Nombre" onkeydown="return isstringKeyy()" onfocus="return tab()"> </strong>
                                    <strong><input id="apellidos" name="apellidos" type="text" placeholder="Apellidos" onkeydown="return isstringKeyy()" onfocus="return tab()"></strong>
                                    <div >
                                        <strong> Correo Electronico: <input id="email" name="email" type="text" placeholder="@gmail.com" onkeydown="return isstringKeyy()" onfocus="return tab()"></strong>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span10" >
                                            <strong> Usuario: <input id="usuario" name="usuario" type="text" onkeydown="return isstringKeyy()" onfocus="return tabb()"></strong>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span2" >
                                            <strong> Contrase&ntilde;a: <input id="contrasena" type="password" name="contrasena" onkeydown="return isstringKeyy()" onfocus="return tab()"></strong>
                                        </div>
                                    </div>
                                    <div >
                                        <strong>Confirmar Contrase&ntilde;a:  <input id="confirmarcontrasena" type="password" name="confirmarcontrasena" onkeydown="return isstringKeyy()" onfocus="return tab()"></strong>
                                    </div>
                                    <input class="btn" type="button" id="crear" name="crear" value="Crear" style="margin-left:150px" onclick="return validarlogeoooo()">
                                    <div class="row-fluid">
                                        <div class="span12" >
                                            <strong>Acceder con:</strong>
                                            <?php
                                            @ session_start();
                                            require_once( 'Facebook/FacebookSession.php' );
                                            require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
                                            require_once( 'Facebook/FacebookRequest.php' );
                                            require_once( 'Facebook/FacebookResponse.php' );
                                            require_once( 'Facebook/FacebookSDKException.php' );
                                            require_once( 'Facebook/FacebookRequestException.php' );
                                            require_once( 'Facebook/FacebookAuthorizationException.php' );
                                            require_once( 'Facebook/GraphObject.php' );
                                            require_once( 'Facebook/Entities/AccessToken.php' );
                                            require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
                                            require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );
                                            require_once( 'Facebook/HttpClients/FacebookCurl.php' );

                                            use Facebook\FacebookSession;
                                            use Facebook\FacebookRedirectLoginHelper;
                                            use Facebook\FacebookRequest;
                                            use Facebook\FacebookResponse;
                                            use Facebook\FacebookSDKException;
                                            use Facebook\FacebookRequestException;
                                            use Facebook\FacebookAuthorizationException;
                                            use Facebook\GraphObject;
                                            use Facebook\Entities\AccessToken;
                                            use Facebook\HttpClients\FacebookHttpable;
                                            use Facebook\HttpClients\FacebookCurlHttpClient;
                                            use Facebook\HttpClients\FacebookCurl;

// init app with app id (APPID) and secret (SECRET)
                                            FacebookSession::setDefaultApplication('774701729271489', '01870b9b6f19ae71b847f25120f35d07');

// login helper with redirect_uri
                                            $helper = new FacebookRedirectLoginHelper('http://localhost/vistaFacebook/facebook.php');

                                            try {

                                                $session = $helper->getSessionFromRedirect();
                                            } catch (FacebookRequestException $ex) {
                                                // When Facebook returns an error
                                            } catch (Exception $ex) {
                                                // When validation fails or other local issues
                                            }

// see if we have a session
                                            if (isset($session)) {
                                                // graph api request for user data
                                                $request = new FacebookRequest($session, 'GET', '/me');
                                                $response = $request->execute();
                                                // get response
                                                $graphObject = $response->getGraphObject();

                                                // print data
                                                echo print_r($graphObject, 1);
                                            } else {
                                                // show login url
                                                echo '<div class="row-fluid"><div class="span12"><a href="' . $helper->getLoginUrl() . '"><img src="/images/facebook.jpg"/></a></div></div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script language="javascript" type="text/javascript">
        var click = 0;
        var clickk = 0;
        var clickkk = 0;

        function isstringKeyy() {
            if (!document.getElementById('elusuarioexiste')) {
                document.getElementById('crear').disabled = false;
            } else {
                document.getElementById('crear').disabled = true;
            }
            if (clickkk == 10 && clickk == 10) {

                var url = "/controladores/controladorLoginUserGlobal_1_1.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#formloguiar").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        $("#pepee").html(data); // show response from the php script.
                    }
                });
            }
            if (varbanderauser == 1) {
                document.getElementById('crear').disabled = true;
            }
            if (varbanderauser == 0) {
                document.getElementById('crear').disabled = false;
            }
        }

        function tab() {
            click = 2;
            clickk = 10;
            document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
            document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
            return isstringKey();
        }

        function tabb() {
            click = 2;
            clickkk = 10;
            document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
            document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
            return isstringKey();
        }

        function tabbb() {
            click = 1;
            document.getElementById("nombre").style.border = "1px solid #cccccc";
            document.getElementById("apellidos").style.border = "1px solid #cccccc";
            document.getElementById("usuario").style.border = "1px solid #cccccc";
            document.getElementById("email").style.border = "1px solid #cccccc";
            document.getElementById("contrasena").style.border = "1px solid #cccccc";
            document.getElementById("confirmarcontrasena").style.border = "1px solid #cccccc";
        }

        window.onload = function (elEvento) {
            document.getElementById('crear').disabled = true;
            document.onkeypress = validarlogeoo;

            $("input[id=usuarioregistrado]").click(function () {
                click = 1;
                document.getElementById("nombre").style.border = "1px solid #cccccc";
                document.getElementById("apellidos").style.border = "1px solid #cccccc";
                document.getElementById("usuario").style.border = "1px solid #cccccc";
                document.getElementById("email").style.border = "1px solid #cccccc";
                document.getElementById("contrasena").style.border = "1px solid #cccccc";
                document.getElementById("confirmarcontrasena").style.border = "1px solid #cccccc";
            });
            $("input[id=contrasenaregistrada]").click(function () {
                click = 1;
                document.getElementById("nombre").style.border = "1px solid #cccccc";
                document.getElementById("apellidos").style.border = "1px solid #cccccc";
                document.getElementById("usuario").style.border = "1px solid #cccccc";
                document.getElementById("email").style.border = "1px solid #cccccc";
                document.getElementById("contrasena").style.border = "1px solid #cccccc";
                document.getElementById("confirmarcontrasena").style.border = "1px solid #cccccc";
            });
            $("input[id=nombre]").click(function () {
                click = 2;
                clickk = 10;
                document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
                document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
                return isstringKeyy();
            });
            $("input[id=apellidos]").click(function () {
                click = 2;
                clickk = 10;
                document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
                document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
                return isstringKeyy();
            });
            $("input[id=email]").click(function () {
                click = 2;
                clickk = 10;
                document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
                document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
                return isstringKeyy();
            });
            $("input[id=usuario]").click(function () {
                click = 2;
                clickkk = 10;
                clickk = 0;
                document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
                document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
                return isstringKeyy();
            });
            $("input[id=contrasena]").click(function () {
                click = 2;
                clickk = 10;
                document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
                document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
                return isstringKeyy();
            });
            $("input[id=confirmarcontrasena]").click(function () {
                click = 2;
                clickk = 10;
                document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
                document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
                return isstringKeyy();
            });
        }

        function validarlogeooo() {
            click = 3;
            return validarlogeoo();
        }

        function validarlogeoooo() {
            click = 4;
            return validarlogeoo();
        }

        function validarlogeoo(elEvento) {
            var nombre = document.getElementById("nombre").value;
            var apellidos = document.getElementById("apellidos").value;
            var email = document.getElementById("email").value;
            var usuario = document.getElementById("usuario").value;
            var contrasena = document.getElementById("contrasena").value;
            var confirmarcontrasena = document.getElementById("confirmarcontrasena").value;
            var usuarioregistrado = document.getElementById("usuarioregistrado").value;
            var contrasenaregistrada = document.getElementById("contrasenaregistrada").value;
            var evento = window.event || elEvento;
            var as = evento.keyCode;
            if (as == 13) {
                if (as == '13' && click == 2) {
                    if (nombre == "") {
                        document.getElementById("nombre").style.borderColor = "red";
                    }
                    if (apellidos == "") {
                        document.getElementById("apellidos").style.borderColor = "red";
                    }
                    if (email == "") {
                        document.getElementById("email").style.borderColor = "red";
                    }
                    if (usuario == "") {
                        document.getElementById("usuario").style.borderColor = "red";
                    }
                    if (contrasena == "") {
                        document.getElementById("contrasena").style.borderColor = "red";
                    }
                    if (confirmarcontrasena == "") {
                        document.getElementById("confirmarcontrasena").style.borderColor = "red";
                    }
                    if (confirmarcontrasena != contrasena) {
                        document.getElementById("confirmarcontrasena").style.borderColor = "red";
                        document.getElementById("confirmarcontrasena").value = "";
                    }
                    if (nombre != "" && apellidos != "" && email != "" && usuario != "" && contrasena != "" && confirmarcontrasena != "" && contrasena == confirmarcontrasena) {
                        var url = "/controladores/controladorLoginUserGlobal.php"; // the script where you handle the form input.
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $("#formloguiar").serialize(), // serializes the form's elements.
                            success: function (data)
                            {
                                $("#pepe").html(data); // show response from the php script.
                            }
                        });
                        setTimeout("borrar()", 3000);
                        return true;
                    }
                } else {
                    if (as == '13' && click == 1) {
                        if (usuarioregistrado != "" && contrasenaregistrada != "") {
                            var url = "/controladores/controladorLoginUserGlobal_1.php"; // the script where you handle the form input.
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: $("#formloguiarr").serialize(), // serializes the form's elements.
                                success: function (data)
                                {
                                    $("#pepe").html(data); // show response from the php script.
                                }
                            });
                            setTimeout("borrar()", 3000);
                            return true;
                        } else {
                            if (usuarioregistrado == "") {
                                document.getElementById("usuarioregistrado").style.borderColor = "red";
                            }
                            if (contrasenaregistrada == "") {
                                document.getElementById("contrasenaregistrada").style.borderColor = "red";
                            }
                        }
                    }
                }
            } else {
                if (click == 3) {
                    document.getElementById("nombre").style.border = "1px solid #cccccc";
                    document.getElementById("apellidos").style.border = "1px solid #cccccc";
                    document.getElementById("usuario").style.border = "1px solid #cccccc";
                    document.getElementById("email").style.border = "1px solid #cccccc";
                    document.getElementById("contrasena").style.border = "1px solid #cccccc";
                    document.getElementById("confirmarcontrasena").style.border = "1px solid #cccccc";
                    if (usuarioregistrado == "") {
                        document.getElementById("usuarioregistrado").style.borderColor = "red";
                    }
                    if (contrasenaregistrada == "") {
                        document.getElementById("contrasenaregistrada").style.borderColor = "red";
                    }
                    if (usuarioregistrado != "" && contrasenaregistrada != "") {
                        var url = "/controladores/controladorLoginUserGlobal_1.php"; // the script where you handle the form input.
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $("#formloguiarr").serialize(), // serializes the form's elements.
                            success: function (data)
                            {
                                $("#pepe").html(data); // show response from the php script.
                            }
                        });
//                        setTimeout("borrar()", 3000);
                        return true;
                    } else {
                        if (usuarioregistrado == "") {
                            document.getElementById("usuarioregistrado").style.borderColor = "red";
                        }
                        if (contrasenaregistrada == "") {
                            document.getElementById("contrasenaregistrada").style.borderColor = "red";
                        }
                    }

                } else {
                    if (click == 4) {
                        document.getElementById("usuarioregistrado").style.border = "1px solid #cccccc";
                        document.getElementById("contrasenaregistrada").style.border = "1px solid #cccccc";
                        if (nombre == "") {
                            document.getElementById("nombre").style.borderColor = "red";
                        }
                        if (apellidos == "") {
                            document.getElementById("apellidos").style.borderColor = "red";
                        }
                        if (email == "") {
                            document.getElementById("email").style.borderColor = "red";
                        }
                        if (usuario == "") {
                            document.getElementById("usuario").style.borderColor = "red";
                        }
                        if (contrasena == "") {
                            document.getElementById("contrasena").style.borderColor = "red";
                        }
                        if (confirmarcontrasena == "") {
                            document.getElementById("confirmarcontrasena").style.borderColor = "red";
                        }
                        if (confirmarcontrasena != contrasena) {
                            document.getElementById("confirmarcontrasena").style.borderColor = "red";
                            document.getElementById("confirmarcontrasena").value = "";
                        }
                        var url = "/controladores/controladorLoginUserGlobal.php"; // the script where you handle the form input.
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $("#formloguiar").serialize(), // serializes the form's elements.
                            success: function (data)
                            {
                                $("#pepe").html(data); // show response from the php script.
                            }
                        });
                    }
                }
            }
        }

        function borrar() {
//            document.getElementById('registrate').style.marginTop = '-8%';
            document.getElementById("nombre").value = "";
            document.getElementById("apellidos").value = "";
            document.getElementById("email").value = "";
            document.getElementById("usuario").value = "";
            document.getElementById("contrasena").value = "";
            document.getElementById("confirmarcontrasena").value = "";
//            document.getElementById('mensaje').style.visibility = 'hidden';
            return true;
        }
    </script>
</html>