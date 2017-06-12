<?php 
  header("Content-type: text/css; charset: UTF-8"); 
  require_once('../config.php'); 
?>

.container {
  margin : 0 auto;
  width  : 90%;
  <?php mostrarBordas(); ?>
}

#boasVindas {  
  text-align : center;
}

ul {
  list-style-type : none;  
}

li {
  margin-bottom : 1%;  
}

.livros {  
  margin : auto;
  width  : 90%;
  <?php mostrarBordas(); ?>
}

.livro { 
  float   : left;
  margin  : 2%;  
  <?php mostrarBordas(); ?>
}

.login {  
  clear  : both;
  margin : auto;
  width  : 90%;  
  <?php mostrarBordas(); ?>
}

fieldset {
  margin : auto;  
  width  : 50%;
  border : none;
  <?php mostrarBordas(); ?>
}

label {
  display : block;
  margin  : 1%;
  width   : 30%;
  <?php mostrarBordas(); ?>
}
