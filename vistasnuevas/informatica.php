<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '<script language="javascript" type="text/javascript">
location.href="../index.php";
</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        
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
                #acciones{margin-top: 20px;}
                #configurar{margin-left: 10px;}
                #salir{margin-left: 10px;}
            }
            @media(min-width:980px) and (max-width:1199px){
                body{color: black;}
                .row-fluid{width: 320px}
                #pepe{margin-top: 10px;}
            }
            @media(min-width:768px) and (max-width:979px){
                body{color: black;}
            }
            @media(min-width:768px) and (max-width:979px){
                body{color: black;}
                .row-fluid{width: 320px}
                /*               #registrate{margin-top: 50px;}*/
                #pepe{margin-top: 20px;}
            }
            //Table o smartphone
            @media(max-width:767px){
                body{color: black;}
            }
            @media(max-width:767px){
                body{color: black;}
                .row-fluid{width: 260px}
                #divregistrar{margin-left: -45%;}
                #pepe{margin-left: 30px;}
                #pepe{margin-top: 10px;}
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
                #user{margin-right: 0px;}
                #salir{margin-left: -10px;}
                #configurar{margin-left: 50px;}
                #logouser{visibility:hidden;}
                #useruser{visibility:hidden;}
            }
        </style>
    </head>
    <body>
        <div class="container">
              <div class="codrops-top">
                <a href="#">
                     <div class="span2">
                  <img class="img-rounded" src="/images/artint.jpg"/>
                </div>
                    
                </a>
                <span class="right">
                  
                    <div id="user" class="span3">
                        <div id="logouser" style="margin-left: -280px" class="icon-user">
                    </div>  
                       <?php
                    $usuario = $_SESSION['usuario'];
                    echo "<strong id='useruser'>$usuario</strong>";
                    ?>
                            <a id="configurar" href="configurar.php" ><strong>Configurar</strong></a>
                    <a id="salir" href="http://localhost/controladores/controladorSalirUser.php" ><strong>Salir</strong></a>
                
                       </div>
                      
                       
                  
                  
                         
              
                    
                </span>
                <div class="clr"></div>
            </div>
            <header>
			
				<h1><strong>Administre sus activos</strong> </h1>
				<h2>Seleccione que operacion desea realizar</h2>
				
				
				
				<div class="support-note"><!-- let's check browser support with modernizr -->
					<!--span class="no-cssanimations">CSS animations are not supported in your browser</span-->
					<span class="no-csstransforms">CSS transforms are not supported in your browser</span>
					<span class="no-csstransforms3d">CSS 3D transforms are not supported in your browser</span>
					<span class="no-csstransitions">CSS transitions are not supported in your browser</span>
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
            <div class="row">
               
                <div class="span6"></div>
               
            </div>
            <div class="row">
                <div class="span12">
                </div>
                <div class="span1"></div>
                <div class="span10">
    <section class="main">
			
				<ul class="ch-grid">
					<li>
						<div class="ch-item">				
							<div class="ch-info">
								<div class="ch-info-front ch-img-1"></div>
								<div class="ch-info-back">
									<a href="http://drbl.in/eAoj"><h3>Estructure su negocio</h3></a>
									
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<div class="ch-info-front ch-img-2"></div>
								<div class="ch-info-back">
									<a href="http://drbl.in/eCcV"><h3>Gestione sus activos</h3></a>
									
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<div class="ch-info-front ch-img-3"></div>
								<div class="ch-info-back">
									<a href="http://drbl.in/ewTL"><h3>Administrar</h3></a>
									
								</div>
							</div>
						</div>
					</li>
				</ul>
				
			</section>
                </div>
                <div class="span1">
                </div>
            </div> 
        </div>
    </body>

</html>