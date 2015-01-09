<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */
session_start();
include '../modelo/ModeloLog.php';
$obj = new ModeloLog();
$extract = extract($_GET);
$numeroinventario = htmlspecialchars($_POST["filtrarcomponentenumeroinventario"]);
$_SESSION['filtrocomponentenuminvent']=$numeroinventario;
$mostrar = $obj->mostrar_todos_los_componentes();
$bandera=0;
foreach ($mostrar as $i) {
    if ($i->numeroinventario == $numeroinventario) {
        $bandera=1;
          $departamento=explode("Estacion:",$i->estacion);
        $segundo=explode("Ubicacion:",$departamento[1]);
        $tercero=explode("Departamento:",$segundo[1]);
        //--------------------------------------------
        echo "<fieldset id='datoscomponentereasignar'  title='Datos del componente' style='margin-top: 0px;height: 80px;width: 820px' > <input type='radio'  name='radiocomponenteasignar' value='$i->numeroinventario' id='$i->numeroinventario'>
<legend><strong>Datos del componente</strong></legend>

      <strong style='font-size:12px;color: slategray'>Componente: </strong>





        
        
      <strong style='font-size:12px'>Tipo: $i->tipo</strong>
             <strong style='font-size:12px;margin-left:30px'>Marca: $i->marca</strong>
           <strong style='font-size:12px;margin-left:30px'>Modelo: $i->modelo</strong>
             <strong style='font-size:12px;margin-left:30px'>Número de serie: $i->numserie</strong>

            



            <div style='margin-top:10px;margin-left:22px'>
      <strong style='font-size:12px;color: slategray;'>Asignado: </strong>

           <strong style='font-size:12px;'>$departamento[0]</strong>

        <strong style='font-size:12px;margin-left:30px'>Estación de trabajo:$segundo[0]</strong>


        <strong style='font-size:12px;margin-left:30px'>Ubicación:$tercero[0]</strong>


        <strong style='font-size:12px;margin-left:30px'>Departamento:$tercero[1]</strong>

             </div>




          </fieldset>";
}









        

//$segundo1=$primero[0];
//$segundo2=$primero[1];
//$segundo3=$primero[2];
//$segundo4=$primero[3];
//$segundootro=$primero[4];
//$primero1=explode(",",$segundo2);
//$segundo5=$primero1[0];//Rafael
//$primero2=explode(",",$segundo3);
//$segundo6=$primero2[0];//puesto6
//$primero3=explode(",",$segundo4);
//$segundo7=$primero3[0];//3er nivel
//$primero4=explode(",",$segundootro);
//$segundo8=$primero4[0];//Informatica
//$final=$segundo5.$segundo6.$segundo7.$segundo8;
    
  
}
 if($bandera==0){
      echo"
           <strong style='color:red'>No se encontro resultado para este número de inventario</strong>";
   }
?>





