<?php

require_once 'partials/header.php';
require_once 'partials/sidebar.php';

?>

<main class="content">

<?php

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {

    case 'habitats':
        require_once 'views/habitats.php';
        break;

    case 'especies':
        require_once 'views/especies.php';
        break;

    case 'zonas':
        require_once 'views/zonas.php';
        break;
    
    case 'veterinarios':
        require_once 'views/veterinarios.php';
        break;

    case 'cuidadores':
        require_once 'views/cuidadores.php';
        break;

    case 'guias':
        require_once 'views/guias.php';
        break;

    case 'itinerarios':
        require_once 'views/itinerarios.php';
        break;

    case 'gestion':
        require_once 'views/gestion_comercial.php';
        break;

    default:
        require_once 'views/dashboard.php';
        break;
}

?>

</main>

<?php require_once 'partials/footer.php'; ?>