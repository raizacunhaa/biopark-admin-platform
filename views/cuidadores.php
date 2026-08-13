<?php

require_once __DIR__ . '/../config/conexion.php';

$coleccionCuidadores = $db->cuidadores;

$cuidadores = $coleccionCuidadores->find();

$cuidadoresArray = $cuidadores->toArray();

?>

<!--HEADER-->
<div class="page-header">

    <h1>Gestión de Cuidadores</h1>

    <button 
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#modalCuidador">
        <i class="bi bi-plus-circle"></i>
        Nuevo Cuidador
    </button>

</div>

<div>
    <p class="text-muted">

    Total registrados: <?= count($cuidadoresArray) ?>

    </p>
</div>

<!-- ALERTAS -->
 <?php if(isset($_GET['success']) && $_GET['success'] == 'created'): ?>

<div class="alert alert-success alert-dismissible fade show">

    Se ha agregado exitosamente.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php elseif(isset($_GET['success']) && $_GET['success'] == 'updated'): ?>

<div class="alert alert-primary alert-dismissible fade show">

    Se ha actualizado exitosamente.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php elseif(isset($_GET['success']) && $_GET['success'] == 'deleted'): ?>

<div class="alert alert-danger alert-dismissible fade show">

    Se ha eliminado exitosamente.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php endif; ?>


<div class="card-body">

    <table class="table table-hover">

        <thead>

            <tr>

                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Especies asignadas</th>
                <th>Acciones</th>

            </tr>

        </thead>

        <tbody>

        <?php foreach($cuidadoresArray as $cuidador): ?>

            <tr>

                <td><?= $cuidador['_id'] ?></td>

                <td><?= $cuidador['nombre'] ?></td>

                <td><?= $cuidador['telefono'] ?></td>

                <td>

                    <?php

                    $textoEspecies = [];

                    foreach($cuidador['especies'] as $especie){

                        $textoEspecies[] =
                            $especie['id_especie'] .
                            ' - ' .
                            $especie['fecha_asignacion'];

                    }

                    echo implode('<br>', $textoEspecies);

                    ?>

                </td>

                <td>

                    <button

                        class="btn btn-warning btn-sm"

                        data-bs-toggle="modal"

                        data-bs-target="#editarCuidadorModal"

                        <?php

                        $especies = $cuidador['especies']->getArrayCopy();

                        $listaEspecies = [];

                        foreach($especies as $esp){

                            $listaEspecies[] =
                                $esp['id_especie'] .
                                " - " .
                                $esp['fecha_asignacion'];

                        }

                        ?>

                        data-id="<?= $cuidador['_id'] ?>"

                        data-nombre="<?= $cuidador['nombre'] ?>"

                        data-direccion="<?= $cuidador['direccion'] ?>"

                        data-telefono="<?= $cuidador['telefono'] ?>"

                        data-fecha="<?= $cuidador['fecha_ingreso'] ?>"

                        data-especies="<?= implode("\n", $listaEspecies) ?>">

                        <i class="bi bi-pencil-square"></i>

                        Editar

                    </button>

                    <button

                        class="btn btn-danger btn-sm"

                        data-bs-toggle="modal"

                        data-bs-target="#eliminarCuidadorModal"

                        data-id="<?= $cuidador['_id'] ?>">

                        <i class="bi bi-trash"></i>

                        Eliminar

                    </button>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<!-- MODAL NUEVO CUIDADOR--> 
<div class="modal fade"
     id="modalCuidador"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Nuevo Cuidador

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/crear_cuidador.php" method="POST">

                    <input
                        name="id"
                        class="form-control mb-3"
                        placeholder="ID">

                    <input
                        name="nombre"
                        class="form-control mb-3"
                        placeholder="Nombre">

                    <input
                        name="telefono"
                        class="form-control mb-3"
                        placeholder="Teléfono">

                    <input
                        name="id_especie"
                        class="form-control mb-3"
                        placeholder="ID Especie">

                    <input
                        type="date"
                        name="fecha_asignacion"
                        class="form-control mb-3">

                    <button class="btn btn-success">

                        Guardar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--MODAL EDITAR CUIDADOR--> 
<div class="modal fade"
     id="editarCuidadorModal"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Editar Cuidador

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/editar_cuidador.php" method="POST">

                    <input
                        id="edit-id"
                        name="id"
                        class="form-control mb-3"
                        readonly>

                    <input
                        id="edit-nombre"
                        name="nombre"
                        class="form-control mb-3">

                    <input
                        id="edit-telefono"
                        name="telefono"
                        class="form-control mb-3">

                    <label class="form-label">

                        Especies asignadas

                    </label>

                    <textarea

                        id="edit-especies"

                        class="form-control mb-3"

                        rows="4"

                        >

                    </textarea>

                    <button class="btn btn-success">

                        Guardar cambios

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--MODAL ELIMINAR CUIDADOR--> 
<div class="modal fade"
     id="eliminarCuidadorModal"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Eliminar Cuidador

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p>

                    ¿Desea eliminar este cuidador?

                </p>

                <form action="actions/eliminar_cuidador.php" method="POST">

                    <input
                        type="hidden"
                        name="id"
                        id="delete-id">

                    <button class="btn btn-danger">

                        Confirmar eliminación

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>