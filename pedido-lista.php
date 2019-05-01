<?php
	require_once("cabecalho.php");
	require_once("DaoPedido.php");
	require_once("logica-usuario.php");

	verificaUsuario();
?>

<table class="table table-striped table-bordered">
	<tr>
		<td><strong>Nome</strong></td>
		<td><strong>Data</strong></td>
		<td><strong>Canal Venda</strong></td>
		<td><strong>Status</strong></td>
		<td><strong>Exibir Detalhes</strong></td>
		<td><strong>Deletar Pedido</strong></td>
	</tr>
	<?php
	
	$class = new DaoPedido($conexao);
	$pedidos = $class->listaPedidos();

	foreach($pedidos as $pedido) :
	?>
		<tr>
			<td><?= $pedido->getNome() ?></td>
			<td><?= $pedido->getData() ?></td>
			<td><?= $pedido->getCanalVenda() ?></td>
			<td><?= $pedido->getStatus() ?></td>
			<td>
				<a class="btn btn-primary" 
					href="pedido-altera-formulario.php?id=<?=$pedido->getId()?>">
					Visualizar
				</a>
			</td>
			<td>
				<form action="<?= $class->removePedido($id) ?>" method="post">
					<input type="hidden" name="id" value="<?=$pedido->getId()?>">
					<button class="btn btn-danger">Deletar</button>
				</form>
			</td>
		</tr>
	<?php
	endforeach
	?>	
</table>

<?php include("rodape.php"); ?>