<?php
session_start();//abertura de seção em ..
ob_start();// comando para limpar a memoria , evitando erro de redirecionamento ....
//conexão com banco de dados 

include_once("conection.php");

// Validação dos Animes
if($_POST['tipo'] == 'anime'){
    
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
        
        $imagem =  $_POST['imagem'];

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $episodios = filter_input(INPUT_POST, 'eps', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $assistir = filter_input(INPUT_POST, 'assistir', FILTER_SANITIZE_STRING);
        $manga = filter_input(INPUT_POST, 'manga', FILTER_SANITIZE_STRING);
        $ler = filter_input(INPUT_POST, 'ler', FILTER_SANITIZE_STRING);
        $feitoPor = filter_input(INPUT_POST, 'feitoPor', FILTER_SANITIZE_STRING);

        $descricao = $_POST['descricao'];
        
        

            $teste = "SELECT nome FROM animesOf WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "anime";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Este anime já está Cadastrado!";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugestAdmin.php");
                exit();
            }
            else{
                $result = "DELETE FROM `animes` WHERE nome='$nome'";
                $x = mysqli_query($conn, $result);
                $result_usuario = " INSERT INTO `animesOf` ( `nome`, `apelido`, `ano`, `genero`, `episodios`, `status`, `imagem`, `descricao`, `assistir`, `manga`, `ler`, `feitoPor`, `aprovadoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$episodios', '$status', '$imagem', '$descricao', '$assistir', '$manga', '$ler', '$feitoPor', '".$_SESSION['usuario']."')";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    header("Location: animes.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "anime";
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: sugestAdmin.php");
                    exit();
                }
            }
    
}

// Inserção de Filmes
else if($_POST['tipo'] == 'filme'){
    
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
        
        $imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $assistir = filter_input(INPUT_POST, 'assistir', FILTER_SANITIZE_STRING);
        $descricao = $_POST['descricao'];
        $feitoPor = filter_input(INPUT_POST, 'feitoPor', FILTER_SANITIZE_STRING);

        
        
        if((!empty($nome)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($assistir)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM filmesOf WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "filme";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Este filme já está Cadastrado!";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugestAdmin.php");
                exit();
            }
            else{
                $result = "DELETE FROM `filmes` WHERE nome='$nome'";
                $x = mysqli_query($conn, $result);
                $result_usuario = " INSERT INTO `filmesOf` ( `nome`, `apelido`, `ano`, `genero`, `imagem`, `descricao`, `assistir`, `feitoPor`, `aprovadoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$imagem', '$descricao', '$assistir','$feitoPor', '".$_SESSION['usuario']."')";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    header("Location: filmes.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "filme";
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: sugestAdmin.php");
                    exit();
                }
            }
        }
    
}

// Validação dos Jogos
else if($_POST['tipo'] == 'jogo'){
    
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
        
        $imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
        $descricao = $_POST['descricao'];
        $feitoPor = filter_input(INPUT_POST, 'feitoPor', FILTER_SANITIZE_STRING);

        
        if((!empty($nome)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM jogosOf WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "jogo";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Este jogo já está Cadastrado!";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugestAdmin.php");
                exit();
            }
            else{
                $result = "DELETE FROM `jogos` WHERE nome='$nome'";
                $x = mysqli_query($conn, $result);
                $result_usuario = " INSERT INTO `jogosOf` ( `nome`, `apelido`, `ano`, `genero`, `imagem`, `descricao`, `preco`, `feitoPor`, `aprovadoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$imagem', '$descricao', '$preco', '$feitoPor', '".$_SESSION['usuario']."')";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    header("Location: jogos.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "jogo";
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: sugestAdmin.php");
                    exit();
                }
            }
        }
    
}

// Validação dos Mangás
else if($_POST['tipo'] == 'manga'){
    
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
        
        $imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $capitulos = filter_input(INPUT_POST, 'capitulos', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $ler = filter_input(INPUT_POST, 'ler', FILTER_SANITIZE_STRING);
        $feitoPor = filter_input(INPUT_POST, 'feitoPor', FILTER_SANITIZE_STRING);

        $descricao = $_POST['descricao'];
        
        
        if((!empty($nome)) AND (!empty($capitulos)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($status)) AND (!empty($ler)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM mangasOf WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "manga";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Este mangá já está Cadastrado!";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugestAdmin.php");
                exit();
            }
            else{
                $result = "DELETE FROM `mangas` WHERE nome='$nome'";
                $x = mysqli_query($conn, $result);
                $result_usuario = " INSERT INTO `mangasOf` ( `nome`, `apelido`, `ano`, `genero`, `capitulos`, `status`, `imagem`, `descricao`, `ler`, `feitoPor`, `aprovadoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$capitulos', '$status', '$imagem', '$descricao', '$ler', '$feitoPor', '".$_SESSION['usuario']."')";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    header("Location: mangas.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "manga";
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: sugestAdmin.php");
                    exit();
                }
            }
        }
    
}

// Validação das Séries
else if($_POST['tipo'] == 'serie'){
    
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
        
        $imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $episodios = filter_input(INPUT_POST, 'eps', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $assistir = filter_input(INPUT_POST, 'assistir', FILTER_SANITIZE_STRING);
        $descricao = $_POST['descricao'];
        $feitoPor = filter_input(INPUT_POST, 'feitoPor', FILTER_SANITIZE_STRING);

        
        
        if((!empty($nome)) AND (!empty($episodios)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($status)) AND (!empty($assistir)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM seriesOf WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "serie";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Esta série já está Cadastrado!";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugestAdmin.php");
                exit();
            }
            else{
                $result = "DELETE FROM `series` WHERE nome='$nome'";
                $x = mysqli_query($conn, $result);
                $result_usuario = " INSERT INTO `seriesOf` ( `nome`, `apelido`, `ano`, `genero`, `episodios`, `status`, `imagem`, `descricao`, `assistir`, `feitoPor`, `aprovadoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$episodios', '$status', '$imagem', '$descricao', '$assistir', '$feitoPor', '".$_SESSION['usuario']."')";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    header("Location: series.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "serie";
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: sugestAdmin.php");
                    exit();
                }
            }
        }
    
}
?>