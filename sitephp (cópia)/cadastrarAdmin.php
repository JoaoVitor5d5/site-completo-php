<?php
session_start();//abertura de seção em ..
ob_start();// comando para limpar a memoria , evitando erro de redirecionamento ....
//conexão com banco de dados 

include_once("conection.php");
//....Validação do botão ......

$btnLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
if($btnLogin){
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$nick = filter_input(INPUT_POST, 'nick', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senh = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING);
	$senha = password_hash($senh, PASSWORD_DEFAULT);
	
	if((!empty($nome)) AND (!empty($nick)) AND (!empty($email)) AND (!empty($senh)) AND (!empty($idade))){
		$teste = "SELECT email FROM usuarios WHERE email='$email' ";
		$retorno = mysqli_query($conn, $teste);
		$x = mysqli_num_rows($retorno);
		// $x = 0;
		if ($x > 0) {
			$_SESSION['msg'] = "<strong>Ops!!</strong> Este email já está sendo usado!";
			//....Redirecionamneto para Pagina de Login...
			header("Location: cadastro.php");
			exit();
		}
		else{
			// consulta de user no banco../..Pesquisar o usuário no DB......
			$result_usuario = " INSERT INTO admins (nome, nickname, email, senha, idade, admin) VALUES ('$nome','$nick','$email','$senha','$idade','s')";
			//....Limitar a pesquisa a um unico usuario....
			// $result_usuario = " INSERT INTO admins (nome, nickname, email, senha, idade, admin) VALUES ('$nome','$nick','$email','$senha','$idade', 's')";

			if(mysqli_query($conn, $result_usuario)){

					header("Location: perfil.php");
					exit();
			}
		}
	}else{
		$_SESSION['msg'] = "<strong>Ops!!</strong> Preencha todos os campos!";
		//....Redirecionamneto para Pagina de Login...
		header("Location: cadastroAdmin.php");
		exit();
	}
}else{
	$_SESSION['msg'] = "<strong>Ops!!</strong>Algo de errado não está certo, tente novamente...";
	//....Redirecionamneto para Pagina de Login...
	header("Location: cadastroAdmin.php");
	exit();
}
?>