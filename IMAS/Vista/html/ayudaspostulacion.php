<?php include_once 'header.php'; ?>
<?php
$titulo = 'MIS POSTULACIONES DE AYUDAS';
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
                        <th>Tipo de Ayuda</th>
                        <th>Motivo</th>
                        <th>Fecha Respuesta</th>
                        <th>Evidencia</th>                       
                        <th>Eliminar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    if (!empty($mostrarinformacion)) {
                        foreach ($mostrarinformacion as $dato) {
                            $buscarempresa = 'SELECT * FROM ayudas, usuarios WHERE a_usuarioFK = u_id AND a_id = ?;';
                            $eje = $pdopag->prepare($buscarempresa);
                            $eje->execute(array($dato["ra_ayudaFK"]));
                            $datoempleado = $eje->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <tr>
                                <th><?php echo $contador; ?></th>
                                <th><?php echo $datoempleado["u_nombresrazon"]; ?></th>
                                <th><?php echo $dato["a_tipoayuda"]; ?></th>
                                <th><?php echo $dato["ra_motivo"]; ?></th>
                                <th><?php echo $dato["ra_fecharespuesta"]; ?></th>

                                <td>
                        <center><a href="<?php echo $dato["ra_evidencia"] ?>" target="_blank" class="btn btn-success btn-sm" download="<?php echo $dato["a_tipoayuda"] ?>">
                                <i class="fa-solid fa-file-pdf"></i>
                            </a></center>
                        </td>               

                        <!-- ELIMININAR  -->
                        <td>

                        <center> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Eliminar<?php echo $dato["ra_id"]; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button></center>
                        <div class="modal fade" id="Eliminar<?php echo $dato["ra_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">ELIMINAR DATO DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=registroayudaeliminar">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dato["ra_id"] ?>" />
                                            <input type="hidden" class="form-control form-control-sm" name="foto" value = "<?php echo $dato["ra_evidencia"]; ?>">
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