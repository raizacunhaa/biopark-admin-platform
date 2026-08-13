<?php

require_once __DIR__ . '/../config/conexion.php';

$coleccionVeterinarios = $db->veterinarios;

$veterinarios = $coleccionVeterinarios->find();

$veterinariosArray = $veterinarios->toArray();

?>

<!--HEADER-->
<div class="page-header">

    <h1>Gestión de Veterinarios</h1>

    <button 
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#modalVeterinario">
        <i class="bi bi-plus-circle"></i>
        Nuevo Veterinario
    </button>

</div>

<div>
    <p class="text-muted">

    Total registrados: <?= count($veterinariosArray) ?>

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

<?php endif; ?>


<?php if(isset($_GET['success']) && $_GET['success'] == 'updated'): ?>

<div class="alert alert-primary alert-dismissible fade show">

    Se ha actualizado exitosamente.

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php endif; ?>


<?php if(isset($_GET['success']) && $_GET['success'] == 'deleted'): ?>

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

                <th>Zona</th>

                <th>Hábitat</th>

                <th>Acciones</th>

            </tr>

        </thead>

        <tbody>

        <?php foreach($veterinariosArray as $veterinario): ?>

            <tr>

                <td><?= $veterinario['_id'] ?></td>

                <td><?= $veterinario['nombre'] ?></td>

                <td><?= $veterinario['zona'] ?></td>

                <td><?= $veterinario['habitat'] ?></td>

                <td>

                    <button

                        class="btn btn-warning btn-sm"

                        data-bs-toggle="modal"

                        data-bs-target="#editarVeterinarioModal"

                        data-id="<?= $veterinario['_id'] ?>"

                        data-nombre="<?= $veterinario['nombre'] ?>"

                        data-zona="<?= $veterinario['zona'] ?>"

                        data-habitat="<?= $veterinario['habitat'] ?>">

                        <i class="bi bi-pencil-square"></i>

                        Editar

                    </button>

                    <button

                        class="btn btn-danger btn-sm"

                        data-bs-toggle="modal"

                        data-bs-target="#eliminarVeterinarioModal"

                        data-id="<?= $veterinario['_id'] ?>">

                        <i class="bi bi-trash"></i>

                        Eliminar

                    </button>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<!--MODAL NUEVO VETERINARIO--> 
<div class="modal fade"

    id="modalVeterinario"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Nuevo Veterinario

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/crear_veterinario.php" method="POST">

                    <input
                        name="id"
                        class="form-control mb-3"
                        placeholder="ID">

                    <input
                        name="nombre"
                        class="form-control mb-3"
                        placeholder="Nombre">

                    <input
                        name="zona"
                        class="form-control mb-3"
                        placeholder="Zona">

                    <input
                        name="habitat"
                        class="form-control mb-3"
                        placeholder="Hábitat">

                    <button class="btn btn-success">

                        Guardar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--MODAL EDITAR VETERINARIO-->
<div class="modal fade"

    id="editarVeterinarioModal"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Editar Veterinario

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/editar_veterinario.php" method="POST">

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

                        id="edit-zona"

                        name="zona"

                        class="form-control mb-3">

                    <input

                        id="edit-habitat"

                        name="habitat"

                        class="form-control mb-3">

                    <button class="btn btn-success">

                        Guardar cambios

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--MODAL ELIMINAR VETERINARIO--> 
<div class="modal fade"

    id="eliminarVeterinarioModal"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Eliminar Veterinario

                </h5>

                <button

                    type="button"

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                <p>

                    ¿Desea eliminar este veterinario?

                </p>

                <form action="actions/eliminar_veterinario.php" method="POST">

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