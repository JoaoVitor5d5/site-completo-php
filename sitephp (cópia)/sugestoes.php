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
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="./style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./card.css" />  POR ALGUM MOTIVO O CÓDIGO PAROU DE RECONHECER O CSS EXTERNO...-->
    <style>
        .frame {
            width: 90%;
            margin: auto;
            text-align: center;
            display: flex; 
            /* justify-content: space-between; */
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
          background-image: url('https://c4.wallpaperflare.com/wallpaper/1020/1/213/world-of-warcraft-battle-for-azeroth-video-games-warcraft-alliance-wallpaper-thumb.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: 100%;
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
    <title>Sugestões</title>
    
</head>
<body>
    <?php 
    if(!isset($_SESSION['usuario'])){
        include "navbar.html";
    }else{
        include "navbar2.html";
    } ?>
    <div class="one">
        <br><br><br><br><br><br><h1> Sugestões </h1><br><br><br><br><br><br>
        
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
                  <?php
                  if(isset($_SESSION['admin'])){
                    print("<div class='frame'>");
                    print("<form action='sugestAdmin.php' method='post'>");
                    print("<input type='text' hidden value='anime' name='tipo'>");
                    print("<button type='submit' class='custom-btn btn-13'>VerSugestões</button>");
                    print("</form>");
                    print("</div>");
                  }else{
                    print("<div class='frame'>");
                    print("<form action='sugerir.php' method='post'>");
                    print("<input type='text' hidden value='anime' name='tipo'>");
                    print("<button type='submit' class='custom-btn btn-13'>Sugerir</button>");
                    print("</form>");
                    print("</div>");
                  }
                  ?>
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
                  <?php
                  if(isset($_SESSION['admin'])){
                    print("<div class='frame'>");
                    print("<form action='sugestAdmin.php' method='post'>");
                    print("<input type='text' hidden value='filme' name='tipo'>");
                    print("<button type='submit' class='custom-btn btn-13'>VerSugestões</button>");
                    print("</form>");
                    print("</div>");
                  }else{
                    print("<div class='frame'>");
                    print("<form action='sugerir.php' method='post'>");
                    print("<input type='text' hidden value='filme' name='tipo'>");
                    print("<button type='submit' class='custom-btn btn-13'>Sugerir</button>");
                    print("</form>");
                    print("</div>");
                  }
                  ?>
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
                <?php
                if(isset($_SESSION['admin'])){
                  print("<div class='frame'>");
                  print("<form action='sugestAdmin.php' method='post'>");
                  print("<input type='text' hidden value='manga' name='tipo'>");
                  print("<button type='submit' class='custom-btn btn-13'>VerSugestões</button>");
                  print("</form>");
                  print("</div>");
                }else{
                  print("<div class='frame'>");
                  print("<form action='sugerir.php' method='post'>");
                  print("<input type='text' hidden value='manga' name='tipo'>");
                  print("<button type='submit' class='custom-btn btn-13'>Sugerir</button>");
                  print("</form>");
                  print("</div>");
                }
                ?>
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
                  <?php
                  if(isset($_SESSION['admin'])){
                    print("<div class='frame'>");
                    print("<form action='sugestAdmin.php' method='post'>");
                    print("<input type='text' hidden value='jogo' name='tipo'>");
                    print("<button type='submit' class='custom-btn btn-13'>VerSugestões</button>");
                    print("</form>");
                    print("</div>");
                  }else{
                    print("<div class='frame'>");
                    print("<form action='sugerir.php' method='post'>");
                    print("<input type='text' hidden value='jogo' name='tipo'>");
                    print("<button type='submit' class='custom-btn btn-13'>Sugerir</button>");
                    print("</form>");
                    print("</div>");
                  }
                  ?>
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
                  <?php
                  if(isset($_SESSION['admin'])){
                    print("<div class='frame'>");
                    print("<form action='sugestAdmin.php' method='post'>");
                    print("<input type='text' hidden value='serie' name='tipo'>");
                    print("<button type='submit' class='custom-btn btn-13'>VerSugestões</button>");
                    print("</form>");
                    print("</div>");
                  }else{
                    print("<div class='frame'>");
                    print("<form action='sugerir.php' method='post'>");
                    print("<input type='text' hidden value='serie' name='tipo'>");
                    print("<button type='submit' class='custom-btn btn-13'>Sugerir</button>");
                    print("</form>");
                    print("</div>");
                  }
                  ?>
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
