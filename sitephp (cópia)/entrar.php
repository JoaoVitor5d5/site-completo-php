<?php
session_start();//abertura de seção em ..
ob_start();// comando para limpar a memoria , evitando erro de redirecionamento ....
//conexão com banco de dados 

include_once("conection.php");
//....Validação do botão ......

$btnLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	

	if((!empty($usuario)) AND (!empty($senha))){
		// consulta de user no banco../..Pesquisar o usuário no DB......
		$result_usuari = " SELECT id, nome, email, senha, nickname, idade FROM admins WHERE email = '$usuario' LIMIT 1";
		//....Limitar a pesquisa a um unico usuario....
		$resultado_usuari = mysqli_query($conn, $result_usuari);

		if($resultado_usuari){
			$row_usuario = mysqli_fetch_assoc($resultado_usuari);
			
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
                $_SESSION['nickname'] = $row_usuario['nickname'];
                $_SESSION['idade'] = $row_usuario['idade'];
				//....Redirecionamneto para pagina inicial...
                $_SESSION['usuario'] = $row_usuario['nickname'];
				$_SESSION['admin'] = 'sim';
				header("Location: index.php");
				exit();
			
			}else if((!empty($usuario)) AND (!empty($senha))){
				// consulta de user no banco../..Pesquisar o usuário no DB......
				$result_usuario = " SELECT id, nome, email, senha, nickname, idade FROM usuarios WHERE email = '$usuario' LIMIT 1";
				//....Limitar a pesquisa a um unico usuario....
				$resultado_usuario = mysqli_query($conn, $result_usuario);
			
			if($resultado_usuario){
					$row_usuario = mysqli_fetch_assoc($resultado_usuario);
					
					if(password_verify($senha, $row_usuario['senha'])){
						$_SESSION['id'] = $row_usuario['id'];
						$_SESSION['nome'] = $row_usuario['nome'];
						$_SESSION['email'] = $row_usuario['email'];
						$_SESSION['nickname'] = $row_usuario['nickname'];
						$_SESSION['idade'] = $row_usuario['idade'];
						//....Redirecionamneto para pagina inicial...
						$_SESSION['usuario'] = $row_usuario['nickname'];
						
						header("Location: index.php");
						exit();
					
					}else{
						//....Variavel global....

						$_SESSION['msg'] = "<strong>Ops!!</strong> Algo de errado não está certo, tente novamente";
						//....Redirecionamneto para Pagina de Login...
						header("Location: login.php");
						exit();
					}
				}
			}else{
				//....Variavel global....
				$_SESSION['msg'] = "<strong>Ops!!</strong> Preencha todos os campos";
				//....Redirecionamneto para Pagina de Login...
				header("Location: login.php");
				exit();
			}
		}
	}else{
		//....Variavel global....
		$_SESSION['msg'] = "<strong>Ops!!</strong> Preencha todos os campos";
		//....Redirecionamneto para Pagina de Login...
		header("Location: login.php");
		exit();
	}
}else{
		//....Variavel global....
	$_SESSION['msg'] = "<strong>Ops!!</strong> ERRO, TENTE NOVAMENTE!";
	//....Redirecionamneto para Pagina de Login...
	header("Location: login.php");
	exit();
}
?>