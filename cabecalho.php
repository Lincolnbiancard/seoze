<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require_once("mostra-alerta.php"); 
	require_once("logica-usuario.php");
?>

<html>
<head>
	<meta charset="utf-8">
	<title>SeoZe</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/loja.css" rel="stylesheet">
</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">SeoZÉ</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="importa-pedido.php">Importar Pedido</a></li>
					<li><a href="pedido-lista.php">Pedidos</a></li>
					<!-- btn logout -->
					<?php
						if(usuarioEstaLogado() == true){
							// Usuário tá logado 
							echo '<li><a href="logout.php">Sair</a></li>';
						} 
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="principal">
			<?php  mostraAlerta("success"); ?>
			<?php mostraAlerta("danger"); ?>