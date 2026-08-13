<?php

require_once '../config/conexion.php';

$coleccionItinerarios = $db->itinerarios;


$coleccionItinerarios->deleteOne(

    [

        '_id' => $_POST['id']

    ]

);


header(
    'Location: ../index.php?seccion=itinerarios&success=deleted'
);

exit;