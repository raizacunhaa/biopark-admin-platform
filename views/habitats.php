<?php

require_once __DIR__ . '/../config/conexion.php';

$coleccionHabitats = $db->habitats;

$habitats = $coleccionHabitats->find();

$habitatsArray = $habitats->toArray();

?>

<!--HEADER-->
<div class="page-header">

    <h1>Gestión de Hábitats</h1>

    <button 
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#modalHabitat">
        <i class="bi bi-plus-circle"></i>
        Nuevo Hábitat
    </button>

</div>

<div>
    <p class="text-muted">

    Total registrados: <?= count($habitatsArray) ?>

    </p>
</div>

<!--ALERTAS-->
<?php if(isset($_GET['success']) && $_GET['success'] == 'create'): ?>

    <div class="alert alert-success alert-dismissible fade show">

        Se ha agregado exitosamente.

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

<?php endif; ?>

<?php if(isset($_GET['success']) && $_GET['success'] == 'update'): ?>

    <div class="alert alert-primary alert-dismissible fade show">

        Se ha actualizado exitosamente.

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

<?php endif; ?>

<?php if(isset($_GET['success']) && $_GET['success'] == 'delete'): ?>

    <div class="alert alert-danger alert-dismissible fade show">

        Se ha eliminado exitosamente.

        <button

            type="button"

            class="btn-close"

            data-bs-dismiss="alert">

        </button>

    </div>

<?php endif; ?>

<!--TABLA-->
<div class="card mt-4">

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Clima</th>
                    <th>Vegetación</th>
                    <th>Continentes</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>
                <!-- Recorre el array y completa c/ fila dinamicamente -->

                <?php foreach($habitatsArray as $habitat): ?>

                    <tr>

                        <td><?= $habitat['_id'] ?></td>

                        <td><?= $habitat['nombre'] ?></td>

                        <td><?= $habitat['clima'] ?></td>

                        <td><?= $habitat['vegetacion'] ?></td>

                        <td>
                            <?= implode(', ', $habitat['continentes']->getArrayCopy()) ?>
                        </td>

                        <td>
                            <!-- atributos que envian datos para el modal -->
                            <button class="btn btn-warning btn-sm"

                                data-bs-toggle="modal"
                                data-bs-target="#editarHabitatModal"

                                data-id="<?= $habitat['_id'] ?>"  
                                data-nombre="<?= $habitat['nombre'] ?>"
                                data-clima="<?= $habitat['clima'] ?>"
                                data-vegetacion="<?= $habitat['vegetacion'] ?>"
                                data-continentes="<?= implode(', ', (array)$habitat['continentes']) ?>">
                                <i class="bi bi-pencil-square"></i>
                                Editar
                            </button>

                            <button

                                class="btn btn-danger btn-sm"

                                data-bs-toggle="modal"
                                data-bs-target="#eliminarHabitatModal"

                                data-id="<?= $habitat['_id'] ?>">

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

<!--MODALS-->
<!--MODAL CREAR HÁBITATS-->
<div class="modal fade" id="modalHabitat" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Nuevo Hábitat
                </h5>

                <button 
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/crear_habitat.php" method="POST">

                    <input name="id" class="form-control mb-3" placeholder="ID">

                    <input name="nombre" class="form-control mb-3" placeholder="Nombre">

                    <input name="clima" class="form-control mb-3" placeholder="Clima">

                    <input name="vegetacion" class="form-control mb-3" placeholder="Vegetación">

                    <input name="continentes" class="form-control mb-3" placeholder="Continentes">

                    <button class="btn btn-success">
                        Guardar
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<!--MODAL EDITAR HÁBITAT-->
<div class="modal fade" id="editarHabitatModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Editar Hábitat

                </h5>

                <button 
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <form action="actions/editar_habitat.php" method="POST">

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
                        id="edit-clima"
                        name="clima"
                        class="form-control mb-3">

                    <input 
                        id="edit-vegetacion"
                        name="vegetacion"
                        class="form-control mb-3">

                    <input 
                        id="edit-continentes"
                        name="continentes"
                        class="form-control mb-3">

                    <button class="btn btn-success">

                        Guardar cambios

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


<!--MODAL ELIMINAR HÁBITAT-->
<div class="modal fade" id="eliminarHabitatModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Eliminar Hábitat

                </h5>

                <button

                    type="button"

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>

            </div>

            <div class="modal-body">

                <p>

                    ¿Desea eliminar este hábitat?

                </p>

                <form action="actions/eliminar_habitat.php" method="POST">

                    <!--"type=hiddden" el usuario no ve este campo, sirve solo p/ enviar el ID-->
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