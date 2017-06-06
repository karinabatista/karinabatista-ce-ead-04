<?php 
	$bd = 'loja';
	$server = 'localhost';
	$user = 'root';
	$password = 'root';
	
	$connect = mysql_connect($server, $user, $password) or print (mysql_error());
	mysql_select_db($bd, $connect) or print (mysql_query());
	
	if (mysql_connect ($server, $user, $password)){
		echo "Erro ao conectar ao banco de dados!";
	} else {
		
	}
?>