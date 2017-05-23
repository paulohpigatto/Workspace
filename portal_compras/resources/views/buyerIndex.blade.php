@extends('layouts.masterLayout')

@section('content')
<script>
  $(document).ready(function(){
    defineClasses('comprador');

    $("#sidebar li").click(function(){
      defineClasses($(this).attr("id"));
    });
  });
</script>

<div class='col-md-12' style="height:100%;" id="dynamicDiv">
</div>
@endsection
