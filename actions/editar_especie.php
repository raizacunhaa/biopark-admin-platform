<?php

require_once '../config/conexion.php';

$coleccionEspecies = $db->especies;

$coleccionEspecies->updateOne(

    ['_id' => $_POST['id']],

    [

        '$set' => [

            'nombre' => $_POST['nombre'],

            'nombre_cientifico' => $_POST['nombre_cientifico'],

            'descripcion' => $_POST['descripcion'],

            'habitats' => explode(',', $_POST['habitats']),

            'zona' => $_POST['zona'],

            'edad' => (int) $_POST['edad']

        ]

    ]

);

header('Location: ../index.php?page=especies&success=updated');

exit;