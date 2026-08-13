<?php

require_once __DIR__ . '/../config/conexion.php';

$totalHabitats = $db->habitats->countDocuments();

$totalEspecies = $db->especies->countDocuments();

$totalVeterinarios = $db->veterinarios->countDocuments();

$totalCuidadores = $db->cuidadores->countDocuments();

$totalGuias = $db->guias->countDocuments();

$totalItinerarios = $db->itinerarios->countDocuments();

$totalZonas= $db->zonas->countDocuments();

?>

<section>

    <div class="welcome-section">

        <h1>Bienvenido a BioPark Admin Platform</h1>

        <p>
            Panel de administración y monitoreo del zoológico.
        </p>

    </div>

    <div class="row g-4 mt-3">

        <div class="col-md-6 col-xl-3">

            <div class="card dashboard-card card-habitats">

                <div class="card-body">
                    
                    <i class="bi bi-tree card-icon"></i>

                    <h5>Hábitats</h5>

                    <h2><?= $totalHabitats ?></h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card dashboard-card card-especies">

                <div class="card-body">

                    <i class="bi bi-bug card-icon"></i>

                    <h5>Especies</h5>

                    <h2><?= $totalEspecies ?></h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card dashboard-card card-zonas">

                <div class="card-body">

                    <i class="bi bi-geo-alt card-icon"></i>

                    <h5>Zonas</h5>

                    <h2><?= $totalZonas ?></h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card dashboard-card card-veterinarios">

                <div class="card-body">

                    <i class="bi bi-heart-pulse card-icon"></i>

                    <h5>Veterinarios</h5>

                    <h2><?= $totalVeterinarios ?></h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card dashboard-card card-cuidadores">

                <div class="card-body">

                    <i class="bi bi-people card-icon"></i>

                    <h5>Cuidadores</h5>

                    <h2><?= $totalCuidadores ?></h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card dashboard-card card-guias">

                <div class="card-body">

                    <i class="bi bi-person-badge card-icon"></i>

                    <h5>Guías</h5>

                    <h2><?= $totalGuias ?></h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3">

            <div class="card dashboard-card card-itinerarios">

                <div class="card-body">

                    <i class="bi bi-map card-icon"></i>

                    <h5>Itinerarios</h5>

                    <h2><?= $totalItinerarios ?></h2>

                </div>

            </div>

        </div>

    </div>

</section>