<?php

require_once '../config/conexion.php';

$coleccionZonas = $db->zonas;

$coleccionZonas->deleteOne([

    '_id' => $_POST['id']

]);

header('Location: ../index.php?page=zonas&success=deleted');

exit;