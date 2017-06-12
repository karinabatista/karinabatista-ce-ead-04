<?php
  $servidor    = 'localhost';
  $banco       = 'loja';
  $usuario_bd  = 'root';
  $senha_bd    = '';
  $mysqli      = new mysqli($servidor, $usuario_bd, $senha_bd, $banco); 
  
  //Verificando se houve erro na conexão
  if ($mysqli->connect_error) {
    die('Erro na conexão. Verifique usuário/senha/nome do banco - Erro: ' . $mysqli->connect_errno . ') ' 
         . $mysqli->connect_error);
  }
 
  //Definindo a codificação UTF-8 como padrão
  $mysqli->set_charset('utf8');  
?>