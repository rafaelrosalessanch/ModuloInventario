<?php
echo '<option>Seleccionar</option>';

                                                      include_once '../modelo/ModeloLog.php';
                                                        $extract = extract($_GET);
                                                        $obj = new ModeloLog();
                                                        $mostrar = $obj->mostrar_capacidadhdd();
                                                        foreach ($mostrar as $i) {
                                                            $capacidadhddd = utf8_decode($i->capacidadhdd);
                                                            echo "<option>$capacidadhddd</option>";
                                                        }

?>





