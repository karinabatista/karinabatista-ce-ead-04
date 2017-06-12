<?php
  //Variável de controle de login
  $loginValido = FALSE;
  
  //Obtendo os dados do formulário de
  //login dinamicamente
  foreach ($_POST as $chave => $valor)
    $$chave = $valor;   
    
  //Incluindo a conexão com o banco de dados
	require_once 'conecta_mysql.inc.php';    

  //Formatando os valores para evitar SQL Injection
  $usuario = $mysqli->real_escape_string($usuario);
  $senha   = $mysqli->real_escape_string($senha);

  //Se foi criada a variável admin, indica
  //que o usuário optou por fazer login como admin.
  //Caso contrário, o login é de cliente
  $tabela = isset($admin) ? 'admins' : 'clientes';
  
  //Montando a string da consulta no formato de 
  //prepared statement (parâmetros)
  $sql = 'SELECT 1 from ' . $tabela . ' WHERE usuario = ? and senha = ?';
  
  //Preparando a consulta
  $statement = $mysqli->prepare($sql);  
  
  //Atribuindo os valores aos parâmetros - "ss" significa string string)
  $statement->bind_param("ss", $usuario, $senha);
  
  //Executando e finalizando a consulta
  $statement->execute();  
  
  //Vinculando o resultado a uma variável
  $statement->bind_result($resultado);  
  
  //Obtendo o resultado
  $statement->fetch();
    
  //O login é válido quando existe registro com o usuário e
  //senha informados
  $loginValido = ($resultado == 1);
    
  //Finalizando a consulta
  $statement->close();
  
  //Por questões de segurança, não é interessante informar o que o usuário
  //"errou" no login. Pode ter sido o usuário e/ou a senha.
  //Tratamento para login inválido
	if (!$loginValido) {  
    require_once('config.php'); 
    $tituloPagina = 'Estante Virtual - Erro';
    $cssLocal     = './css/loginFalha.css.php';  
		include_once 'cabecalho.inc.php';
		echo "<p>Usuário não encontrado ou senha incorreta!</p>";
    echo "<p><a href='index.php'>Voltar para o login</a></p>";
		include_once 'rodape.inc.php';
	}
	else { //Login válido
  
    //Criamos a sessão e atribuímos o usuário à mesma para indicar
    //que o login foi válido
    session_start();    

    //Direcionamos para a página correspondente
    if (isset($admin)) {    
      $_SESSION['nome_usuario_admin']  = $usuario;    
      header ("Location: admin.php");      
		}
		else {
      $_SESSION['nome_usuario_cliente']  = $usuario;          
      header ("Location: loja.php");      
		}
	}
?>
