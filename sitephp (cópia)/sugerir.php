<?php
session_start();
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
    </style>
    <title>Sugerir</title>
    
</head>
<body>
    <?php 
    if(!isset($_SESSION['usuario'])){
        include "navbar.html";
    }else{
        include "navbar2.html";
    } 
    ?>
    <?php
    if($_SESSION['tipo'] == 'anime' || $_POST['tipo'] == 'anime'){
        if(isset($_SESSION['msg2'])){
            print("<p>".$_SESSION['msg2']."<p>");
        }
        include "formAnime.html";

    }else if($_SESSION['tipo'] == 'filme' || $_POST['tipo'] == 'filme'){
        if(isset($_SESSION['msg2'])){
            print("<p>".$_SESSION['msg2']."<p>");
        }
        include "formFilme.html";

    }else if($_SESSION['tipo'] == 'jogo' || $_POST['tipo'] == 'jogo'){
        if(isset($_SESSION['msg2'])){
            print("<p>".$_SESSION['msg2']."<p>");
        }
        include "formJogo.html";

    }else if($_SESSION['tipo'] == 'manga' || $_POST['tipo'] == 'manga'){
        if(isset($_SESSION['msg2'])){
            print("<p>".$_SESSION['msg2']."<p>");
        }
        include "formManga.html";

    }else if($_SESSION['tipo'] == 'serie' || $_POST['tipo'] == 'serie'){
        if(isset($_SESSION['msg2'])){
            print("<p>".$_SESSION['msg2']."<p>");
        }
        include "formSerie.html";

    }
    ?>
</body>
</html>