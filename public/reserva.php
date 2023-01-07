<?php 
  session_start();

  if(isset($_SESSION['mail']) && $_SESSION['mail'] !== 'false'){
    $initialNavbar = false;
  }else{
    header('Location: ./index.php');
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <link
      rel="shortcut icon"
      href="../favicon_io/favicon.ico"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="./components/navbar/verificado-navbar.css">
    <link rel="stylesheet" href="./css/reserva.css">
    <title>Pizza COOL</title>
  </head>
  <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //Janeiro é 0, então somamos + 1 para trabalhar com calendário conhecido
    var yyyy = today.getFullYear();
    //se for maior que dia 30 vai para o proximo mês
    if(dd > 30){
      dd = dd - 30;
      mm = mm+1;
    }
    //se for maior que 12 vai para o proximo ano
    if(mm > 12){
      mm = 1;
      yyyy = yyyy + 1;
    }
    // Se for menor que 10 formatamos com um zero na frente Ex: de 9 para 09
    if(dd < 10){
      dd = '0' + dd;
    }
    // Se for menor que 10 formatamos com um zero na frente Ex: de 9 para 09
    if(mm < 10){
      mm = '0' + mm;
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("dia").setAttribute("min", today);
    today = dd + '-' + mm + '-' + yyyy;
    var div = document.getElementById("divDtFutura");
    div.innerText =  today ;
  </script>
  </script>
  <body>
  <header>
      <?php 
          include_once("./components/navbar/verificado-navbar.php"); 
      ?>
  </header>
    <main class="content">
        <div class="form-control">
          <h1 class="boas-vindas">Olá,<?php echo $_SESSION['nome']; ?>! Preencha o formulário abaixo para realizar sua reserva.</h1>
          <form action="./../src/action/insert-reserva.php" class="formulario" method='POST'>
            <div class="controle-input">
                <label for="mesas">Escolha a mesa:</label>
              <select name='mesa' id="mesas" class="campos" required>
                <option value="date">Date</option>
                <option value="pizzala">Pizzala</option>[
                <option value="chief">Chief</option>
              </select>
              
            </div>
            <div class="controle-input">
            <div>
                <label for="data">Informe o dia desejado:</label>
                <input type="date" name="data" id="dia" min="" required class="campos"/>
            </div>
            <div>
                <label for="hora">Horário disponível:</label>
                <!-- <input type="time" id="hora" name='hora' class="campos"  min="18:00" max="22:00" required> -->
                <select name="hora" class="campos">
                  <option value="22:00:00">18:00 - 22:00</option>
                </select>
            </div>
              <p class="warning">
                  *No momento,estamos atendendo somente no horário acima!
              </p>
            <div>
              <label for="qtdPersons">Quantidade de pessoas:</label>
              <select name='qtdPersons' class='campos' required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            
            <br>
            <button type="submit" class="logar" onclick="reserva()">Reservar</button>
            <?php 
              if(!isset($_GET['reserva'])){
                exit();
              }else{
                $error = $_GET['reserva'];

                if($error == 'time'){
                  echo '<p class="error">Não é permitido fazer reserva em dia anterior ou após o início do horário disponível</p>';exit();
                }elseif($error == 'process'){
                  echo '<p class="error">Infelizmente ocorreu um erro de processamento na aplicação!</p>';
                  exit();
                }
              }
            
            ?>
            </div>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>