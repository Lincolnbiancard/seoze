<?php
require_once("cabecalho.php");


/* substitua as variáveis abaixo pelas que se adequam ao seu caso */

$dbhost = 'localhost'; // endereco do servidor de banco de dados

$dbuser = 'root'; // login do banco de dados

$dbpass = ''; // senha

$dbname = 'seoze'; // nome do banco de dados a ser usado

$conecta = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$seleciona = mysqli_select_db($conecta, $dbname);

$sqlcriatabelaPedido = "CREATE TABLE pedido (id int primary key AUTO_INCREMENT,
 data date,
  nome_cliente VARCHAR(100),
   canal_venda VARCHAR(100),
    status VARCHAR(100));";

$sqlcriatabela = "CREATE TABLE usuarios (email VARCHAR(50), senha VARCHAR(100));";

$criatabela = mysqli_query($conecta, $sqlcriatabela);

$criatabelaPedido = mysqli_query($conecta, $sqlcriatabelaPedido);

$query = "INSERT INTO usuarios values ('admin@admin', '827ccb0eea8a706c4c34a16891f84e7b');";

$criarUser = mysqli_query($conecta, $query);



// inicia a conexao ao servidor de banco de dados

if(! $conecta )

{

  die('<br /><p class="text-danger">Não foi possível acessar o banco de dados: ' . mysql_error());

}

echo '<br /><p class="text-success">Conexão realizada com sucesso!';

 

// seleciona o banco de dados no qual a tabela vai ser criada

if (! $seleciona)

{

  die('<br /><p class="text-danger">Não foi possível acessar o banco de dados: ' . $dbname);

}

echo '<br /><p class="text-success">Selecionado o banco de dados: ' . $dbname;

echo '<br>Criado usuário: admin@admin <br> Senha: 12345';

 

// finalmente, cria a tabela 

if(! $criatabela )

{

  die('<br /><p class="text-danger">' . mysqli_error($conecta) . '</p>');
  

}

echo '<br /><p class="text-success">A tabela foi criada!';

if(! $criarUser )

{

  die('<br /><p class="text-danger">' . mysqli_error($conecta) . '</p>');
  

}

 

// encerra a conexão

mysqli_close($conecta);

?>

<?php include("rodape.php"); ?>
