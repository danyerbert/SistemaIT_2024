<!-- Modal -->

<div class="modal fade" id="editBene<?php echo $row['id_datos_del_entregante'];?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-titlen text-dark mx-auto" id="title-head-modal">Editar Beneficiario</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="php/update/editbene.php" method="POST">
                    <div class="form-group">
                    <label for="inputAddress">Ingrese la cedula</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddon">C.I</div>
                            </div>
                            <input type="text" class="form-control" aria-label="Input group example" aria-describedby="btnGroupAddon" name="documento" value="<?php echo $row['cedula'];?>" pattern="[0-9]{8}" title="Debe ingresar la cedula sin (.) solo numeros">
                            <input type="hidden" name="tipo_documento" value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombreBene">Nombre del Beneficiario</label>
                        <input type="text" class="form-control" id="nombreBene" aria-describedby="nameHelp"
                            name="nombre_del_beneficiario_edit" value="<?php echo $row['nombre_del_beneficiario'];?>" pattern="[a-zA-Z\s]{3,80}" title="Maximo de caracteres de 80">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="edadBene">Edad</label>
                        <input type="text" class="form-control" id="edadBene" name="edadBeneEdit" value="<?php echo $row['edad'];?>" pattern="[0-9]{2}">
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
                        <label for="fechaNacBene">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fechaNacBeneEdit" name="fecha_de_nacimiento" value="<?php echo $row['fecha_de_nacimiento'];?>">
                    </div>
                    <div class="form-group">
                        <label for="area">Area</label>
                        <select name="area" id="area" class="form-control form-control-lg">
                            <?php foreach ($resultado3 as $row3) : ?>
                            <option value="<?php echo $row3['id_area']; ?>"><?php echo $row3['nombre_del_area']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <select name="cargo" id="cargo" class="form-control form-control-lg">
                            <?php foreach ($resultado4 as $row4) : ?>
                            <option value="<?php echo $row4['id_cargo']; ?>"><?php echo $row4['tipo_de_cargo']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombreRepre">Nombre del Representante</label>
                        <input type="text" class="form-control" id="nombreRepre" name="nombre_del_representanteEdit"
                            value="<?php echo $row['nombre_del_representante'];?>">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="correoBene">Correo</label>
                        <input type="email" class="form-control" id="correoBene" aria-describedby="emailHelp"
                            name="correoBeneEdit" value="<?php echo $row['correo'];?>">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="telfBene">Telefono</label>
                        <input type="text" class="form-control" id="telfBene" name="phoneEdit"
                            value="<?php echo $row['telefono'];?>">
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
                        <input type="text" class="form-control" id="municipio" name="municipio"
                            value="<?php echo $row['municipio'];?>">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Dirección</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="direccion"
                            value=""><?php echo $row['direccion'];?></textarea>
                        <span></span>
                    </div>
                    <!-- Validacion de discapacidad -->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Posee Alguna Discapacidad o Condición</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discapacidad_o_condicion"
                                id="exampleRadios1" value="si" onclick = "javascript: var ch=document.getElementById('exampleFormControlTextarea5');ch.style.display='inline' ; " >
                            <label class="form-check-label" for="exampleRadios1">
                                Si
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="discapacidad_o_condicion"
                                id="exampleRadios2" value="no" onclick = "javascript: var ch=document.getElementById('exampleFormControlTextarea5');ch.style.display='none' ; "checked>
                            <label class="form-check-label" for="exampleRadios2">
                                No
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="exampleFormControlTextarea5" style="display:none">
                        <label for="exampleInputPassword1">Descripción De Discapacidad o Condición</label>
                        <textarea class="form-control" rows="3" name="descripcion_discapacidad" ></textarea>
                        <span></span>
                    </div>

                    <input type="hidden" name="ideditbene" value="<?php echo $row['id_datos_del_entregante'];?>">
                    <input type="hidden" name="origen" value="2">
                    <hr>
                    <button type="submit" class="btn btn-success" name="registrar">Enviar</button>
                    <button type="reset" class="btn btn-danger">Refrescar</button>
                </form>
            </div>
        </div>
    </div>
</div>