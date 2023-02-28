<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="icon.png">
        <style>
            body {
                text-align: center;
                margin-left: 10px;
                margin-right: 10px;
            }
            div.one {
                background-image: url('https://images.alphacoders.com/789/thumbbig-789452.webp');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100%;
                
                text-align: center;
                margin-top: 0;
                border-radius: 10px;
                height: 500px;
                
            }
            div.two {
                text-align: left;
                width: 30%;
            }
        </style>
        <title>Sobre Nós</title>
        
    </head>
    <body>
        <?php 
        if(!isset($_SESSION['usuario'])){
            include "navbar.html";
        }else{
            include "navbar2.html";
        } ?>
        <div class="one"></div>
        <h1> Quem somos? </h1>
        <p> Apesar de ser um site criado por somente uma pessoa, consideramos todos os usuários como membros regentes, visto que todos podem mandar opiniões, indicações e textos.</p>
        <br><br>
        <h1> Qual o nosso objetivo? </h1>
        <p> Todos no site tem o mesmo objetivo, trazer diversão e informação, eu, como desenvolvedor do site, já cansei de todas as vezes que queria alguma informação sobre uma série, filme, jogo e outros, precisava buscar em vários sites diferentes, por isso criei o site ALL FOR ONE, onde usuários poderiam compartilhar suas experiências, um site feito por usuários para os usuários. </p>
        <br><br><br>
        <div class="two">
            <h2> Quer ser um editor do site ou está com alguma dúvida? </h2>
            <h3> Entre em contato conosco: <h3>
            <p> Contatos: </p>
            <p> Email: xxxxx@xxxx </p>
            <p> Telefone: (99) 99999-9999 </p>
          </div>
    </body>
</html>