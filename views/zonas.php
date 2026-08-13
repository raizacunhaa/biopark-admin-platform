<?php

require_once __DIR__ . '/../config/conexion.php';

$coleccionZonas = $db->zonas;

$zonas = $coleccionZonas->find();

$zonasArray = $zonas->toArray();

?>

<!--HEADER-->
<div class="page-header">

    <h1>Gestión de Zonas</h1>

    <button 
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#modalZona">
        <i class="bi bi-plus-circle"></i>
        Nueva Zona
    </button>

</div>

<div>
    <p class="text-muted">

    Total registradas: <?= count($zonasArray) ?>

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

<div class="card mt-3">

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Nombre</th>

                    <th>Extensión (m²)</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

            <?php foreach($zonasArray as $zona): ?>

                <tr>

                    <td><?= $zona['_id'] ?></td>

                    <td><?= $zona['nombre'] ?></td>

                    <td><?= $zona['extension_m2'] ?></td>

                    <td>

                        <!-- BOTON EDITAR -->

                        <button

                            class="btn btn-warning btn-sm"

                            data-bs-toggle="modal"

                            data-bs-target="#editarZonaModal"

                            data-id="<?= $zona['_id'] ?>"

                            data-nombre="<?= $zona['nombre'] ?>"

                            data-extension="<?= $zona['extension_m2'] ?>">

                            <i class="bi bi-pencil-square"></i>

                            Editar

                        </button>

                        <!-- BOTON ELIMINAR -->

                        <button

                            class="btn btn-danger btn-sm"

                            data-bs-toggle="modal"

                            data-bs-target="#eliminarZonaModal"

                            data-id="<?= $zona['_id'] ?>">

                            <i class="bi bi-trash"></i>

                            Eliminar

                        </button>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<!--MODAL NUEVA ZONA-->
<div class="modal fade"

    id="modalZona"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Nueva Zona

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/crear_zona.php" method="POST">

                    <input
                        name="id"
                        class="form-control mb-3"
                        placeholder="ID">

                    <input
                        name="nombre"
                        class="form-control mb-3"
                        placeholder="Nombre">

                    <input
                        type="number"
                        name="extension_m2"
                        class="form-control mb-3"
                        placeholder="Extensión (m²)">

                    <button class="btn btn-success">

                        Guardar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>
<!--MODAL EDITAR ZONA-->
<div class="modal fade"

    id="editarZonaModal"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Editar Zona

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/editar_zona.php" method="POST">

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

                        id="edit-extension"

                        type="number"

                        name="extension_m2"

                        class="form-control mb-3">

                    <button class="btn btn-success">

                        Guardar cambios

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--MODAL ELIMINAR ZONA-->
<div class="modal fade"

    id="eliminarZonaModal"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Eliminar Zona

                </h5>

                <button

                    type="button"

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                <p>

                    ¿Desea eliminar esta zona?

                </p>

                <form action="actions/eliminar_zona.php" method="POST">

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