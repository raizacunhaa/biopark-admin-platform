<?php

require_once '../config/conexion.php';

$coleccionCuidadores = $db->cuidadores;

$coleccionCuidadores->deleteOne([

    '_id' => $_POST['id']

]);

header('Location: ../index.php?page=cuidadores&success=deleted');

exit;