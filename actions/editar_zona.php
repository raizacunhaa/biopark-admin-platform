<?php

require_once '../config/conexion.php';

$coleccionZonas = $db->zonas;

$coleccionZonas->updateOne(

    ['_id' => $_POST['id']],

    [

        '$set' => [

            'nombre' => $_POST['nombre'],

            'extension_m2' => (int) $_POST['extension_m2']

        ]

    ]

);

header('Location: ../index.php?page=zonas&success=updated');

exit;