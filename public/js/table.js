$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example3').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, 'desc']
        ],
        language: {
            search: "Buscar:",
            "lengthMenu": "Recorrer _MENU_ registros por página",
            "zeroRecords": "No hay resultados",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles ",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            paginate: {
                first: "Primera",
                previous: "Primera",
                next: "Última",
                last: "Último"
            },
        }
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "order": [
            [0, 'desc']
        ],
        language: {
            search: "Buscar:",
            "lengthMenu": "Recorrer _MENU_ registros por página",
            "zeroRecords": "No hay resultados",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles ",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            paginate: {
                first: "Primera",
                previous: "Primera",
                next: "Última",
                last: "Último"
            },
        }
    });

    $('#categoria').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "iDisplayLength": 5,
        "order": [
            [0, 'desc']
        ],
        language: {
            search: "Buscar:",
            "lengthMenu": "Recorrer _MENU_ registros por página",
            "zeroRecords": "No hay resultados",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles ",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            paginate: {
                first: "Primera",
                previous: "Primera",
                next: "Última",
                last: "Último"
            },
        }
    });


$('#example4').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "iDisplayLength": 5,
        "order": [
            [0, 'desc']
        ],
        language: {
            search: "Buscar:",
            "lengthMenu": "Recorrer _MENU_ registros por página",
            "zeroRecords": "No hay resultados",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles ",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            paginate: {
                first: "Primera",
                previous: "Primera",
                next: "Última",
                last: "Último"
            },
        }
    });

});