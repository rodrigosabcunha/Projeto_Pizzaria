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
    <link rel="stylesheet" href="./css/log-in.css" />
    <title>Pizza COOL</title>
  </head>
  <body>
    <main class="content">
      <p class="voltar">
        <a href="./index.php">
          <img
            src="../image/arrow-left-bold.png"
            class="arrow-left"
            draggable="false"
          />
          <a href="./index.php">Voltar</a>
        </a>
      </p>
      <div>
        <div class="lock-login">
          <div class="image-login">
            <img
              class="cadeado"
              src="../image/male-person.svg"
              alt="Person"
              draggable="false"
            />
          </div>
        </div>

        <div class="form-control">
          <h1 class="boas-vindas">Olá!Seja bem vindo novamente.</h1>

          <form action="./../src/action/login.php" class="formulario" method='POST'>
            <div class="controle-input">
              <input
                type="email"
                name="mail"
                id="mail"
                placeholder="E-mail"
                class="campos"
              />
            </div>
            <div class="controle-input">
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Senha"
                class="campos"
              />
            </div>
            <div class="controle-input">
              <p class="forgot-password">
                <a href="./forgot-password.php">Esqueceu sua senha?</a>
                <!--Redirecionar para alterar senha-->
              </p>
              <!--Esconder campo e mostrar caso o usuário erre a senha-->
              <button type="submit" class="logar">Log In</button>
              <!-- <p class="create-account">
                <a href="./cadastro.php">Criar conta</a>
              </p> -->
            </div>
          </form>
          <?php
            if(!isset($_GET['signup'])){
              exit();
            }else{
              $signupCheck = $_GET['signup'];

              if($signupCheck == 'password'){
                echo '<p class="error">Informe uma senha válida!</p>';
                exit();
              }elseif ($signupCheck == 'mail'){
                echo '<p class="error">Informe um e-mail válido!</p>';
              }elseif ($signupCheck == 'process'){
                echo '<p class="error">Infelizmente ocorreu um erro de processamento na aplicação!</p>';
              }
            }
          ?>
        </div>
      </div>
    </main>
  </body>
</html>
