<?php 
include_once("includes/head.php");
$valor=$_POST['valor'];
$clientepulsar=$_POST['cliente'];
$vencimento=$_POST['data'];
$descricao=$_POST['descricao'];
$opcao=$_POST['opcaobleto'];
$vencimentop = implode('/', array_reverse(explode('/', $vencimento)));
$url="https://ocv.net.br/gi/geraboleto-ocv.php?valor=&cliente=$clientepulsar&data=$vencimentop&valor=$valor&opcaoboleto=$opcao&descricao=$descricao";
$result=file_get_contents($url);
echo $result;


?>
