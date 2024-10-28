<!-- Modal -->
<div class="modal fade" id="modalApoyo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-titlen text-dark mx-auto" id="agregarBene">Registrar Apoyo Institucional
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formularioApoyoRegistro" action="php/registro/registrarProviApoyo.php" method="POST">
                    <div class="form-group">
                    <label for="inputAddress">Ingrese el RIF</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon">RIF</div>
                            </div>
                            <input type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon" name="documentoApoyo" id="documentoApoyo" pattern="[0-9]{9}" title="Debe ingresar el RIF en solo digitos">
                            <input type="hidden" name="tipo_documentoApoyo" value="2" id="tipo_documentoApoyo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre_bene">Nombre de la institucion</label>
                        <input type="text" class="form-control" id="nombre_de_institucionApoyo" name="nombre_de_institucionApoyo" pattern="[a-zA-Z\s]{3,80}" title="Maximo de caracteres 80">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="correoBene">Correo</label>
                        <input type="email" class="form-control" id="correoApoyo" aria-describedby="emailHelp"
                            name="correoApoyo">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control" id="phoneApoyo" name="phoneApoyo" pattern="[0-9]{11}" title="El numero debe ingresarse con solo digitos">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estadoApoyo" id="estadoApoyo" class="form-control form-control-lg">
                            <?php foreach ($resultado7 as $row7) : ?>
                            <option value="<?php echo $row7['id_estados']; ?>"><?php echo $row7['estado_nombre']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="municipio">Municipio</label>
                        <input type="text" class="form-control" id="municipioApoyo" name="municipioApoyo" pattern="[a-zA-Z\s]{10,60}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Dirección</label>
                        <textarea class="form-control" id="direccionApoyo" rows="3"
                            name="direccionApoyo"></textarea>
                        <span></span>
                    </div>
                    <hr>
                    <input type="hidden" name="fecha_ingreso" value="<?php echo $fecha;?>">
                    <input type="hidden" name="origenApoyo" id="origenApoyo" value="1">
                    <button type="submit" class="btn btn-success">Gaurdar</button>
                    <button type="reset" class="btn btn-danger">Refrescar</button>
                </form>
            </div>
        </div>
    </div>
</div>