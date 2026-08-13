<?php

require_once '../config/conexion.php';

$coleccionCuidadores = $db->cuidadores;

$datos = [

    '_id' => $_POST['id'],

    'nombre' => $_POST['nombre'],

    'telefono' => $_POST['telefono'],

    'especies' => [

        [

            'id_especie' => $_POST['id_especie'],

            'fecha_asignacion' => $_POST['fecha_asignacion']

        ]

    ]

];

$coleccionCuidadores->insertOne($datos);

header('Location: ../index.php?page=cuidadores&success=created');

exit;