<?php
echo '<option>Seleccionar</option>';

                                                      include_once '../modelo/ModeloLog.php';
                                                        $extract = extract($_GET);
                                                        $obj = new ModeloLog();
                                                        $mostrar = $obj->mostrar_tiporam();
                                                        foreach ($mostrar as $i) {
                                                            $nombretiporam = utf8_decode($i->nombretiporam);
                                                            echo "<option>$nombretiporam</option>";
                                                        }

?>





