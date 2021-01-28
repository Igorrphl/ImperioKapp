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
    <body style="text-align: center;color: #c89637;;background-color: black;font-weight: 800;">
      
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
    //Fazendo a Conexão com o Banco
	require("conexao.php");
	
	//Iniciando a Sessão
	session_start();
	
	//o foreach é um laço de repetição que funciona de acordo com o número
	//de registros que existirem no carrinho
    foreach($_SESSION['carrinho'] as $id => $qtd)
	{
		//A variavel recebe uma instrução sql
        $sql   = "SELECT * FROM tab_produto WHERE id= '$id'";
		//Executa a SQL
		$qr    = mysqli_query($conn,$sql) or die(mysqli_error());
        //Cria um vetor do registro encontrado
		$ln    = mysqli_fetch_assoc($qr);
		//Armazenando o nome em uma variável					  
		$nome  = $ln['nome'];
		
		//Imprime os atributos do filme(ID) selecionado											
		echo "Item: $nome"; 
		echo"</p>";
		echo "Quantidade: $qtd";
		echo"</p>";
		echo "<p>------------------<p>";
								  
		$sqlpedido  ="INSERT INTO `pedidos`(`id_produtos`,`quantidade`) VALUES ($id, $qtd)";
		$resultado = mysqli_query($conn,$sqlpedido);    
	}
?>
<!-- FINAL --> 
        <footer class="rodape container bg-gradient">
          <div class="social-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-envelope"></i></a>
          </div>
          <p class="copyright">
            Império Kapp 2020. Todos os direitos reservados.
        </footer>       
        </div>
	</body> 
</html>