@extends('layouts.masterLayout')

@section('content')
<script type="text/javascript">
$(document).ready(function(){
  $('#formLogin').submit(HandleSubmit);
  function HandleSubmit(e){
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "auth",
      data: $("#formLogin").serialize(),

      success: function(auth) {
        if(auth){
          location.reload();
        } else{
          $("#warning").text("Dados incorretos").css("visibility", "visible");
        }
      }
    });
  };
});
</script>

<div class='col-md-12' style="height:100%;" id="dynamicDiv">
</div>
@endsection
