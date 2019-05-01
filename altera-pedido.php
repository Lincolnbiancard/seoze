<?php
require_once("cabecalho.php");
require_once("ModelPedido.php");

$pedido = new Pedido();
$pedido->setId($_POST['id']);
$pedido->setNome($_POST['nome_cliente']);
$pedido->setData($_POST['data']);
$pedido->setCanalVenda($_POST['canal_venda']);
$pedido->setStatus($_POST['status']);

if($pedido->alteraPedido($conexao, $pedido)) { ?>
	<p class="text-success">O pedido <?= $pedido->getNome() ?>, <?= $pedido->getData() ?> foi alterado.</p>
<?php 
} else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O pedido <?= $pedido->getNome() ?> não foi alterado: <?= $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>