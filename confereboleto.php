<?php header('Access-Control-Allow-Origin: *');  
include_once("includes/head.php");


$urlbuscar="http://ocv.net.br/gi/pesquisa-boleto-ocv.php?idboletopulsar=338097";
$conteudo=file_get_contents($urlbuscar);
$controle="18";
 	try {
  	 global $bdd;
  		 global $conteudo;
  	
  	/* Atualização de dados 
	$atlifsedit = $bdd->prepare("UPDATE financeiro_contas set status = ? WHERE id = ?");
	$atlifsedit->execute($statusnovo, $idaalterar);
	/**/
	
	$alterar = $bdd->prepare("UPDATE financeiro_boletos set status = ? WHERE id = ?");
	$alterar->bindParam(1,$conteudo);
$alterar->bindParam(2,$controle);
$alterar->execute();
	
	}
  catch(PDOException $e) {
    echo $e;
  }
