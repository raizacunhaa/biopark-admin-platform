<?php

require_once '../config/conexion.php';

$coleccionEspecies = $db->especies;

$coleccionEspecies->deleteOne([

    '_id' => $_POST['id']

]);

header('Location: ../index.php?page=especies&success=deleted');

exit;