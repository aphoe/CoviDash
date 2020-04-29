$(document).ready(function() {
    var dataTable = $('#provincesTable').DataTable({
        "order": [[ 3, "desc" ]],
        "pageLength": 25,
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ]
    });

    dataTable.on( 'order.dt search.dt', function () {
        dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});
