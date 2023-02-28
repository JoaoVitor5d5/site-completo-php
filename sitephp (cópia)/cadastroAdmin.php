<?php
session_start();
// $_SESSION['msg'] = "";
// if($_SESSION['usuario'] != ""){
//   header("Location: index.php");
//   exit();
// }
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Admin</title>
  <link rel="icon" href="icon.png">
  <link rel="stylesheet" href="./entrar.css">
</head>
<?php include "matrix.html" ?>
<body >
<div class="wrapper fadeInDown">
  <div id="formContent">
    <a href="cadastroAdmin.php"><h2 class="active"> Cadastro de Admin </h2></a>
    <div class="fadeIn first">
      <img src="./cadastro.png" id="icon" alt="User Icon" />
    </div>
    <form action="cadastrarAdmin.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="nome" placeholder="NOME" required>
      <input type="text" id="login" class="fadeIn second" name="nick" placeholder="NICKNAME" required>
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="EMAIL" required>
      <input type="password" id="password" class="fadeIn third" name="senha" placeholder="SENHA" required>
      <input type="number" id="password" class="fadeIn third" name="idade" placeholder="IDADE" min="1" max="100" required>
      <input type="submit" class="fadeIn fourth" value="cadastrar" name="login">
    </form>
    <div id="formFooter">
        <a class="underlineHover" href="index.php">Voltar para o menu</a><br>
        <?php
          if($_SESSION['msg'] != ""){
            $a = $_SESSION['msg'];
            print("<p>".$a."</p>");
          }
        ?>
      </div>
      </div>
</div>
</body>
</html>