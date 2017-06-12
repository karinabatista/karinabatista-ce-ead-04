<?php 
  require_once 'conecta_mysql.inc.php';
  require_once 'valida_sessao_admin.inc.php'; 
  $tituloPagina = 'Estante Virtual - Cadastro de livros';
  $cssLocal     = './css/livros.css';
  $jsLocal      = './js/livros.js';
  require_once 'cabecalho.inc.php';   
  
  //Montando consulta de categorias
  $sql    = 'SELECT codigo, categoria FROM CATEGORIAS ORDER BY categoria';  
  $result = $mysqli->query($sql);
  $linhas = $mysqli->affected_rows;
?>
  <h1>
    Cadastro de Livros
  </h1>

  <form action  = 'cadastrar_livro.php' 
        method  = 'POST' 
        enctype = 'multipart/form-data' >
        
    <fieldset>

      <label for='titulo'>Título: </label>
      <input type ='text' 
             id   ='titulo'
             class='texto'
             required='true'
             name ='titulo' >
             
      <label for='autor'>Autor: </label>
      <input type ='text' 
             id   ='autor'
             class='texto'
             required='true'
             name ='autor' >   

      <label for='preco'>Preço: </label>
      <input type ='number' 
             id   ='preco'
             step = 'any'
             class='numero'
             required='true'
             name ='preco' >    

      <label  for='categoria'>Categoria: </label>
      <select id   ='categoria'
              required='true'
              name ='categoria' >   
        <?php        
          for ($i = 0; $i < $linhas; $i++) {
            $dados = $result->fetch_assoc();
            echo "<option value='" . $dados['codigo'] . "'>" . $dados['categoria'] . '</option>';
          }
        ?>            
       </select>          
       
      <label for='qtde'>Quantidade: </label>
      <input type  ='number' 
             id    ='qtde'
             class ='numero'
             min   = '1'
             value ='50'
             required='true'
             name  ='qtde' >        

      <label for='arquivo'>Imagem: </label>     
      <input type = 'file' 
             id   = 'arquivo'
             required='true'
             name = 'arquivo'>           
             
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