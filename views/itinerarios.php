<?php

require_once __DIR__ . '/../config/conexion.php';

$coleccionItinerarios = $db->itinerarios;

$itinerarios = $coleccionItinerarios->find();

$itinerariosArray = $itinerarios->toArray();

?>


<!-- HEADER -->

<div class="page-header">

    <h1>Gestión de Itinerarios</h1>

    <button
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#modalItinerario">

        <i class="bi bi-plus-circle"></i>

        Nuevo Itinerario

    </button>

</div>

<div>

    <p class="text-muted">

        Total registrados: <?= count($itinerariosArray) ?>

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

<!-- TABLA -->

<div class="card-body">

    <table class="table table-hover">

        <thead>

            <tr>

                <th>ID</th>
                <th>Código</th>
                <th>Duración</th>
                <th>Longitud</th>
                <th>Máx. visitantes</th>
                <th>Zonas</th>
                <th>Guías</th>
                <th>Acciones</th>

            </tr>

        </thead>


        <tbody>

        <?php foreach($itinerariosArray as $itinerario): ?>

            <tr>

                <td>

                    <?= $itinerario['_id'] ?>

                </td>


                <td>

                    <?= $itinerario['codigo'] ?>

                </td>


                <td>

                    <?= $itinerario['duracion_min'] ?> min

                </td>


                <td>

                    <?= $itinerario['longitud_km'] ?> km

                </td>


                <td>

                    <?= $itinerario['max_visitantes'] ?>

                </td>


                <!-- ZONAS -->

                <td>

                    <?php

                    $textoZonas = [];

                    foreach($itinerario['zonas'] as $zona){

                        $textoZonas[] = $zona;

                    }

                    echo implode('<br>', $textoZonas);

                    ?>

                </td>


                <!-- GUIAS -->

                <td>

                    <?php

                    $textoGuias = [];

                    foreach($itinerario['guias'] as $guia){

                        if(is_object($guia)){

                            $guiaArray = (array) $guia;

                            if(isset($guiaArray['id_guia'])){

                                $textoGuias[] =
                                    $guiaArray['id_guia'];

                            }

                        }

                        elseif(is_array($guia)){

                            if(isset($guia['id_guia'])){

                                $textoGuias[] =
                                    $guia['id_guia'];

                            }

                        }

                        else{

                            $textoGuias[] = $guia;

                        }

                    }

                    echo implode('<br>', $textoGuias);

                    ?>

                </td>


                <!-- ACCIONES -->

                <td>

                    <?php

                    $listaZonas = [];

                    foreach($itinerario['zonas'] as $zona){

                        $listaZonas[] = $zona;

                    }


                    $listaGuias = [];

                    foreach($itinerario['guias'] as $guia){

                        if(is_object($guia)){

                            $guiaArray = (array) $guia;

                            if(isset($guiaArray['id_guia'])){

                                $listaGuias[] =
                                    $guiaArray['id_guia'];

                            }

                        }

                        elseif(is_array($guia)){

                            if(isset($guia['id_guia'])){

                                $listaGuias[] =
                                    $guia['id_guia'];

                            }

                        }

                        else{

                            $listaGuias[] = $guia;

                        }

                    }

                    ?>

                    <button

                        class="btn btn-warning btn-sm"

                        data-bs-toggle="modal"

                        data-bs-target="#editarItinerarioModal"

                        data-id="<?= $itinerario['_id'] ?>"

                        data-codigo="<?= $itinerario['codigo'] ?>"

                        data-duracion="<?= $itinerario['duracion_min'] ?>"

                        data-longitud="<?= $itinerario['longitud_km'] ?>"

                        data-max-visitantes="<?= $itinerario['max_visitantes'] ?>"

                        data-zonas="<?= implode("\n", $listaZonas) ?>"

                        data-guias="<?= implode("\n", $listaGuias) ?>">

                        <i class="bi bi-pencil-square"></i>

                        Editar

                    </button>


                    <button

                        class="btn btn-danger btn-sm"

                        data-bs-toggle="modal"

                        data-bs-target="#eliminarItinerarioModal"

                        data-id="<?= $itinerario['_id'] ?>">

                        <i class="bi bi-trash"></i>

                        Eliminar

                    </button>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<!-- MODAL NUEVO ITINERARIO -->

<div
    class="modal fade"
    id="modalItinerario"
    tabindex="-1">

```
<div class="modal-dialog">

    <div class="modal-content">

        <div class="modal-header">

            <h5 class="modal-title">

                Nuevo Itinerario

            </h5>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal">
            </button>

        </div>


        <div class="modal-body">

            <form
                action="actions/crear_itinerario.php"
                method="POST">

                <input
                    name="id"
                    class="form-control mb-3"
                    placeholder="ID">

                <input
                    name="codigo"
                    class="form-control mb-3"
                    placeholder="Código">

                <input
                    type="number"
                    name="duracion_min"
                    class="form-control mb-3"
                    placeholder="Duración (min)">

                <input
                    type="number"
                    step="0.1"
                    name="longitud_km"
                    class="form-control mb-3"
                    placeholder="Longitud (km)">

                <input
                    type="number"
                    name="max_visitantes"
                    class="form-control mb-3"
                    placeholder="Máx. visitantes">


                <label class="form-label">

                    Zonas

                </label>

                <textarea
                    name="zonas"
                    class="form-control mb-3"
                    rows="3"
                    placeholder="Z1&#10;Z2"></textarea>


                <label class="form-label">

                    Guías

                </label>

                <textarea
                    name="guias"
                    class="form-control mb-3"
                    rows="3"
                    placeholder="G1&#10;G2"></textarea>


                <button class="btn btn-success">

                    Guardar

                </button>

            </form>

        </div>

    </div>

</div>
```

</div>

<!-- MODAL EDITAR ITINERARIO -->

<div
    class="modal fade"
    id="editarItinerarioModal"
    tabindex="-1">

```
<div class="modal-dialog">

    <div class="modal-content">

        <div class="modal-header">

            <h5 class="modal-title">

                Editar Itinerario

            </h5>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal">
            </button>

        </div>


        <div class="modal-body">

            <form
                action="actions/editar_itinerario.php"
                method="POST">

                <input
                    id="edit-id"
                    name="id"
                    class="form-control mb-3"
                    readonly>


                <input
                    id="edit-codigo"
                    name="codigo"
                    class="form-control mb-3">


                <input
                    id="edit-duracion"
                    type="number"
                    name="duracion_min"
                    class="form-control mb-3">


                <input
                    id="edit-longitud"
                    type="number"
                    step="0.1"
                    name="longitud_km"
                    class="form-control mb-3">


                <input
                    id="edit-max-visitantes"
                    type="number"
                    name="max_visitantes"
                    class="form-control mb-3">


                <label class="form-label">

                    Zonas

                </label>

                <textarea
                    id="edit-zonas"
                    name="zonas"
                    class="form-control mb-3"
                    rows="3"></textarea>


                <label class="form-label">

                    Guías

                </label>

                <textarea
                    id="edit-guias"
                    name="guias"
                    class="form-control mb-3"
                    rows="3"></textarea>


                <button class="btn btn-success">

                    Guardar cambios

                </button>

            </form>

        </div>

    </div>

</div>
```

</div>

<!-- MODAL ELIMINAR ITINERARIO -->

<div
    class="modal fade"
    id="eliminarItinerarioModal"
    tabindex="-1">

```
<div class="modal-dialog">

    <div class="modal-content">

        <div class="modal-header">

            <h5 class="modal-title">

                Eliminar Itinerario

            </h5>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal">
            </button>

        </div>


        <div class="modal-body">

            <p>

                ¿Desea eliminar este itinerario?

            </p>


            <form
                action="actions/eliminar_itinerario.php"
                method="POST">

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
```

</div>
