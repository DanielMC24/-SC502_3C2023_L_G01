<?php include_once 'header.php'; ?>
<?php
$titulo = 'CURSOS';
?>

<?php include_once 'menu.php'; ?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>  
                &nbsp; &nbsp;     <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#agregar">Nuevo&nbsp; &nbsp; <i class="fa-solid fa-plus"></i></button>
                &nbsp; &nbsp;     &nbsp; &nbsp;   <a href="index.php?accion=reportecursos" class="btn btn-light btn-sm" target="_blank"> <strong>Reporte &nbsp; &nbsp; <i class="fa-regular fa-file-pdf"></i></strong></a>
            </strong>
        </div>

        <div class="card-body">
            <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">NUEVO REGISTRO DE <?php echo $titulo; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=cursoguardar" data-form="save" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Titulo:</label>
                                            <input type="text" class="form-control form-control-sm" id="cr_titulo" name="cr_titulo" placeholder="Ingrese información" required>
                                        </div>
                                    </div>

                                    <div class="col-6">

                                        <div class="mb-3">
                                            <label for="data" class="form-label">Categoria:</label>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="cr_categoriaFK" id="cr_categoriaFK">
                                                <?php
                                                if (!empty($mostrarcategoria)) {
                                                    foreach ($mostrarcategoria as $info) {
                                                        ?>
                                                        <option value="<?php echo $info["c_id"]; ?>"><?php echo $info["c_categoria"]; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="mb-3">
                                            <label for="data" class="form-label">Descripción:</label>
                                            <textarea class="form-control" name="cr_descripcin" id="cr_descripcin" rows="3" required></textarea>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">Hora Inicio:</label>
                                            <input type="time" class="form-control form-control-sm" id="cr_horainicial" name="cr_horainicial" placeholder="Ingrese información" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="data" class="form-label">hora Final:</label>
                                            <input type="time" class="form-control form-control-sm" id="cr_horafinal" name="cr_horafinal" placeholder="Ingrese información" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Foto:</label>
                                            <input type="file" class="form-control" id="foto" name="foto" placeholder="ingrese la Foto" accept="image/png, image/jpeg" required>
                                        </div>
                                    </div>

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
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>Foto</th>
                        <th>Descripción</th>
                        <th>Hora Inicial</th>
                        <th>Hora Final</th>
                        <th>Registrados</th>

                        <th>Editar</th>
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
                                <th><?php echo $dato["c_categoria"] ?></th>
                                <td><img src="<?php echo $dato["cr_foto"] ?>" width="50px" height="50px"/></td>
                                <th style="text-align: justify;"><?php echo $dato["cr_descripcion"] ?></th>
                                <th><?php echo $dato["cr_horainicial"] ?></th>
                                <th><?php echo $dato["cr_horafinal"] ?></th>
                                <td><center> <a type="button" class="btn btn-light btn-sm" href="index.php?accion=cursospostulacion&idcurso=<?php echo $dato["cr_id"] ?>"> <i class="fa-solid fa-eye"></i></a></center>
                        </td>
                        <!---ACTUALI>R--->

                        <td>

                        <center> <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Actualizar<?php echo $dato["cr_id"]; ?>">
                                <i class="fa-solid fa-pencil"></i>
                            </button></center>
                        <div class="modal fade" id="Actualizar<?php echo $dato["cr_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">ACTUALIZAR DATO DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="modal-body">
                                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=cursoactualizar" data-form="save" enctype="multipart/form-data">
                                                <input type="hidden" id="cr_id" name="cr_id" value="<?php echo $dato["cr_id"]; ?>" required>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Titulo:</label>
                                                            <input type="text" class="form-control form-control-sm" id="cr_titulo" name="cr_titulo" value="<?php echo $dato["cr_titulo"]; ?>" placeholder="Ingrese información" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Categoria: <?php echo!empty($mostrarcategoriaup) ?> </label>
                                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="cr_categoriaFK" id="cr_categoriaFK">
                                                                <?php
                                                                $idcursossqlcategoria = 'SELECT * FROM categorias';
                                                                foreach ($pdopag->query($idcursossqlcategoria) as $infoup) {
                                                                    if ($infoup["c_id"] == $dato["cr_categoriaFK"]) {
                                                                        ?>
                                                                        <option value="<?php echo $infoup["c_id"]; ?>" selected><?php echo $infoup["c_categoria"]; ?></option>
                                                                    <?php } else { ?>
                                                                        <option value="<?php echo $infoup["c_id"]; ?>"><?php echo $infoup["c_categoria"]; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Descripción:</label>
                                                            <textarea class="form-control" name="cr_descripcion" id="h_descripcion" rows="3" value="<?php echo $dato["cr_descripcion"]; ?>" required><?php echo $dato["cr_descripcion"]; ?></textarea>
                                                        </div>
                                                    </div>


                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">Hora Inicio:</label>
                                                            <input type="time" class="form-control form-control-sm" id="cr_horainicial" name="cr_horainicial" value="<?php echo $dato["cr_horainicial"]; ?>" placeholder="Ingrese información" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label">hora Final:</label>
                                                            <input type="time" class="form-control form-control-sm" id="cr_horafinal" name="cr_horafinal" value="<?php echo $dato["cr_horafinal"]; ?>" placeholder="Ingrese información" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mb-3">
                                                            <label for="foto" class="form-label">Foto:</label>
                                                            <input type="file" class="form-control" id="foto" name="foto" placeholder="ingrese la Foto">
                                                            <input type="hidden" class="form-control" id="fotovieja" name="fotovieja" value="<?php echo $dato["cr_foto"]; ?>">

                                                        </div>
                                                    </div>

                                                </div>
                                                <center><button type="submit" class="btn btn-danger btn-sm">Actualizar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                                            </form>
                                        </div>
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

                        <center> <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Eliminar<?php echo $dato["cr_id"]; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </button></center>
                        <div class="modal fade" id="Eliminar<?php echo $dato["cr_id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">ELIMINAR DATO DE <?php echo $titulo; ?></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=cursoeliminar">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $dato["cr_id"] ?>" />
                                            <input type="hidden" class="form-control form-control-sm" name="foto" value = "<?php echo $dato["cr_foto"]; ?>">
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