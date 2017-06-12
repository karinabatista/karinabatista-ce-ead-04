<?php 
  require_once 'conecta_mysql.inc.php';
  require_once 'valida_sessao_cliente.inc.php'; 
  $tituloPagina = 'Estante Virtual - Carrinho de compras';
  $cssLocal     = './css/carrinho.css';
  require_once 'cabecalho.inc.php';     
	
	if (isset ($_GET['limpar'])) {
		if ($_GET['limpar'] == 1)	{
      unset($_SESSION['itens']);
      unset($_SESSION['total']);
      unset($_SESSION['contador']);
		}
	}

	if (isset($_SESSION['itens']))
	{	
		echo "<table>
           <caption>Carrinho de compras</caption>
           <tr> 
            <th> &nbsp;&nbsp; Código 		     &nbsp;&nbsp; </th>
            <th> &nbsp;&nbsp; Título 		     &nbsp;&nbsp; </th>
            <th> &nbsp;&nbsp; Autor  		     &nbsp;&nbsp; </th>
            <th> &nbsp;&nbsp; Quantidade 	   &nbsp;&nbsp; </th>
            <th> &nbsp;&nbsp; Preço Unitário &nbsp;&nbsp; </th>
            <th> &nbsp;&nbsp; Subtotal		   &nbsp;&nbsp; </th>
           </tr>";
				
		$cont = $_SESSION['contador'];

		for ($i = 1; $i <= sizeof($_SESSION['itens']); $i++) {
      
			$codigo   = $_SESSION['itens']["$i"]['codigo'];
			$preco    = $_SESSION['itens']["$i"]['preco'];
			$qtde     = $_SESSION['itens']["$i"]['qtde'];
			$subtotal = number_format (($preco * $qtde), 2, ',', '.');
			$total    = number_format ($_SESSION['total'], 2, ',', '.');
		
			$res = $mysqli->query("SELECT titulo, autor FROM LIVROS WHERE CODIGO = $codigo");
		
			for ($j=0; $j < $res->num_rows; $j++) {
        
				$dados  = $res->fetch_assoc();
				$titulo = $dados['titulo'];
				$autor  = $dados['autor'];
			}
		
		echo "<td>&nbsp;&nbsp; $codigo </td>
          <td>&nbsp;&nbsp; $titulo </td>
          <td>&nbsp;&nbsp; $autor  </td> 
          <td>&nbsp;&nbsp; $qtde   </td> 
          <td>&nbsp;&nbsp; R$ " . str_replace ('.' , ',' , $preco)    . "</td> 
          <td>&nbsp;&nbsp; R$ " . str_replace ('.' , ',' , $subtotal) . "</td> 
        </tr>";			 
		}
		
		echo " </table>
           <p class='center'>
             <span id='totalPedido'>Total do pedido: </span><span id='valorPedido'>R$ $total</span>
           </p>
           <p class='center'>
             <a href='loja.php'>Continuar comprando</a>&nbsp;|&nbsp;
             <a href='carrinho.php?limpar=1'>Limpar carrinho</a>
           </p>";
			 
			 echo "<div class='center'>
               <form action='pedido.php' method='post'> 
                <label>Selecione a forma de pagamento: </label>
                  <select name='pag'> 
                    <option value='1'> Cartão de crédito </option>
                    <option value='2'> Cartão de débito  </option> 
                    <option value='3'> Boleto Bancário   </option>
                  </select>
                  &nbsp;
                  <input type='submit' value='Concluir pedido'>
               </form>
             </div>";
	}
	else	{
		echo "<h2 align='center'><font color='red' face='Verdana'>Seu carrinho está vazio!</font></h2>";
		echo "<p align='center'><a href='loja.php'> Voltar à loja </a> </p>";
	}	

	include_once 'rodape.inc.php';
?>
