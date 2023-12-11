<?php include_once 'header.php'; ?>
<?php
$titulo = 'CATEGORIAS';
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
                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=categoriaguardar">
                                <div class="mb-3">
                                    <label for="data" class="form-label">Categoria:</label>
                                    <input type="text" class="form-control form-control-sm" id="c_categoria" name="c_categoria" placeholder="Ingrese información" required>
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
                        <th>Categoria</th>
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
                            <th><?php echo $dato["c_categoria"]; ?></th>

                            <td>

                    <center> <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Actualizar<?php echo $dato["c_id"]; ?>">
                            <i class="fa-solid fa-pencil"></i>
                        </button></center>
                    <div class="modal fade" id="Actualizar<?php echo $dato["c_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">ACTUALIZAR DATO DE <?php echo $titulo; ?></h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=categoriaactualizar">
                                        <input type="hidden" id="c_id" name="c_id" value="<?php echo $dato["c_id"]; ?>" required>
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Categoria:</label>
                                            <input type="text" class="form-control form-control-sm" id="c_categoria" name="c_categoria" placeholder="Ingrese información"  value="<?php echo $dato["c_categoria"]; ?>"  required>
                                            <input type="hidden" class="form-control form-control-sm" id="c_categoriaviejo" name="c_categoriaviejo" placeholder="Ingrese Información" value="<?php echo $dato["c_categoria"]; ?>" required>
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

                    <center> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Eliminar<?php echo $dato["c_id"]; ?>">
                            <i class="fa-solid fa-trash-can"></i>
                        </button></center>
                    <div class="modal fade" id="Eliminar<?php echo $dato["c_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">ELIMINAR DATO DE <?php echo $titulo; ?></h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=categoriaeliminar">
                                        <input type="hidden" id="accion" name="accion" value="eliminar" />
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dato["c_id"]; ?>" />
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