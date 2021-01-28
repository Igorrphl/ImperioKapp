<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
		//Recebendo os valores
		$senha = $_POST['c_senha'];
		$nickname = $_POST['c_nickname'];
		
		//Conectando com o banco para fazer a consulta do usuario
		require('conexao.php');
		
		//Criptografando a senha
		$senha2 = md5($senha);
			
		//SQL de pesquisa de usuario e senha
		$sql_pesquisa ="SELECT * FROM `tab_login` WHERE `nickname` = '$nickname' AND `senha` = '$senha2'";
		$resultado_usuario = mysqli_query($conn,$sql_pesquisa);
		
		//tranformando em numero o resultado da pesquisa
		$numero_pesquisa = mysqli_num_rows($resultado_usuario);
		//mostrando na tela o numero de resultado de usuarios
		if($numero_pesquisa != 1)
		{
			echo "Dados Inválidos!";
		}
		else
		{
			//Login e a senha estão corretos		
				
			//Criando o vetor do usuario
			$vetor_login = mysqli_fetch_array($resultado_usuario);
				
			//Inicializando uma sessao
			session_start();
				
			//Criando uma variavel de controle do sistema
				
			//Registrando esta variavel no sistema
			$_SESSION["system_control"] = 1;
				
			//Registrando esta variavel no sistema
			$_SESSION["cod_login"] = $vetor_login['id'];
							
			//Atribuindo o valor de controle em uma variavel
			$status = $_SESSION["system_control"];
				
			//Redirecionando o usuario			
			if($status == 1)
			{			                                   
				//Redirecionando para a Tela de Logado
			?>
				<script language='JavaScript'>
					document.location.href="index_tres.php";
				</script>
			<?php
			}
			else
			{
				//Redirecionando para a Tela de Não Logado
			?>
				<script language='JavaScript'>
					document.location.href="nao_logado.php";
				</script>				
			<?php	
			}				
		}		 	
    ?>
