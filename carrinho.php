<?php
	//Iniciando a Sessão
    session_start();
     
	//Verificando se o carrinho já foi iniciado 
    if(!isset($_SESSION['carrinho']))
	{
		//Caso o carrinho não estiver iniciado, o mesmo será criado
		$_SESSION['carrinho'] = array();
    }
       
    //Verifica se existe algo no atributo acao do metodo get     
    if(isset($_GET['acao']))
	{          
		//Verifica se o atributo 'acao' tem o valor 'add', ou melhor dizendo, é o método de adicionar no carrinho um produto. 
		if($_GET['acao'] == 'add')
		{
			//intval tranforma o valor em int
			//a Variavel $id recebe o id do produto via método GET
			$id = intval($_GET['id']);
			//Verifica se existe algum produto no carrinho já com este ID
			if(!isset($_SESSION['carrinho'][$id]))
			{
				//Não tem produto com este ID, então é adicionado na sessão
				//o Carrinho com o ID do produto e o valor 1
				$_SESSION['carrinho'][$id] = 1;
				echo "<script>top.location.href='carrinho.php';</script>"; 
				
			}
			else
			{
				//O Carrinho já tem o produto cadastrado, então ele vai
				//adicionar mais 1 produto.
				$_SESSION['carrinho'][$id] += 1;	
				echo "<script>top.location.href='carrinho.php';</script>"; 
			}
			
		}
		//Verifica se o atributo 'acao' tem o valor 'del', ou melhor dizendo, é o método que remove um produto especifico do carrinho .	  
		//Remover produto do carrinho
		if($_GET['acao'] == 'del')
		{
			//intval tranforma o valor em int e armazena em uma variavel
			$id = intval($_GET['id']);
			//Verifica se existe o produto no carrinho
			if(isset($_SESSION['carrinho'][$id]))
			{
				//unset apaga a variável que contem o ID do produto que quero remover
				unset($_SESSION['carrinho'][$id]);
				echo "<script>top.location.href='carrinho.php';</script>"; 
			}
		}     
    }
       
       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Impéro Kapp - Acessórios eletrônicos </title>
    	<meta name="description" content="Central de Vendas de acessórios eletrônicos">
    	<meta name="keywords" content="capinhas, pop socket, power bank">
    	<meta name="robots" content="index, follow">
    	<meta name="author" content="Império">
    	<link rel="stylesheet" href="css/ctt.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    	<link rel="icon" href="img/DOURADO.png">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	</head>	 
	<body>
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
		<table border=1>
			<p>
			<b style="color: #fff;font-size: 17px;font-weight: 500;margin: 30%">Carrinho de Compras</b>			
				<tr style="color: #fff;">
					<th width="244" style="font-weight: 500;">Produto</th>
					<th width="79" style="font-weight: 500;">Quantidade</th>
					<th width="89" style="font-weight: 500;">Preco</th>
					<th width="100" style="font-weight: 500;">SubTotal</th>
					<th width="64" style="font-weight: 500;">Remover</th>
				</tr>
   
            <form action="print.php" method="post">  
                     
            <tr>
				<td colspan="4" style="color: #fff;"><a href="servicos.php" style="color: #c49437;font-weight: 700;">Continuar Comprando</a></td>
				<td style="color: #fff";><a href="limpar.php" style="color: #c49437;font-weight: 700;">Limpar Carrinho</a></td>
	
      
    
               <?php
					//Contando o número de registros na sessão "carrinho"
                    if(count($_SESSION['carrinho']) == 0)
					{
						//Não há produtos no carrinho
						echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                    }
					else
					{
						//Fazendo a conexao com o banco
                        require("conexao.php");
						
						//Criando a variavel total e atribuindo o valor 0
						$total = 0;
						
						//foreach é um laço de repetição que irá repetir uma vez
						//para cada registro
                        foreach($_SESSION['carrinho'] as $id => $qtd)
						{
							//Atribuindo uma SQL para a variavel $sql
                            $sql   = "SELECT *  FROM tab_produto WHERE id= '$id'";
                            //Executando a SQL
							$qr    = mysqli_query($conn,$sql) or die(mysqli_error());
                            //Criando um vetor com os registros encontrados
							$ln    = mysqli_fetch_assoc($qr);
                            
							//Atribuindo os valores do vetor para a variavel
                            $nome  = $ln['nome'];
                            $preco = number_format($ln['preco'], 2, ',', '.');
                            $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                               
                            $total += $ln['preco'] * $qtd;
                            
                           echo '<tr>       
                                 <td style="color:#fff;font-weight: 500;">'.$nome.'</td>
                                 <td><input style="color:#fff;font-weight: 500;" type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" disabled/></td>
                                 <td style="color:#fff;font-weight: 500;">R$ '.$preco.'</td>                                
								<td style="color:#fff;font-weight: 500;">R$ '.$sub.'</td>
                                 <td><a href="?acao=del&id='.$id.'" style="color: #c49437;font-weight: 700;">Remover</a></td>
                              </tr>';
                        }
                           $total = number_format($total, 2, ',', '.');
                           echo '<tr style="color:#fff;font-weight: 500;"> 
                                    <td colspan="4">Total</td>
                                    <td>R$ '.$total.'</td>
                              </tr>';
                     }
					if (isset($ln)) 
					{
?>
						<input type='hidden' name='c_codigo' value=<?php echo "'$ln[nome]'"; ?>>
						<p>
						<input type="submit" value="Cadastrar Pedido" style="font-size: 17px;color: #c49437;font-weight: 900;">
<?php
					}
?>				

     </body>
        </form>
</table>
  <!-- FINAL --> 
        <footer class="rodape container bg-gradient">
          <div class="social-icons">
           <a href="https://www.facebook.com/imperiador.kapp.3"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/KappImperio"><i class="fa fa-twitter"></i></a>
            <a href="https://www.google.com.br/"><i class="fa fa-google"></i></a>
            <a href="https://www.instagram.com/impekapp/?hl=pt-br"><i class="fa fa-instagram"></i></a>
            <a href="https://linktr.ee/Imperiokapp"><i class="fa fa-envelope"></i></a>
          </div>
          <p class="copyright">
            Império Kapp 2020. Todos os direitos reservados.
        </footer>       
        </div>
</html>
