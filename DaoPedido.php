<?php 
require_once("ModelPedido.php");

class DaoPedido {
    
    private $conexao;

    function __construct($conexao){
        $this->conecta = new conecta();
		$this->conexao = $this->conecta->conectar();
    }

    public function listaPedidos() {
        $pedidos = array();
        $resultado = mysqli_query($this->conexao, "select nome_cliente, data, canal_venda, status from pedido");
        $pedido = new Pedido();

        while($pedido_array = mysqli_fetch_assoc($resultado)) {

            $pedido->setData($pedido_array['data']);
            $pedido->setNome($pedido_array['nome_cliente']);
            $pedido->setCanalVenda($pedido_array['canal_venda']);
            $pedido->setStatus($pedido_array['status']);
    
            array_push($pedidos, $pedido);
        }
        
        return $pedidos;
    }
    
    public function inserePedido(Pedido $pedido) {
        
        $query = "insert into pedido (nome_cliente, data, canal_venda, status) 
            values ('{$pedido->getNome()}', '{$pedido->getData()}', '{$pedido->getCanalVenda()}', 
                '{$pedido->getStatus()}')";
    
        return mysqli_query($this->conexao, $query);
    }
    
    public function alteraPedido(Pedido $pedido) {
        $query = "update pedido set  
            data = '{$pedido->getData()}',
            nome_cliente = '{$pedido->getNome()}', 
            canal_venda = '{$pedido->getCanalVenda()}', 
            status= '{$pedido->getStatus()}' 
            where id = {$pedido->getId()}";
    
        return mysqli_query($this->conexao, $query);
    }
    
    public function buscaPedido($id) {
    
        $query = "select id, nome_cliente, data, canal_venda, status from pedido where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $pedido_buscado = mysqli_fetch_assoc($resultado);
    
        $pedido = new Pedido();
        $pedido->setId($pedido_buscado['id']);
        $pedido->setNome($pedido_buscado['nome_cliente']);
        $pedido->SetData($pedido_buscado['data']);
        $pedido->SetCanalVenda($pedido_buscado['canal_venda']);
        $pedido->setStatus($pedido_buscado['status']);
    
        return $pedido;
    }
    
    public function removePedido($id) {
    
        $id = $_POST['id'];

        $query = "delete from pedido where id = {$id}";
    
        return mysqli_query($this->conexao, $query);

        
        header("Location: pedido-lista.php");

        $_SESSION["success"] = "Pedido removido com sucesso.";
        die();
    }
}