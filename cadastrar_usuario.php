<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<?php	
	//Recebendo os dados do formulario
	$nickname = $_POST["c_nickname"];
	$senha = $_POST["c_senha"];
	$nome = $_POST["c_nome"];
	$sobrenome = $_POST["c_sobrenome"];
	$data_de_nascimento = $_POST["c_data"];
	$endereco = $_POST["c_endereco"];
	$telefone = $_POST["c_telefone"];
	$celular = $_POST["c_celular"];
	$cpf = $_POST["c_cpf"];

	
	//Importando o connect
	require("conexao.php");	
	
	//Pesquisando se existe um login com a descricao já cadastrada
	$sql_pesquisar = "SELECT * FROM `tab_login` WHERE  nickname = '$nickname'";
	
	//Executando a SQL do pesquisar
	$resultado_pesquisar = mysqli_query($conn, $sql_pesquisar);
	
	//Convertendo o resultado em números
	$numero_login = mysqli_num_rows($resultado_pesquisar);
		
	if($numero_login == 1)
	{
?>		
			<script>
				alert("Login já Cadastrado!");
				document.location.href=window.history.go(-1);
			</script>
<?php
	}	
	else
	{
		//Criptografando a senha		
		$senha_criptografada = MD5($senha);
		
		//armazenando a sql em uma variavel	
		$sql = "INSERT INTO `tab_login`(`nickname`, `senha`, `nome`, `sobrenome`, `data_nascimento`, `endereco`, `telefone`, `celular`, `cpf`) VALUES ('$nickname','$senha_criptografada','$nome','$sobrenome','$data_de_nascimento','$endereco',$telefone,$celular,$cpf)";
	
		//executando a SQL que esta na variavel
		$resultado = mysqli_query($conn, $sql);
		if($resultado)
		{
?>
			<script>
				alert("Login Cadastrado com Sucesso!");		
				document.location.href="verifica_login.php";
			</script>
<?php
		}
		else
		{
?>
			<script>
				alert("Erro ao Cadastrar o Login! Entre em contato com o Adminstrador");
				document.location.href=window.history.go(-1);
			</script>
<?php
		} 	
	}
?>
	