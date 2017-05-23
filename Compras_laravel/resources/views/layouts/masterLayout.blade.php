<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="/compras/public/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="/compras/public/css/sb-admin.css"/>
  <link rel="stylesheet" type="text/css" href="/compras/public/css/style.css"/>
  <link href="/compras/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="img/ico.ico">
  <script type="text/javascript" src="/compras/public/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="/compras/public/js/mask.js"></script>
  <script type="text/javascript" src="/compras/public/js/bootstrap.js"></script>

  <script type="text/javascript">
    var defineClasses = function(page){
      $("#sidebar li").removeClass("active");
      $("#" + page).addClass("active");
      $('#dynamicDiv').load(page);
    }

    $(document).ready(function(){
      $('#formLoginVendor').submit(HandleSubmit);
      function HandleSubmit(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "authVendor",
            data: $("#formLoginVendor").serialize(),

            success: function(auth) {
              if(auth){
                location.reload();
              } else{
                $("#warning").text("Dados incorretos").css("visibility", "visible");
              }
            }
        });
      };
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
</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Portal de compras</a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">
          @if(Auth::user())
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="logout"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                </li>
            </ul>
            @endif
        </li>
      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      @if(Auth::user() && Auth::user()->role == 1)
        @include('layouts.buyerSidebar')
      @elseif(Auth::user() && Auth::user()->role == 2)
        @include('layouts.vendorSidebar')
      @else
         @include('layouts.loginSidebar')
      @endif
      <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <div class="container-fluid">
        @yield('content')
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->
</body>
</html>
