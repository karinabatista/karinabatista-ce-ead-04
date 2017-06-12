<?php 
  require_once 'conecta_mysql.inc.php';
  require_once 'valida_sessao_cliente.inc.php'; 
  $tituloPagina = 'Estante Virtual - Pedido';
  $cssLocal     = './css/pedido.css';
  require_once 'cabecalho.inc.php'; 
	
	$pagamento    = $_POST['pag'];
	$valor_pedido = $_SESSION['total'];
  $usuario      = $_SESSION['nome_usuario_cliente'];

	$res          = $mysqli->query ("SELECT codigo FROM CLIENTES WHERE USUARIO = '$usuario'");
  $dados        = $res->fetch_assoc();
	$cod_cliente  = $dados['codigo'];	
	$data         = date("Y-m-d");	
	$query_pedido = "INSERT INTO PEDIDOS VALUES ('', $cod_cliente, '$data', $valor_pedido, $pagamento)";	
	$pedido       = 0;
	
	if ($mysqli->query($query_pedido))	{
    
		for ($i = 1; $i <= sizeof($_SESSION['itens']); $i++) {
      
			global $pedido;
			$pedido      = $mysqli->query("SELECT MAX(CODIGO) AS codigo FROM PEDIDOS")->fetch_assoc()['codigo'];
			$livro       = $_SESSION['itens'][$i]['codigo'];
			$qtde        = $_SESSION['itens'][$i]['qtde'];
			$qtde_tabela = $mysqli->query ("SELECT qtde FROM LIVROS WHERE CODIGO = $livro")->fetch_assoc()['qtde'];
			$qtde_nova   = $qtde_tabela - $qtde;
			
			$mysqli->query("INSERT INTO ITENS VALUES ('', $pedido, $livro, $qtde)");
			$mysqli->query("UPDATE LIVROS SET QTDE = $qtde_nova WHERE CODIGO = $livro");	
		}
		
		unset($_SESSION['itens']);
    unset($_SESSION['total']);
    unset($_SESSION['contador']);
	}

  echo "<h1 class='center'>Compra efetuada com sucesso!</h1>
        <h2 class='center'>Anote o número do seu pedido: <span id='numeroPedido'>$pedido</span></h2>
        <p  class='center'><a href='loja.php'>Voltar à loja</a></p>";

	include_once 'rodape.inc.php';
?>
