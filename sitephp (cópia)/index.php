<?php
session_start();
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
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="./style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./card.css" />  POR ALGUM MOTIVO O CÓDIGO PAROU DE RECONHECER O CSS EXTERNO...-->
    <style>
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
          height: 400px;
          
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

      .special{
        width: 95%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }


    .special .card{
        position: relative;
        cursor: pointer;
    }

    .special .card .face{
        width: 250px;
        height: 200px;
        transition: 0.5s;
    }

    .special .card .face.face1{
        position: relative;
        background: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
        transform: translateY(100px);
    }

    .special .card:hover .face.face1{
        background: #ff0057;
        transform: translateY(0);
    }

    .special .card .face.face1 .content{
        opacity: 0.2;
        transition: 0.5s;
    }

    .special .card:hover .face.face1 .content{
        opacity: 1;
    }

    .special .card .face.face1 .content img{
        max-width: 100px;
    }

    .special .card .face.face1 .content h3{
        margin: 10px 0 0;
        padding: 0;
        color: #fff;
        text-align: center;
        font-size: 1.5em;
    }

    .special .card .face.face2{
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

    .special .card:hover .face.face2{
        transform: translateY(0);
    }

    .special .card .face.face2 .content p{
        margin: 0;
        padding: 0;
        color: black;
    }

    .special .card .face.face2 .content a{
        margin: 15px 0 0;
        display:  inline-block;
        text-decoration: none;
        font-weight: 900;
        color: #333;
        padding: 5px;
        border: 1px solid #333;
    }

    .special .card .face.face2 .content a:hover{
        background: #333;
        color: #fff;
    }
    </style>
    <title>Menu</title>
    
</head>
<body>
    <?php 
    if(!isset($_SESSION['usuario'])){
        include "navbar.html";
    }else{
        include "navbar2.html";
    } ?>
    <div class="one">
        <br><br><br><br><br><br><h1> "Não quero ser um herói, heróis dividem sua bebida..." </h1><br><p class="one"> Roronoa Zoro</p><br><br><br><br><br>
        
    </div>
          <div class="containe">
            <div class="card">
              <div class="face face1">
                <div class="content">
                  <img
                    src="1.png"
                  />
                  <h3>Animes</h3>
                </div>
              </div>
              <div class="face face2">
                <div class="content">
                <p> Apesar da natureza irreal do anime, a maioria deles contém uma lição para o espectador.</p><br>
                <p> Para saber mais, navegue até temas>anime ou clique no botão abaixo!</p>
                  <a href="animes.php">Saiba Mais</a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="face face1">
                <div class="content">
                  <img src="2.png"
                  />
                  <h3>Filmes</h3>
                </div>
              </div>
              <div class="face face2">
                <div class="content">
                <p> Filmes foram feitos para emocionar, alegrar e surpreender seu público. Os filmes tem uma importância muito grande, tendo mais de 100 anos de história.</p><br>
                  <a href="filmes.php">Saiba Mais</a>
                </div>
              </div>
            </div>
          </div>
          <div class="special" >
            <div class="card">
              <div class="face face1">
                <div class="content">
                  <img
                    src="dragao.png"
                  />
                  <h3>Mangás</h3>
                </div>
              </div>
              <div class="face face2">
                <div class="content">
                <p> O mangá se diferencia das histórias em quadrinhos tradicionais pela forma de lê-lo, da direita para a esquerda, e pelos traços em preto e branco.</p><br>
                <a href="mangas.php">Saiba Mais</a>
                </div>
              </div>
            </div>
          </div>
          <div class="containe">
            <div class="card">
              <div class="face face1">
                <div class="content">
                  <img
                    src="3.png"
                  />
                  <h3>Jogos</h3>
                </div>
              </div>
              <div class="face face2">
                <div class="content">
                  <p>
                  Os jogos digitais se tornaram algo muito comum, sendo até mesmo trabalho para algumas pessoas, somente em 2022, a indústria de jogos faturou cerca de 236 bilhões de dólares.
                  </p>
                  <a href="jogos.php">Saiba Mais</a>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="face face1">
                <div class="content">
                  <img
                    src="4.png" 
                  />
                  <h3>Séries</h3>
                </div>
              </div>
              <div class="face face2">
                <div class="content">
                  <p>
                  É quase impossível viver nos tempos contemporâneos sem ser impactado, de alguma forma, pelos inúmeros seriados que existem no mercado. </p>
                  <a href="series.php">Saiba Mais</a>
                </div>
              </div>
            </div>
          </div>
          <div class="two">
            <h2> Quer ser um editor do site ou está com alguma dúvida? </h2>
            <h3> Entre em contato conosco: <h3>
            <p> Contatos: </p>
            <p> Email: xxxxx@xxxx </p>
            <p> Telefone: (99) 99999-9999 </p>
          </div>
</body>
</html>
<!-- <div class="two">
        <a href="animes.php"><h1> Animes </h1></a><br>
        <p> Anime ou animê (como é dito no Brasil) surgiu no Japão e caracteriza as animações.  A sua popularidade reside, em grande parte, nas fortes emoções mostradas na tela, com várias expressões faciais como olhos grandes e vibrantes, muitas onomatopéias, entre outros. </p><br>
        <p> Apesar da natureza irreal do anime, a maioria deles contém uma lição para o espectador ao explorar questões temáticas centrais da existência humana. Os animes geralmente enfatizam valores e morais específicos que não encontramos em outras mídias.</p><br>
         <p> Por isso, nosso site se dedica em trazer várias indicações, das quais você pode ajudar, se conhece algum anime que não esteja cadastrado, envie uma indicação para que possamos analisar e publicar para os outros usuários também conhecerem, para saber mais, navegue até temas>anime ou clique no título!</p>
    </div>
    <div class="two">
        <a href="jogos.php"><h1> Jogos </h1></a><br>
        <p> Com uma indústria em constante crescimento, os jogos digitais se tornaram algo muito comum, sendo até mesmo trabalho para algumas pessoas, somente em 2022, a indústria de jogos faturou cerca de 236 bilhões de dólares, o que representa um crescimento de quase 10% em comparação com o ano anterior.</p><br>
        <p> Assim, estamos criando uma lista com vários jogos, sendo indicações vindas tanto dos Administradores do site quanto do público!</p><br>
        <p> Para saber mais, navegue até "Jogos" ou clique no título</p>
        <img src="jogos.png" width="82%" heitgh="auto">
    </div>
    <div class="two">
        <a href="filmes.php"><h1> Filmes </h1></a><br>
        <p> Uma das principais ações do cinema é a capacidade de fazer o espectador se emocionar e refletir. Isso usado para tratar de questões importantes que envolvem nossa sociedade, resulta em uma ferramenta muito poderosa para atingir as pessoas de maneira diferente.</p><br>
        <p> Desde 1895, filmes foram feitos para emocionar, alegrar e surpreender seu público. Muitos deles mostram personagens com características bem marcadas. Características que podem ter um leve tom cultural. Seja nas gírias, ou no sotaque, seja no modo de viver ou através de fatos relembrados de acordo com seu lugar de origem. Os filmes tem uma importância cultural muito grande, pois é através deles que descobrimos os costumes de terras longínquas, as quais nunca visitamos.</p><br>
        <p> Para saber mais, navegue até "Filmes" ou clique no título</p>
        <br>
    </div>
    <div class="two">
        <a href="séries.php"><h1> Séries </h1></a><br>
        <p> É quase impossível viver nos tempos contemporâneos sem ser impactado, de alguma forma, pelos inúmeros seriados que existem no mercado. Séries existem há muito tempo, claro, porém, com o advento dos streamings, principalmente da Netflix, elas realmente ganharam muita atenção nos últimos anos.</p><br>
        <p> Com isso, as séries fomentam interesses que não se restringem ao envolvimento de comunidades de fãs com obras específicas, mas também indicam a formação de um repertório histórico em torno desses programas.</p><br>
        <p> Para saber mais, navegue até "Séries" ou clique no título</p>
        <img src="" width="82%" heitgh="auto">
    </div> -->