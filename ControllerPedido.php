<?php 
require_once("cabecalho.php");
require_once("ModelPedido.php");
require_once("DaoPedido.php");

verificaUsuario();


	
	
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
			$pedido->setNome($object->customer->name);
			$pedido->setData($object->updated_at);
			$pedido->setCanalVenda($object->channel);
			$pedido->setStatus($object->status->type);

			$daoPedido = new DaoPedido($conexao);

			if($daoPedido->inserePedido($pedido)) { ?>
				<p class="text-success">O pedido <?= $pedido->getNome() ?>, <?= $pedido->getData() ?> foi adicionado.</p>
			<?php 
			} else {
				$msg = mysqli_error($conexao);
			?>
				<p class="text-danger">O pedido <?= $pedido->getNome() ?> não foi adicionado: <?= $msg?></p>
			<?php
			}
			?>
			<?php

		} //end else



 include("rodape.php"); ?>