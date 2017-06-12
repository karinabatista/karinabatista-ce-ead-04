<?php 
  require_once 'conecta_mysql.inc.php';
  require_once 'valida_sessao_admin.inc.php'; 
  $tituloPagina = 'Estante Virtual - Cadastro de livros';
  $cssLocal     = './css/livros.css';
  $jsLocal      = './js/livros.js';
  require_once 'cabecalho.inc.php';   
  
?>
  <h1>
    Cadastro de Novo Usuário
  </h1>

  <form action  = 'cadastrar_usuario.php' 
        method  = 'POST' 
        enctype = 'multipart/form-data' >
        
    <fieldset>

      <label for='titulo'>Nome: </label>
      <input type ='text' 
             id   ='nome'
             class='texto'
             required='true'
             name ='nome' >
             
      <label for='autor'>Usuario: </label>
      <input type ='text' 
             id   ='usuario'
             class='texto'
             required='true'
             name ='usuario' >   

      <label for='preco'>Senha: </label>
      <input type ='text' 
             id   ='senha'
             step = 'any'
             class='texto'
             required='true'
             name ='senha' >    

      <label  for='email'>Email: </label>
      <select id   ='email'
              required='true'
              name ='email' >  
      <label  for='endereco'>Endereço: </label>
      <select id   ='endereco'
              required='true'
              name ='endereco' >
			  
      <label  for='cidade'>Cidade: </label>
      <select id   ='cidade'
              required='true'
              name ='cidade' >  
 			  
        <?php        
          for ($i = 0; $i < $linhas; $i++) {
            $dados = $result->fetch_assoc();
            echo "<option value='" . $dados['codigo'] . "'>" . $dados['categoria'] . '</option>';
          }
        ?>                
             
      <p id='previewImg'>        
      </p>
            
      <input type='submit' value='Cadastrar'>
      
    </fieldset>    
  </form>

  <?php
    include_once 'rodape.inc.php';
  ?>

  </body>
</html>