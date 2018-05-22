<script>
  $(document).ready(function

    select_size();
    function select_size(){
      var action="detail";

      $.ajax({
        url:"detail.php",
        method:"POST",
        data:{action:action},
        success:function(data){
          $('#optionList').val('');
        }
      })

    }
  })


</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
