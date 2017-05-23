<script>
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
});
</script>

<div class='col-md-12' style="height:100%;">
  @if(!Auth::user())
  <form method="post" id="formLoginVendor" style="padding:15% 0 0 0">
    <p id="warning" style="padding-bottom: 5%"></p>
    {{ csrf_field() }}
    <div class="group">
      <input type="text" name="cnpj" id="cnpj" class="used" maxlength=18 required pattern=".{18,18}" title="O CNPJ tem 18 dígitos"><span class="highlight"></span><span class="bar"></span>
      <label>CNPJ</label>
    </div>
    <div class="group">
      <input type="password" name="password" class="used" maxlength=20 required pattern=".{6,20}" title="A senha tem entre 6 e 20 caracteres"><span class="highlight"></span><span class="bar"></span>
      <label>Senha</label>
    </div>
    <input type="submit" id="login" class="center-block" value="Login"/>
  </form>
  @else
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard
        </li>
      </ol>
    </div>
  </div>
  <!-- /.row -->

  <h3>Chamados</h3>

  <div class="row">
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-fw fa-clock-o fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">26</div>
              <div>Aguardando atendimento</div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Ver todos</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-green">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-fw fa-exchange fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">12</div>
              <div>Em negociação</div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Ver todos</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-yellow">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-fw fa-thumbs-o-up fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">124</div>
              <div>Aguardando aprovação no SAP</div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Ver todos</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6">
      <div class="panel panel-red">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-check fa-5x"></i>
            </div>
            <div class="col-xs-9 text-right">
              <div class="huge">13</div>
              <div>Aguardando entrega</div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Ver todos</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
  </div>
  @endif
</div>
