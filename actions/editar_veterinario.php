<?php

require_once '../config/conexion.php';

$coleccionVeterinarios = $db->veterinarios;

$coleccionVeterinarios->updateOne(

    ['_id' => $_POST['id']],

    [

        '$set' => [

            'nombre' => $_POST['nombre'],
            'zona' => $_POST['zona'],
            'habitat' => $_POST['habitat']

        ]

    ]

);

header('Location: ../index.php?page=veterinarios&success=updated');

exit;