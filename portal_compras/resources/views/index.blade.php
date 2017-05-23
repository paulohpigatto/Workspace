@extends('layouts.masterLayout')

@section('content')
<script>
  $(document).ready(function(){
    $('#cnpj').mask('99.999.999/9999-99');

    $('#dynamicDiv').load('fornecedor');
    defineClasses('fornecedor');

    $("#sidebar li").click(function(){
      defineClasses($(this).attr("id"));
    });
  });
</script>

<div class='col-md-12' style="height:100%;" id="dynamicDiv">
</div>
@endsection
