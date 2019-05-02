<?php
require_once("conecta.php");
require_once("HttpResponse.php");

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


}

