<?php

require_once '../config/conexion.php';

$coleccionGuias = $db->guias;

$coleccionGuias->updateOne(

    ['_id' => $_POST['id']],

    [

        '$set' => [

            'nombre' => $_POST['nombre'],

            'telefono' => $_POST['telefono'],

            'fecha_inicio' => $_POST['fecha_inicio']

        ]

    ]

);

header('Location: ../index.php?page=guias&success=updated');

exit;