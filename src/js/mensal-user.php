<?php 
#Criar Função que manipula o mês, dá menos trabalho

function mensal($data){
  $db = conecta();
  $mes = 'SELECT count(id) from tb_users WHERE dia_inclusao LIKE "'.$data.'" ';

  $total_mes = $db->query( $mes );
  $registros_mes = $total_mes->fetchall();
  
  foreach($registros_mes as $registros_mes){
      $mes_informado = $registros_mes[0];
  }

  return $mes_informado;
}

?>



<script>
const labels = ["Janeiro","Fevereiro","Março","Abril", "Maio", "Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];

const datando = {
  labels: labels,
  datasets: [{
    label: 'Total Users',
    data: [<?php echo(mensal('2023-01%')); ?>, <?php echo(mensal('2023-02%')); ?>, <?php echo(mensal('2023-03%')); ?>, <?php echo(mensal('2023-04%')); ?>, <?php echo(mensal('2023-05%')); ?>, <?php echo(mensal('2023-06%')); ?>, <?php echo(mensal('2023-07%')); ?>, <?php echo(mensal('2023-08%')); ?>, <?php echo(mensal('2023-09%')); ?>, <?php echo(mensal('2023-10%')); ?>, <?php echo(mensal('2023-11%')); ?>, <?php echo(mensal('2023-12%')); ?>],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const configuracao = {
  type: 'bar',
  data: datando,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

const mensal = new Chart(
    document.getElementById('mensalChart'),
    configuracao
);

</script>