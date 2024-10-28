<!-- Modal -->
<div class="modal fade" id="editBeneApoy<?php echo $row['id_datos_del_entregante'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-titlen text-dark mx-auto" id="agregarBene">Editar Apoyo Institucional
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form action="editarApoyoInst.php" method="POST">
                    <!--<br> -->
                    <div class="form-group">
                    <label for="inputAddress">Ingrese el RIF</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="btnGroupAddon">RIF</div>
                            </div>
                            <input type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon" name="documento" value="<?php echo $row['cedula'];?>"  pattern="[0-9]{9}" title="Debe ingresar el RIF en solo digitos">
                            <input type="hidden" name="tipo_documento" value="2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre_bene">Nombre de la institucion</label>
                        <input type="text" class="form-control" id="nombre_bene" name="nombre_de_institucion" value="<?php echo $row['nombre_del_beneficiario'];?>" pattern="[a-zA-Z\s]{3,80}" title="Maximo de caracteres 80">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="correoBene">Correo</label>
                        <input type="email" class="form-control" id="correoBene" aria-describedby="emailHelp"
                            name="correoApoyo" value="<?php echo $row['correo'];?>">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="telfBene">Telefono</label>
                        <input type="text" class="form-control" id="telfBene" name="phone" value="<?php echo $row['telefono'];?>"  pattern="[0-9]{11}" title="El numero debe ingresarse con solo digitos">
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
                        <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo $row['municipio'];?>" pattern="[a-zA-Z\s]{6,60}">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea class="form-control" id="direccion" rows="3"
                            name="direccion"><?php echo $row['direccion'];?></textarea>
                        <span></span>
                    </div>
                    <hr>
                    <input type="hidden" name="origen" value="1">
                    <input type="hidden" name="id_apoyo" value="<?php echo $row['id_datos_del_entregante'];?>">
                    <button type="submit" class="btn btn-success" name="registrar">Enviar</button>
                    <button type="reset" class="btn btn-danger">Refrescar</button>
                </form>
            </div>
        </div>
    </div>
</div>