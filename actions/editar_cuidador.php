<?php

require_once '../config/conexion.php';

$coleccionCuidadores = $db->cuidadores;


$cuidador = $coleccionCuidadores->findOne([

    '_id' => $_POST['id']

]);

$coleccionCuidadores->updateOne(

    ['_id' => $_POST['id']],

    [

        '$set' => [

            'nombre' => $_POST['nombre'],

            'direccion' => $_POST['direccion'],

            'telefono' => $_POST['telefono'],

            'fecha_ingreso' => $_POST['fecha'],

            // Mantiene las especies ya registradas
            'especies' => $cuidador['especies']

        ]

    ]

);

header('Location: ../index.php?page=cuidadores&success=updated');

exit;

header('Location: ../index.php?page=cuidadores&success=updated');

exit;