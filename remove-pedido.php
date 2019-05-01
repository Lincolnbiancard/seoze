<?php
require_once("cabecalho.php");
require_once("DaoPedido.php");
require_once("logica-usuario.php");

$id = $_POST['id'];
$class = new DaoPedido($conexao);
$class->removePedido($id);
$_SESSION["success"] = "Pedido removido com sucesso.";
header("Location: pedido-lista.php");
die();

?>