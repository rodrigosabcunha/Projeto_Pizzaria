<?php 
    date_default_timezone_set('America/Sao_Paulo');
    require_once('./conexao.php');
    $db = conecta();
    session_start();

    if(isset($_POST['mesa']) && isset($_POST['data']) && isset($_POST['hora'])){
        
        $mesa = $_POST['mesa'];
        $reserved_data = $_POST['data'];
        $reserved_hour = $_POST['hora'];
        
        $reserved_day = $reserved_data. " ".$reserved_hour;
        $reserved_by = $_SESSION['nome'];
        $dia_inclusao = date("Y-m-d H:i:s");
        $situation = 1;
        $mail = $_SESSION['mail'];
        $qtd_persons = $_POST['qtdPersons'];

        $qtd_persons_formated = intval($qtd_persons);

        if(strtotime($dia_inclusao) > strtotime($reserved_day)){
            header('Location: ./../../public/reserva.php?reserva=time');
        }else{
            try{
                $foundMail = 'SELECT * FROM tb_users where email = "'.$mail.'"';
                $executeMail = $db->query( $foundMail );
                $countMail = $executeMail->rowCount();
    
                $registro = $executeMail->fetchall();
    
                if($countMail <= 0){
                    header('Location: ./../../public/reserva.php?reserva=process');
                }else{
                    $person_id = $registro[0][0];
                    
                    $insert_reserva = "INSERT INTO tb_reservation (person_id,mesa,qtd_persons, reserved_by, reserved_day,dia_inclusao,situation) values('$person_id', '$mesa', '$qtd_persons', '$reserved_by', '$reserved_day', '$dia_inclusao', '$situation')";
    
                    $query = $db->query( $insert_reserva );
    
                    if(!$query){
                        header('Location: ./../../public/reserva.php?reserva=process');
                    }else{
                        header('Location: ./../../public/my-reservations.php');
                    }
                }
            }catch(_){
                header('Location: ./../../public/reserva.php?reserva=process');
            }
        }
            
        }

        
?>