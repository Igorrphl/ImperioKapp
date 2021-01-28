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
    	<link rel="stylesheet" href="css/style.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    	<link rel="icon" href="img/DOURADO.png">
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
        <!-- BANNER --> 
        <div class="banner container">
            <div class="title">
                <h2> A MELHOR EM ACESSÓRIOS ELETRÔNICOS </h2>
                <h3>Cadastre-se para conhecer nossos serviços.</h3>
            </div>
            <div class="buttons">
                <button class="btn btn-cadastrar bg-white radius"><a href="form_cadastrar_usuario.html"> Cadastre-se <i class="fa fa-arrow-circle-right"></i></button>
                <button class="btn btn-sobre bg-black radius"> Sobre <i class="fa fa-question-circle"></i></button>
            </div>
        </div>
        <!-- SERVICOS --> 
        <main class="servicos container">
		<?php
	//Verificando se ja existe uma sessão aberta
	
	//Mantendo a sessão/cria uma sessao
    session_start();
	
	if(!isset($_SESSION["system_control"]))
	{
	?>
	<html>
		<head>
			<title>Login</title>
		</head>
		<body>
			<form style="color: #fff;font-size: 25px; margin: 5%;text-align: -webkit-center;" action="verifica_login.php" method="POST" >
				
				<table border="0" align="center">
					<tr>
						<th style="font-weight: 700">Nickname</th><td><input type="text" name="c_nickname" size="10"></td>
					</tr><br>
					<tr>
						<th style="font-weight: 700">Senha</th><td><input type="password" name="c_senha" size="10"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input style="width: 40%;margin: 10%;height: 40px;" type="submit" name="botao" value="Entrar"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><a href="form_cadastrar_usuario.html"  style="color: #c89637; font-weight: 400"> Se nao for um imperador, se cadastre</a></td>	
					</tr>
				</table>
			</form>		
		</body>
	</html>
	<?php
	}
	else if($_SESSION["system_control"] == 1)
	{
	?>
	<script>		
		document.location.href="servicos.php";
	</script>
	<?php
	}
?>
        </main>
        <!-- NEWSLETTER -->
        <section class="newsletter container bg-black">
           <h2> Inscreva-se agora! </h2>
           <h3>  Receba novidades e muito mais </h3>
           <form>
          <input class="bg-black radius" type="email" placeholder="Seu email"> 
              <button class="bg-white radius"><a href="form_cadastrar_usuario.html"> Cadastrar </button>
           </form>
        </section>
        <!-- RODAPÉ -->
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
        
        <!-- JQUERY --> 
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>
        $(".btn-menu").click(function(){
          $(".menu").show();
        });
        $(".btn-close").click(function(){
          $(".menu").hide();
        });
        </script>      
    </body>
</html>






