<!-- Modal -->
<div class="modal fade" id="verificarModalTablet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-titlen text-dark mx-auto" id="AgregarReparacion">Reparacion de equipo tablet
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="registroReparacionTablet">
                    <div class="form-group">
                        <label for="serial_salida_pantalla">Serial de entrada (pantalla)</label>
                        <!-- <input type="text" class="form-control" id="serial_entrada_pantalla_tablet"
                            name="serial_salida_pantalla_tablet" pattern="[A-Z0-9\s]{8,25}"
                            title="Caracteres maximos 25. Solo mayusculas y numeros."> -->
                        <textarea class="form-control" id="serial_entrada_pantalla_tablet" name="serial_salida_pantalla_tablet" pattern="[A-Z0-9\s]{8,25}" title="Caracteres maximos 25. Solo mayusculas y numeros."></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="serial_salida_pantalla">Serial de salida (pantalla)</label>
                       <!-- <input type="text" class="form-control" id="serial_salida_pantalla_tablet"
                            name="serial_salida_pantalla_tablet" pattern="[A-Z0-9\s]{8,25}"
                            title="Caracteres maximos 25. Solo mayusculas y numeros."> -->
                        <textarea class="form-control" id="serial_salida_pantalla_tablet" name="serial_salida_pantalla_tablet" pattern="[A-Z0-9\s]{8,25}" title="Caracteres maximos 25. Solo mayusculas y numeros."></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="pila_bios">Cambio de pin de carga?</label>
                        <div class="form-check">
                            <input class="form-check-input i-radio" type="radio" name="pin_carga_tablet" id="pin_carga_tablet"
                                value="si">
                            <label class="form-check-label" for="pila_bios_1">
                                Si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="pin_carga_tablet" id="pin_carga_tablet"
                                value="no">
                            <label class="form-check-label" for="pila_bios_2">
                                No
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="serial_entrada_cara_b">Se realizo cambio de boton de encendido?</label>
                        <div class="form-check">
                            <input class="form-check-input i-radio" type="radio" name="boton_encendido_tablet" id="boton_encendido_tablet"
                                value="si">
                            <label class="form-check-label" for="serial_caraB">
                                Si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="boton_encendido_tablet" id="boton_encendido_tablet"
                                value="no">
                            <label class="form-check-label" for="serial_caraB">
                                No
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="serial_entrada_cargador">Serial de entrada (cargador)</label>
                        <!-- <input type="text" class="form-control" id="serial_entrada_cargador_tablet"
                            name="serial_entrada_cargador_tablet" pattern="[A-Z0-9\s]{8,21}"
                            title="Caracteres maximos 25. Solo mayusculas y numeros."> -->
                        <textarea class="form-control" id="serial_entrada_cargador_tablet" name="serial_entrada_cargador_tablet" pattern="[A-Z0-9\s]{8,21}" title="Caracteres maximos 25. Solo mayusculas y numeros."></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="serial_salida_cargador">Serial de salida (cargador)</label>
                        <!-- <input type="text" class="form-control" id="serial_salida_cargador_tablet"
                            name="serial_salida_cargador_tablet" pattern="[A-Z0-9\s]{8,21}"
                            title="Caracteres maximos 25. Solo mayusculas y numeros."> -->
                        <textarea class="form-control" id="serial_salida_cargador_tablet" name="serial_salida_cargador_tablet" pattern="[A-Z0-9\s]{8,21}" title="Caracteres maximos 25. Solo mayusculas y numeros."></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="serial_entrada_bat">Serial de entrada (Bateria)</label>
                       <!-- <input type="text" class="form-control" id="serial_entrada_bat_tablet" name="serial_entrada_bat_tablet"
                            pattern="[A-Z0-9\s]{8,25}" title="Caracteres maximos 25. Solo mayusculas y numeros"> -->
                        <textarea class="form-control" id="serial_entrada_bat_tablet" name="serial_entrada_bat_tablet" pattern="[A-Z0-9\s]{8,25}" title="Caracteres maximos 25. Solo mayusculas y numeros"></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="serial_salida_bat">Serial de salida (Bateria)</label>
                        <!-- <input type="text" class="form-control" id="serial_salida_bat_tablet" name="serial_salida_bat_tablet"
                            pattern="[A-Z0-9\s]{8,25}" title="Caracteres maximos 25. Solo mayusculas y numeros"> -->
                        <textarea class="form-control" id="serial_salida_bat_tablet" name="serial_salida_bat_tablet" pattern="[A-Z0-9\s]{8,25}" title="Caracteres maximos 25. Solo mayusculas y numeros"></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <textarea class="form-control" id="observaciones_tablet" rows="3" name="observaciones_tablet"></textarea>
                    </div>
                    <hr>
                    <input type="hidden" id="id_status_tablet" name="id_status_tablet" value="3">
                    <?php foreach($resultadoResponsable as $rowResponsable ):?>
                    <input type="hidden" id="responsableRecepcion_tablet" name="responsableRecepcion_tablet" value="<?php echo $rowResponsable['usuario'];?>">
                    <?php endforeach;?>
                    
                    <input type="hidden" id="responsable_tablet" name="responsable_tablet" value="<?php echo $id_usuario;?>">
                    <input type="hidden" id="id_roles_tablet" name="id_roles_tablet" value="<?php echo $rol;?>">
                    <input type="hidden" id="id_dispositivo_tablet" name="id_dispositivo_tablet" value="<?php echo $rowde['id_dispositivo']?>">
                    <input type="hidden" id="tipo_de_dispositivo_tablet" name="tipo_de_dispositivo_tablet"
                        value="<?php echo $rowde['id_tipo_de_dispositivo'];?>">
                    <input type="hidden" name="ic_dispositivo_tablet" id="ic_dispositivo_tablet" value="<?php echo $rowde['ic_dispositivo'];?>"> 
                    <hr>
                    <input type="button" class="btn btn-success" onclick="registrarReparacionTablet()" value="Registrar"> 
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>