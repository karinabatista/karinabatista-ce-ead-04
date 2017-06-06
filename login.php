<?php
	include_once("config.php");
	@session_start();
?>
<!DOCTYPE html>
<html lang='pt'>
  <head>
	<meta charset='UTF-8'>
	<title>Estante Virtual</title>
	<link rel='stylesheet' type='text/css' href='#'>
  </head>
  <body style="background-color: #bdc3c7">
    <div id="main-wropper">
	 <center>
	  <h2> 
	    Login Form 
	  </h2>
	  <form class="myform" action="#" method="POST">
	   <label> 
	     Username: 
	   </label><br>
	   <input type="text" name="usuario" id="usuario" placeholder="Seu Usuário"><br> 
	   <label> 
	     Password: 
	   </label><br>
	  <input type="password" name="senha" id="senha" placeholder="Sua Senha"><br>  
	  <input type="submit" value="Entrar"><br>
	  <input type="button" value="Registrar"><br>
	  <input type="hidden" name="entrar" value="login">
	 </center>  
	 
	 <?php
		if(isset($_POST['entrar']) && $_POST['entrar'] == "login"){
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];
			
			if(empty($user) || empty($pass)){
				echo "Preencha todos os campos!";
			} else {
				$query = "SELECT nome, usuario, senha FROM  admins WHERE usuario = '$usuario' AND senha = '$senha'";
				$result = mysql_query($query);
				$busca = mysql_num_rows($result);
				$linha = mysql_fetch_assoc($result);
				
				if($busca > 0) {
					$_SESSION['nome'] = $linha['nome'];
					$_SESSION['usuario'] = $linha['usuario'];
					header('Location: admin.php');
					exit;
				} else {
					echo "Usuário ou senhas inválidos!";
				}
			}
		}
	 ?>
  </body>
</html>