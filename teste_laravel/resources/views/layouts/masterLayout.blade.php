<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="shortcut icon" href="img/ico.ico">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <link type="text/css" rel="stylesheet" href="jsgrid/jsgrid.min.css" />
        <link type="text/css" rel="stylesheet" href="jsgrid/jsgrid-theme.css" />
        <script type="text/javascript" charset="utf8" src="jsgrid/jsgrid.min.js"></script>
        <script type="text/javascript" charset="utf8" src="js/Chart.js"></script>
        <script type="text/javascript" charset="utf8" src="js/fuse.js"></script>
      </head>

      <script type="text/javascript">
        var defineClasses = function(page){
          $("#sidebar li").removeClass("active");
          $("#" + page).addClass("active");
          $('#dynamicDiv').load(page);
        }
      </script>
    </head>

    <body>
      @yield('header')

      <div class="container-fluid">
        @yield('sidebar')
        @yield('content')
      </div>
    </body>
</html>
