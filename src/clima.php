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
    <link rel="stylesheet" href="./css/clima.css">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./components/navbar/navbar.css">

    <link rel="shortcut icon" href="./../favicon_io/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php include_once('./components/navbar/navbar.php'); ?>
    

    <div class="controle">
        <div class="admin">
            <div class='adjuste-admin'>
                <h2 class="title">Dia Atual:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Descrição</th>
                            <th>Temperatura</th>
                            <th>Velocidade do vento</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $url = "https://api.hgbrasil.com/weather?woeid=452041";
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $clima = json_decode(curl_exec($ch));
                    echo("
                        <tr>
                            <td>".$clima->results->date."</td>
                            <td>".$clima->results->time."</td>
                            <td>".$clima->results->description."</td>
                            <td>".$clima->results->temp."</td>
                            <td>".$clima->results->wind_speedy."</td>
                        </tr>
                            ");
                ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>


    
</body>
</html>