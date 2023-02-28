<?php
session_start();
if(isset($_SESSION['usuario'])){
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="icon.png">
  <link rel="stylesheet" href="./entrar.css">
  <title>Login</title>
</head>
<body>
  <?php include "matrix.html" ?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <a href="login.php"><h2 class="active"> Entrar </h2></a>
    <a href="cadastro.php"><h2 class="inactive underlineHover"> Cadastre-se </h2></a>
    <div class="fadeIn first">
      <img src="./entrar.png" id="icon" alt="User Icon" />
    </div>
    <form action="entrar.php" method="post">
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="EMAIL" required>
      <input type="password" id="password" class="fadeIn third" name="senha" placeholder="SENHA" required>
      <input type="submit" class="fadeIn fourth" value="login" name="login">
    </form>
    <div id="formFooter">
        <a class="underlineHover" href="index.php">Voltar para o menu</a><br>
        <?php
          if(isset($_SESSION['msg'])){
            $a = $_SESSION['msg'];
            print("<p>".$a."</p>");
          }
        ?>
      </div>
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Esqueceu a senha?</a>
    </div> -->

  </div>
</div>
</body>
</html>