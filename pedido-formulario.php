<?php
require_once("cabecalho.php");
require_once("ModelPedido.php");

verificaUsuario();

?>	

<h1>Inserir Pedido</h1> 
<form action="adiciona-pedido.php" method="post">
	
	<table class="table">
		<?php include("pedido-formulario-base.php"); ?>
		<tr>
			<td>
				<button class="btn btn-primary" type="submit">Cadastrar</button>
			</td>
		</tr>
	</table>
</form>

<?php include("rodape.php"); ?>