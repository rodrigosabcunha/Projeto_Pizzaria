<?php 

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    require_once('./conexao.php');
    $db = conecta();

    if(!isset($_GET['local'])){
        exit();
      }else{
        $valor = $_GET['local'];
        $local = $valor - 1;
        
      }

    $sql = 'SELECT id FROM tb_reservation where reserved_by = "'.$_SESSION['personId'].'"';
    $query = $db->query( $sql );
    $registro = $query->fetchall();

    $updateSituation = 'UPDATE tb_reservation set situation = 1 WHERE id = "'.$registro[$local][0].'" ';

    $update = $db->query( $updateSituation );
    if($update){
        header('Location: ./../../public/my-reservations.php');
    }

?>