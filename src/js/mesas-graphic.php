<?php 


function admins($user_type){
    $db = conecta();
    $sql = 'SELECT COUNT(id) from tb_reservation where mesa = "'.$user_type.'"';
    $query = $db ->query( $sql );
    $registros = $query ->fetchall();
    
    foreach($registros as $total){
        $num = $total[0];
    }

    return $num;
}
?>


<script>
const data = {
    labels: [
        'Chief',
        'Date',
        'Pizzala'
    ],
    datasets: [{
        label: 'Gerenciamento de Administradores',
        data: [<?php echo(admins('chief')); ?>, <?php echo(admins('date')); ?> , <?php echo(admins('pizzala')) ?>],
        backgroundColor: [
        'red',
        'green',
        'blue'
        ],
        hoverOffset: 4
    }]
};

const config = {
  type: 'doughnut',
  data: data,
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
</script>