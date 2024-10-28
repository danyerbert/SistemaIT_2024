<!-- Modal -->
<div class="modal fade" id="modalDispo<?php echo $row['id_datos_del_entregante'];?>" tabindex="-1"
    aria-labelledby="nuevoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-titlen text-dark mx-auto" id="agregarDispo">Agregar Dispositivo</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="registroDispositivo" action="php/registro/registroDispoPrueba.php" method = "POST" autocompleteoff = "off">
                    <div class="form-group">
                        <label for="tipo_De_equipo">Tipo de Equipo</label>
                        <select name="tipo_de_equipo" id="tipo_De_equipo" class="form-control form-control-lg">
                            <?php foreach ($resultado5 as $row5) : ?>
                            <option value="<?php echo $row5['id_tipo_de_equipo']; ?>"><?php echo $row5['nombre']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="serial_del_equipo">Serial del Equipo</label>
                        <textarea name="serial_del_equipo" id="serial_del_equipo" pattern="[A-Z0-9]{18}" maxlength="18" minlength="18"></textarea>
                    <div class="form-group">
                        <label for="serial_del_cargador">Serial del Cargador</label>
                        <textarea class="form-control" name="serial_cargador" id="serial_cargador" pattern="[A-Z0-9]{18}" maxlength="25" minlength="18"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_recepcion">Fecha de Recepcion</label>
                        <input type="date" class="form-control" id="fecha_de_recepcion" name="fecha_de_recepcion">
                    </div>
                    <div class="form-group">
                        <label for="estado_recepcion">Estado de Recepción Del Equipo</label>
                        <select name="estado_recepcion" id="estado_recepcion"
                            class="form-control form-control-lg">
                            <?php foreach ($resultado11 as $row11) : ?>
                            <option value="<?php echo $row11['id']; ?>"><?php echo $row11['estado']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="falla">Falla del Equipo</label>
                        <select name="falla" id="falla" class="form-control form-control-lg">
                            <?php foreach ($resultado9 as $row9) : ?>
                            <option value="<?php echo $row9['id_motivo']; ?>"><?php echo $row9['tipo_de_motivo']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <textarea class="form-control" id="observaciones" rows="3" name="observaciones"></textarea>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="falla">Motivo de ingreso</label>
                        <select name="motivoIngreso" id="motivoIngreso" class="form-control form-control-lg">
                            <?php foreach ($resultado15 as $row15) : ?>
                            <option value="<?php echo $row15['id']; ?>"><?php echo $row15['motivo']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" id="origen" name="origen" value="<?php echo $row['id_origen'];?>">
                    <input type="hidden" id="id_roles" name="id_roles" value="<?php echo $rol;?>">
                    <input type="hidden" id="estatus" name="estatus" value="1">
                    <input type="hidden" id="beneficiario" name="beneficiario" value="<?php echo $row['id_datos_del_entregante'];?>">

                    <?php foreach($resultadoResponsable as $rowResponsable ):?>
                    <input type="hidden" id="responsableRecepcion" name="responsableRecepcion" value="<?php echo $rowResponsable['usuario'];?>">
                    <?php endforeach;?>
                    <input type="hidden" id="responsable" name="responsable" value="<?php echo $idusuario;?>">
                    
                    <input type="hidden" id="coordinador" name="coordinador" value="6">
                    <hr>
                    <!-- <input type="button" class="btn btn-success" onclick="registrarDispositivo()" value="Registrar"> -->
                    
                    <button type="submit" class="btn btn-success">Enviar</button>
                    <button type="reset" class="btn btn-danger">Refrescar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</form>
</div>