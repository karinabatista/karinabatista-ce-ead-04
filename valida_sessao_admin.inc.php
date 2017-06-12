<?php
  session_start();

  if(!isset($_SESSION["nome_usuario_admin"])) {
    echo "Você não efetuou o LOGIN!";
    exit;    
  }
?>
