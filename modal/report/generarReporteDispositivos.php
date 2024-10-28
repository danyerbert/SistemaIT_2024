<div class="modal fade" id="generarReporteDispositivos" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlen text-dark mx-auto" id="title-head-modal">Generar Reporte de Dispositivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="php/redireccionamientoDispositivos.php" method="POST">
                    <div class="form-group">
                        <label for="fechaEntrega">Desde</label>
                        <input type="date" class="form-control" id="fechaDesde" name="fechaDesde">
                    </div>
                    <div class="form-group">
                        <label for="fechaEntrega">Hasta</label>
                        <input type="date" class="form-control" id="fechaHasta" name="fechaHasta">
                    </div>
                    <div class="form-group">
                        <label for="dispositivo">Seleccione</label>
                        <select name="dispositivo" id="dispositivo" class="form-control form-control-lg">
                            <?php foreach ($resultadoDispositivos as $rowDispositivos) :?>
                            <option value="<?php echo $rowDispositivos['id_tipo_de_equipo'];?>">
                                <?php echo $rowDispositivos['nombre'];?></option>
                            <?php endforeach; ?>
                            <option value="11">General</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Escoga el formato</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formato" id="exampleRadios1" value="1"
                                checked>
                            <label class="form-check-label" for="exampleRadios1">
                                PDF
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="formato" id="exampleRadios2" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                                Excel
                            </label>
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="rol" value="<?php echo $rol;?>">
                    <button type="submit" class="btn btn-success">Enviar</button>
                    <button type="reset" class="btn btn-danger">Refrescar</button>
                </form>
            </div>
        </div>
    </div>
</div>