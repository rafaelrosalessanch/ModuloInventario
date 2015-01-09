<?php
include_once '../modelo/ModeloLog.php';
                                $extract = extract($_GET);
                                $obj = new ModeloLog();
                                $mostrar = $obj->mostrar_vicedirecciones();
                                echo "<option>Seleccionar</option>";
                                foreach ($mostrar as $i) {
                                    $depa = $i->nombrevicedirecciones;
                                    echo "<option>$depa</option>";
                                }
?>
