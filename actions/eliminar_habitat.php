<?php

require_once '../config/conexion.php';

$coleccionHabitats = $database->habitats;

$coleccionHabitats->deleteOne([

    '_id' => $_POST['id']

]);

header('Location: ../index.php?page=habitats&success=delete');

exit;