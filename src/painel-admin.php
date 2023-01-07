<?php 

session_start();

if($_SESSION['mail'] !== "super@root.com" || $_SESSION['role'] !== 'admin'){
    header("Location:./../public/login.php");
}

require_once("./action/conexao.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza BG</title>
    <link rel="stylesheet" href="./css/painel-admin.css">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./components/navbar/navbar.css">

    <link rel="shortcut icon" href="./../favicon_io/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include_once('./components/navbar/navbar.php'); ?>

    <h1 class="title">Gráficos de Controle</h1>

    <div class="controle">
        <div class="admin">
            <div class='adjuste-admin'>
                <h2 class="titulos-graficos">Gerenciamento de Mesas</h2>
                <canvas id="myChart" ></canvas>
            </div>
        </div>

        <div class="mensal">
            <div class='adjuste-mensal'>
                <h2 class="titulos-graficos">Novos usuários mensais</h2>
                <canvas id="mensalChart"></canvas>
            </div>
        </div>
        

    </div>


    <?php require_once("./js/mesas-graphic.php"); ?>
    
    <?php require_once("./js/mensal-user.php"); ?>


    
</body>
</html>