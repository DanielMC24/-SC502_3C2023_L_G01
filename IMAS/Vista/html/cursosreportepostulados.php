
<?php
include_once 'header.php';


$cantidadarray = array();
$cantidadcursosql = 'SELECT COUNT(*) AS cantidad FROM cursos;';
$eje = $pdopag->prepare($cantidadcursosql);
$eje->execute();
$sqlm = $eje->fetch(PDO::FETCH_ASSOC);
$cantidadcurso = $sqlm["cantidad"];

$idcursossql = 'SELECT * FROM cursos';

foreach ($pdopag->query($idcursossql) as $datoid) {

    $sqlbuscarcur = 'SELECT COUNT(rc_cursoFK) AS cantidad FROM registrocurso, cursos WHERE cr_id = ? AND rc_cursoFK  = ?;';
    $ejecutar = $pdopag->prepare($sqlbuscarcur);
    $ejecutar->execute(array($datoid['cr_id'], $datoid['cr_id']));
    $buscarcantidad = $ejecutar->fetch(PDO::FETCH_ASSOC);
    $cantidadbuscar = $buscarcantidad['cantidad'];

    // echo "TITULO".$titulobuscar;

    if ($cantidadbuscar == 0) {
        $cantidadarray[] = 0;
    } else {
        $cantidadarray[] = $cantidadbuscar;
    }
}
$sqltitulo = "SELECT * FROM cursos;";
$datatitulo = array(); // Array donde vamos a guardar los datos
foreach ($pdopag->query($sqltitulo) as $titulo) {
    $datatitulo[] = $titulo["cr_titulo"];
}
?>
<?php
$titulo = 'MIS CURSOS POSTULADOS';
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
                        <th>Titulo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $cantidadcurso; $i++) { ?>
                        <tr>
                            <td><?php echo $datatitulo[$i] ?></td>
                            <td><?php echo $cantidadarray[$i] ?></td>

                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>                
        </div>
    </div>

    <br>


    <div class="card">
        <div class="card-header">
             <i class="fa-solid fa-bars"></i>&nbsp; <strong><?php echo $titulopagina ?> - Estádistica  
            </strong>
        </div>
        <div class="card-body">
            <canvas id="graficabarra"></canvas>
        </div>
    </div>
</div>
<script src="Vista/js/jquery-3.5.1.min.js"></script>

<?php include_once 'footer.php'; ?>
<script src="Vista/js/chart.min.js"></script>

<script>
    const graph = document.querySelector("#graficabarra");

    const data = {
    labels: [
<?php for ($i = 0; $i < $cantidadcurso; $i++) { ?>
        "<?php echo $datatitulo[$i] ?>",
<?php }; ?>
    ],
            datasets: [{
            label:"Grafica balance de Cursos",
                    data: [
<?php
for ($i = 0; $i < $cantidadcurso; $i++) {
    echo $cantidadarray[$i];
    ?>,
<?php } ?>
                    ],
                    backgroundColor: "#ff460d",
                    borderColor: "#9b59b6",
                    borderWidth: 2
            }]
    }
    ;

    const config = {
        type: 'bar',
        data: data,
    };
    new Chart(graph, config);
</script>
<script src="Vista/js/script.js" crossorigin="anonymous"></script>
<script src="Vista/js/simple-datatables.js" crossorigin="anonymous"></script>