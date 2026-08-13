<?php

require_once '../config/conexion.php';

$coleccionGuias = $db->guias;

$datos = [

    '_id' => $_POST['id'],

    'nombre' => $_POST['nombre'],

    'telefono' => $_POST['telefono'],

    'fecha_inicio' => $_POST['fecha_inicio']

];

$coleccionGuias->insertOne($datos);

header('Location: ../index.php?page=guias&success=created');

exit;