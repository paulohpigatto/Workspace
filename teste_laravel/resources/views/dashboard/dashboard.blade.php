<div class="col-md-8" >
  <div class="col-md-6 text-center" style="height:60%;">
    <div style="padding-top:25%;color:#636363;">
      {{ App\Transaction::lastTenDays() }}
    </div>
  </div>

  <div class="col-md-6" style="height:50%;">
    <div style="padding-left:15%;">
      <canvas id="myChartDoughnut" style="width:300px;height:300px;"></canvas>
    </div>
    <p id="percent" style="position:relative;margin-top:-215px;font-size:82px;color:#828282;margin-left:120px;"></p>
    <p style="position:relative;font-size:18px;margin-top:-30px;color:#828282;margin-left:125px;">de aproveitamento</p>
  </div>

  <div class="col-md-12">
    <h4 class="text-center">Acúmulo dos últimos 6 meses</h4>
    <div style="width:100%;">
      <canvas id="myChart"></canvas>
    </div>
  </div>

</div>

<!-- Barra lateral direita com informações do perfil -->

<div class="col-md-4" id="profile">
  <span class="profile-title">Saldo</span><br/>
  <span class="profile-value">${{ App\Transaction::allTransactions() }}</span><br/><br/><br/>

  <div class="profile-wrapper"></div>

  <span class="profile-title">Prêmios resgatados</span><br/>
  <span class="profile-value" style="font-size:32px;">{{ App\Transaction::redeemed(0) }}</span><br/><br/>
  <a href="#" class="profile-value" id="click-prize">Prêmios resgatados +</a><br/>
  <div id="redeemed-prizes">
    {{ App\Transaction::redeemed(1) }}
  </div>

  <script>
    $(document).ready(function(){
      $("#click-prize").click(function(){
        if($("#redeemed-prizes").is(":hidden")){
          $("#redeemed-prizes").slideDown();
        } else{
          $("#redeemed-prizes").slideUp();
        }
      });
    });
  </script>

  <br/><br/>

  <div class="profile-wrapper"></div>

  <span class="profile-title" style="color:green;font-size:16px;">
  <!-- É possível resgatar prêmios -->
  </span><br/><br/><br/>

  <script type="text/javascript">
  $(document).ready(function(){
    $(".pendingPrizes").click(function(){
      $("#sla").text($("span", this).text() + " dias");
      $("#resting").text($("p", this).text());
    });
  });
  </script>

  <!-- Prêmios pendentes -->
  <br/><br/>
</div>

<!-- Fim barra lateral direita com informações do perfil -->

<div id="cumulativeJson" class="hidden">
  <?php
  error_reporting(0);
  include "graph_cumulative.php";
  ?>
</div>

<div id="balance" class="hidden">
  <?php
  error_reporting(0);
  include "balance.php";
  ?>
</div>

<div id="rulesPrizeModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:500px;">
    <div class="modal-content">
      <div class="modal-header" style="border:none;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body text-center">
        <h3>O SLA para entrega deste produto é de:</h3>
        <h4 id="sla"></h4>
        <br/><br/>
        <h3>Ainda restam:</h3>
        <h4 id="resting"></h4>
        <br/><br/>
      </div>
    </div>
  </div>
</div>
