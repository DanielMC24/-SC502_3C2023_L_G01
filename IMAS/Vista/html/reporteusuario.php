<?php
date_default_timezone_set('America/Bogota');
$hora = date("H:i:s");
$fecha = date("Y-m-d");
ob_start();
?>
<style>
    table{
        width: 100%;
        font-family: 'Arial';
    }
    th, td {
        border: 0.5px solid;
        font-family: 'Arial';
    }
</style>

<table>
    <thead style="text-align: center; background-color: #182951; color: white;  font-family: 'Arial';">
        <tr style="text-align: center; ">
            <td style="width: 66.6666%; height: 78px;" colspan="8">
                <p style="text-align: center; font-weight: bold">IMAS</p>
                <p style="text-align: center;">
                    Dirección: Dirección: Oficinas centrales: Calle 29, avenida 2 y 8 , De KFC La California 75 sur, San José, San Pedro, Costa Rica <br/>
                    Línea telefónica: 800-000-4627
                </p>
            </td>
        </tr>
    </thead>
    <thead style="text-align: center; background-color: orange; color: white;">
        <tr style="text-align: center; ">
            <td colspan="8">
                <strong>REPORTE DE USUARIOS</strong>
            </td>
        </tr>
    </thead>
    <thead style="text-align: center; ">
        <tr>
            <th style="width: 5%;">No.</th>
            <th style="width: 20%;">Identificación</th>
            <th style="width: 50%;">Nomnres y Apellidos o Razon Social</th>
            <th style="width: 20%;">Celular</th>
            <th style="width: 30%;">Correo</th>
            <th style="width: 20%;">Rol</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $contador = 1;
        if (!empty($mostrarinformacion)) {
            foreach ($mostrarinformacion as $dato) {
                ?>
                <tr>
                    <td style="width: 5%;"><?php echo $contador; ?></td>
                    <td style="width: 20%;"><?php echo $dato["u_identificacion"]; ?></td>
                    <td style="width: 50%;"><?php echo $dato["u_nombresrazon"]; ?></td>
                    <td style="width: 20%;"><?php echo $dato["u_celular"]; ?></td>
                    <td style="width: 30%;"><?php echo $dato["u_correo"]; ?></td>
                    <?php if ($dato["u_rol"] == 1) { ?>
                        <td style="width: 20%;">ADMINISTRADOR</td>
                    <?php } elseif ($dato["u_rol"] == 2) { ?>
                        <td style="width: 20%;">EMPRESA</td>
                    <?php } elseif ($dato["u_rol"] == 3) { ?>
                        <td style="width: 205%;">CLIENTE</td>
                    <?php } ?>

                    <?php
                }
                $contador = $contador + 1;
            }
            ?>  
    </tbody>
</table>


<p>Impresion de reporte: <?php echo $fecha . " - " . $hora ?></p>
<p style="font-size: 12px;color:red; ">IMAS</p>
<?php
$html = ob_get_clean();

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter', '');

$dompdf->render();
$dompdf->stream("reporteusuario.pdf", array("Attachment" => true));
// Guardamos a PDF
?>;



