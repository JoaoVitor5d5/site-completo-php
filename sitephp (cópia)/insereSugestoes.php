<?php
session_start();//abertura de seção em ..
ob_start();// comando para limpar a memoria , evitando erro de redirecionamento ....
//conexão com banco de dados 

include_once("conection.php");

// Validação dos Animes
if($_POST['tipo'] == 'anime'){
    $btnLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    if($btnLogin){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apl', FILTER_SANITIZE_STRING);
        
        $imagem = $_FILES['imagem'];
        $path = $_FILES['imagem']['name'];
        $extensao = pathinfo($path, PATHINFO_EXTENSION);
        $novo_nome = md5(time()) . ".$extensao";
        $diretorio = "imagens/".$novo_nome;

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $episodios = filter_input(INPUT_POST, 'eps', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $assistir = filter_input(INPUT_POST, 'assistir', FILTER_SANITIZE_STRING);
        $manga = filter_input(INPUT_POST, 'manga', FILTER_SANITIZE_STRING);
        $ler = filter_input(INPUT_POST, 'ler', FILTER_SANITIZE_STRING);
        $descricao = $_POST['descricao'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "anime";
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: sugerir.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "anime"; 
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: sugerir.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "anime";
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: sugerir.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($episodios)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($status)) AND (!empty($assistir)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM animes WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "anime";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Este anime já está Cadastrado nas sugestões! Se ainda não encontrá-lo, é por quê está em processo de análise";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugerir.php");
                exit();
            }
            else{
                move_uploaded_file($imagem['tmp_name'], $diretorio);
                $result_usuario = " INSERT INTO `animes` ( `nome`, `apelido`, `ano`, `genero`, `episodios`, `status`, `imagem`, `descricao`, `assistir`, `manga`, `ler`, `feitoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$episodios', '$status', '$novo_nome', '$descricao', '$assistir', '$manga', '$ler', '".$_SESSION['usuario']."')";
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
                    header("Location: sugerir.php");
                    exit();
                }
            }
        }
    }
    else{
        $_SESSION['tipo'] = "anime";
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: sugerir.php");
        exit();
    }
}

// Inserção de Filmes
else if($_POST['tipo'] == 'filme'){
    $btnLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    if($btnLogin){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apl', FILTER_SANITIZE_STRING);
        
        $imagem = $_FILES['imagem'];
        $path = $_FILES['imagem']['name'];
        $extensao = pathinfo($path, PATHINFO_EXTENSION);
        $novo_nome = md5(time()) . ".$extensao";
        $diretorio = "imagens/".$novo_nome;

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $assistir = filter_input(INPUT_POST, 'assistir', FILTER_SANITIZE_STRING);
        $descricao = $_POST['descricao'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "filme";
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: sugerir.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "filme";
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: sugerir.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "filme";
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: sugerir.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($assistir)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM filmes WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "filme";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Este filme já está Cadastrado nas sugestões! Se ainda não encontrá-lo, é por quê está em processo de análise";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugerir.php");
                exit();
            }
            else{
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio);
                $result_usuario = " INSERT INTO `filmes` ( `nome`, `apelido`, `ano`, `genero`, `imagem`, `descricao`, `assistir`, `feitoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$novo_nome', '$descricao', '$assistir', '".$_SESSION['usuario']."')";
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
                    header("Location: sugerir.php");
                    exit();
                }
            }
        }
    }
    else{
        $_SESSION['tipo'] = "filme";
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: sugerir.php");
        exit();
    }
}

// Validação dos Jogos
if($_POST['tipo'] == 'jogo'){
    $btnLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    if($btnLogin){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apl', FILTER_SANITIZE_STRING);
        
        $imagem = $_FILES['imagem'];
        $path = $_FILES['imagem']['name'];
        $extensao = pathinfo($path, PATHINFO_EXTENSION);
        $novo_nome = md5(time()) . ".$extensao";
        $diretorio = "imagens/".$novo_nome;

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
        $descricao = $_POST['descricao'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "jogo";
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: sugerir.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "jogo";
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: sugerir.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "jogo";
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: sugerir.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM jogos WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "jogo";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Este jogo já está Cadastrado nas sugestões! Se ainda não encontrá-lo, é por quê está em processo de análise";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugerir.php");
                exit();
            }
            else{
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio);
                $result_usuario = " INSERT INTO `jogos` ( `nome`, `apelido`, `ano`, `genero`, `imagem`, `descricao`, `preco`, `feitoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$novo_nome', '$descricao', '$preco', '".$_SESSION['usuario']."')";
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
                    header("Location: sugerir.php");
                    exit();
                }
            }
        }
    }
    else{
        $_SESSION['tipo'] = "jogo";
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: sugerir.php");
        exit();
    }
}

// Validação dos Mangás
if($_POST['tipo'] == 'manga'){
    $btnLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    if($btnLogin){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apl', FILTER_SANITIZE_STRING);
        
        $imagem = $_FILES['imagem'];
        $path = $_FILES['imagem']['name'];
        $extensao = pathinfo($path, PATHINFO_EXTENSION);
        $novo_nome = md5(time()) . ".$extensao";
        $diretorio = "imagens/".$novo_nome;

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $capitulos = filter_input(INPUT_POST, 'cap', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $ler = filter_input(INPUT_POST, 'ler', FILTER_SANITIZE_STRING);
        $descricao = $_POST['descricao'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "manga";
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: sugerir.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "manga";
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: sugerir.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "manga";
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: sugerir.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($capitulos)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($status)) AND (!empty($ler)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM mangas WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "manga";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Este mangá já está Cadastrado nas sugestões! Se ainda não encontrá-lo, é por quê está em processo de análise";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugerir.php");
                exit();
            }
            else{
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio);
                $result_usuario = " INSERT INTO `mangas` ( `nome`, `apelido`, `ano`, `genero`, `capitulos`, `status`, `imagem`, `descricao`, `ler`, `feitoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$capitulos', '$status', '$novo_nome', '$descricao', '$ler', '".$_SESSION['usuario']."')";
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
                    header("Location: sugerir.php");
                    exit();
                }
            }
        }
    }
    else{
        $_SESSION['tipo'] = "manga";
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: sugerir.php");
        exit();
    }
}

// Validação das Séries
if($_POST['tipo'] == 'serie'){
    $btnLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    if($btnLogin){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $apelido = filter_input(INPUT_POST, 'apl', FILTER_SANITIZE_STRING);
        
        $imagem = $_FILES['imagem'];
        $path = $_FILES['imagem']['name'];
        $extensao = pathinfo($path, PATHINFO_EXTENSION);
        $novo_nome = md5(time()) . ".$extensao";
        $diretorio = "imagens/".$novo_nome;

        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $episodios = filter_input(INPUT_POST, 'eps', FILTER_SANITIZE_STRING);
        $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $assistir = filter_input(INPUT_POST, 'assistir', FILTER_SANITIZE_STRING);
        $descricao = $_POST['descricao'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "serie";
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: sugerir.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "serie";
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: sugerir.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "serie";
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: sugerir.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($episodios)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($status)) AND (!empty($assistir)) AND (!empty($descricao))){

            $teste = "SELECT nome FROM series WHERE nome='$nome' ";
            $retorno = mysqli_query($conn, $teste);
            $x = mysqli_num_rows($retorno);
            if ($x > 0) {
                $_SESSION['tipo'] = "serie";
                $_SESSION['msg2'] = "<strong>Ops!!</strong> Esta série já está Cadastrado nas sugestões! Se ainda não encontrá-lo, é por quê está em processo de análise";
                //....Redirecionamneto para Pagina de Login...
                header("Location: sugerir.php");
                exit();
            }
            else{
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio);
                $result_usuario = " INSERT INTO `series` ( `nome`, `apelido`, `ano`, `genero`, `episodios`, `status`, `imagem`, `descricao`, `assistir`, `feitoPor`) VALUES ('$nome', '$apelido', '$ano', '$genero', '$episodios', '$status', '$novo_nome', '$descricao', '$assistir', '".$_SESSION['usuario']."')";
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
                    header("Location: sugerir.php");
                    exit();
                }
            }
        }
    }
    else{
        $_SESSION['tipo'] = "serie";
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: sugerir.php");
        exit();
    }
}
?>