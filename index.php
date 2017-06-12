    <!-- O arquivo de cabeçalho inclui o cabeçalho HTML,
         a tag <header> e o início de <body> -->
    <?php 
      require_once('config.php'); 
      $tituloPagina = 'Estante Virtual - Login';
      $cssLocal     = './css/login.css.php';
      require_once 'cabecalho.inc.php'; 
    ?>  
    <div class='container'>
      <div class='livros'>
        <?php
          //Incluindo a conexão com o banco de dados
          require_once('conecta_mysql.inc.php');
          
          //Vetor de campos para randomizar a listagem de livros
          $campos = array('codigo','titulo','autor','preco','qtde');
          
          //Vetor para randomizar a ordem da consulta
          $ascDesc = array(' ASC', ' DESC');
          
          //Obtendo o campo a ser ordenado de forma randômica
          $campoDaVez = rand(0, 4);
          
          //Obtendo a ordem da consulta de forma randômica
          $ascDescDaVez = rand(0,1);
          
          //Montando a consulta com 12 registros, 
          //com o campo para ordenação e a ordem de forma randômica
          $sql = 'SELECT imagem, titulo FROM LIVROS ORDER BY ' . 
                 $campos[$campoDaVez] . $ascDesc[$ascDescDaVez] .
                 ' LIMIT 12';
                 
          //Obtendo o resultado da consulta
          $result = $mysqli->query($sql);
          
          //Para cada linha obtida, montamos uma div e incluímos a 
          //imagem do livro, juntamente com os atributos title e alt
          for ($i = 0; $i < $mysqli->affected_rows; $i++) {
            $dados = $result->fetch_assoc();
            echo "<div class='livro'>
                    <img width='130' height='200' alt='" . $dados['titulo'] . "' title='" . $dados['titulo'] .
                         "' src='" . $dados['imagem'] . "'>
                  </div>";             
          }
        ?>
      </div>    
      
      <!-- Formulário de login -->
      <div class='login'>
        <form action='login.php' method='POST'>
          <fieldset>
            <legend>
              Para a sua segurança, efetue o login, por favor: 
            </legend>     
            <label for='usuario'>Usuário:
              <input type='text' 
                     name="usuario" 
                     id='usuario' 
                     required='true'
                     placeholder='Informe o seu usuário'
                     autofocus='true'>
            </label>
            <label for='senha'>Senha:             
              <input type='password' 
                     name='senha' 
                     id='senha' 
                     required='true'
                     placeholder='Informe a sua senha'>
            </label>           
            <label for='admin'>
              <input type='checkbox' name='admin' id='admin'>Administrador
            </label>
            <label>    
              <input type='submit' value='Login'>
            </label>
            <span>
              Novo usuário? Clique <a href="./cadastro.php">aqui</a> e faça o seu cadastro!
            </span>
          </fieldset>          
        </form>
      </div>
    </div>
    <!-- O rodapé inclui a finalização do HTML -->
    <?php include_once 'rodape.inc.php'; ?>