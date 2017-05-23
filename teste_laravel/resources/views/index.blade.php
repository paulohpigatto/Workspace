@extends('layouts.masterLayout')

@section('title', 'Home')

@section('header')
  @include('header')
@endsection

@section('content')
  @if(Auth::check())
    @include('dashboard')
    <script>
  $(document).ready(function(){
    // Gráfico de linha

    var ctx = $("#myChart");
    var cumulative = $("#cumulativeJson");
    var jsonGraph = $("#cumulativeJson").text();
    var raw = JSON.parse(jsonGraph);
    var cumulative = [], lost = [];

    for(var i = 0; i < raw.length; i += 2){
      var count = i + 1;
      cumulative.push(raw[i]);
      lost.push(raw[count]);
    }

    var myChart = new Chart(ctx, {
    type: 'line',
    data:{
      labels:["","","","","",""],
        datasets: [{
          label: "Quotas",
         backgroundColor: "rgba(150,0,175,0.1)",
         borderColor: "rgba(150,0,175,1)",
         pointBorderColor: "rgba(150,0,175,1)",
         pointBackgroundColor: "#fff",
         pointBorderWidth: 1,
         pointHoverRadius: 5,
         pointHoverBackgroundColor: "rgba(150,0,175,1)",
         pointHoverBorderColor: "rgba(150,0,175,1)",
         pointHoverBorderWidth: 2,
         pointRadius: 1,
         pointHitRadius: 10,
         data: cumulative,
        },
        {
          label: "Quotas perdidas",
         backgroundColor: "rgba(128,128,128,0.1)",
         borderColor: "rgba(128,128,128,1)",
         pointBorderColor: "rgba(128,128,128,1)",
         pointBackgroundColor: "#fff",
         pointBorderWidth: 1,
         pointHoverRadius: 5,
         pointHoverBackgroundColor: "rgba(128,128,128,1)",
         pointHoverBorderColor: "rgba(128,128,128,1)",
         pointHoverBorderWidth: 2,
         pointRadius: 1,
         pointHitRadius: 10,
         data: lost,
        }
      ]
      },
        options: {
          responsive: true,
          xAxes: [{
                type: 'linear',
                position: 'bottom'
            }],
        }
      });


    //Gráfico Doughnut


    var ctx2 = $("#myChartDoughnut");
    var balance = JSON.parse($("#balance").text());
    var percent = balance[0] * 100 / (balance[0] + balance[1]);

    if(percent == 100){
      $("#percent").css('margin-left', '95px');
    }
    $("#percent").text(parseFloat(percent).toFixed(0) + "%");

    var data = {
      labels: [
          "Ganho",
          "Perda"
      ],
      datasets: [
          {
              data: balance,
              backgroundColor: [
                  "rgba(150,0,175,1)",
                  "#fff"
              ],
              hoverBackgroundColor: [
                "rgba(150,0,175,1)",
                "#fff"
              ]
          }]
      };

    var myDoughnutChart = new Chart(ctx2, {
      type: 'doughnut',
      data: data,

      options:{
        responsive:false,
        cutoutPercentage: 85,
        legend: {
          display: false
        },
      }
    });

    // Click
  });

  // Alterar senha
  $("#formChangePassword").submit(function(e){
    e.preventDefault();
  });

  $("#alterarSenha").click(function(){
    $.ajax({
        type: "POST",
        url: "php/change_password.php",
        data: $("#formChangePassword").serialize(),

        success: function(check) {
          if(check == 1){
            $("#warningChanged").text("Senha alterada com sucesso").css("visibility", "visible").css("color", "green");
          } else if(check == 2){
            $("#warningChanged").text("Senhas não coincidem").css("visibility", "visible");
          } else if(check == 3){
            $("#warningChanged").text("A senha antiga está incorreta").css("visibility", "visible");
          } else{
            $("#warningChanged").text("Falha ao alterar").css("visibility", "visible");
          }
        }
    });
  });
</script>
  @else
  <style>
    body{
      background:#D9D9D9;
    }
  </style>
  <img class='center-block' src='img/background.png' style='width:1100px;height:600px;margin-top:-2.5%;'>
  @endif
@endsection
