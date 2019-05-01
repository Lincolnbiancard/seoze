<?php

require_once("conecta.php");

class Pedido 
{
    private $id;
    private $nome;
    private $data;
    private $canal_venda;
    private $status;

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getData(){
        return $this->data;
    }

    public function getCanalVenda(){
        return $this->canal_venda;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function setCanalVenda($canal_venda){
        $this->canal_venda = $canal_venda;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function listaPedidos($conexao) {
        $pedidos = array();
        $resultado = mysqli_query($conexao, "select id, nome_cliente, data, canal_venda, status from pedido");
    
        while($pedido_array = mysqli_fetch_assoc($resultado)) {
    
            $this->setId($pedido_array['id']);
            $this->setData($pedido_array['data']);
            $this->setNome($pedido_array['nome_cliente']);
            $this->setCanalVenda($pedido_array['canal_venda']);
            $this->setStatus($pedido_array['status']);
    
            array_push($pedidos, $this);
        }
    
        return $pedidos;
    }
    
    public function inserePedido($conexao, Pedido $pedido) {
    
        $query = "insert into pedido (nome_cliente, data, canal_venda, status) 
            values ('{$pedido->nome}', '{$pedido->data}', '{$pedido->canal_venda}', 
                '{$pedido->status}')";
    
        return mysqli_query($conexao, $query);
    }
    
    public function alteraPedido($conexao, Pedido $pedido) {
        $query = "update pedido set  
            data = '{$pedido->data}',
            nome_cliente = '{$pedido->nome}', 
            canal_venda = '{$pedido->canal_venda}', 
            status= '{$pedido->status}' 
            where id = {$pedido->id}";
    
        return mysqli_query($conexao, $query);
    }
    
    public function buscaPedido($conexao, $id) {
    
        $query = "select id, nome_cliente, data, canal_venda, status from pedido where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        $pedido_buscado = mysqli_fetch_assoc($resultado);
    
        $pedido = new Pedido();
        $pedido->setId($pedido_buscado['id']);
        $pedido->setNome($pedido_buscado['nome_cliente']);
        $pedido->SetData($pedido_buscado['data']);
        $pedido->SetCanalVenda($pedido_buscado['canal_venda']);
        $pedido->setStatus($pedido_buscado['status']);
    
        return $pedido;
    }
    
    public function removePedido($conexao, $id) {
    
        $query = "delete from pedido where id = {$id}";
    
        return mysqli_query($conexao, $query);
    }

}

