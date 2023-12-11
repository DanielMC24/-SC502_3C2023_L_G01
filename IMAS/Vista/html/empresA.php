<?php include_once 'header.php'; ?>
<?php
$titulo = 'EMPRESA';
?>

<div class="container">
    <?php include_once 'menu.php'; ?>
    <div class="card">
        <div class="card-header bg-danger text-white">
            <i class="fa-solid fa-circle-info"></i>&nbsp; <strong><?php echo $titulopagina ?> - <?php echo $titulo; ?>  
            </strong>
        </div>

        <div class="card-body">

                    <?php $fila = $mostrarinformacion->fetch_object(); ?>


            <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=empresaactualizar" data-form="save" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">

                                <div class="mb-3">
                                    <label for="data" class="form-label">Nit:</label>
                                    <input type="hidden" id="e_id" name="e_id" value="<?php echo $fila->e_id; ?>" required>
                                    <input type="text" class="form-control form-control-sm" id="e_nit" name="e_nit" placeholder="Ingrese información" value="<?php echo $fila->e_nit; ?>"  required>
                                </div> 
                                 <label for="data" class="form-label">Razón Social:</label>
                                    <input type="text" class="form-control form-control-sm" id="e_razonsocial" name="e_razonsocial" placeholder="Ingrese información" value="<?php echo $fila->e_razonsocial; ?>"  required>
                                

                            <div class="mb-3">
                               
                            </div>

                            <div class="mb-3">
                                <label for="data" class="form-label">Dirección:</label>
                                <textarea class="form-control" name="e_direccion" id="e_direccion" rows="3" value="<?php echo $fila->e_direccion; ?>" required><?php echo $fila->e_direccion; ?></textarea>
                            </div>
                                    
                                    <div class="mb-3">
                            <label for="data" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control form-control-sm" id="e_correo" name="e_correo" placeholder="Ingrese información" value="<?php echo $fila->e_correo; ?>" required>
                        </div>

                         
                        </div>

                    <div class="col-6">
                          <div class="mb-3">
                            <label for="data" class="form-label">WHATSAAP:</label>
                            <input type="number" class="form-control form-control-sm" id="e_whatsaap" name="e_whatsaap" placeholder="Ingrese información" value="<?php echo $fila->e_whatsaap; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="data" class="form-label">NEQUI:</label>
                            <input type="number" class="form-control form-control-sm" id="e_nequi" name="e_nequi" placeholder="Ingrese información" value="<?php echo $fila->e_nequi; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="data" class="form-label">BANCOLOMBIA A LA MANO:</label>
                            <input type="number" class="form-control form-control-sm" id="e_bancolombia" name="e_bancolombia" placeholder="Ingrese información" value="<?php echo $fila->e_bancolombia; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="data" class="form-label">DAVIPLATA:</label>
                            <input type="number" class="form-control form-control-sm" id="e_daviplata" name="e_daviplata" placeholder="Ingrese información" value="<?php echo $fila->e_daviplata; ?>" required>
                        </div>
                    </div>
                </div>
                <center><button type="submit" class="btn btn-danger btn-sm">Guardar&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
            </form>



        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>