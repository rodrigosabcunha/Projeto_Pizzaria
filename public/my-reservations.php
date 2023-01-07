<?php 
  session_start();

  if(isset($_SESSION['mail']) && $_SESSION['mail'] !== 'false'){
    require_once('./../src/action/conexao.php');
    date_default_timezone_set('America/Sao_Paulo');
    $dia_atual = date("Y-m-d H:i:s");
    $db = conecta();

    $sql = 'SELECT mesa,situation,date(dia_inclusao),qtd_persons,id FROM tb_reservation where person_id = "'.$_SESSION['personId'].'" AND situation = 1 AND "'.$dia_atual.'" < reserved_day';

    $query = $db ->query( $sql );
    if(!$query){
        die("Erro de processamento!");
    }else{
        $registros = $query->fetchall();
    }
  }else{
    header('Location: ./index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/my-reservations.css">
    <link rel="stylesheet" href="./components/navbar/verificado-navbar.css">
    <link
      rel="shortcut icon"
      href="../favicon_io/favicon.ico"
      type="image/x-icon"
    />
    <title>Pizza COOL</title>
</head>
<body>
    <header>
        <?php 
            include_once("./components/navbar/verificado-navbar.php"); 
        ?>
    </header>
    
    <?php
      isset($registros[0][0]) ? include_once("./components/reservas/reservas_ativas.php") : include_once("./components/reservas/not_found.php");
    ?>
  
</body>
</html>