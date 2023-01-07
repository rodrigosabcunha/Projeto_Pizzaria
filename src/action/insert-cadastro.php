<?php 
    date_default_timezone_set('America/Sao_Paulo');
    require_once('./conexao.php');
    $db = conecta();

    if(isset($_POST['fullName']) && isset ($_POST['mail']) && isset($_POST['password']) && isset($_POST['passwordRepeat'])){
        $fullName = $_POST['fullName'];

        $mail = $_POST['mail'];

        $password = $_POST['password'];

        $dia_inclusao = date("Y-m-d H:i:s");

        $role = 'user';

        try{

            $foundMail = 'SELECT * FROM tb_users where email = "'.$mail.'"';
            $executeMail = $db->query( $foundMail );
            $countMail = $executeMail->rowCount();
            
            if($countMail <= 0){
                $insertUser = "INSERT INTO tb_users(nome,email,senha,dia_inclusao,user_type) values('$fullName', '$mail', '$password', '$dia_inclusao', '$role')";
    
                $query= $db->query( $insertUser );
            if(!$query){
                header('Location: ./../../public/cadastro.php?register=process');
            }else{
                header('Location:./../../public/login.php');
            }
        }else{
            header('Location: ./../../public/cadastro.php?register=mail');
        }
    }catch(_){
        header('Location: ./../../public/cadastro.php?register=process');
    }

    }
?>