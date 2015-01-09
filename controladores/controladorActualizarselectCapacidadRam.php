<?php
echo '<option>Seleccionar</option>';

                                                      include_once '../modelo/ModeloLog.php';
                                                        $extract = extract($_GET);
                                                        $obj = new ModeloLog();
                                                        $mostrar = $obj->mostrar_capacidadram();
                                                        foreach ($mostrar as $i) {
                                                            $capacidadram = utf8_decode($i->capacidadram);
                                                            echo "<option>$capacidadram</option>";
                                                        }

?>





