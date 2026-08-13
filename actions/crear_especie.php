<?php

require_once '../config/conexion.php';

$coleccionEspecies = $db->especies;

$datos = [

    '_id' => $_POST['id'],

    'nombre' => $_POST['nombre'],

    'nombre_cientifico' => $_POST['nombre_cientifico'],

    'descripcion' => $_POST['descripcion'],

    'habitats' => explode(',', $_POST['habitats']), //si el usuario pone "H1,H3" Mongo lo va a leer como array: ["H1", "H3"]

    'zona' => $_POST['zona'],

    'edad' => (int) $_POST['edad']

];

$coleccionEspecies->insertOne($datos);

header('Location: ../index.php?page=especies&success=created');

exit;