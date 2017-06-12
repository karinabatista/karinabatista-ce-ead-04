<?php 
	include 'valida_sessao_cliente.inc.php';	
	foreach ($_POST as $chave => $valor)
    $$chave = $valor;

	if (!isset($_SESSION['contador']))
		$_SESSION['contador'] = 0;			

	$cont = $_SESSION['contador'];

	if (isset ($cod)) {
    
		$preco  = str_replace (',' , '.' , $preco);
		$existe = FALSE;
		
		if (isset ($_SESSION['itens'][1])) {		
			for ($i=1; $i <= sizeof($_SESSION['itens']); $i++) {
				if ($_SESSION['itens']["$i"]['codigo'] == $cod) {
					$existe = TRUE;
					$_SESSION['itens']["$i"]['qtde']  += $qtde;
				}
			}
		}		
		
		if (!$existe) {
      
			$_SESSION['contador']++;
			$cont = $_SESSION['contador'];
			$_SESSION['itens']["$cont"]['codigo'] = $cod;		
			$_SESSION['itens']["$cont"]['preco']  = $preco;
			$_SESSION['itens']["$cont"]['qtde']   = $qtde;
		}
	}
	
	$_SESSION['total'] = 0;
	
	for ($i=1; $i <= $cont; $i++)	
		$_SESSION['total'] +=  ($_SESSION['itens']["$i"]["preco"] * $_SESSION['itens']["$i"]["qtde"]);	
	
	header ("Location: loja.php");	
 ?>
