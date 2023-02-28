<?php
session_start();
$_SESSION['tipo'] = "";
$_SESSION['msg2'] = "";
// $_SESSION['usuario'] = "";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="./style2.css">
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
            margin-left: auto;
        }

        .btn-12 {
            color: lightgreen;
            box-shadow: 0 0 5px lightgreen, 0 0 5px lightgreen inset;
            border: 1px solid lightgreen;
            z-index: 1;
          }
          .btn-12:after {
            position: absolute;
            content: "";
            width: 100%;
            height: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
            box-shadow: 0 0 5px lightgreen, 0 0 5px lightgreen inset;
            transition: all 0.3s ease;
          }
          .btn-12:hover {
            
          }
          .btn-12:hover:after {
            top: 0;
            height: 100%;
          }
          .btn-12:active {
            top: 2px;
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
            width: 40%;
            margin-left: 30%;
            margin-right: 30%;
            height: auto;
        }

        textarea {
            resize: none;
            border: 0px;
        }
    </style>
    <title><?php echo $_POST['nome'] ?></title>
    
</head>
<body>
    <?php 
    if(!isset($_SESSION['usuario'])){
        include "navbar.html";
    }else{
        include "navbar2.html";
    } ?>
    <?php
    if(isset($_SESSION['msg2'])){
        print("<p>".$_SESSION['msg2']."<p>");
    }
    if($_POST['tipo'] == 'anime'){
        // print("<img src='imagens/".$_POST['imagem']."' alt='".$_POST['imagem']."'>");
        print("<main>");
        print("<div class='contain'>");
        print("<div class='grid product'>");
        print("<div class='column-xs-12 column-md-7'>");
        print("<div class='product-gallery'>");
        print("<div class='product-image'>");
        print("<img class='active' src='imagens/".$_POST['imagem']."' alt='".$_POST['imagem']."'>");
        print("</div>");
        print("</div>");
        print("</div>");
        print("<div class='column-xs-12 column-md-5'>");
        print("<h1>Nome:".$_POST['nome']."     ".$_POST['ano']."</h1>");
        print("<h2>".$_POST['apelido']."</h2>");
        print("<div class='description'>");
        print("<p>Gênero:".$_POST['genero']."</p>");
        print("<p>Episódios:".$_POST['ep']."</p>");
        print("<p>Status:".$_POST['status']."</p>");
        print("<p>Onde Assistir: <a href=".$_POST['assistir'].">clique aqui para assistir online</a> </p><br>");
        print("<p>Mangá? <strong>".$_POST['manga']." </p>");
        if($_POST['manga'] == "sim"){
            print("</strong><br><a href=".$_POST['ler'].">leia aqui</a></p><br>");
        }
        print("<p>Descrição:".$_POST['descricao']."</p>");
        print("<p>Feito Por: <strong>".$_POST['feitoPor']."</strong>  </p>");
        print("</div>");
        print("</div>");
        
        if(isset($_SESSION['admin'])){
            print("<form action='aprovar.php' method='post'>"); 
                            print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                            print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                            print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                            print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                            print("<input type='text' hidden name='eps' value='".$_POST['ep']."'>");
                            print("<input type='text' hidden name='status' value='".$_POST['status']."'>");
                            print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                            print("<input type='text' hidden name='assistir' value='".$_POST['assistir']."'>");
                            print("<input type='text' hidden name='manga' value='".$_POST['manga']."'>");
                            print("<input type='text' hidden name='ler' value='".$_POST['ler']."'>");
                            print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                            print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                            print("<input type='text' hidden name='tipo' value='anime'>");
                            print("<button type='submit' class='custom-btn btn-12' >Aprovar</button>");
                        print("</form>");
                        print("<form action='apagarItem.php' method='post'>"); 
                            print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                            print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                            print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                            print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                            print("<input type='text' hidden name='ep' value='".$_POST['ep']."'>");
                            print("<input type='text' hidden name='status' value='".$_POST['status']."'>");
                            print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                            print("<input type='text' hidden name='assistir' value='".$_POST['assistir']."'>");
                            print("<input type='text' hidden name='manga' value='".$_POST['manga']."'>");
                            print("<input type='text' hidden name='ler' value='".$_POST['ler']."'>");
                            print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                            print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                            print("<input type='text' hidden name='tipo' value='anime'>");
                            print("<button type='submit' class='custom-btn btn-13' >Apagar</button>");
                        print("</form>");
                        
        }
        print("</div>");
    }
    else if($_POST['tipo'] == 'filme'){
        print("<main>");
        print("<div class='contain'>");
        print("<div class='grid product'>");
        print("<div class='column-xs-12 column-md-7'>");
        print("<div class='product-gallery'>");
        print("<div class='product-image'>");
        print("<img class='active' src='imagens/".$_POST['imagem']."' alt='".$_POST['imagem']."'>");
        print("</div>");
        print("</div>");
        print("</div>");
        print("<div class='column-xs-12 column-md-5'>");
        print("<h1>Nome:".$_POST['nome']."     ".$_POST['ano']."</h1>");
        print("<h2>".$_POST['apelido']."</h2>");
        print("<div class='description'>");
        print("<p>Gênero:".$_POST['genero']."</p>");
        print("<p>Onde Assistir: <a href=".$_POST['assistir'].">clique aqui para assistir online</a> </p><br>");
        print("<p>Descrição:".$_POST['descricao']."</p>");
        print("<p>Feito Por: <strong>".$_POST['feitoPor']."</strong>  </p>");
        print("</div>");
        print("</div>");
        if(isset($_SESSION['admin'])){
            print("<form action='aprovar.php' method='post'>"); 
                print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                print("<input type='text' hidden name='assistir' value='".$_POST['assistir']."'>");
                print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                print("<input type='text' hidden name='tipo' value='filme'>");
                            print("<button type='submit' class='custom-btn btn-12' >Aprovar</button>");
                        print("</form>");
                        print("<form action='apagarItem.php' method='post'>"); 
                        print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                        print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                        print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                        print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                        print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                        print("<input type='text' hidden name='assistir' value='".$_POST['assistir']."'>");
                        print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                        print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                        print("<input type='text' hidden name='tipo' value='filme'>");
                            print("<button type='submit' class='custom-btn btn-13' >Apagar</button>");
                        print("</form>");
                        
        }
        print("</div>");
    }
    else if($_POST['tipo'] == 'jogo'){

        print("<main>");
        print("<div class='contain'>");
        print("<div class='grid product'>");
        print("<div class='column-xs-12 column-md-7'>");
        print("<div class='product-gallery'>");
        print("<div class='product-image'>");
        print("<img class='active' src='imagens/".$_POST['imagem']."' alt='".$_POST['imagem']."'>");
        print("</div>");
        print("</div>");
        print("</div>");
        print("<div class='column-xs-12 column-md-5'>");
        print("<h1>Nome:".$_POST['nome']."     ".$_POST['ano']."</h1>");
        print("<h2>".$_POST['apelido']."</h2>");
        print("<div class='description'>");
        print("<p>Gênero:".$_POST['genero']."</p>");
        print("<p>Preço:".$_POST['preco']."</p>");
        print("<p>Descrição:".$_POST['descricao']."</p>");
        print("<p>Feito Por: <strong>".$_POST['feitoPor']."</strong>  </p>");
        print("</div>");
        print("</div>");
        if(isset($_SESSION['admin'])){
            print("<form action='aprovar.php' method='post'>"); 
                print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                print("<input type='text' hidden name='preco' value='".$_POST['preco']."'>");
                print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                print("<input type='text' hidden name='tipo' value='jogo'>");
                            print("<button type='submit' class='custom-btn btn-12' >Aprovar</button>");
                        print("</form>");
                        print("<form action='apagarItem.php' method='post'>"); 
                        print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                            print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                            print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                            print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                            print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                            print("<input type='text' hidden name='preco' value='".$_POST['preco']."'>");
                            print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                            print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                            print("<input type='text' hidden name='tipo' value='jogo'>");
                            print("<button type='submit' class='custom-btn btn-13' >Apagar</button>");
                        print("</form>");
                        
        }
        print("</div>");
    }
    else if($_POST['tipo'] == 'manga'){
        print("<main>");
        print("<div class='contain'>");
        print("<div class='grid product'>");
        print("<div class='column-xs-12 column-md-7'>");
        print("<div class='product-gallery'>");
        print("<div class='product-image'>");
        print("<img class='active' src='imagens/".$_POST['imagem']."' alt='".$_POST['imagem']."'>");
        print("</div>");
        print("</div>");
        print("</div>");
        print("<div class='column-xs-12 column-md-5'>");
        print("<h1>Nome:".$_POST['nome']."     ".$_POST['ano']."</h1>");
        print("<h2>".$_POST['apelido']."</h2>");
        print("<div class='description'>");
        print("<p>Gênero:".$_POST['genero']."</p>");
        print("<p>Capítulos:".$_POST['capitulos']."</p>");
        print("<p>Status:".$_POST['status']."</p>");
        print("<p>Onde Ler: </strong><a href=".$_POST['ler'].">leia aqui</a></p><br>");
        print("<p>Descrição:".$_POST['descricao']."</p>");
        print("<p>Feito Por: <strong>".$_POST['feitoPor']."</strong>  </p>");
        print("</div>");
        print("</div>");
        if(isset($_SESSION['admin'])){
            print("<form action='aprovar.php' method='post'>"); 
                print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                print("<input type='text' hidden name='capitulos' value='".$_POST['capitulos']."'>");
                print("<input type='text' hidden name='status' value='".$_POST['status']."'>");
                print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                print("<input type='text' hidden name='ler' value='".$_POST['ler']."'>");
                print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                print("<input type='text' hidden name='tipo' value='manga'>");
                            print("<button type='submit' class='custom-btn btn-12' >Aprovar</button>");
                        print("</form>");
                        print("<form action='apagarItem.php' method='post'>"); 
                        print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                            print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                            print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                            print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                            print("<input type='text' hidden name='capitulos' value='".$_POST['capitulos']."'>");
                            print("<input type='text' hidden name='status' value='".$_POST['status']."'>");
                            print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                            print("<input type='text' hidden name='ler' value='".$_POST['ler']."'>");
                            print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                            print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                            print("<input type='text' hidden name='tipo' value='manga'>");
                            print("<button type='submit' class='custom-btn btn-13' >Apagar</button>");
                        print("</form>");
                        
        }
        print("</div>");
    } else if($_POST['tipo'] == 'serie'){
        print("<main>");
        print("<div class='contain'>");
        print("<div class='grid product'>");
        print("<div class='column-xs-12 column-md-7'>");
        print("<div class='product-gallery'>");
        print("<div class='product-image'>");
        print("<img class='active' src='imagens/".$_POST['imagem']."' alt='".$_POST['imagem']."'>");
        print("</div>");
        print("</div>");
        print("</div>");
        print("<div class='column-xs-12 column-md-5'>");
        print("<h1>Nome:".$_POST['nome']."     ".$_POST['ano']."</h1>");
        print("<h2>".$_POST['apelido']."</h2>");
        print("<div class='description'>");
        print("<p>Gênero:".$_POST['genero']."</p>");
        print("<p>Episódios:".$_POST['ep']."</p>");
        print("<p>Status:".$_POST['status']."</p>");
        print("<p>Onde Assistir: <a href=".$_POST['assistir'].">clique aqui para assistir online</a> </p><br>");
        print("<p>Descrição:".$_POST['descricao']."</p>");
        print("<p>Feito Por: <strong>".$_POST['feitoPor']."</strong>  </p>");
        print("</div>");
        print("</div>");
        if(isset($_SESSION['admin'])){
            print("<form action='aprovar.php' method='post'>"); 
                print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                print("<input type='text' hidden name='eps' value='".$_POST['ep']."'>");
                print("<input type='text' hidden name='status' value='".$_POST['status']."'>");
                print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                print("<input type='text' hidden name='assistir' value='".$_POST['assistir']."'>");
                print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                print("<input type='text' hidden name='tipo' value='serie'>");
                            print("<button type='submit' class='custom-btn btn-12' >Aprovar</button>");
                        print("</form>");
                        print("<form action='apagarItem.php' method='post'>"); 
                        print("<input type='text' hidden name='nome' value='".$_POST['nome']."'>");
                        print("<input type='text' hidden name='apelido' value='".$_POST['apelido']."'>");
                        print("<input type='text' hidden name='ano' value='".$_POST['ano']."'>");
                        print("<input type='text' hidden name='genero' value='".$_POST['genero']."'>");
                        print("<input type='text' hidden name='eps' value='".$_POST['ep']."'>");
                        print("<input type='text' hidden name='status' value='".$_POST['status']."'>");
                        print("<input type='text' hidden name='imagem' value='".$_POST['imagem']."'>");
                        print("<input type='text' hidden name='assistir' value='".$_POST['assistir']."'>");
                        print("<input type='text' hidden name='feitoPor' value='".$_POST['feitoPor']."'>");
                        print("<input type='text' hidden name='descricao' value='".$_POST['descricao']."'>");
                        print("<input type='text' hidden name='tipo' value='serie'>");
                            print("<button type='submit' class='custom-btn btn-13' >Apagar</button>");
                        print("</form>");
                        
        }
        print("</div>");
    }
    ?>
</body>
</html>