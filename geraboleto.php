<?php include_once("includes/head.php");
$valor=$_POST['valor'];
$clientepulsar=$_POST['cliente'];
$vencimento=$_POST['data'];
$opcao=$_POST['opcaobleto'];
$vencimentop = implode('/', array_reverse(explode('/', $vencimento)));
$url="http://ocv.net.br/gi/geraboleto-ocv.php?valor=&cliente=$clientepulsar&data=$vencimentop&valor=$valor&opcaoboleto=$opcao";
$result=file_get_contents($url);
echo $result;
?>
