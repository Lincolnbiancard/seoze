<?php
require_once("cabecalho.php");
require_once("ModelPedido.php");

$id = $_GET['id'];
$class = new Pedido();
$pedido = $class->buscaPedido($conexao, $id);

?>

<h1>Detalhes do Pedido: <?=$pedido->getId()?></h1> 
<form action="altera-pedido.php" method="post">
	<input type="hidden" name="id" value="<?=$pedido->getId()?>">
	<table class="table">
		<?php include("pedido-formulario-base.php"); ?>
		<tr>
			<td>
				<button class="btn btn-primary" type="submit">Atualizar</button>
			</td>
		</tr>
	</table>
</form>

<?php include("rodape.php"); ?>