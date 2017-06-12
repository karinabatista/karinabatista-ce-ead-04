<?php 
  require_once 'conecta_mysql.inc.php';
  require_once 'valida_sessao_admin.inc.php'; 
  $tituloPagina = 'Estante Virtual - Cadastro de livros';
  $cssLocal     = './css/cadastroLivros.css';
  require_once 'cabecalho.inc.php';   
?>
    <h1>
      Administração do site
    </h1>
    <p>
      <a href='livros.php'>Cadastro de livros</a>
    </p>    
    <p>
      <a href='logout.php'>Logout</a>
    </p>
    <?php include 'rodape.inc.php'; ?>
  </body>
</html>
