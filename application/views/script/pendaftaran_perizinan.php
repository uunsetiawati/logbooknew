<script type="text/javascript">
  $(document).ready(function(){
    $('#tgl').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_sesi_perizinan');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                  if (data[i].sesi == null) {
                    html += '<option value="'+data[i].deskripsi+'">'+data[i].deskripsi+'</option>';
                  }
                }
                $('#sesi').html(html);         
        }
      });
    });
  });
</script>

<script>
  $(function(){
    const picker = document.getElementById('tgl');
picker.addEventListener('input', function(e){
  var day = new Date(this.value).getUTCDay();
  if([6,0].includes(day)){
    e.preventDefault();
    this.value = '';
    alert('Mohon Maaf Sabtu-Minggu Libur');
  }
});
});
</script>