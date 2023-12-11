<?php include_once 'header.php'; ?>
<?php
$titulo = 'CATALOGO OFERTAS DE EMPLEOS';
?>
<?php include_once 'menu.php'; ?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>  
            </strong>
        </div>
        <div class="card-body">



            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Empresa</th>
                        <th>Empleo</th>
                        <th>Requisitos</th>
                        <th>Postularme</th>
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
                                <th><?php echo $dato["e_nombre"]; ?></th>
                                <th><?php echo $dato["e_requisitos"]; ?></th>
                                            <td>

                        <center> <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Actualizar<?php echo $dato["e_id"]; ?>">
                                <i class="fa-solid fa-add"></i>
                            </button></center>
                        <div class="modal fade" id="Actualizar<?php echo $dato["e_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">DATOS DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=registroempleo" data-form="save" enctype="multipart/form-data">
                                            <input type="hidden" id="re_empleoFK" name="re_empleoFK" value="<?php echo $dato["e_id"]; ?>" required>
                                            <input type="hidden" id="re_usuarioFK" name="re_usuarioFK" value="<?php echo $perfil["u_id"]; ?>" required>


                                            <div class="mb-3">
                                                <label for="data" class="form-label">Empleo:</label>
                                                <input type="text" class="form-control form-control-sm" id="e_nombre" name="e_nombre" value="<?php echo $dato["e_nombre"]; ?>" placeholder="Ingrese información" disabled>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="data" class="form-label">Descripción:</label>
                                                <textarea class="form-control" name="e_requisitos" id="cr_descripcin" rows="3" value="<?php echo $dato["e_requisitos"]; ?>" disabled=""><?php echo $dato["e_requisitos"]; ?></textarea>
                                            </div>
                                            
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Mi Hoja de Vida:</label>
                                            <input type="file" class="form-control" id="foto" name="foto" placeholder="ingrese la Foto" accept=".pdf" required>
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