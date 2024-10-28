// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
          "language": {
              "lengthMenu": "Mostrar _MENU_ registros por pagina",
              "zeroRecords": "No se encontraron registros",
              "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros disponibles",
              "infoFiltered": "(fltrado de _MAX_ registros totales)",
              "search": "Buscar: ",
              "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
              }
          }
      } );
  });
  