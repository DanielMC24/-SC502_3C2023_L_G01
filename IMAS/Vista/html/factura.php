<?php include_once 'headerinicio.php'; ?>

<div class="card ">
    <div class="card-header bg-danger text-white">
        <strong id="titulo"><?php echo $empresa->e_razonsocial; ?> - Factura Habitación </strong>
    </div> 
    <?php
    ?>
    <div class="card-body  ">
        <?php
        $fila = $mostrarinformacion->fetch_object();
        $iva = ($fila->r_valor) * 19 / 100;
        $subtotal = $fila->r_valor - $iva;
        ?>

        <div class="container">
            <br>
            <table id="datatablesSimple" class="display table table-bordered table-hover">
                <tbody>
                    <tr style="height: 78px;">
                        <td style="width: 66.6666%; height: 78px;" colspan="2">
                            <p style="text-align: center; font-weight: bold"><?php echo $empresa->e_razonsocial; ?></p>
                            <p style="text-align: center;">
                                NIT No.: <?php echo $empresa->e_nit; ?><br/>

                                Dirección: <?php echo $empresa->e_direccion; ?><br/>

                                Whatsaap: <?php echo $empresa->e_whatsaap; ?> - Correo Electrónico : Whatsaap: <?php echo $empresa->e_correo; ?><br/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height: 18px;">
                        <td style="width: 66.6666%; height: 18px;" colspan="2">FACTURA NO. <strong><?php echo $fila->r_codigo ?></strong></td>
                    </tr>
                    <tr style="height: 18px;">
                        <td style="width: 66.6666%; height: 18px; text-align: left;" colspan="2">Fecha de Ingreso: <strong><?php echo $fila->r_fecha_llegada ?></strong></td>
                    </tr>
                    <tr style="height: 18px;">
                        <td style="width: 70%; text-align: center; height: 18px;" colspan="2">Hora Entrada: <strong><?php echo $fila->r_hora_llegada ?></strong> - Hora Salida : <strong><?php echo $fila->r_hora_salida ?></strong></td>
                    </tr>
                    <tr style="height: 18px;">
                        <td style="width: 38.9333%; height: 18px; text-align: center;"><strong>Descripci&oacute;n</strong></td>
                        <td style="width: 27.7333%; height: 18px; text-align: center;"><strong>Valor</strong></td>
                    </tr>
                    <tr style="height: 10px;">
                        <td style="width: 38.9333%; height: 10px;"><strong>Habitacion No. <?php echo $fila->h_numero ?> - <?php echo $fila->t_tipo ?></strong></td>
                        <td style="width: 27.7333%; height: 10px; text-align: right;">$ <?php echo number_format($fila->r_valor, 0, ",", ".") ?></td>
                    </tr>
                    <tr style="height: 10px;">
                        <td style="width: 38.9333%; height: 10px;"><strong>Descuento</strong></td>
                        <td style="width: 27.7333%; height: 10px; text-align: right;">$ <?php echo number_format($fila->h_descuento, 0, ",", ".") ?> %</td>
                    </tr>
                    <tr style="height: 10px;">
                        <td style="width: 38.9333%; height: 10px;"><strong>Subtotal</strong></td>
                        <td style="width: 27.7333%; height: 10px; text-align: right;">$ <?php echo number_format($subtotal, 0, ",", "."); ?></td>
                    </tr>
                    <tr style="height: 18px;">
                        <td style="width: 38.9333%; height: 18px;"><strong>Iva 19 %</strong></td>
                        <td style="width: 27.7333%; height: 18px; text-align: right;">$ <?php echo number_format($iva, 0, ",", "."); ?></td>
                    </tr>
                    <tr style="height: 18px;">
                        <td style="width: 38.9333%; height: 18px;"><strong>Total a pagar</strong></td>
                        <td style="width: 27.7333%; height: 18px; text-align: right;">$ <strong><?php echo number_format($fila->r_valor, 0, ",", ".") ?> </strong></td>
                    </tr>
                    <tr style="height: 18px;">
                        <td style="width: 38.9333%; height: 18px;" colspan="2">Fecha y hora de registro: <?php echo $fechasistema ?> - <?php echo $horasistema ?></td>
                    </tr>
                </tbody>
            </table>
            <center><a href="index.php?accion=reportefactura&codigo=<?php echo $fila->r_codigo; ?>" class="btn btn-danger btn-sm" target="_blank"> <strong>Factura &nbsp; &nbsp; <i class="fa-regular fa-file-pdf"></i></strong></a></center>
<br>
<br>
        </div>

    </div>
</div>

<?php include_once 'footer.php'; ?>
</div>

</body>
</html>