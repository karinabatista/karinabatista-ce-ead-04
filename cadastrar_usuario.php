<?php 
  require_once 'conecta_mysql.inc.php';
  require_once 'valida_sessao_admin.inc.php'; 
  $tituloPagina = 'Estante Virtual - Cadastro de livros';
  $cssLocal     = './css/cadastroLivros.css';
  require_once 'cabecalho.inc.php';   
  require_once 'config_upload.inc.php';  
  
  //Obtendo os dados do formulário de
  //cadastro de livros
  foreach ($_POST as $chave => $valor)
    $$chave = $valor;   
  
 
  //Obtendo o último auto-incremento da tabela de livros para
  //cadastrarmos o próximo livro
  $result = $mysqli->query(" SELECT AUTO_INCREMENT           " .
                           " FROM  INFORMATION_SCHEMA.TABLES " .
                           " WHERE TABLE_SCHEMA = 'loja'     " .
                           " AND   TABLE_NAME   = 'livros'   ");
                     
  $dados           = $result->fetch_assoc();
  $contAtual       = $dados['AUTO_INCREMENT'];
  
   
  $extArquivo      = strrchr($nomeArquivo, '.');  
  $nomeFinal       = $contAtual . $extArquivo;    
  $imagem          = $diretorio . $nomeFinal;    
    
  //Realizando o upload do arquivo
  //O arquivo da imagem está em $arquivo (vindo do formulário)  
  
  //Verificando o parâmetro de sobrescrita
  if (!$sobrescrever && file_exists("$diretorio/$nomeFinal"))
    die("O arquivo já existe.");

  //Verificando o parâmetro de limitação de tamanho do upload
  if (($limitar_tamanho) && ($tamanho_arquivo > $tamanho_bytes))
    die("O arquivo deve ter no máximo $tamanho_bytes bytes.");

  //Verificando se a extensão é válida
  if ($limitar_ext && !in_array($extArquivo, $extensoes_validas))
    die("Extensão de arquivo inválida para upload. " . $extArquivo );

  //Realizando o upload propriamente dito
  if (!move_uploaded_file($tempArquivo, "$diretorio/$nomeFinal")) {
    
    die("Não foi possível copiar a imagem para o servidor");
  }
  else {
    
    //Realizando a inserção no banco de dados
    $sqlInsert = " INSERT INTO CLIENTES (CATEGORIA, TITULO, AUTOR, PRECO, IMAGEM, QTDE)    " . 
                  " VALUES ($categoria, '$titulo', '$autor', '$preco', '$imagem', $qtde) ";

    $mysqli->query($sqlInsert);
    
    if ($mysqli->affected_rows > 0) {
      echo "<p>Cadastro realizado com sucesso!</p>";    
      echo "<p><a href='livros.php'>Cadastrar mais livros</a></p>";
      echo "<p><a href='logout.php'><em>Logout</em></a></p>";
    }
  }
	
  include_once 'rodape.inc.php';
?>