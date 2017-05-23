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
<nav class="navbar navbar-collpase navbar-fixed-top" style="background:#8a8a8e;color:white;">
  <div class="container" style="margin-left:-5px;width:100%;padding-right:0;">
    <div class="navbar-header">
      <a class="navbar-brand" href="">
        <img src='img/logo.png'/>
      </a>
    </div>

    @if(Auth::user())
        <p class='navbar-text' style='color:white;font-size:16px;padding:0;margin-bottom:0;margin-right:5px;'>Bem vindo, </p><span style='font-size:22px;position:absolute;margin-top:0.7%;'>{{ Auth::user()->name }}</span>
    @endif

    <ul class="nav navbar-nav navbar-right" style="margin-right:-5px;">
      @if(!Auth::user())
      <li class="nav-button">
        <button id="loginButton" data-toggle="modal" data-target="#loginModal">
          Login
        </button>
      </li>
      @endif
      @if(Auth::user())
          @if(Auth::user()->role != 4 && Auth::user()->role != 5 && Auth::user()->role != 3 && Auth::user()->role != 2):
          <li class="nav-button">
            <a href="redeem.php" style="padding:0;margin:0">
              <button id="loginButton" id="redeemPrize">
                Resgatar prêmios
              </button>
            </a>
          </li>
      @endif
      @if(Auth::user()->role == 4)
          <li class="nav-button">
            <a href="status_prizes.php" style="padding:0;margin:0">
              <button id="loginButton">
                Entregas
              </button>
            </a>
          </li>
      @endif
      @if(Auth::user()->role == 4):
          <li class="nav-button">
            <a href="logistica.php" style="padding:0;margin:0">
              <button id="loginButton">
                Área de logística
              </button>
            </a>
          </li>
      @endif
      @if(Auth::user()->role == 2 || Auth::user()->role == 5):
          <li class="nav-button">
            <a href="gestao.php" style="padding:0;margin:0">
              <button id="loginButton">
                Área de gestão
              </button>
            </a>
          </li>
      @endif
      @if(Auth::user()->role == 3 || Auth::user()->role == 5):
            <li class="nav-button">
              <a href="php/admin.php" style="padding:0;margin:0">
                <button id="loginButton">
                  Área de administração
                </button>
              </a>
            </li>
      @endif
        <li class="nav-button">
          <a href="logout" style="padding:0;margin:0;">
            <button id="loginButton">
              Sair
            </button>
          </a>
        </li>
    @endif
    </ul>
  </div>
</nav>

<div id="loginModal" class="modal fade" role="dialog" style="position:absolute;margin-top:-4%;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <hgroup>
          <h3>Login</h3>
        </hgroup>

        <br/><br/>
        <img src="img/logo_black.png" class="center-block" style="margin-bottom:-40px;width:340px;heigt:116px;"/>

        <form method="post" id="formLogin" action="auth">
          {{ csrf_field() }}
          <p id="warning"></p>
          <div class="group">
            <input type="text" name="email" maxlength=70 required pattern=".{2,70}" title="O login tem entre 2 e 50 caracteres"><span class="highlight"></span><span class="bar"></span>
            <label>Login ou email</label>
          </div>
          <div class="group">
            <input type="password" name="password" maxlength=20 required pattern=".{6,20}" title="A senha tem entre 6 e 20 caracteres"><span class="highlight"></span><span class="bar"></span>
            <label>Senha</label>
          </div>
          <input type="submit" id="login" class="center-block" value="Login"/>
        </form>
      </div>
    </div>
  </div>
</div>
