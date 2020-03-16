<?php include_once("includes/head.php"); 


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
    
  $selecionar = "SELECT * FROM financeiro_contas WHERE tipo='$tipo' AND status='Aberto' AND imobiliaria_creci='$lgnimobiliaria_creci'";
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




function selectImoveis () {
	 global $lgnimobiliaria_creci;
  	
	
	 $selecionar = "SELECT * FROM imoveis WHERE imobiliaria_creci='$lgnimobiliaria_creci' ORDER BY id ASC";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      
      echo "<select class='form-control form-control-user select' name='imovel'>	<option value=''>Escolha o Imóvel</option>";
      
      
      
      foreach($loop as $linha) {
        $idimovel = $linha['id'];
        $nomeimovel=$linha['titulo'];
        
        echo "<option value='$idimovel'>$idimovel > $nomeimovel</option>";
        
}
}
echo "</select>";
}

catch(PDOException $e) {
    echo $e;
  }
		
}









$valor = $valor;


function buscaimovel($idimovelabuscar) {
	 global $lgnimobiliaria_creci;
  	
	
	 $selecionar = "SELECT * FROM imoveis WHERE id='$idimovelabuscar' ORDER BY id ASC";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      
          
      
      
      foreach($loop as $linha) {
        $idimovel = $linha['id'];
        $nomeimovel=$linha['titulo'];
        
        $valor=$linha['valor'];
       
       $nomeimovel;
               echo "$valor ++++";
               define("valorimovel", "$valor");
}
}
echo "lll $valor ll";
}

catch(PDOException $e) {
    echo $e;
  }
	echo "lll $valor ll";	
}




echo "fff $valor ff";
















function selectCliente () {
	 global $lgnimobiliaria_creci;
  	
	$selecionar = "SELECT * FROM financeiro_clientes WHERE imobiliaria_creci='$lgnimobiliaria_creci' ORDER BY nome ASC";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      
      echo "<select class='form-control form-control-user select' name='cliente'>	<option value=''>Escolha o Cliente</option>";
      
      
      
      foreach($loop as $linha) {
        $idcliente = $linha['id'];
        $nome=$linha['nome'];
        
        echo "<option value='$idcliente'>$nome</option>";
        
}
}
echo "</select>";
}

catch(PDOException $e) {
    echo $e;
  }
		
}











function buscaCliente ($idclienteabuscar) {
	 global $lgnimobiliaria_creci;
  	
	$selecionar = "SELECT * FROM financeiro_clientes WHERE id='$idclienteabuscar' ORDER BY nome ASC";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      
                  
      foreach($loop as $linha) {
        $idcliente = $linha['id'];
        $nomeclientebuscou=$linha['nome'];
        $emailcliente=$linha['email'];
        $documento=$linha['documento'];
        define("nomecliente", "$nomeclientebuscou");
        
}
}
 return $nomeclientebuscou;
}

catch(PDOException $e) {
    echo $e;
  }
  
  
   $clicli=$nomeclientebuscou;
		
}











 
 
 function base_boleto(){
 	$codigobanco = "001";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);


$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");

$agencia = formata_numero($dadosboleto["agencia"],4,0);

$conta = formata_numero($dadosboleto["conta"],8,0);

$carteira = $dadosboleto["carteira"];

$agencia_codigo = $agencia."-". modulo_11($agencia) ." / ". $conta ."-". modulo_11($conta);
$livre_zeros='000000';


if ($dadosboleto["formatacao_convenio"] == "8") {
	$convenio = formata_numero($dadosboleto["convenio"],8,0,"convenio");
	
	$nossonumero = formata_numero($dadosboleto["nosso_numero"],9,0);
	$dv=modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira");
	$linha="$codigobanco$nummoeda$dv$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira";
	
	$nossonumero = $convenio . $nossonumero ."-". modulo_11($convenio.$nossonumero);
}

if ($dadosboleto["formatacao_convenio"] == "7") {
	$convenio = formata_numero($dadosboleto["convenio"],7,0,"convenio");
	
	$nossonumero = formata_numero($dadosboleto["nosso_numero"],10,0);
	$dv=modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira");
	$linha="$codigobanco$nummoeda$dv$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira";
  $nossonumero = $convenio.$nossonumero;
	
}


if ($dadosboleto["formatacao_convenio"] == "6") {
	$convenio = formata_numero($dadosboleto["convenio"],6,0,"convenio");
	
	if ($dadosboleto["formatacao_nosso_numero"] == "1") {
		
		
		$nossonumero = formata_numero($dadosboleto["nosso_numero"],5,0);
		$dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira");
		$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira";
	
		$nossonumero = $convenio . $nossonumero ."-". modulo_11($convenio.$nossonumero);
	}
	
	if ($dadosboleto["formatacao_nosso_numero"] == "2") {
		
		
		$nservico = "21";
		$nossonumero = formata_numero($dadosboleto["nosso_numero"],17,0);
		$dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$nservico");
		$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$nservico";
	}
}

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $agencia_codigo;
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;


function formata_numero($numero,$loop,$insert,$tipo = "geral") {
	if ($tipo == "geral") {
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "valor") {
	
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "convenio") {
		while(strlen($numero)<$loop){
			$numero = $numero . $insert;
		}
	}
	return $numero;
}


function fbarcode($valor){

$fino = 1 ;
$largo = 3 ;
$altura = 50 ;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){ 
    for($f2=9;$f2>=0;$f2--){  
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){ 
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }



?><img src=imagens/p.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=imagens/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=imagens/p.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=imagens/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
<?php
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=imagens/p.png width=<?php echo $f1?> height=<?php echo $altura?> border=0><img 
<?php
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=imagens/b.png width=<?php echo $f2?> height=<?php echo $altura?> border=0><img 
<?php
  }
}

?>
src=imagens/p.png width=<?php echo $largo?> height=<?php echo $altura?> border=0><img 
src=imagens/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=imagens/p.png width=<?php echo 1?> height=<?php echo $altura?> border=0> 
  <?php
} //Fim da função

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

function fator_vencimento($data) {
	$data = explode("/",$data);
	$ano = $data[2];
	$mes = $data[1];
	$dia = $data[0];
    return(abs((_dateToDays("1997","10","07")) - (_dateToDays($ano, $mes, $dia))));
}

function _dateToDays($year,$month,$day) {
    $century = substr($year, 0, 2);
    $year = substr($year, 2, 2);
    if ($month > 2) {
        $month -= 3;
    } else {
        $month += 9;
        if ($year) {
            $year--;
        } else {
            $year = 99;
            $century --;
        }
    }

    return ( floor((  146097 * $century)    /  4 ) +
            floor(( 1461 * $year)        /  4 ) +
            floor(( 153 * $month +  2) /  5 ) +
                $day +  1721119);
}

/*
#################################################

#################################################
*/
function modulo_10($num) { 
	$numtotal10 = 0;
	$fator = 2;
 
	for ($i = strlen($num); $i > 0; $i--) {
		$numeros[$i] = substr($num,$i-1,1);
		$parcial10[$i] = $numeros[$i] * $fator;
		$numtotal10 .= $parcial10[$i];
		if ($fator == 2) {
			$fator = 1;
		}
		else {
			$fator = 2; 
		}
	}
	
	$soma = 0;
	for ($i = strlen($numtotal10); $i > 0; $i--) {
		$numeros[$i] = substr($numtotal10,$i-1,1);
		$soma += $numeros[$i]; 
	}
	$resto = $soma % 10;
	$digito = 10 - $resto;
	if ($resto == 0) {
		$digito = 0;
	}

	return $digito;
}

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
//alert(TestaCPF(strCPF));
</script>