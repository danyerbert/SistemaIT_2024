<!-- Modal -->
<div class="modal fade" id="RegistroUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form id="formularioRegistro">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" pattern="[a-z-A-Z\s]">
                                        <span></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" pattern="[a-z-A-Z\s]">
                                        <span></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cedula">Cédula</label>
                                        <input type="text" class="form-control" id="cedula" name="cedula" pattern="[0-9]{8}">
                                        <span></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input type="email" class="form-control" id="correo" name="correo">
                                        <span></span>
                                    </div>
                                        <div class="form-group">
                                            <label for="perfil">Perfil</label>
                                            <select name="perfil" id="perfil" class="form-control form-control-lg">
                                               <option value="1">Administrador</option>
                                               <option value="2">Presidencia</option>
                                               <option value="3">Analista</option>
                                               <option value="4">Tecnico</option>
                                               <option value="5">Verificador</option>
                                               <option value="6">Coordinador</option>
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-success" onclick="registrarUsuario()">Registrar</button> -->
                                <input type="button" class="btn btn-success" onclick="registrarUsuario()" value="Registrar"> 
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                        </div>
                    </div>

