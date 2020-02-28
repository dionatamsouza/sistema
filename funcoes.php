<?php include_once("includes/bdd.php"); 



function listarcontas(){
	
  

//---------------------------System by Lauro Daniel NETSITES 2020 (45)99933 5708 --------------------------------------------------------


 // função listar contas a pagar e a receber
 
 $tipo=$_GET['tipo'];
  if (is_numeric($tipo)) {
  	
  $atual=$_SERVER["REQUEST_URI"];
    
  $selecionar = "SELECT * FROM financeiro_contas WHERE tipo='$tipo' AND status='Aberto'";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      foreach($loop as $linha) {
        $data = $linha['data'];
        $valor = $linha['valor'];
        $quem = $linha['quem'];
        $tipo = $linha['tipo'];
        
        $total+=$valor;
        
         $idconta = $linha['id'];
        
        echo "<tr>
      <th scope='row'>$data</th>
      <td>$valor</td>
      <td>$quem</td>
      <td>$tipo</td>
      <td><a href='$atual&c=$idconta'><i class='fas fa-fw fa-check'></i>Concluir</a></td>
    </tr>";
        
       
      }
    }
    
    $totalreais=number_format($total, 2, ',', '.');
    
      echo "<th scope='row'>Total: R$ $totalreais</th>";
  }
  catch(PDOException $e) {
    echo $e;
  }

	} // fim de verificar se o parameto passado é um número

}













// função atualizar status
 
 $idaalterar=$_GET['c'];
  if (is_numeric($idaalterar) AND $idaalterar!='') {
  	
  	try {
  	 global $bdd;
  	
  	$statusnovo='Concluído';
  	
  	/* Atualização de dados 
	$atlifsedit = $bdd->prepare("UPDATE financeiro_contas set status = ? WHERE id = ?");
	$atlifsedit->execute($statusnovo, $idaalterar);
	/**/
	
	$alterar = $bdd->prepare("UPDATE financeiro_contas set status = ? WHERE id = ?");
	$alterar->bindParam(1,$statusnovo );
$alterar->bindParam(2,$idaalterar);
$alterar->execute();
	
	}
  catch(PDOException $e) {
    echo $e;
  }
    
// fim de verificar se o parameto passado é um número

}





// FUNÇÃO GERAR BOLETO AVULSO

//---------------------------System by Lauro Daniel NETSITES 2020 (45)99933 5708 --------------------------------------------------------



























function listarcaixa(){
	
  

//---------------------------System by Lauro Daniel NETSITES 2020 (45)99933 5708 --------------------------------------------------------


  	
  $atual=$_SERVER["REQUEST_URI"];
    
  $selecionar = "SELECT * FROM caixa";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      foreach($loop as $linha) {
        $data = $linha['data'];
        $valor = $linha['valor'];
        $quem = $linha['quem'];
        $tipo = $linha['tipo'];
        
        if($tipo=="Entrada"){
        $totalentrada+=$valor;
				}
				elseif ($tipo=="Saída"){
					 $totalsaida+=$valor;
				}
        
         $idconta = $linha['id'];
        
        echo "<tr>
      <th scope='row'>$data</th>
      <td>$valor</td>
      <td>$quem</td>
      <td>$tipo</td>
      
    </tr>";
        
       
      }
    }
    
    $saldoperiodo=($totalentrada-$totalsaida);
    
    $totalentradareais=number_format($totalentrada, 2, ',', '.');
    
    $totalsaidareais=number_format($totalsaida, 2, ',', '.');
    
      echo "<tr><th scope='row'>Total Entrada: R$ $totalentradareais</th>";
       echo "<th scope='row'>Total Saída: R$ $totalsaidareais</th>";
       
        echo "<th scope='row'>Saldo do perído: R$ $saldoperiodo</th></tr>";
  }
  catch(PDOException $e) {
    echo $e;
  }

	

}













// função atualizar status
 
 $idaalterar=$_GET['c'];
  if (is_numeric($idaalterar) AND $idaalterar!='') {
  	
  	try {
  	 global $bdd;
  	
  	$statusnovo='Concluído';
  	
  	/* Atualização de dados 
	$atlifsedit = $bdd->prepare("UPDATE financeiro_contas set status = ? WHERE id = ?");
	$atlifsedit->execute($statusnovo, $idaalterar);
	/**/
	
	$alterar = $bdd->prepare("UPDATE financeiro_contas set status = ? WHERE id = ?");
	$alterar->bindParam(1,$statusnovo );
$alterar->bindParam(2,$idaalterar);
$alterar->execute();
	
	}
  catch(PDOException $e) {
    echo $e;
  }
}



 


?>