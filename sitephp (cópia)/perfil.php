<?php
session_start();
$_SESSION['tipo'] = "";
// $_SESSION['usuario'] = "james";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png">
    <style>
        button {
            margin: 20px;
        }
        .frame {
            width: 90%;
            margin: 10px auto;
            text-align: center;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .one {
            text-align: center;
        }

        .two {
            text-align: left;
            margin-left: 5px;
            margin-right: auto;
            margin-top: 5px;
            margin-bottom: auto;
            width: 30%;
            height: auto;
            border-radius: 10px;
            text-justify: inter-word;
        }

        .custom-btn {
            color: #fff;
            width: 130px;
            height: 40px;
            padding: 10px 25px;
            font-family: 'Lato', sans-serif;
            font-weight: 500;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }

        .btn-13 {
            color: red;
            box-shadow: 0 0 5px red, 0 0 5px red inset;
            border: 1px solid red;
            z-index: 1;
          }
          .btn-13:after {
            position: absolute;
            content: "";
            width: 100%;
            height: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
            box-shadow: 0 0 5px red, 0 0 5px red inset;
            transition: all 0.3s ease;
          }
          .btn-13:hover {
            
          }
          .btn-13:hover:after {
            top: 0;
            height: 100%;
          }
          .btn-13:active {
            top: 2px;
          }

          div.teste {
            margin-left: 15px;
            margin-right: 20px;
            width: 95%;
            position: relative;
            display: flex; 
            justify-content: space-between;
          }

          div.t1 {
            margin-left: 10%;
            text-align: left;
          }
          div.t2 {
            margin-right: 10%;
            text-align: center;
          }
    </style>
    <title>Perfil</title>
    
</head>
<body>
    <?php 
    if(!isset($_SESSION['usuario'])){
        include "navbar.html";
    }else{
        include "navbar2.html";
    } ?>
    <div class="one">
        <img src="user.png" width="20%" height="auto"><br>
        <?php
            print("<h1>".$_SESSION['nickname']."</h1><br>");
            if(isset($_SESSION['admin'])){
                print("<h4>ADMIN</h4>");
            }
        ?>
        <div class="frame">
            <form action="logout.php" method="post">
            <button type="submit" class="custom-btn btn-13">Desconectar</button>
            </form>
        </div>
        <?php
        if(isset($_SESSION['admin'])){
        print('<div class="frame">');
        print('    <form action="cadastroAdmin.php" method="post">');
        print('    <button type="submit" class="custom-btn btn-13">CadastroAdm</button>');
        print('    </form>');
        print('</div>');
        }
        ?>
    </div>
        <br><br><br>
        <div class="teste">
            <div class="t1">
                <h2>Informações Pessoais</h2>
                <?php
                    print("<p> Nome: ".$_SESSION['nome']."</p><br>");
                    print("<p> Email: ".$_SESSION['email']."</p><br>");
                    print("<p> Idade: ".$_SESSION['idade']."</p><br>");
                ?>
                <form action="apagar.php" method="post">
                <button type="submit" class="custom-btn btn-13">Apagar Tudo</button>
                </form>
            </div>
            <div class="t2">
                <h2>Está sem ideia do que ver, que tal uma</h2>
                <h2>Sugestão Aleatória</h2>
                <?php 
                    include_once("conection.php");
                    // $numero = "SELECT id FROM animesOf;";
                    // $num = mysqli_query($conn, $numero);
                    // $n = mysqli_fetch_assoc($num);
                    // $ne = array_rand($n);

                    $result_usuari = ' SELECT id, nome, apelido, ano, genero, episodios, status, imagem, descricao, assistir, manga, ler, feitoPor, aprovadoPor FROM animesOf order by rand() limit 1';
                    $resultado_usuari = mysqli_query($conn, $result_usuari);
                    $row = mysqli_fetch_assoc($resultado_usuari);
                    
                    print("<img src ='imagens/".$row['imagem']."' alt ='imagens/$row[imagem]' style = height=42 width= 50'><br>");
                    print($row['nome']);
                    print("<form action='itens.php' method='post'>"); 
                    print("<input type='text' hidden name='nome' value='".$row['nome']."'>");
                    print("<input type='text' hidden name='apelido' value='".$row['apelido']."'>");
                    print("<input type='text' hidden name='ano' value='".$row['ano']."'>");
                    print("<input type='text' hidden name='genero' value='".$row['genero']."'>");
                    print("<input type='text' hidden name='ep' value='".$row['episodios']."'>");
                    print("<input type='text' hidden name='status' value='".$row['status']."'>");
                    print("<input type='text' hidden name='imagem' value='".$row['imagem']."'>");
                    print("<input type='text' hidden name='assistir' value='".$row['assistir']."'>");
                    print("<input type='text' hidden name='manga' value='".$row['manga']."'>");
                    print("<input type='text' hidden name='ler' value='".$row['ler']."'>");
                    print("<input type='text' hidden name='feitoPor' value='".$row['feitoPor']."'>");
                    print("<input type='text' hidden name='descricao' value='".$row['descricao']."'>");
                    print("<input type='text' hidden name='aprovado' value='".$row['aprovadoPor']."'>");
                    print("<input type='text' hidden name='id' value='".$row['id']."'>");
                    print("<input type='text' hidden name='tipo' value='anime'>");
                            print("<button type='submit' class='custom-btn btn-13'>Saiba Mais</button>");
                        print("</form>"); 
                ?>
            </div>
    </div><br><br>
    <div class="two">
        <h2> Quer ser um editor do site ou está com alguma dúvida? </h2>
        <h3> Entre em contato conosco: <h3>
        <p> Contatos: </p>
        <p> Email: xxxxx@xxxx </p>
        <p> Telefone: (99) 99999-9999 </p>
    </div>
</body>
</html>
