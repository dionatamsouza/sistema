<?php include_once("includes/bdd.php"); 




//---------------------------System by Lauro Daniel NETSITES 2020 (45)99933 5708 --------------------------------------------------------



ini_set('post_max_size', '30000M');
ini_set('upload_max_filesize', '30000M');
ini_set("memory_limit", -1 );
ini_set("max_execution_time", -1 );



// Conversor de datas



function _date($format="r", $timestamp=false, $timezone=false)
{
    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
}
 
/////////////////////////


function is_utf8( $string ){
	return preg_match( '%^~(?:
		 [\x09\x0A\x0D\x20-\x7E]
		| [\xC2-\xDF][\x80-\xBF]
		| \xE0[\xA0-\xBF][\x80-\xBF]
		| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}
		| \xED[\x80-\x9F][\x80-\xBF]
		| \xF0[\x90-\xBF][\x80-\xBF]{2}
		| [\xF1-\xF3][\x80-\xBF]{3}
		| \xF4[\x80-\x8F][\x80-\xBF]{2}
		)*$%xs',
		$string
	);
}


function removeAccents( $string ){
	return preg_replace(
		array(
			//Maiúsculos
			'/\xc3[\x80-\x85]/',
			'/\xc3\x87/',
			'/\xc3[\x88-\x8b]/',
			'/\xc3[\x8c-\x8f]/',
			'/\xc3([\x92-\x96]|\x98)/',
			'/\xc3[\x99-\x9c]/',

			//Minúsculos
			'/\xc3[\xa0-\xa5]/',
			'/\xc3\xa7/',
			'/\xc3[\xa8-\xab]/',
			'/\xc3[\xac-\xaf]/',
			'/\xc3([\xb2-\xb6]|\xb8)/',
			'/\xc3[\xb9-\xbc]/',
		),
		str_split( 'ACEIOUaceiou' , 1 ),
		is_utf8( $string ) ? $string : utf8_encode( $string )
	);
}







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
  
  $datainicio=$_POST['datainicio'];
  
  
  
  
   $datafinal=$_POST['datafinal'];
   
    $datainicio = implode('/', array_reverse(explode('/', $datainicio)));
    
         $datafinal=implode('/', array_reverse(explode('/', $datafinal)));
    
  $selecionar = "SELECT * FROM caixa WHERE data BETWEEN '$datainicio' AND '$datafinal'";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      foreach($loop as $linha) {
        $data = $linha['data'];
        $databrasil=date("d/m/Y", strtotime($data));
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
      <th scope='row'>$databrasil</th>
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



	   

### Função para redimensionar boleto ####

function Redimensionarjpeg($imagemred, $name, $largura, $pasta){
            $img = imagecreatefromjpeg($imagemred);
            $x   = imagesx($img);
            $y   = imagesy($img);
            $altura = ($largura * $y)/$x;
            $nova = imagecreatetruecolor($largura, $altura);
            imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
            imagejpeg($nova, "$name",100);
            imagedestroy($img);
            imagedestroy($nova);
            return $name;
      }



 


?>

<script>
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000") return false;
     
  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
   
  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}
var strCPF = "12345678909";
alert(TestaCPF(strCPF));
</script>