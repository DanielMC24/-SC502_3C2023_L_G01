<?php include_once 'header.php'; ?>
<?php
$titulo = 'POSTULADOS DEL CURSO';
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
                        <th>Titulo</th>
                        <th>Descripciónn</th>
                        <th>Hora Inicio</th>
                        <th>Hora Final</th>
                        <th>Eliminar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($mostrarinformacion)) {
                        foreach ($mostrarinformacion as $dato) {
                            ?>
                            <tr>
                                <th><?php echo $dato["cr_titulo"] ?></th>
                                <th><?php echo $dato["cr_descripcion"] ?></th>
                                <th><?php echo $dato["cr_horainicial"] ?></th>
                                <th><?php echo $dato["cr_horafinal"] ?></th>                               
                                 <td>

                        <center> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Eliminar<?php echo $dato["rc_id"]; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button></center>
                        <div class="modal fade" id="Eliminar<?php echo $dato["rc_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">ELIMINAR DATO DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=registrocursoeliminar">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dato["rc_id"] ?>" />
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
                    }
                }
                ?>

                </tbody>
            </table>                
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>