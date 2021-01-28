<?php
	//Mantendo a Sessão
	session_start();
	//Finalizando a sessão
	session_destroy(); 
	//session_unset — Libera todas as variáveis de sessão
    session_unset(); 
	//redirecionamento da página após limpar a sessão
	echo "<script>alert('Você limpou o carrinho!');top.location.href='servicos.php';</script>";        
?>