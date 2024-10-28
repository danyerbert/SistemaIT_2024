<!-- Modal -->
<div class="modal fade" id="modalBene" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-titlen text-dark mx-auto" id="agregarBene">Registrar Beneficiario</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <form id="RegistroBeneficiario" action="php/registro/registroProviBene.php" method="POST">
                    <div class="form-group">
                    <label for="inputAddress">Ingrese la cedula</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon">C.I</div>
                            </div>
                            <input type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon" id="documento" name="documento" pattern="[0-9]{8}" title="Debe ingresar la cedula sin (.) solo numeros">
                            <input type="hidden" name="tipo_documento" value="1" id="tipo_documento">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre_bene">Nombre del Beneficiario</label>
                        <input type="text" class="form-control" id="nombre_del_beneficiario" name="nombre_del_beneficiario" pattern="[a-zA-Z\s]{3,80}" title="Maximo de caracteres de 80">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="edadBene">Edad</label>
                        <input type="text" class="form-control" id="edadBene" name="edadBene" pattern="[0-9]{2}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="genero">Genero</label>
                        <select name="genero" id="genero" class="form-control form-control-lg">
                            <?php foreach ($resultado2 as $row2) : ?>
                            <option value="<?php echo $row2['id_genero']; ?>"><?php echo $row2['genero']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_de_nacimiento" name="fecha_de_nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="nombreRepre">Nombre del Representante</label>
                        <input type="text" class="form-control" id="nombre_del_representante" name="nombre_del_representante" pattern="[a-zA-Z\s]{3,80}" title="El maximo de caracteres es 80.">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="correoBene">Correo</label>
                        <input type="email" class="form-control" id="correoBene" aria-describedby="emailHelp"
                            name="correoBene">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="telfBene">Telefono</label>
                        <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{11}" title="El numero debe ingresarse con solo digitos">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control form-control-lg">
                            <?php foreach ($resultado7 as $row7) : ?>
                            <option value="<?php echo $row7['id_estados']; ?>"><?php echo $row7['estado_nombre']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="municipio">Municipio</label>
                        <input type="text" class="form-control" id="municipio" name="municipio" pattern="[a-zA-Z\s]{6,60}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Dirección</label>
                        <textarea class="form-control" id="direccion" rows="3"
                            name="direccion"></textarea>
                        <span></span>
                    </div>
                    <!-- Validacion de discapacidad -->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Posee Alguna Discapacidad o Condición</label>
                        <div class="form-check">
                            <input class="form-check-input i-radio" type="radio" name="discapacidad_o_condicion"
                                id="discapacidad_o_condicion" value="si" onclick = "javascript: var ch=document.getElementById('descripcionDiscapacidad1');ch.style.display='inline' ; " >
                            <label class="form-check-label" for="exampleRadios1">
                                Si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="discapacidad_o_condicion"
                                id="discapacidad_o_condicion" value="no" onclick = "javascript: var ch=document.getElementById('descripcionDiscapacidad1');ch.style.display='none' ; "checked>
                            <label class="form-check-label" for="exampleRadios2">
                                No
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="descripcionDiscapacidad1" style="display:none">
                        <label for="exampleInputPassword1">Descripción De Discapacidad o Condición</label>
                        <textarea class="form-control" rows="3" name="descripcionDiscapacidad" id="descripcionDiscapacidad"></textarea>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="consejo_comunal">Consejo Comunal</label>
                        <input type="text" class="form-control" id="consejo_comunal" name="consejo_comunal" pattern="[a-zA-Z\s]{2,60}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="mesa_telecomunicaciones">Mesa de telecomunicaciones</label>
                        <input type="text" class="form-control" id="mesa_telecomunicaciones" name="mesa_telecomunicaciones" pattern="[a-zA-Z\s]{2,60}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="institucion_entrega">Institucion Educativa (Entrega)</label>
                        <input type="text" class="form-control" id="institucion_entrega" name="institucion_entrega" pattern="[a-zA-Z\s]{2,60}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="institucion_estudia">Institucion Educativa (Estudia Actualmente)</label>
                        <input type="text" class="form-control" id="institucion_estudia" name="institucion_estudia" pattern="[a-zA-Z\s]{2,60}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="responsableEntrega">Responsable de entrega</label>
                        <input type="text" class="form-control" id="responsable_entrega" name="responsable_entrega" pattern="[a-zA-Z\s]{2,60}">
                        <span></span>
                    </div>
                    <hr>
                    <input type="hidden" name="fecha_ingreso" value="<?php echo $fecha; ?>">
                    <input type="hidden" id="origen" name="origen" value="2">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="reset" class="btn btn-danger">Refrescar</button>
                </form>
            </div>
        </div>
    </div>
</div>