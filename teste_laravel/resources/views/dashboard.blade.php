<link rel="stylesheet" type="text/css" href="css/sidebar.css"/>

<script type="text/javascript">
  $(document).ready(function(){
    $('#dynamicDiv').load('dashboard');

    $("#sidebar li").click(function(){
      defineClasses($(this).attr("id"));
    });
  });
</script>

<body>
<nav class="navbar navbar-default sidebar" role="navigation" style="border-bottom:none;">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav" id="sidebar">
        <li id="dashboard" class="active"><a href="#">Dashboard<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li id="extrato"><a href="#">Extrato<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
        <li id="regras"><a href="#">Regras<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
        <li id="senha"><a href="#">Alterar senha<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-lock"></span></a></li>
      </ul>
    </div>
    <br/><br/><br/>
  </div>
</nav>


<div class="section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-10" id="dynamicDiv" style="">
      </div>
  </div>
</div>
</body>
