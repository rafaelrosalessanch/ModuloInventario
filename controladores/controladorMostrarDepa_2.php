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
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_departamentos();

$nombreregistrarrr = $_SESSION['departamentoselcetcionado'];



//$nombreregistrarrr = htmlspecialchars($_POST['orderBox']);
   
    foreach ($mostrar as $i) {
      
if($nombreregistrarrr==$i->nombredepartamento){
      
            echo "<fieldset id='fil'  title='Datos del usuario' style='margin-top: 10px;height: 150px;width: 510px' ><legend><strong>Datos del departamento seleccionado</strong></legend>
                        <div id='atributosMarca' >
                            <strong style='color: red'>Datos actuales:</strong>
                            <strong style='margin-left: 160px;color: red'>Datos nuevos:</strong>
                            </div>
                             <div style=''>
                            <div style='margin-top: 5px'>
                            <strong style='font-size: 12px'>Nombre:</strong>

                            <input id='op' name='' value='$i->nombredepartamento' style='width: 150px;' ></input>
          </div>
                            <div style='margin-top: 10px'>
        <strong style='font-size: 12px'>Ubicación:</strong>


        <input id='op' name='' value='$i->ubicaciondepartamento' style='width: 140px;' ></input>

                     </div>

                         <div style='margin-top: 10px'>
        <strong style='font-size: 12px'>Vicedirección:</strong>


        <input id='op' name='' value='$i->area' style='width: 118px;' ></input>

                     </div>




                                </div>
                            <div style='margin-left: 250px;margin-top: -85px'>

                            <strong style='font-size: 12px'>Nombre nuevo:</strong>
                            <input type='text' name='nombrenuevodepa' id='nombrenuevodepa' style='width: 150px;'/>
<div style='margin-top: 10px'>
        <strong style='font-size: 12px'>Ubucación nueva:</strong>

                <select id='ubicacionnuevadepa' name='ubicacionnuevadepa' style='width: 54%'>


                </select>
                     </div>
                            <div style='margin-top: 10px'>
        <strong style='font-size: 12px'>Vicedirección:</strong>

                <select id='areanuevadepa' name='areanuevadepa' style='width: 166px;'>
                   <option>Seleccionar</option>
                    
                </select>

                     </div>
                                </div>
                            <div style='margin-left:220px;margin-top: 10px'>
                            <input type='button' name='enviar' value='Modificar' onclick='validarmodificardepa()'/>

                </div>
          </fieldset>";}
    
    

}
?>





