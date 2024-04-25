<?php
  
$servidor="localhost";  	// Endereço do servidor mySQL
$udb="root";		    		// Usuário do banco de dados (fornecido pelo provedor)
$senha="usbw";				// Senha de acesso ao mySQL
$bdados="sistema_vendas";			// Nome do banco de dados que se deseja acessar

  
//set_time_limit(60);
  
// Criando a conexão com a base de dados
$sistemas_vendas = mysqli_connect($servidor,$udb,$senha,$bdados);

// Define a acentuação/tabela de caracteres na origem dos dados
mysqli_query($sistema_vendas,"SET NAMES utf8");

// Caso ocorra um erro, emite uma mensagem de falha
if (mysqli_connect_errno()) {
  echo "Falha na conexão com o mySQL: " . mysqli_connect_error();
    }
    
 // FIM

?>