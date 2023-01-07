<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/cadastro.css" />
    <link
      rel="shortcut icon"
      href="../favicon_io/favicon.ico"
      type="image/x-icon"
    />
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
              class="newUser"
              src="../image/new-user.svg"
              alt="Cadeado-Login"
              draggable="false"
            />
          </div>
        </div>

        <div class="form-control">
          <h1 class="boas-vindas">Crie sua conta e utilize gratuitamente</h1>

          <form action="./../src/action/insert-cadastro.php" method="POST" class="formulario">
            <div class="controle-input">
              <input
                type="text"
                name="fullName"
                id="fullName"
                placeholder="Full Name"
                class="campos"
                required
              />
            </div>
            <div class="controle-input">
              <input
                type="email"
                name="mail"
                id="mail"
                placeholder="Email"
                class="campos"
                required
              />
            </div>
            <div class="controle-input">
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Senha"
                class="campos"
                required
              />
            </div>
            <div class="controle-input">
              <input
                type="password"
                name="passwordRepeat"
                id="passwordRepeat"
                placeholder="Repetir Senha"
                class="campos"
                required
              />
            </div>
            <div class="controle-input">
              <!--Esconder campo e mostrar caso o usuário erre a senha-->
              <button type="submit" class="logar">Criar Conta</button>
            </div>
          </form>
          <?php 
            if(!isset($_GET['register'])){
              exit();
            }else{
              $register = $_GET['register'];
              
              if($register == 'mail'){
                echo '<p class="error">E-mail já cadastro no sistema,informe outro!</p';
                exit();
              }elseif($register == 'process'){
                echo '<p class="error">Infelizmente ocorreu um erro de processamento!</p';
              }elseif($register == 'empty'){
                echo '<p class="error">Preencha todos os campos!</p>';
              }
            }
          ?>
        </div>
      </div>
    </main>
  </body>
</html>
