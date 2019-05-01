<?php
require_once("cabecalho.php");
require_once("ModelPedido.php");
require_once("logica-usuario.php");

$id = $_POST['id'];
$class = new Pedido();
$class->removePedido($conexao, $id);
$_SESSION["success"] = "Pedido removido com sucesso.";
header("Location: pedido-lista.php");
die();

?>