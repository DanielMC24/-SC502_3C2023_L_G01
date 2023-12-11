<?php include_once 'header.php'; ?>
<?php
$titulo = 'CATALOGO DE CURSOS';
?>

<?php include_once 'menu.php'; ?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>            </strong>
        </div>
        <div class="card-body">

            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <tbody>
                    <?php
                    if (!empty($mostrarinformacion)) {
                        foreach ($mostrarinformacion as $dato) {
                            ?>
                            <tr>

                                <td>
                                    <div class = "card">
                                        <div class="card-header">
                                            <h6 class="card-title">REGISTRO DE  CURSO: <?php echo $dato["cr_titulo"] ?></h6>
                                        </div>
                                        <div class="card-body">
                                            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=registrocurso">

                                                <div class="row">
                                                    <div class="col-4">
                                                        <center><img src="<?php echo $dato["cr_foto"] ?>" width="200px" height="200px"/></center>

                                                    </div>
                                                    <div class="col-8">
                                                        <input type="hidden" id="rc_cursoFK" name="rc_cursoFK" value="<?php echo $dato["cr_id"]; ?>" required>
                                                        <input type="hidden" id="rc_usuarioFK" name="rc_usuarioFK" value="<?php echo $perfil["u_id"]; ?>" required>

                                                        <strong>Categoria: <?php echo $dato["c_categoria"] ?> <br> Descripción: </strong>
                                                        <p style="text-align: justify;"><?php echo $dato["cr_descripcion"] ?></p>
                                                        <p>Hora inicial : <?php echo $dato["cr_horainicial"] ?> - Hora Final : <?php echo $dato["cr_horafinal"] ?></p>
                                                        <center><button type="submit" class="btn btn-danger btn-sm">Inscribirme&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>

                                                    </div>

                                                </div>
                                            </form>
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