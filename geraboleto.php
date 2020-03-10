<?php //include_once("header.php");
$valor=$_POST['valor'];
$clientepulsar=$_POST['cliente'];
$vencimento=$_POST['data'];
$vencimentop = implode('/', array_reverse(explode('/', $vencimento)));
$url="http://ocv.net.br/gi/geraboleto-ocv.php?valor=&cliente=$clientepulsar&data=$vencimentop&valor=$valor";
$result=file_get_contents($url);
echo $result;

?>