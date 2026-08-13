<?php

require_once '../config/conexion.php';

$coleccionVeterinarios = $db->veterinarios;

$datos = [

    '_id' => $_POST['id'],
    'nombre' => $_POST['nombre'],
    'zona' => $_POST['zona'],
    'habitat' => $_POST['habitat']

];

$coleccionVeterinarios->insertOne($datos);

header('Location: ../index.php?page=veterinarios&success=created');

exit;