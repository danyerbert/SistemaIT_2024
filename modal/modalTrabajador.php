<!-- Modal -->
<div class="modal fade" id="modalTrabajador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-titlen text-dark mx-auto" id="agregarBene">Registrar Trabajador</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registrartrabajador.php" method="POST">
                    <div class="form-group">
                        <label for="inputAddress">Ingrese la cedula</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon">C.I</div>
                            </div>
                            <input type="text" class="form-control" aria-label="Input group example"
                                aria-describedby="btnGroupAddon" id="documentoTrabajador" name="documentoTrabajador" pattern="[0-9]{8}">
                            <input type="hidden" id="tipo_documentoTrabajador" name="tipo_documentoTrabajador" value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre_bene">Nombre</label>
                        <input type="text" class="form-control" id="nombre_del_beneficiarioTrabajador" name="nombre_del_beneficiarioTrabajador" pattern="[A-ZÑa-zñáéíóúÁÉÍÓÚ'° ]{3,80}" title="Maximo de caracteres de 80">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="genero">Genero</label>
                        <select name="generoTrabajador" id="generoTrabajador" class="form-control form-control-lg">
                            <?php foreach ($resultado2 as $row2) : ?>
                            <option value="<?php echo $row2['id_genero']; ?>"><?php echo $row2['genero']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="area">Area</label>
                        <select name="areaTrabajador" id="areaTrabajador" class="form-control form-control-lg">
                            <?php foreach ($resultado3 as $row3) : ?>
                            <option value="<?php echo $row3['id_area']; ?>"><?php echo $row3['nombre_del_area']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" id="cargoTrabajador" name="cargoTrabajador" pattern="[a-zA-Z\s]{5,60}">
                    </div>
                    <div class="form-group">
                        <label for="correoBene">Correo</label>
                        <input type="email" class="form-control" id="correoTrabajador" aria-describedby="emailHelp"
                            name="correoTrabajador">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="phoneTrabajador">Telefono</label>
                        <input type="text" class="form-control" id="phoneTrabajador" name="phoneTrabajador" pattern="[0-9]{11}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estadoTrabajador" id="estadoTrabajador" class="form-control form-control-lg">
                            <?php foreach ($resultado7 as $row7) : ?>
                            <option value="<?php echo $row7['id_estados']; ?>"><?php echo $row7['estado_nombre']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="municipio">Municipio</label>
                        <input type="text" class="form-control" id="municipioTrabajador" name="municipioTrabajador" pattern="[a-zA-Z\s]{5,60}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Dirección</label>
                        <textarea class="form-control" id="direccionTrabajador" rows="3"
                            name="direccionTrabajador"></textarea>
                        <span></span>
                    </div>
                     <!-- Validacion de discapacidad -->
                     <div class="form-group">
                        <label for="exampleInputPassword1">Posee Alguna Discapacidad o Condición</label>
                        <div class="form-check">
                            <input class="form-check-input i-radio" type="radio" name="discapacidad_o_condicionTrabajador"
                                id="discapacidad_o_condicionTrabajador" value="si" onclick = "javascript: var ch=document.getElementById('descripcionDiscapacidad1');ch.style.display='inline' ; " >
                            <label class="form-check-label" for="exampleRadios1">
                                Si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="discapacidad_o_condicionTrabajador"
                                id="discapacidad_o_condicionTrabajador" value="no" onclick = "javascript: var ch=document.getElementById('descripcionDiscapacidad1');ch.style.display='none' ; "checked>
                            <label class="form-check-label" for="exampleRadios2">
                                No
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="descripcionDiscapacidad1" style="display:none">
                        <label for="exampleInputPassword1">Descripción De Discapacidad o Condición</label>
                        <textarea class="form-control" rows="3" id="descripcionDiscapacidadTrabajador" name="descripcionDiscapacidadTrabajador" ></textarea>
                        <span></span>
                    </div>
                    <hr>
                    <input type="hidden" name="fecha_ingreso" value="<?php echo $fecha;?>">
                    <input type="hidden" id="origen" name="origenTrabajador" value="3">
                    <button type="submit" class="btn btn-success" name="registrar">Enviar</button>
                    <button type="reset" class="btn btn-danger">Refrescar</button>
                </form>
            </div>
        </div>
    </div>
</div>