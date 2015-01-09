<?php

include_once '../modelo/ModeloLog.php';

$nombretipocpu =htmlspecialchars($_POST['nombretipocpu']);
$nombrevelocidadcpu = htmlspecialchars($_POST['nombrevelocidadcpu']);
$nombremarcahdd = htmlspecialchars($_POST['nombremarcahdd']);
$nombrecapacidadhdd =htmlspecialchars($_POST['nombrecapacidadhdd']);
$nombretiporam = htmlspecialchars($_POST['nombretiporam']);
$nombrecapacidadram = htmlspecialchars($_POST['nombrecapacidadram']);

validarAtributos($nombretipocpu, $nombrevelocidadcpu, $nombremarcahdd,$nombrecapacidadhdd,$nombretiporam,$nombrecapacidadram);

function validarAtributos($nombretipocpu, $nombrevelocidadcpu, $nombremarcahdd,$nombrecapacidadhdd,$nombretiporam,$nombrecapacidadram){
    $banderanombretipocpu=0;
    $banderanombrevelocidadcpu=0;
    $banderanombremarcahdd=0;
     $banderanombrecapacidadhdd=0;
    $banderanombretiporam=0;
    $banderanombrecapacidadram=0;
    $obj = new ModeloLog();
    if ($nombretipocpu == NULL && $nombrevelocidadcpu == NULL && $nombremarcahdd == NULL&& $nombrecapacidadhdd == NULL&& $nombretiporam == NULL&& $nombrecapacidadram== NULL) {
        echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Inserte almenos un atributo</strong></p>";
        return FALSE;
    }
    if($nombretipocpu!=NULL){
       $mostrarnombretipocpu=$obj->mostrar_tipocpu();
       foreach ($mostrarnombretipocpu as $inombretipocpu){
           if($inombretipocpu->nombretipocpu==$nombretipocpu){
               $banderanombretipocpu=1;
           }


       }
    }  else {
         $banderanombretipocpu=1;
    }
     if($nombrevelocidadcpu!=NULL){
       $mostrarnombrevelocidadcpu=$obj->mostrar_velocidadcpu();
       foreach ($mostrarnombrevelocidadcpu as $inombrevelocidadcpu){
           if($inombrevelocidadcpu->nombrevelocidadcpu==$nombrevelocidadcpu){
               $banderanombrevelocidadcpu=1;
           }


       }
    }  else {
        $banderanombrevelocidadcpu=1;
    }

       if($nombremarcahdd!=NULL){
       $mostrarnombremarcahdd=$obj->mostrar_marcahdd();
       foreach ($mostrarnombremarcahdd as $inombremarcahdd){
           if($inombremarcahdd->nombremarcahdd==$nombremarcahdd){
               $banderanombremarcahdd=1;
           }


       }
    }  else {
         $banderanombremarcahdd=1;
    }

    if($nombrecapacidadhdd!=NULL){
       $mostrarnombrecapacidadhdd=$obj->mostrar_capacidadhdd();
       foreach ($mostrarnombrecapacidadhdd as $inombrecapacidadhdd){
           if($inombrecapacidadhdd->capacidadhdd==$nombrecapacidadhdd){
               $banderanombrecapacidadhdd=1;
           }


       }
    }  else {
         $banderanombrecapacidadhdd=1;
    }

     if($nombretiporam!=NULL){
       $mostrarnombretiporam=$obj->mostrar_tiporam();
       foreach ($mostrarnombretiporam as $inombretiporam){
           if($inombretiporam->nombretiporam==$nombretiporam){
               $banderanombretiporam=1;
           }


       }
    }  else {
         $banderanombretiporam=1;
    }

     if($nombrecapacidadram!=NULL){
       $mostrarnombrecapacidadram=$obj->mostrar_capacidadram();
       foreach ($mostrarnombrecapacidadram as $inombrecapacidadram){
           if($inombrecapacidadram->capacidadram==$nombrecapacidadram){
               $banderanombrecapacidadram=1;
           }


       }
    }  else {
         $banderanombrecapacidadram=1;
    }

     if($banderanombretipocpu==1){
        $nombretipocpu=NULL;

        $ban=1;
    }
     if($banderanombrevelocidadcpu==1){
          $nombrevelocidadcpu=NULL;
$ban=1;

    }
      if($banderanombremarcahdd==1){
           $nombremarcahdd=NULL;
           $ban=1;

    }
    if($banderanombrecapacidadhdd==1){
           $nombrecapacidadhdd=NULL;
           $ban=1;

    }
      if($banderanombretiporam==1){
           $nombretiporam=NULL;
           $ban=1;

    }
      if($banderanombrecapacidadram==1){
           $nombrecapacidadram=NULL;
           $ban=1;

    }





   
     
     


         if ($obj->insertar_Atributos_Computadora($nombretipocpu, $nombrevelocidadcpu, $nombremarcahdd,$nombrecapacidadhdd,$nombretiporam,$nombrecapacidadram) == TRUE) {
//            if($nombreestado!=NULL&&$nombremarca==NULL&&$nombretipo==NULL){
//              echo "
//<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
//<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se inserto correctamente</strong></p>";
//
//        }
//
//            if($nombreestado==NULL&&$nombremarca!=NULL&&$nombretipo==NULL){
//              echo "
//<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
//<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se inserto correctamente </strong></p>";
//
//
//        }
//           if($nombreestado==NULL&&$nombremarca==NULL&&$nombretipo!=NULL){
//              echo "
//<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
//<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se inserto correctamente</strong></p>";
//
//        }
//        if(($banderaestado+$banderamarca+$banderatipo)==1){
//             echo "
//<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
//<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se inserto correctamente</strong></p>";
//
//        }
//           if(($banderaestado+$banderamarca+$banderatipo)==0){
             echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se inserto correctamente </strong></p>";

//        }
        
    }
       
    
}
?>
