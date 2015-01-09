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
$usuario = htmlspecialchars($_POST["opcionesusuario"]);
$_SESSION['usuariomodificar']=$usuario;
$mostrar=$obj->mostrar_todos_los_usuarios();
foreach ($mostrar as $i) {
   if($i->usuario==$usuario){

         
   
echo "<fieldset  title='Datos del usuario' style='margin-top: 10px;height: 120px;width: 390px' ><legend><strong>Datos del usuario</strong></legend>
                        <div id='atributosMarca' >
                            <strong style='color: red'>Datos actuales:</strong>
                            <strong style='margin-left: 120px;color: red'>Datos nuevos:</strong>
                            </div>
                             <div style=''>
                            <div style='margin-top: 5px'>
                            <strong style='font-size: 12px'>Contrase&ntilde;a:</strong>

                            <input id='op' name='' value='$i->contrasena' style='width: 80px;' ></input>
          </div>
                            <div style='margin-top: 10px'>
        <strong style='font-size: 12px'>Privilegios:</strong>


        <input id='op' name='' value='$i->administracion' style='width: 90px;' ></input>

                     </div>
                                </div>
                            <div style='margin-left: 210px;margin-top: -55px'>
                           
                            <strong style='font-size: 12px'>Contrase&ntilde;a:</strong>
                            <input type='text' name='contrasena' id='contrasena' style='width: 52%;'/>
       
                            <div style='margin-top: 10px'>
        <strong style='font-size: 12px'>Privilegios:</strong>

                <select id='opcionesprivilegios' name='opcionesprivilegios' style='width: 61%;'>
                   <option>Seleccionar</option>
                    <option>Administrador</option>
                    <option>Invitado</option>
                </select>

                     </div>
                                </div>
                            <div style='margin-left:150px;margin-top: 15px'>
                            <input type='button' name='enviar' value='Modificar'onclick='validarmodificar()'/>
                
                </div>
          </fieldset>";}
}
?>





