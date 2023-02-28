<?php
session_start();
$_SESSION['msg2'] = "";
$_SESSION['tipo'] = "";
// $_SESSION['usuario'] = "";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png">
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <style>
        button {
            margin: 20px;
        }
        .frame {
            width: 90%;
            margin: auto;
            text-align: center;
            display: flex; 
            /* justify-content: space-between; */
        }
        /* img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 200%;
            height: 150%;
        } */

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

        .containe{
            margin-left: 15px;
            margin-right: 20px;
            width: 95%;
            position: relative;
            display: flex; 
            justify-content: space-between;
        }

        .containe .card{
            position: relative;
            cursor: pointer;
        }

        .containe .card .face{
            width: 250px;
            height: 200px;
            transition: 0.5s;
        }

        .containe .card .face.face1{
            position: relative;
            background: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
            transform: translateY(100px);
        }

        .containe .card:hover .face.face1{
            background: #ff0057;
            transform: translateY(0);
        }

        .containe .card .face.face1 .content{
            opacity: 0.2;
            transition: 0.5s;
        }

        .containe .card:hover .face.face1 .content{
            opacity: 1;
        }

        .containe .card .face.face1 .content img{
            max-width: 100px;
        }

        .containe .card .face.face1 .content h3{
            margin: 10px 0 0;
            padding: 0;
            color: #fff;
            text-align: center;
            font-size: 1.5em;
        }

        .containe .card .face.face2{
            position: relative;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
            transform: translateY(-100px);
        }

        .containe .card:hover .face.face2{
            transform: translateY(0);
        }

        .containe .card .face.face2 .content p{
            margin: 0;
            padding: 0;
            color: black;
        }

        .containe .card .face.face2 .content a{
            margin: 15px 0 0;
            display:  inline-block;
            text-decoration: none;
            font-weight: 900;
            color: #333;
            padding: 5px;
            border: 1px solid #333;
        }

        .containe .card .face.face2 .content a:hover{
            background: #333;
            color: #fff;
        }

        div.one {
            background-image: url('back.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 130%;
            text-align: center;
            margin-top: 0;
            border-radius: 10px;
            height: 500px;
            
        }

        p.one {
            color: red;
        }

        div.two {
            text-align: left;
            margin-left: 5px;
            margin-rigth: auto;
            margin-top: 5px;
            margin-bottom: auto;
            width: 30%;
            height: auto;
            border-radius: 10px;
            text-justify: inter-word;
            display: inline-block;
        }

        a {
            text-decoration: none;
            color: white;
        }

        div.three {
            background: red;
            text-align: left;
            margin-right: 20px;
            margin-left: 25%;
            width: 25%;
            height: auto;
            border-radius: 10px;
        }

        img.one {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 200%;
            height: 150%;
        }

        textarea {
            resize: none;
            border: 0px;
        }
    </style>
    <title>Animes</title>
    
</head>
<body>
    <?php 
    if(!isset($_SESSION['usuario'])){
        include "navbar.html";
    }else{
        include "navbar2.html";
    } ?>
    <div class="one">
        <br><br><br><br><br><br><h1> ANIMES </h1><br><br><br><br><br><br>
    </div>
    <?php 
                    include_once("conection.php");
                    $result_usuari = ' SELECT id, nome, apelido, ano, genero, episodios, status, imagem, descricao, assistir, manga, ler, feitoPor, aprovadoPor FROM animesOf';
                    $resultado_usuari = mysqli_query($conn, $result_usuari);
                    
                    
                    $x = 1;
                
                    while($row = mysqli_fetch_assoc($resultado_usuari)){
                        
                        if($x == 1 || $x % 4 == 0){
                        print("<div class='containe'>");
                        }
                        print("<div class='card'>");
                        print("<div class='face face1' >");
                        print("<div class='content'>");
                        print("<img src ='imagens/".$row['imagem']."' alt ='imagens/".$row['imagem']."' class='one' >");
                        print("<h3>".$row['nome']."</h3>");
                        print("</div>");
                        print("</div>");
                        print("<div class='face face2'>");
                        print("<div class='content'>");
                        print("<textarea readonly rows='6' cols='24' maxlength='160' >".$row['descricao']."...</textarea><br>");
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
                        print("</div>");
                        print("</div>");
                        print("</div>");
                        if($x % 3 == 0){
                            print("</div>");
                        }
                        $x = $x + 1;                        
                    }
                    print("</div>");
                    if(!isset($_SESSION['usuario'])){
                        $_SESSION['msg'] = "Você deve estar logado ou se cadastrar para poder dar sugestoẽs";
                        print("<div class='frame'>");
                        print("<form action='login.php' method='post'>");
                        print("<input type='text' hidden value='anime' name='tipo'>");
                        print("<button type='submit' class='custom-btn btn-13'>Sugerir</button>");
                        print("</form>");
                        print("</div>");
                    }else{
                        // $_SESSION['tipo'] = 'anime';
                        print("<div class='frame'>");
                        print("<form action='sugerir.php' method='post'>");
                        print("<input type='text' hidden value='anime' name='tipo'>");
                        print("<button type='submit' class='custom-btn btn-13'>Sugerir</button>");
                        print("</form>");
                        print("</div>");
                    }
            ?>    
</body>
</html>