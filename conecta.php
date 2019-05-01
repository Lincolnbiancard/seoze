<?php

class conecta {
    private $conexao;

    function __construct()
    {
        $this->conexao = mysqli_connect("localhost", "root", "", "seoze");
    }

    public function conectar()
    {
        return $this->conexao;
    }
}