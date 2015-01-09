<?php
echo '<option>Seleccionar</option>';

                                                       include_once '../modelo/ModeloLog.php';
                                                        $extract = extract($_GET);
                                                        $obj = new ModeloLog();
                                                        $mostrar = $obj->mostrar_marcahdd();
                                                        foreach ($mostrar as $i) {
                                                            $nombretipocpu = utf8_decode($i->nombremarcahdd);
                                                            echo "<option>$nombretipocpu</option>";
                                                        }

?>





