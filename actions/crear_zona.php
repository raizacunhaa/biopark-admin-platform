<?php

require_once '../config/conexion.php';

$coleccionZonas = $db->zonas;

$datos = [

    '_id' => $_POST['id'],

    'nombre' => $_POST['nombre'],

    'extension_m2' => (int) $_POST['extension_m2']

];

$coleccionZonas->insertOne($datos);

header('Location: ../index.php?page=zonas&success=created');

exit;