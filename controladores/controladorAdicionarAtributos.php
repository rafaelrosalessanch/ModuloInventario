<?php

include_once '../modelo/ModeloLog.php';

$nombremarca =htmlspecialchars($_POST['nombremarca']);
$nombretipo = htmlspecialchars($_POST['nombretipo']);
$nombreestado = htmlspecialchars($_POST['nombreestado']);

validarAtributos($nombremarca, $nombretipo, $nombreestado);

function validarAtributos($nombremarca, $nombretipo, $nombreestado) {
    $banderaestado=0;
    $banderatipo=0;
    $banderamarca=0;
    $obj = new ModeloLog();
    if ($nombreestado == NULL && $nombremarca == NULL && $nombretipo == NULL) {
        echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error en los datos</strong></p>";
        return FALSE;
    }
    if($nombreestado!=NULL){
       $mostrarestado=$obj->mostrar_estados();
       foreach ($mostrarestado as $iestado){
           if($iestado->nombreestado==$nombreestado){
               $banderaestado=1;
           }


       }
    }  else {
         $banderaestado=1;
    }
     if($nombretipo!=NULL){
       $mostrartipo=$obj->mostrar_tipo_de_componente();
       foreach ($mostrartipo as $itipo){
           if($itipo->nombretipoobjeto==$nombretipo){
               $banderatipo=1;
           }


       }
    }  else {
        $banderatipo=1;
    }

       if($nombremarca!=NULL){
       $mostrarmarca=$obj->mostrar_marca_de_todos_componentes();
       foreach ($mostrarmarca as $imarca){
           if($imarca->nombremarca==$nombremarca){
               $banderamarca=1;
           }


       }
    }  else {
         $banderamarca=1;
    }
    if($banderaestado==1){
        $nombreestado=NULL;
         
        $ban=1;
    }
      if($banderamarca==1){
          $nombremarca=NULL;
$ban=1;
      
    }
       if($banderatipo==1){
           $nombretipo=NULL;
           $ban=1;
        
    }


         if ($obj->insertar_Atributos($nombremarca, $nombretipo, $nombreestado) == TRUE) {
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
