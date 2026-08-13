<?php

require_once '../config/conexion.php';

$coleccionItinerarios = $db->itinerarios;


/* ZONAS */

$zonas = array_filter(
    array_map(
        'trim',
        explode("\n", $_POST['zonas'])
    )
);


/* GUIAS */

$guias = array_filter(
    array_map(
        'trim',
        explode("\n", $_POST['guias'])
    )
);


/* ACTUALIZAR ITINERARIO */

$coleccionItinerarios->updateOne(

    [

        '_id' => $_POST['id']

    ],

    [

        '$set' => [

            'codigo' => $_POST['codigo'],

            'duracion_min' =>
                (int) $_POST['duracion_min'],

            'longitud_km' =>
                (float) $_POST['longitud_km'],

            'max_visitantes' =>
                (int) $_POST['max_visitantes'],

            'zonas' =>
                array_values($zonas),

            'guias' =>
                array_values($guias)

        ]

    ]

);


header(
    'Location: ../index.php?seccion=itinerarios&success=updated'
);

exit;