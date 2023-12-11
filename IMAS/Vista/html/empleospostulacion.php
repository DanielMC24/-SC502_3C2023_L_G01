<?php include_once 'header.php'; ?>
<?php
$titulo = 'MIS POSTULACIONES DE EMPLEOS';
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
                        <th>Fecha</th>
                        <th>Hoja de Vida</th>
                        <th>Eliminar</th>
                        
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
                                <th><?php echo $dato["re_fecha"]; ?></th>

                                <td>
                <center><a href="<?php echo $dato["re_cv"] ?>" target="_blank" class="btn btn-success btn-sm" download="<?php echo $dato["e_nombre"] ?>">
<i class="fa-solid fa-file-pdf"></i>
                                    </a></center>
                                </td>               

                                <!-- ELIMININAR  -->
                        <td>

                        <center> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Eliminar<?php echo $dato["re_id"]; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button></center>
                        <div class="modal fade" id="Eliminar<?php echo $dato["re_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">ELIMINAR DATO DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=registroempleoeliminar">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dato["re_id"] ?>" />
                                            <input type="hidden" class="form-control form-control-sm" name="foto" value = "<?php echo $dato["re_cv"]; ?>">
                                            <h6>¿Desea eliminar la información?</h6>
                                            <center><button type="submit" class="btn btn-danger btn-sm">Eliminar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
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