<?php include_once 'header.php'; ?>
<?php
$titulo = 'USUARIOS';
?>
<?php include_once 'menu.php'; ?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>  
                        &nbsp; &nbsp;     &nbsp; &nbsp;   <a href="index.php?accion=reporteusuarios" class="btn btn-light btn-sm" target="_blank"> <strong>Reporte &nbsp; &nbsp; <i class="fa-regular fa-file-pdf"></i></strong></a>

            </strong>
        </div>
        <div class="card-body">



            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Identificación</th>
                        <th>Nomnres y Apellidos o Razon Social</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Rol</th>

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
                                <th><?php echo $dato["u_identificacion"]; ?></th>

                                <th><?php echo $dato["u_nombresrazon"]; ?></th>
                                <th><?php echo $dato["u_celular"]; ?></th>
                                <th><?php echo $dato["u_correo"]; ?></th>
                                <?php if ($dato["u_rol"] == 1) { ?>
                                    <th>ADMINISTRADOR</th>
                                <?php } elseif ($dato["u_rol"] == 2) { ?>
                                    <th>EMPRESA</th>
                                <?php } elseif ($dato["u_rol"] == 3) { ?>
                                    <th>CLIENTE</th>
                                <?php } ?>

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