<?php include_once 'header.php'; ?>
<?php
$titulo = 'CATALOGO DE LAS AYUDAS';
?>
<?php include_once 'menu.php'; ?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?> </strong>
        </div>
        <div class="card-body">

          
            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Empresa</th>
                        <th>Ayuda</th>
                        <th>Escribir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    if (!empty($mostrarinformacion)) {
                        foreach ($mostrarinformacion as $dato) {
                            ?>
                            <tr>
                                <th><?php echo $contador; ?></th>
                                <th><?php echo $dato["u_nombresrazon"]; ?></th>
                                <th><?php echo $dato["a_tipoayuda"]; ?></th>
                              <td>

                        <center> <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Actualizar<?php echo $dato["a_id"]; ?>">
                                <i class="fa-solid fa-add"></i>
                            </button></center>
                        <div class="modal fade" id="Actualizar<?php echo $dato["a_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">DATOS DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=registroayuda" data-form="save" enctype="multipart/form-data">
                                            <input type="hidden" id="ra_usuarioFK" name="ra_usuarioFK" value="<?php echo $dato["a_id"]; ?>" required>
                                            <input type="hidden" id="ra_ayudaFK" name="ra_ayudaFK" value="<?php echo $perfil["u_id"]; ?>" required>
                                            
                                            <div class="mb-3">
                                                <label for="data" class="form-label">Motivo:</label>
                                                <textarea class="form-control" name="ra_motivo" id="ra_motivo" rows="3" required></textarea>
                                            </div>
                                            
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Mi evidencia:</label>
                                            <input type="file" class="form-control" id="foto" name="foto" placeholder="ingrese el archivo" accept=".pdf" required>
                                            <p>La fecha de respuesta será de 7 dias al momento de enviar la información</p>
                                        </div>

                                            <center><button type="submit" class="btn btn-danger btn-sm">Postularme&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                                        </form>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>
                            </tr>
                        <?php
                        $contador = $contador + 1;
                    }
                }
                ?>

                </tbody>
            </table>                
        </div>

    </div
</div>

<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>