<?php 
require_once("cabecalho.php");
require_once("ModelPedido.php");

verificaUsuario();

class ControllerPedido {
	
	function addPedido(){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		$request = $_POST['param']; //url digitada 

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $request);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_HEADER, 0);

		$output = curl_exec($ch);

		if($output === false) {
			echo '<p class="text-danger">Erro, URL inválida ou incompleta <?= $msg?></p>';
		}else {
			curl_close($ch);

		$object = json_decode($output);

			$pedido = new Pedido();
			$pedido->nome = $object->customer->name;
			$pedido->data = $object->updated_at;
			$pedido->canal_venda = $object->channel;
			$pedido->status = $object->status->type;

			if($pedido->inserePedido($conexao, $pedido)) { ?>
				<p class="text-success">O pedido <?= $pedido->nome ?>, <?= $pedido->data ?> foi adicionado.</p>
			<?php 
			} else {
				$msg = mysqli_error($conexao);
			?>
				<p class="text-danger">O pedido <?= $pedido->nome ?> não foi adicionado: <?= $msg?></p>
			<?php
			}
			?>
			<?php

		} //end else
	}//end function 
} //end class

 include("rodape.php"); ?>