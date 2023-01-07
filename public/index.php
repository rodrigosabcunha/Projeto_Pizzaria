<?php 
  session_start();

  if(isset($_SESSION['mail']) && $_SESSION['mail'] !== 'false'){
    $initialNavbar = false;
  }else{
    $initialNavbar = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pizza COOL</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./components/navbar/verificado-navbar.css">
    <link
      rel="shortcut icon"
      href="../favicon_io/favicon.ico"
      type="image/x-icon"
    />

    <link rel="stylesheet" href="./css/cardapio.css" />
  </head>
  <body>
  <header>
      <?php 
        $initialNavbar ? include_once("./components/navbar/initial-navbar.php") : include_once("./components/navbar/verificado-navbar.php"); 
      ?>
  </header>
    <h1 class='title'>Confira nosso cardápio abaixo e venha apreciar!</h1>
    <table class="tabela">
        <tr>
            <td class="imagem">
                <img src="./../image/pizza-de-frango-com-catupiry.jpg" class="xburguer" alt="">
            </td>
            <td class="texto">
                <b>Frango com catupiry</b><br>Molho de tomate, mussarela, frango desfiado e catupiry<br><br><b>R$40,00</b>
            </td>
            <td class="imagem">
              <img src="./../image/pizza-de-calabresa-.jpeg" class="xburguer" alt="">
          </td>
          <td class="texto">
              <b>Calabresa</b><br>Molho de tomate, mussarela e calabresa<br><br><b>R$40,00</b>
          </td>
        </tr>
        <tr>
          <td class="imagem">
              <img src="./../image/pizza peperoni.jpg" class="xburguer" alt="">
          </td>
          <td class="texto">
              <b>Peperoni</b><br>Mussarela e peperoni<br><br><b>R$40,00</b>
          </td>
          <td class="imagem">
            <img src="./../image/pizza marguerita.jpg" class="xburguer" alt="">
        </td>
        <td class="texto">
            <b>Marguerita</b><br>Mussarela, molho de tomate e manjericão<br><br><b>R$40,00</b>
        </td>
      </tr>
      <tr>
        <td class="imagem">
            <img src="./../image/pizza.png" class="xburguer" alt="">
        </td>
        <td class="texto">
            <b>Mussarela</b><br>Molho de tomate e mussarela<br><br><b>R$40,00</b>
        </td>
        <td class="imagem">
          <img src="./../image/pizza lombo.jpg" class="xburguer" alt="">
      </td>
      <td class="texto">
          <b>Lombo</b><br>Molho de tomate, mussarela e lombo<br><br><b>R$40,00</b>
      </td>
    </tr>
    <tr>
      <td class="imagem">
          <img src="./../image/pizza chocolate.jpg" class="xburguer" alt="">
      </td>
      <td class="texto">
          <b>Chocolate</b><br>Mussarela e chocolate derretido.<br><br><b>R$40,00</b>
      </td>
      <td class="imagem">
        <img src="./../image/pizza chocolate com morango.jpg" class="xburguer" alt="">
    </td>
    <td class="texto">
        <b>Chocolate com morango</b><br>Mussarela, chocolate derretido e morango<br><br><b>R$45,00</b>
    </td>
  </tr>
    </table>
  </body>
</html>