/* ==========================
   HABITATS
========================== */

/* MODAL EDITAR */

const editarModal = document.getElementById('editarHabitatModal');

if (editarModal) {

    editarModal.addEventListener('show.bs.modal', function(event){

        const button = event.relatedTarget;

        console.log(button);
        console.log(button.getAttribute('data-id'));
        console.log(button.getAttribute('data-nombre'));
        console.log(button.getAttribute('data-extension'));

        document.getElementById('edit-id').value =
            button.getAttribute('data-id');

        document.getElementById('edit-nombre').value =
            button.getAttribute('data-nombre');

        document.getElementById('edit-clima').value =
            button.getAttribute('data-clima');

        document.getElementById('edit-vegetacion').value =
            button.getAttribute('data-vegetacion');

        document.getElementById('edit-continentes').value =
            button.getAttribute('data-continentes');

    });

}


/* MODAL ELIMINAR */

const eliminarModal =
    document.getElementById('eliminarHabitatModal');

if (eliminarModal) {

    eliminarModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('delete-id').value =

                button.getAttribute('data-id');

    });

}



/* ==========================
   ESPECIES
========================== */

/* MODAL EDITAR */

const editarEspecieModal =
    document.getElementById('modalEditarEspecie');


if (editarEspecieModal) {

    editarEspecieModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;


            document.getElementById('edit-id').value =

                button.getAttribute('data-id');


            document.getElementById('edit-nombre').value =

                button.getAttribute('data-nombre');


            document.getElementById('edit-cientifico').value =

                button.getAttribute('data-cientifico');


            document.getElementById('edit-descripcion').value =

                button.getAttribute('data-descripcion');


            document.getElementById('edit-habitats').value =

                button.getAttribute('data-habitats');


            document.getElementById('edit-zona').value =

                button.getAttribute('data-zona');


            document.getElementById('edit-edad').value =

                button.getAttribute('data-edad');

    });

}

/* MODAL ELIMINAR */

const eliminarEspecieModal =
document.getElementById('eliminarEspecieModal');

if (eliminarEspecieModal) {

    eliminarEspecieModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('delete-id').value =

                button.getAttribute('data-id');

    });

}


/* ==========================
   ZONAS
========================== */

/* MODAL EDITAR */

const editarZonaModal =
document.getElementById('editarZonaModal');

if (editarZonaModal) {

    editarZonaModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('edit-id').value =

                button.getAttribute('data-id');

            document.getElementById('edit-nombre').value =

                button.getAttribute('data-nombre');

            document.getElementById('edit-extension').value =

                button.getAttribute('data-extension');

    });

}

/* MODAL ELIMINAR */

const eliminarZonaModal =
document.getElementById('eliminarZonaModal');

if (eliminarZonaModal) {

    eliminarZonaModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('delete-id').value =

                button.getAttribute('data-id');

    });

}

/* ==========================
VETERINARIOS
========================== */

/* MODAL EDITAR */

const editarVeterinarioModal =
document.getElementById('editarVeterinarioModal');

if (editarVeterinarioModal) {

    editarVeterinarioModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('edit-id').value =
                button.getAttribute('data-id');

            document.getElementById('edit-nombre').value =
                button.getAttribute('data-nombre');

            document.getElementById('edit-zona').value =
                button.getAttribute('data-zona');

            document.getElementById('edit-habitat').value =
                button.getAttribute('data-habitat');

    });

}

/* MODAL ELIMINAR */

const eliminarVeterinarioModal =
document.getElementById('eliminarVeterinarioModal');

if (eliminarVeterinarioModal) {

    eliminarVeterinarioModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('delete-id').value =
                button.getAttribute('data-id');

    });

}

/* ==========================
CUIDADORES
========================== */

/* MODAL EDITAR */

const editarCuidadorModal =
document.getElementById('editarCuidadorModal');

if (editarCuidadorModal) {

    editarCuidadorModal.addEventListener(

        'show.bs.modal',

        function(event){

            const button = event.relatedTarget;

            document.getElementById('edit-id').value =
                button.getAttribute('data-id');

            document.getElementById('edit-nombre').value =
                button.getAttribute('data-nombre');

            document.getElementById('edit-telefono').value =
                button.getAttribute('data-telefono');

            document.getElementById('edit-especies').value =
                button.getAttribute('data-especies');

        }

    );

}


/* MODAL ELIMINAR */

const eliminarCuidadorModal =
document.getElementById('eliminarCuidadorModal');

if (eliminarCuidadorModal) {

    eliminarCuidadorModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('delete-id').value =

                button.getAttribute('data-id');

        });

}

/* ==========================
GUIAS
========================== */

/* MODAL EDITAR */

const editarGuiaModal =
document.getElementById('editarGuiaModal');

if (editarGuiaModal) {

    editarGuiaModal.addEventListener(

        'show.bs.modal',

        function(event){

            const button = event.relatedTarget;

            document.getElementById('edit-id').value =
                button.getAttribute('data-id');

            document.getElementById('edit-nombre').value =
                button.getAttribute('data-nombre');

            document.getElementById('edit-telefono').value =
                button.getAttribute('data-telefono');

            document.getElementById('edit-fecha').value =
                button.getAttribute('data-fecha');

        }

    );

}

/* MODAL ELIMINAR */

const eliminarGuiaModal =
document.getElementById('eliminarGuiaModal');

if (eliminarGuiaModal) {

    eliminarGuiaModal.addEventListener(

        'show.bs.modal',

        function(event){

            const button = event.relatedTarget;

            document.getElementById('delete-id').value =
                button.getAttribute('data-id');

        }

    );

}

/* ==========================
ITINERARIOS
========================== */

/* MODAL EDITAR */

const editarItinerarioModal =
document.getElementById('editarItinerarioModal');

if (editarItinerarioModal) {

    editarItinerarioModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('edit-id').value =
                button.getAttribute('data-id');

            document.getElementById('edit-codigo').value =
                button.getAttribute('data-codigo');

            document.getElementById('edit-duracion').value =
                button.getAttribute('data-duracion');

            document.getElementById('edit-longitud').value =
                button.getAttribute('data-longitud');

            document.getElementById('edit-max-visitantes').value =
                button.getAttribute('data-max-visitantes');

            document.getElementById('edit-zonas').value =
                button.getAttribute('data-zonas');

            document.getElementById('edit-guias').value =
                button.getAttribute('data-guias');

        }
    );

}


/* MODAL ELIMINAR */

const eliminarItinerarioModal =
document.getElementById('eliminarItinerarioModal');

if (eliminarItinerarioModal) {

    eliminarItinerarioModal.addEventListener(
        'show.bs.modal',
        function(event){

            const button = event.relatedTarget;

            document.getElementById('delete-id').value =
                button.getAttribute('data-id');

        }
    );

}