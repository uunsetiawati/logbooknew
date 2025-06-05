<!-- DataTables Data -->
<script>
  $(function () {
    $('#list_admin').DataTable({
      "paging": true,
      "pagingType": "simple_numbers",
      "autoWidth": true,
      "searching": true,
      "info": true,
      "ordering": true,
      "lengthChange": true,
      "order": [[ 1, "desc" ], [ 0, "asc" ]],
      dom: 'Bfrtip',
        
    });                
  });
</script>