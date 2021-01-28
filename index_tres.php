<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Impéro Kapp - Acessórios eletrônicos </title>
      <meta name="description" content="Central de Vendas de acessórios eletrônicos">
      <meta name="keywords" content="capinhas, pop socket, power bank">
      <meta name="robots" content="index, follow">
      <meta name="author" content="Império">
      <link rel="stylesheet" href="css/servicos.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      <link rel="icon" href="img/DOURADO.png">
    </head>
    <body style="text-align: center;color: white;background-color: black;">
      
        <!-- CABEÇALHO --> 
        <header class="cabecalho container">
           <a href="index.html"><h1 class="logo"> Império Kapp </h1></a>
           <button class="btn-menu bg-gradient"><i class="fa fa-bars fa-lg"></i></button>
           <nav class="menu">
               <a class="btn-close"><i class="fa fa-times"></i></a>
               <ul>
                     <li><a href="index.html">Home</a></li>
                   <li><a href="servicos.php">Nossos Serviços</a></li>
                   <li><a href="sobre.html">Quem somos</a></li>
                   <li><a href="contato.html">Contato</a></li>
                   <li><a href="sup.html">Suporte</a></li>
                   <li><a href="login.php">Login</a></li>
               </ul>
           </nav>          
        </header>
<?php
		//Fazendo a conexao com o BD
		require("conexao.php");
		
		//A variavel recebe uma instrução SQL   
		$sql = "SELECT * FROM tab_produto";
		
		//Executando a SQL ou Mostrando a tela de erro caso não aconteça a conexão
		$query = mysqli_query($conn,$sql) or die(mysqli_error());
		
		//Laço de repetição While que irá se repetir enquanto existir registros na variavel "$ln"
		while($ln = mysqli_fetch_assoc($query))
		{
			//Mostrando o valor da posição 'nome' do vetor "$ln"
						
			echo '<h2>'.$ln['nome'].'</h2> <br />';
			//Mostrando o valor da posição 'preco' do vetor "$ln"
			echo 'Preco : R$ '.number_format($ln['preco'], 2, ',', '.').'<br />';
			//Mostrando o valor da posição 'imagem' do vetor "$ln"
			echo '<img src="img/'.$ln['imagem'].'" height="300" width="300" /> <br />';
			//Mostrando o valor da posição 'nome' do vetor "$ln"
			echo '<a href="carrinho.php?acao=add&id='.$ln['id'].'">Comprar</a>';
			
			echo '<br /><hr />';
		}
		echo '<a href="logout.php">Sair</a>';
?>	 
 <!-- FINAL --> 
        <footer class="rodape container bg-gradient">
          <div class="social-icons">
            <a href="https://www.facebook.com/imperiador.kapp.3"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/KappImperio"><i class="fa fa-twitter"></i></a>
            <a href="https://www.google.com.br/"><i class="fa fa-google"></i></a>
            <a href="https://www.instagram.com/impekapp/?hl=pt-br"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-envelope"></i></a>
          </div>
          <p class="copyright">
            Império Kapp 2020. Todos os direitos reservados.
        </footer>       
        </div>
	</body> 
</html>