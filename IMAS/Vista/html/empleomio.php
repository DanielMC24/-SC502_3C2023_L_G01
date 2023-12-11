<?php include_once 'header.php'; ?>
<?php
$titulo = 'MIS OFERTAS DE EMPLEOS';
?>
<?php include_once 'menu.php'; ?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>  
                &nbsp; &nbsp;     <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#agregar">Nuevo&nbsp; &nbsp; <i class="fa-solid fa-plus"></i></button>
            </strong>
        </div>
        <div class="card-body">

            <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">NUEVO REGISTRO DE <?php echo $titulo; ?></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=empleoguardar">

                                <input type="hidden" class="form-control form-control-sm" id="e_empresaFK" name="e_empresaFK" value="<?php echo $perfil["u_id"] ?>" required>
                                <div class="mb-3">
                                    <label for="data" class="form-label">Titulo:</label>
                                    <input type="text" class="form-control form-control-sm" id="e_nombre" name="e_nombre" placeholder="Ingrese información" required>
                                </div>

                                <div class="mb-3">
                                    <label for="data" class="form-label">Descripción:</label>
                                    <textarea class="form-control" name="e_requisitos" id="cr_descripcin" rows="3" required></textarea>
                                </div>

                                <center><button type="submit" class="btn btn-danger btn-sm">Guardar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>


            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Empleo</th>
                        <th>Requisitos</th>
                        <th>Editar</th>
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
                                <th><?php echo $dato["e_nombre"]; ?></th>
                                <th><?php echo $dato["e_requisitos"]; ?></th>
                                <td>

                        <center> <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Actualizar<?php echo $dato["e_id"]; ?>">
                                <i class="fa-solid fa-pencil"></i>
                            </button></center>
                        <div class="modal fade" id="Actualizar<?php echo $dato["e_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">ACTUALIZAR DATO DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=empleoactualizar">
                                            <input type="hidden" id="e_empresaFK" name="e_empresaFK" value="<?php echo $dato["e_usuarioFK"]; ?>" required>
                                            <input type="hidden" id="e_id" name="e_id" value="<?php echo $dato["e_id"]; ?>" required>


                                            <div class="mb-3">
                                                <label for="data" class="form-label">Nombre:</label>
                                                <input type="text" class="form-control form-control-sm" id="e_nombre" name="e_nombre" value="<?php echo $dato["e_nombre"]; ?>" placeholder="Ingrese información" required>

                                                <input type="hidden" class="form-control form-control-sm" id="e_nombreviejo" name="e_nombreviejo" value="<?php echo $dato["e_nombre"]; ?>" placeholder="Ingrese información" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="data" class="form-label">Descripción:</label>
                                                <textarea class="form-control" name="e_requisitos" id="cr_descripcin" rows="3" value="<?php echo $dato["e_requisitos"]; ?>" required><?php echo $dato["e_requisitos"]; ?></textarea>
                                            </div>

                                            <center><button type="submit" class="btn btn-danger btn-sm">Actualizar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                                        </form>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>
                        <!-- ELIMININAR  -->
                        <td>

                        <center> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Eliminar<?php echo $dato["e_id"]; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button></center>
                        <div class="modal fade" id="Eliminar<?php echo $dato["e_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">ELIMINAR DATO DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=empleoeliminar">
                                            <input type="hidden" id="accion" name="accion" value="eliminar" />
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dato["e_id"]; ?>" />
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