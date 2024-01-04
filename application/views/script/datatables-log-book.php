<!-- DataTables Data -->
<script>
  $(function () {
    $("#example1").DataTable({});
    
    $('#list').DataTable({
      "paging": true,
      "pagingType": "simple",
      "autoWidth": true,
      "searching": false,
      "info": true,
      "ordering": false,
      "lengthChange": false,
      "lengthMenu": [ [10, 20, 30], [10, 20, 30] ],
      dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                className: 'btn btn-info btn-sm',
                text: "<i class='fas fa-copy'></i>",                
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'excelHtml5',
                className: 'btn btn-success btn-sm',
                text: "<i class='fas fa-file-excel'></i>",
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-danger btn-sm',
                text: "<i class='fas fa-file-pdf'></i>",
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'print',
                className: 'btn btn-warning btn-sm',
                text: "<i class='fas fa-print'></i>",
                exportOptions: {
                    columns: ':visible',
                    stripHtml: false
                }
            },
            {
                extend: 'colvis',
                className: 'btn btn-secondary btn-sm',
                text: "<i class='fas fa-eye'></i>",
                exportOptions: {
                    columns: ':visible',
                }
            },            
        ]
    });

    $('#list_admin').DataTable({
      "paging": true,
      "pagingType": "simple_numbers",
      "autoWidth": true,
      "searching": true,
      "info": true,
      "ordering": true,
      "lengthChange": true,
      "order": [[ 1, "desc" ], [ 0, "asc" ]],
      "lengthMenu": [ [10, 20, 30, 50, 100], [10, 20, 30, 50, 100] ],
      dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                className: 'btn btn-info btn-sm',
                text: "<i class='fas fa-copy'></i>",                
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'excelHtml5',
                className: 'btn btn-success btn-sm',
                text: "<i class='fas fa-file-excel'></i>",
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'btn btn-danger btn-sm',
                text: "<i class='fas fa-file-pdf'></i>",
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'print',
                className: 'btn btn-warning btn-sm',
                text: "<i class='fas fa-print'></i>",
                exportOptions: {
                    columns: ':visible',
                    stripHtml: false
                }
            },
            {
                extend: 'colvis',
                className: 'btn btn-secondary btn-sm',
                text: "<i class='fas fa-eye'></i>",
                exportOptions: {
                    columns: ':visible',
                }
            },            
        ]
    });                
  });
</script>