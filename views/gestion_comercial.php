<?php

require_once __DIR__ . '/../config/conexion.php';

$coleccionEntradas = $db->entradas;
$coleccionEntradasDia = $db->entradasxdia;
$coleccionTotalMes = $db->totalmes;

$entradas = $coleccionEntradas->find()->toArray();
$entradasDia = $coleccionEntradasDia->find()->toArray();
$totalMes = $coleccionTotalMes->find()->toArray();


/* ==========================
TOTAL ENTRADAS
========================== */

$totalAdultos = 0;
$totalMenores = 0;
$totalMenores2 = 0;

foreach($entradas as $entrada){

    $totalAdultos += $entrada['adultos'];
    $totalMenores += $entrada['menores'];
    $totalMenores2 += $entrada['menores2'];

}


/* ==========================
ENTRADAS POR DIA
========================== */

$porDia = [];

foreach($entradasDia as $registro){

    $dia = $registro['dia'];

    if(!isset($porDia[$dia])){

        $porDia[$dia] = [

            'adultos' => 0,
            'menores' => 0

        ];

    }

    $porDia[$dia]['adultos'] += $registro['adultos'];
    $porDia[$dia]['menores'] += $registro['menores'];

}


/* ==========================
RECAUDACION MENSUAL
========================== */

$porMes = [];

foreach($totalMes as $registro){

    $mes = $registro['mes'];

    if(!isset($porMes[$mes])){

        $porMes[$mes] = 0;

    }

    $porMes[$mes] += $registro['total'];

}

?>

<h1>Gestión Comercial</h1>

<div class="row mt-4">

    <!-- RESUMEN DE ENTRADAS -->

    <div class="col-md-4">

        <div class="card shadow-sm">

            <div class="card-header bg-primary text-white">

                Resumen de Entradas

            </div>

            <div class="card-body">

                <p>

                    <strong>Adultos:</strong>

                    <?= $totalAdultos ?>

                </p>

                <p>

                    <strong>Menores:</strong>

                    <?= $totalMenores ?>

                </p>

                <p>

                    <strong>Menores 2:</strong>

                    <?= $totalMenores2 ?>

                </p>

            </div>

        </div>

    </div>


    <!-- ENTRADAS POR DIA -->

    <div class="col-md-4">

        <div class="card shadow-sm">

            <div class="card-header bg-success text-white">

                Entradas por Día

            </div>

            <div class="card-body">

                <table class="table table-sm table-hover">

                    <thead>

                        <tr>

                            <th>Día</th>

                            <th>Adultos</th>

                            <th>Menores</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($porDia as $dia => $datos): ?>

                        <tr>

                            <td><?= $dia ?></td>

                            <td><?= $datos['adultos'] ?></td>

                            <td><?= $datos['menores'] ?></td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- RECAUDACION MENSUAL -->

    <div class="col-md-4">

        <div class="card shadow-sm">

            <div class="card-header bg-warning">

                Recaudación Mensual

            </div>

            <div class="card-body">

                <table class="table table-sm table-hover">

                    <thead>

                        <tr>

                            <th>Mes</th>

                            <th>Total</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($porMes as $mes => $total): ?>

                        <tr>

                            <td><?= $mes ?></td>

                            <td>

                                $<?= number_format($total, 0, ',', '.') ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>