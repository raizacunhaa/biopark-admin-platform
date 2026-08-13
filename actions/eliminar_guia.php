<?php

require_once '../config/conexion.php';

$coleccionGuias = $db->guias;

$coleccionGuias->deleteOne([

    '_id' => $_POST['id']

]);

header('Location: ../index.php?page=guias&success=deleted');

exit;