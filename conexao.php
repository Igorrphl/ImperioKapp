<?php
     //Arquivo de conexao do PHP com MySQL

     //Declaracao das variaveis locais
    
	
     $hostname = "localhost";  //Endereço do Servidor Web
     $username = "root";
     $password = "";
     $databasename = "imperio_kapp";
         
	//Realizando a conexao com o MySQL
    $conn = mysqli_connect($hostname,$username,$password) or die("Não foi possível a conexão com o Banco");
        
    //Conexão com MySQL realizada com sucesso
    //Selecionando banco de dados
    mysqli_select_db($conn,$databasename) or die("Não foi possível selecionar o Banco");    
     
?>
