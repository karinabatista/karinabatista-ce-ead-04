<?php 
  require_once 'conecta_mysql.inc.php';
  require_once 'valida_sessao_cliente.inc.php'; 
  $tituloPagina = 'Estante Virtual - Loja';
  $cssLocal     = './css/loja.css';
  require_once 'cabecalho.inc.php';     
  
  $usuario   = $_SESSION['nome_usuario_cliente'];  
  $sql       = 'SELECT nome FROM clientes WHERE usuario = ?';
  $statement = $mysqli->prepare($sql);    
  
  $statement->bind_param("s", $usuario);
  $statement->execute();
  $statement->bind_result($cliente);   
  $statement->fetch();  
	
	echo "<p class='titulo'>Seja bem-vindo, $cliente! Se você não for $cliente, clique 
        <a href='logout.php'>aqui</a> para sair do sistema e efetuar login com outro usuário.</p>";	
        
  $statement->close();
	
  $total = isset($_SESSION['total'])
           ? $_SESSION['total'] 
           : 0.00;
	
	echo "<p id='totalCompra'> Total de sua compra até o momento: <input type='text' readonly='true' id='valorTotal' value='R$ " . 
        number_format ($total, 2, ',', '.') . 
        "'> <a href='carrinho.php'>
        <img id='imagem' src='./imagens/carrinho.png' alt='Carrinho de compras' title='Carrinho de compras'></a></p>";

  $sql = 'SELECT codigo, titulo, autor, preco, qtde, imagem FROM livros';
  
  //Verificando filtros
  if (isset($_GET['categoria']))
    $sql .= ' WHERE categoria = ' . $_GET['categoria'];    
  
  if (isset($_POST['filtro'])) {
    $campo = $_POST['tipoPesquisa'] == 'a'
             ? 'autor'
             : 'titulo';  

    $sql .= ' WHERE ' . $campo . ' LIKE \'%' . $_POST['filtro'] . '%\'';
  }

  $result = $mysqli->query($sql);  
  $linhas = $result->num_rows;
    
  if ($linhas == 0) {
    echo '<p>Nenhum livro encontrado!</p>';
  }
  else {
    
    $sqlCategorias    = 'SELECT codigo, categoria FROM categorias';    
    $resultCategorias = $mysqli->query($sqlCategorias);  
    $linhasCategorias = $resultCategorias->num_rows;    
    
    //Listando as categorias
    echo "<h2 class='titulo'>Categorias</h2>
          <nav class='categorias'>
            <ul>";
              //TODO: Implementar categoria "todas", que elimina o filtro
            
    for ($i = 0; $i < $resultCategorias->num_rows; $i++) {
      $dados     = $resultCategorias->fetch_assoc();
      $codigo    = $dados['codigo'];
      $categoria = $dados['categoria'];
      
      echo "<li><a href='loja.php?categoria=" . 
           $dados['codigo'] .
           "'>" . $dados['categoria'] .
           "</a></li>";
    }      
            
    echo " </ul>
         </nav>";   

    echo "<div class='pesquisa'>                    
            <form action='loja.php' method='POST'>
              <select name='tipoPesquisa'>
                <option value='a'>Autor</option>
                <option value='t' selected='true'>Título</option>
              </select>
              <input type='search' name='filtro' id='filtro'>
              <input id='imagem' type='image' src='./imagens/pesquisa.png'>
            </form>
          </div>";
    
    for ($i = 0; $i < $linhas; $i++) {
       $dados  = $result->fetch_assoc();           
       $imagem = $dados['imagem'];
       $codigo = $dados['codigo'];
       $titulo = $dados['titulo'];
       $autor  = $dados['autor'];
       $preco  = $dados['preco'];
       $preco  = str_replace ('.' , ',' , "$preco");
       $qtde   = $dados['qtde'];
     
       echo "<div class='item'>
               <div class='imagem'>
                 <img src='$imagem' alt='$titulo' title='$titulo' class='livro'>
               </div>
               <ul class='dados'>
                 <li><strong>Título: </strong> $titulo            </li>
                 <li><strong>Autor: </strong> $autor              </li> 
                 <li><strong>Preço: </strong> R$ $preco           </li> 
                 <li><strong>Quantidade: </strong> $qtde unidades </li>  
                 <li>&nbsp;                                       </li> 
                 <li>  
                   <form action='comprar.php' method='POST'>
                     <input type='hidden' name='cod' value=$codigo> 
                     <input type='hidden' name='preco' value=$preco>
                     <input type='number' id='inputQtde' value='1' name='qtde'> 
                     <input type='submit' value='Comprar'>
                   </form>                 
                 </li>
               </ul>
             </div>
             <hr>";                 
    }
  }
  include_once 'rodape.inc.php';
?>
