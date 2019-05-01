<?php 
require_once("cabecalho.php");

require_once("ControllerPedido.php");



verificaUsuario();
?>

<link href="css/form.css" rel="stylesheet">
<div id="form" class="container">

<div class="cover">
        <h1 id="titulo">Cole a Url aqui para importar um pedido.</h1>
        <form  class="flex-form" action="ControllerPedido.php" method="POST">
            <label for="from">
            <i class="ion-location"></i>
            </label>
            <input type="search" id="param" name="param" placeholder="Cole aqui uma url de um json de pedido">
            <input type="submit" value="Importar">
        </form>
</div>

<?php 
include("rodape.php");  ?>