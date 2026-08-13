<?php

require_once '../config/conexion.php';

$coleccionVeterinarios = $db->veterinarios;

$coleccionVeterinarios->deleteOne([

    '_id' => $_POST['id']

]);

header('Location: ../index.php?page=veterinarios&success=deleted');

exit;