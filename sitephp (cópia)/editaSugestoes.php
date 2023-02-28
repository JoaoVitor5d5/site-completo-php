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
        $id = $_POST['id'];
        
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "anime";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['ep'] = $episodios;
                $_SESSION['genero'] = $genero;
                $_SESSION['status'] = $status;
                $_SESSION['assistir'] = $assistir;
                $_SESSION['manga'] = $manga;
                $_SESSION['ler'] = $ler;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: editarItem.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "anime";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['ep'] = $episodios;
                $_SESSION['genero'] = $genero;
                $_SESSION['status'] = $status;
                $_SESSION['assistir'] = $assistir;
                $_SESSION['manga'] = $manga;
                $_SESSION['ler'] = $ler;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: editarItem.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "anime";
            $_SESSION['nome'] = $nome;
            $_SESSION['apl'] = $apelido;
            $_SESSION['ano'] = $ano;
            $_SESSION['ep'] = $episodios;
            $_SESSION['genero'] = $genero;
            $_SESSION['status'] = $status;
            $_SESSION['assistir'] = $assistir;
            $_SESSION['manga'] = $manga;
            $_SESSION['ler'] = $ler;
            $_SESSION['descricao'] = $descricao;
            $_SESSION['id'] = $id;
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: editarItem.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($episodios)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($status)) AND (!empty($assistir)) AND (!empty($descricao))){
            
                move_uploaded_file($imagem['tmp_name'], $diretorio);
                $result_usuario = " UPDATE `animesOf` SET `nome` = '$nome', `apelido` = '$apelido', `ano` = '$ano', `genero` = '$genero', `episodios` = '$episodios', `status` = '$status', `imagem` = '$novo_nome', `descricao` = '$descricao', `assistir` = '$assistir', `manga` = '$manga', `ler` = '$ler' WHERE `animesOf`.`id` = '$id'";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    $_SESSION['tipo'] = "";
                    $_SESSION['nome'] = "";
                    $_SESSION['apl'] = "";
                    $_SESSION['ano'] = "";
                    $_SESSION['ep'] = "";
                    $_SESSION['genero'] = "";
                    $_SESSION['status'] = "";
                    $_SESSION['assistir'] = "";
                    $_SESSION['manga'] = "";
                    $_SESSION['ler'] = "";
                    $_SESSION['descricao'] = "";
                    $_SESSION['id'] = "";
                    header("Location: animes.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "anime";
                    $_SESSION['nome'] = $nome;
                    $_SESSION['apl'] = $apelido;
                    $_SESSION['ano'] = $ano;
                    $_SESSION['ep'] = $episodios;
                    $_SESSION['genero'] = $genero;
                    $_SESSION['status'] = $status;
                    $_SESSION['assistir'] = $assistir;
                    $_SESSION['manga'] = $manga;
                    $_SESSION['ler'] = $ler;
                    $_SESSION['descricao'] = $descricao;
                    $_SESSION['id'] = $id;
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: editarItem.php");
                    exit();
                }
        }
    }
    else{
        $_SESSION['tipo'] = "anime";
        $_SESSION['nome'] = $nome;
        $_SESSION['apl'] = $apelido;
        $_SESSION['ano'] = $ano;
        $_SESSION['ep'] = $episodios;
        $_SESSION['genero'] = $genero;
        $_SESSION['status'] = $status;
        $_SESSION['assistir'] = $assistir;
        $_SESSION['manga'] = $manga;
        $_SESSION['ler'] = $ler;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['id'] = $id;
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: editarItem.php");
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
        $id = $_POST['id'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "filme";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['genero'] = $genero;
                $_SESSION['assistir'] = $assistir;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: editarItem.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "filme";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['genero'] = $genero;
                $_SESSION['assistir'] = $assistir;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: editarItem.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "filme";
            $_SESSION['nome'] = $nome;
            $_SESSION['apl'] = $apelido;
            $_SESSION['ano'] = $ano;
            $_SESSION['genero'] = $genero;
            $_SESSION['assistir'] = $assistir;
            $_SESSION['descricao'] = $descricao;
            $_SESSION['id'] = $id;
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: editarItem.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($assistir)) AND (!empty($descricao))){

                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio);
                $result_usuario = " UPDATE `filmesOf` SET `nome` = '$nome', `apelido` = '$apelido', `ano` = '$ano', `genero` = '$genero', `imagem` = '$novo_nome', `descricao` = '$descricao', `assistir` = '$assistir' WHERE `filmesOf`.`id` = '$id'";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['tipo'] = "";
                    $_SESSION['nome'] = "";
                    $_SESSION['apl'] = "";
                    $_SESSION['ano'] = "";
                    $_SESSION['genero'] = "";
                    $_SESSION['assistir'] = "";
                    $_SESSION['descricao'] = "";
                    $_SESSION['id'] = "";
                    $_SESSION['msg2'] = "";
                    header("Location: filmes.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "filme";
                    $_SESSION['nome'] = $nome;
                    $_SESSION['apl'] = $apelido;
                    $_SESSION['ano'] = $ano;
                    $_SESSION['genero'] = $genero;
                    $_SESSION['assistir'] = $assistir;
                    $_SESSION['descricao'] = $descricao;
                    $_SESSION['id'] = $id;
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: editarItem.php");
                    exit();
                }

        }
    }
    else{
        $_SESSION['tipo'] = "filme";
        $_SESSION['nome'] = $nome;
        $_SESSION['apl'] = $apelido;
        $_SESSION['ano'] = $ano;
        $_SESSION['genero'] = $genero;
        $_SESSION['assistir'] = $assistir;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['id'] = $id;
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: editarItem.php");
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
        $id = $_POST['id'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "jogo";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['genero'] = $genero;
                $_SESSION['preco'] = $preco;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: editarItem.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "jogo";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['genero'] = $genero;
                $_SESSION['preco'] = $preco;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: editarItem.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "jogo";
            $_SESSION['nome'] = $nome;
            $_SESSION['apl'] = $apelido;
            $_SESSION['ano'] = $ano;
            $_SESSION['genero'] = $genero;
            $_SESSION['preco'] = $preco;
            $_SESSION['descricao'] = $descricao;
            $_SESSION['id'] = $id;
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: editarItem.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($preco)) AND (!empty($descricao))){

            
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio);
                $result_usuario = " UPDATE `jogosOf` SET `nome` = '$nome', `apelido` = '$apelido', `ano` = '$ano', `genero` = '$genero', `imagem` = '$novo_nome', `descricao` = '$descricao', `preco` = '$preco' WHERE `jogosOf`.`id` = '$id'";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    $_SESSION['tipo'] = "jogo";
                    $_SESSION['nome'] = "";
                    $_SESSION['apl'] = "";
                    $_SESSION['ano'] = "";
                    $_SESSION['genero'] = "";
                    $_SESSION['preco'] = "";
                    $_SESSION['descricao'] = "";
                    $_SESSION['id'] = "";
                    header("Location: jogos.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "jogo";
                    $_SESSION['nome'] = $nome;
                    $_SESSION['apl'] = $apelido;
                    $_SESSION['ano'] = $ano;
                    $_SESSION['genero'] = $genero;
                    $_SESSION['preco'] = $preco;
                    $_SESSION['descricao'] = $descricao;
                    $_SESSION['id'] = $id;
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: editarItem.php");
                    exit();
                }
            
        }
    }
    else{
        $_SESSION['tipo'] = "jogo";
        $_SESSION['nome'] = $nome;
        $_SESSION['apl'] = $apelido;
        $_SESSION['ano'] = $ano;
        $_SESSION['genero'] = $genero;
        $_SESSION['preco'] = $preco;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['id'] = $id;
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: editarItem.php");
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
        $id = $_POST['id'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "manga";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['genero'] = $genero;
                $_SESSION['status'] = $status;
                $_SESSION['cap'] = $capitulos;
                $_SESSION['ler'] = $ler;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: editarItem.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "manga";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['genero'] = $genero;
                $_SESSION['status'] = $status;
                $_SESSION['cap'] = $capitulos;
                $_SESSION['ler'] = $ler;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: editarItem.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "manga";
            $_SESSION['nome'] = $nome;
            $_SESSION['apl'] = $apelido;
            $_SESSION['ano'] = $ano;
            $_SESSION['genero'] = $genero;
            $_SESSION['status'] = $status;
            $_SESSION['cap'] = $capitulos;
            $_SESSION['ler'] = $ler;
            $_SESSION['descricao'] = $descricao;
            $_SESSION['id'] = $id;
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: editarItem.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($capitulos)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($status)) AND (!empty($ler)) AND (!empty($descricao))){

                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio);
                $result_usuario = " UPDATE `mangasOf` SET `nome` = '$nome', `apelido` = '$apelido', `ano` = '$ano', `genero` = '$genero', `capitulos` = '$capitulos', `status` = '$status', `imagem` = '$novo_nome', `descricao` = '$descricao', `ler` = '$ler' WHERE `mangasOf`.`id` = '$id'";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    $_SESSION['tipo'] = "";
                    $_SESSION['nome'] = "";
                    $_SESSION['apl'] = "";
                    $_SESSION['ano'] = "";
                    $_SESSION['genero'] = "";
                    $_SESSION['status'] = "";
                    $_SESSION['cap'] = "";
                    $_SESSION['ler'] = "";
                    $_SESSION['descricao'] = "";
                    $_SESSION['id'] = "";
                    header("Location: mangas.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "manga";
                    $_SESSION['nome'] = $nome;
                    $_SESSION['apl'] = $apelido;
                    $_SESSION['ano'] = $ano;
                    $_SESSION['genero'] = $genero;
                    $_SESSION['status'] = $status;
                    $_SESSION['cap'] = $capitulos;
                    $_SESSION['ler'] = $ler;
                    $_SESSION['descricao'] = $descricao;
                    $_SESSION['id'] = $id;
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: editarItem.php");
                    exit();
                }
            
        }
    }
    else{
        $_SESSION['tipo'] = "manga";
        $_SESSION['nome'] = $nome;
        $_SESSION['apl'] = $apelido;
        $_SESSION['ano'] = $ano;
        $_SESSION['genero'] = $genero;
        $_SESSION['status'] = $status;
        $_SESSION['cap'] = $capitulos;
        $_SESSION['ler'] = $ler;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['id'] = $id;
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: editarItem.php");
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
        $id = $_POST['id'];
        
        if (!empty($imagem["name"])) {
            $tamanhoMax = 10000000;

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
                $_SESSION['tipo'] = "serie";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['ep'] = $episodios;
                $_SESSION['genero'] = $genero;
                $_SESSION['status'] = $status;
                $_SESSION['assistir'] = $assistir;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "Isso não é uma imagem.";
                header("Location: editarItem.php");
                exit();
            }
            if($imagem["size"] > $tamanhoMax) {
                $_SESSION['tipo'] = "serie";
                $_SESSION['nome'] = $nome;
                $_SESSION['apl'] = $apelido;
                $_SESSION['ano'] = $ano;
                $_SESSION['ep'] = $episodios;
                $_SESSION['genero'] = $genero;
                $_SESSION['status'] = $status;
                $_SESSION['assistir'] = $assistir;
                $_SESSION['descricao'] = $descricao;
                $_SESSION['id'] = $id;
                $_SESSION['msg2'] = "A imagem deve ter no máximo ".$tamanhoMax." bytes";
                header("Location: editarItem.php");
                exit();
            } 
        }
        else{
            $_SESSION['tipo'] = "serie";
            $_SESSION['nome'] = $nome;
            $_SESSION['apl'] = $apelido;
            $_SESSION['ano'] = $ano;
            $_SESSION['ep'] = $episodios;
            $_SESSION['genero'] = $genero;
            $_SESSION['status'] = $status;
            $_SESSION['assistir'] = $assistir;
            $_SESSION['descricao'] = $descricao;
            $_SESSION['id'] = $id;
            $_SESSION['msg2'] = "Deve ter uma imagem.";
                header("Location: editarItem.php");
                exit();
        }
        if((!empty($nome)) AND (!empty($episodios)) AND (!empty($ano)) AND (!empty($genero)) AND (!empty($status)) AND (!empty($assistir)) AND (!empty($descricao))){

                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio);
                $result_usuario = " UPDATE `seriesOf` SET `nome` = '$nome', `apelido` = '$apelido', `ano` = '$ano', `genero` = '$genero', `episodios` = '$episodios', `status` = '$status', `imagem` = '$novo_nome', `descricao` = '$descricao', `assistir` = '$assistir' WHERE `seriesOf`.`id` = '$id'";
                // $a = mysqli_query($conn, $result_usuario);
                if(mysqli_query($conn, $result_usuario)){
                    $_SESSION['msg2'] = "";
                    $_SESSION['tipo'] = "";
                    $_SESSION['nome'] = "";
                    $_SESSION['apl'] = "";
                    $_SESSION['ano'] = "";
                    $_SESSION['ep'] = "";
                    $_SESSION['genero'] = "";
                    $_SESSION['status'] = "";
                    $_SESSION['assistir'] = "";
                    $_SESSION['descricao'] = "";
                    $_SESSION['id'] = "";
                    header("Location: series.php");
                        exit();
                }
                else{
                    $_SESSION['tipo'] = "serie";
                    $_SESSION['nome'] = $nome;
                    $_SESSION['apl'] = $apelido;
                    $_SESSION['ano'] = $ano;
                    $_SESSION['ep'] = $episodios;
                    $_SESSION['genero'] = $genero;
                    $_SESSION['status'] = $status;
                    $_SESSION['assistir'] = $assistir;
                    $_SESSION['descricao'] = $descricao;
                    $_SESSION['id'] = $id;
                    $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
                    //....Redirecionamneto para Pagina de Login...
                    header("Location: editarItem.php");
                    exit();
                }
            
        }
    }
    else{
        $_SESSION['tipo'] = "serie";
        $_SESSION['nome'] = $nome;
        $_SESSION['apl'] = $apelido;
        $_SESSION['ano'] = $ano;
        $_SESSION['ep'] = $episodios;
        $_SESSION['genero'] = $genero;
        $_SESSION['status'] = $status;
        $_SESSION['assistir'] = $assistir;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['id'] = $id;
        $_SESSION['msg2'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
        //....Redirecionamneto para Pagina de Login...
        header("Location: editarItem.php");
        exit();
    }
}
?>