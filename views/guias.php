<?php

require_once __DIR__ . '/../config/conexion.php';

$coleccionGuias = $db->guias;

$guias = $coleccionGuias->find();

$guiasArray = $guias->toArray();

?>

<!--HEADER-->
<div class="page-header">

    <h1>Gestión de Guías</h1>

    <button 
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#modalGuia">
        <i class="bi bi-plus-circle"></i>
        Nuevo Guía
    </button>

</div>

<div>
    <p class="text-muted">

    Total registrados: <?= count($guiasArray) ?>

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

                <th>Fecha de inicio</th>

                <th>Acciones</th>

            </tr>

        </thead>

        <tbody>

        <?php foreach($guiasArray as $guia): ?>

            <tr>

                <td><?= $guia['_id'] ?></td>

                <td><?= $guia['nombre'] ?></td>

                <td><?= $guia['telefono'] ?></td>

                <td><?= $guia['fecha_inicio'] ?></td>

                <td>

                    <!-- BOTON EDITAR -->

                    <button

                        class="btn btn-warning btn-sm"

                        data-bs-toggle="modal"

                        data-bs-target="#editarGuiaModal"

                        data-id="<?= $guia['_id'] ?>"

                        data-nombre="<?= $guia['nombre'] ?>"

                        data-telefono="<?= $guia['telefono'] ?>"

                        data-fecha="<?= $guia['fecha_inicio'] ?>">

                        <i class="bi bi-pencil-square"></i>

                        Editar

                    </button>

                    <!-- BOTON ELIMINAR -->

                    <button

                        class="btn btn-danger btn-sm"

                        data-bs-toggle="modal"

                        data-bs-target="#eliminarGuiaModal"

                        data-id="<?= $guia['_id'] ?>">

                        <i class="bi bi-trash"></i>

                        Eliminar

                    </button>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<!--MODAL NUEVO GUIAS-->
<div
    class="modal fade"
    id="modalGuia"
    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Nuevo Guía

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/crear_guia.php" method="POST">

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
                        type="date"
                        name="fecha_inicio"
                        class="form-control mb-3">

                    <button class="btn btn-success">

                        Guardar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--MODAL EDITAR GUIA--> 
<div
    class="modal fade"
    id="editarGuiaModal"
    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Editar Guía

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/editar_guia.php" method="POST">

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

                    <input
                        id="edit-fecha"
                        type="date"
                        name="fecha_inicio"
                        class="form-control mb-3">

                    <button class="btn btn-success">

                        Guardar cambios

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--MODAL ELIMINAR GUIA--> 
<div
    class="modal fade"
    id="eliminarGuiaModal"
    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Eliminar Guía

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p>

                    ¿Desea eliminar este guía?

                </p>

                <form action="actions/eliminar_guia.php" method="POST">

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