<tr>
	<td>Nome Cliente</td>
	<td>
		<input class="form-control" type="text" name="nome_cliente" 
			value="<?=$pedido->getNome()?>">
	</td>
</tr>
<tr>
	<td>Preço</td>
	<td>
		<input class="form-control" type="date" name="data" 
			value="<?=$pedido->getData()?>">
	</td>
</tr>
<tr>
	<td>Canal de Venda</td>
	<td>
        <input class="form-control" type="text" name="canal_venda" 
                value="<?=$pedido->getCanalVenda()?>">
	</td>
</tr>
<tr>
	<td>Status do Pedido</td>
	<td>
    <input class="form-control" type="text" name="status" 
                value="<?=$pedido->getStatus()?>">
	</td>
</tr>
