<?php include_once 'header.php'; ?>
<?php
$titulo = 'POSTULACIONES DE EMPLEOS';
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