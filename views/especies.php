<?php

require_once __DIR__ . '/../config/conexion.php';

$coleccionEspecies = $db->especies;

$especies = $coleccionEspecies->find();

$especiesArray = $especies->toArray();

?>

<!--HEADER-->
<div class="page-header">

    <h1>Gestión de Especies</h1>

    <button 
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#modalEspecie">
        <i class="bi bi-plus-circle"></i>
        Nueva Especie
    </button>

</div>

<div>
    <p class="text-muted">

    Total registradas: <?= count($especiesArray) ?>

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


<div class="card mt-3">

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nombre Científico</th>
                    <th>Hábitats</th>
                    <th>Zona</th>
                    <th>Edad</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach($especiesArray as $especie): ?>

                <tr>

                    <td><?= $especie['_id'] ?></td>

                    <td><?= $especie['nombre'] ?></td>

                    <td><?= $especie['nombre_cientifico'] ?></td>

                    <td>

                        <?= implode(', ', $especie['habitats']->getArrayCopy()) ?>

                    </td>

                    <td><?= $especie['zona'] ?></td>

                    <td><?= $especie['edad'] ?></td>

                    <td>

                        <!-- BOTON EDITAR -->

                        <button

                            class="btn btn-warning btn-sm"

                            data-bs-toggle="modal"

                            data-bs-target="#modalEditarEspecie"

                            data-id="<?= $especie['_id'] ?>"

                            data-nombre="<?= $especie['nombre'] ?>"

                            data-cientifico="<?= $especie['nombre_cientifico'] ?>"

                            data-descripcion="<?= $especie['descripcion'] ?>"

                            data-habitats="<?= implode(',', (array)$especie['habitats']) ?>"

                            data-zona="<?= $especie['zona'] ?>"

                            data-edad="<?= $especie['edad'] ?>">

                            <i class="bi bi-pencil-square"></i>

                            Editar

                        </button>


                        <!-- BOTON ELIMINAR -->

                        <button

                            class="btn btn-danger btn-sm"

                            data-bs-toggle="modal"

                            data-bs-target="#modalEliminarEspecie"

                            data-id="<?= $especie['_id'] ?>">

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

<!-- MODAL NUEVA ESPECIE -->

<div class="modal fade"

    id="modalEspecie"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Nueva Especie

                </h5>

                <button

                    type="button"

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                <form action="actions/crear_especie.php" method="POST">

                    <input

                        name="id"

                        class="form-control mb-3"

                        placeholder="ID">

                    <input

                        name="nombre"

                        class="form-control mb-3"

                        placeholder="Nombre">

                    <input

                        name="nombre_cientifico"

                        class="form-control mb-3"

                        placeholder="Nombre Científico">

                    <textarea

                        name="descripcion"

                        class="form-control mb-3"

                        placeholder="Descripción"></textarea>

                    <input

                        name="habitats"

                        class="form-control mb-3"

                        placeholder="H1,H2">

                    <input

                        name="zona"

                        class="form-control mb-3"

                        placeholder="Zona">

                    <input

                        name="edad"

                        type="number"

                        class="form-control mb-3"

                        placeholder="Edad">

                    <button class="btn btn-success">

                        Guardar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>
<!-- MODAL EDITAR ESPECIE -->

<div class="modal fade"

    id="modalEditarEspecie"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Editar Especie

                </h5>

                <button

                    type="button"

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                <form action="actions/editar_especie.php" method="POST">

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

                        id="edit-cientifico"

                        name="nombre_cientifico"

                        class="form-control mb-3">

                    <textarea

                        id="edit-descripcion"

                        name="descripcion"

                        class="form-control mb-3"></textarea>

                    <input

                        id="edit-habitats"

                        name="habitats"

                        class="form-control mb-3">

                    <input

                        id="edit-zona"

                        name="zona"

                        class="form-control mb-3">

                    <input

                        id="edit-edad"

                        name="edad"

                        type="number"

                        class="form-control mb-3">

                    <button class="btn btn-success">

                        Guardar cambios

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>
<!-- MODAL ELIMINAR ESPECIE -->

<div class="modal fade"

    id="modalEliminarEspecie"

    tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Eliminar Especie

                </h5>

                <button

                    type="button"

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                <p>

                    ¿Desea eliminar esta especie?

                </p>

                <form action="actions/eliminar_especie.php" method="POST">

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