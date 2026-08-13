<?php

require_once '../config/conexion.php';

$coleccionHabitats = $db->habitats;

$coleccionHabitats->insertOne([

    '_id' => $_POST['id'],

    'nombre' => $_POST['nombre'],

    'clima' => $_POST['clima'],

    'vegetacion' => $_POST['vegetacion'],

    'continentes' => [ $_POST['continentes'] ]

]);

header('Location: ../index.php?page=habitats&success=create');

exit;