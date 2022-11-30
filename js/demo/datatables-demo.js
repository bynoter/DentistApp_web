// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable(
    {
      language: {
        processing:     "Procesando...",
        search:         "Buscar&nbsp;:",
        lengthMenu:    "Mostar _MENU_ elementos",
        info:           "Elementos mostrados _START_ a _END_ de _TOTAL_ elementos",
        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Chargement en cours...",
        zeroRecords:    "No hay registros que mostrar",
        emptyTable:     "Sin datos en la tabla",
        paginate: {
            first:      "Primera",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Ultima"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
    }
    }
  );
});
