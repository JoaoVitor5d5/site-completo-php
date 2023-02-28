<?php
session_start();//abertura de seção em ..
ob_start();// comando para limpar a memoria , evitando erro de redirecionamento ....
//conexão com banco de dados 

include_once("conection.php");
if(isset($_POST['aprovado'])){
    // Validação dos Animes
    if($_POST['tipo'] == 'anime'){
        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $result = "DELETE FROM `animesOf` WHERE nome='$nome'";
                    
            if(mysqli_query($conn, $result)){
                $_SESSION['msg2'] = "";
                header("Location: animes.php");
                    exit();
                }
                    
        
    }

    // Inserção de Filmes
    else if($_POST['tipo'] == 'filme'){
        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                
                $result = "DELETE FROM `filmesOf` WHERE nome='$nome'";
                    
                if(mysqli_query($conn, $result)){
                    $_SESSION['msg2'] = "";
                    header("Location: filmes.php");
                    exit();
                }
        
    }

    // Validação dos Jogos
    if($_POST['tipo'] == 'jogo'){
        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            
            $result = "DELETE FROM `jogosOf` WHERE nome='$nome'";
            if(mysqli_query($conn, $result)){
                $_SESSION['msg2'] = "";
                header("Location: jogos.php");
                exit();
            }
                    
        
    }

    // Validação dos Mangás
    if($_POST['tipo'] == 'manga'){
        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        
            $result = "DELETE FROM `mangasOf` WHERE nome='$nome'";
                    
            if(mysqli_query($conn, $result)){
                $_SESSION['msg2'] = "";
                header("Location: mangas.php");
                exit();
            }
                    
        
    }

    // Validação das Séries
    if($_POST['tipo'] == 'serie'){
        
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            
        $result = "DELETE FROM `seriesOf` WHERE nome='$nome'";
                    
        if(mysqli_query($conn, $result)){
            $_SESSION['msg2'] = "";
            header("Location: series.php");
            exit();
        }
                    
        
    }
}
else{
    // Validação dos Animes
    if($_POST['tipo'] == 'anime'){
        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $result = "DELETE FROM `animes` WHERE nome='$nome'";
                    
            if(mysqli_query($conn, $result)){
                $_SESSION['msg2'] = "";
                header("Location: animes.php");
                    exit();
                }
                    
        
    }

    // Inserção de Filmes
    else if($_POST['tipo'] == 'filme'){
        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                
                $result = "DELETE FROM `filmes` WHERE nome='$nome'";
                    
                if(mysqli_query($conn, $result)){
                    $_SESSION['msg2'] = "";
                    header("Location: filmes.php");
                    exit();
                }
        
    }

    // Validação dos Jogos
    if($_POST['tipo'] == 'jogo'){
        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            
            $result = "DELETE FROM `jogos` WHERE nome='$nome'";
            if(mysqli_query($conn, $result)){
                $_SESSION['msg2'] = "";
                header("Location: jogos.php");
                exit();
            }
                    
        
    }

    // Validação dos Mangás
    if($_POST['tipo'] == 'manga'){
        
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        
            $result = "DELETE FROM `mangas` WHERE nome='$nome'";
                    
            if(mysqli_query($conn, $result)){
                $_SESSION['msg2'] = "";
                header("Location: mangas.php");
                exit();
            }
                    
        
    }

    // Validação das Séries
    if($_POST['tipo'] == 'serie'){
        
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            
        $result = "DELETE FROM `series` WHERE nome='$nome'";
                    
        if(mysqli_query($conn, $result)){
            $_SESSION['msg2'] = "";
            header("Location: series.php");
            exit();
        }
                    
        
    }
}
?>