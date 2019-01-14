<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- Dropzone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

@yield('extra-JS')

<script type="text/javascript">
  //Filter Modal hide and show.
  $("input[name=myPost]").click(function() {
    if($("input[name=myPost]").prop('checked')){ 
      $('#postBy').hide();
      $('#online-checkbox').hide();
      //Removing bootstrap classes
      $("#myPost").removeClass('col-md-2').addClass('col-md-3');
      $("#postFor").removeClass('col-md-2').addClass('col-md-3');
      $("#categories").removeClass('col-md-2').addClass('col-md-3');
      $("#status").removeClass('col-md-2').addClass('col-md-3');
      //adding bootstrap classes
    } 
    else{
      $('#postBy').show();
      $('#online-checkbox').show();
      //Removing bootstrap classes
      $("#myPost").addClass('col-md-2').removeClass('col-md-3');
      $("#postFor").addClass('col-md-2').removeClass('col-md-3');
      $("#categories").addClass('col-md-2').removeClass('col-md-3');
      $("#status").addClass('col-md-2').removeClass('col-md-3');
      //adding bootstrap classes
    }
  });
</script>
<script>
    // $(".fa-camera").click(function () {
    // $("input[type='file']").trigger('click');
    // });

    // $('input[type="file"]').on('change', function() {
    // var val = $(this).val();
    // $(this).siblings('span').text(val);
    // })
   
</script>
