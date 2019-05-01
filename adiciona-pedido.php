<?php 
require_once("ControllerPedido.php");
require_once("cabecalho.php");
require_once("ModelPedido.php");

verificaUsuario();

$controller = new ControllerPedido($conexao, $pedido);

$controller->addPedido();