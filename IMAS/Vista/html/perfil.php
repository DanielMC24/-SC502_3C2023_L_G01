<?php include_once 'header.php'; ?>
<?php
$titulo = 'USUARIO';
?>

<div class="container">
    <?php include_once 'menu.php'; ?>
    <div class="card">
        <div class="card-header bg-danger text-white">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> -ACTUALIZAR MI PERFIL </strong>
        </div>

        <div class="card-body">
            <?php $fila = $mostrarinformacion->fetch_object(); ?>

            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=usuarioactualizar">
                <div class="mb-3">
                    <label for="data" class="form-label">Indentificación:</label>
                   <input type="hidden" class="form-control form-control-sm" id="u_id" name="u_id" placeholder="Ingrese Información" value="<?php echo $fila->u_id; ?>" required>
                    <input type="text" class="form-control form-control-sm" id="u_identificacion" name="u_identificacion" placeholder="Ingrese Información" value="<?php echo $fila->u_identificacion; ?>" required>
                </div>                
                <div class="mb-3">
                    <label for="data" class="form-label">Nombres:</label>
                    <input type="text" class="form-control form-control-sm" id="u_nombres" name="u_nombres" value="<?php echo $fila->u_nombres; ?>" placeholder="Ingrese información" required>
                </div>

                <div class="mb-3">
                    <label for="data" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control form-control-sm" id="u_apellidos" name="u_apellidos" value="<?php echo $fila->u_apellidos; ?>" placeholder="Ingrese información" required>
                </div>
                <div class="mb-3">
                    <label for="data" class="form-label">Cargo:</label>
                    <input type="text" class="form-control form-control-sm" value="<?php echo $fila->u_cargo; ?>" placeholder="Ingrese información" disabled>
                    <input type="hidden" class="form-control form-control-sm" id="u_cargo" name="u_cargo" value="<?php echo $fila->u_cargo; ?>" placeholder="Ingrese información" required>
</div>


                <div class="mb-3">
                    <label for="data" class="form-label">Contraseña:</label>
                    <input type="text" class="form-control form-control-sm" id="u_contrasena " name="u_contrasena" value="<?php echo $fila->u_contrasena; ?>" placeholder="Ingrese información" required>
                </div>

                <center><button type="submit" class="btn btn-danger btn-sm">Guardar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
            </form>

        </div>

    </div>
</div>

<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>