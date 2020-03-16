<?php header('Access-Control-Allow-Origin: *'); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
<?php 

$valor=$_GET['valor'];
$clientepulsar=$_GET['cliente'];
$vencimento=$_GET['data'];
$vencimentopadrao=str_replace("/","-",$vencimento);
$opcaoboleto=$_GET['opcaoboleto'];

$descricaoboleto=$_GET['descricao'];
$idboleto=$_GET['controle'];



$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-sandbox.pulsarpay.com/api/usuario/login?email=netsitesmcr@gmail.com&password=laurinho4",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json",
    "Accept: application/json",
    "Cache-Control: no-cache"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$superarray = json_decode($response, true);
foreach ($superarray as $chave => $dado) {
	$hash=$dado;
	
}


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-sandbox.pulsarpay.com/api/boleto/gerar?token=$hash",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('boleto[vencimento]' => "$vencimentopadrao",'boleto[descricao]'=> "$descricaoboleto", 'boleto[cliente_id]' => '28978','boleto[valor_total]' => "$valor", 'boleto[controle_externo]' => "$idboleto"),
  CURLOPT_HTTPHEADER => array(
    "Accept: application/x-www-form-urlencoded",
    "Cache-Control: no-cache"
  ),
));

$responsetwo = curl_exec($curl);

curl_close($curl);



$arrBol = json_decode($responsetwo, true);
foreach ($arrBol as $chavetw => $valuetw) {
	
	
}

$li=$arrBol['data'];



foreach ($li as $chavetr => $valuetr) {
	
	
	foreach ($valuetr as $chave4 => $value4) {
		
		
	
	switch ($chave4) {
    case 'boleto_id':
        $bId=$value4;
        break;
        
        
        case 'hash_boleto':
        foreach ($value4 as $chave5 => $value5) {
        	
        	switch ($chave5) {
    case 'p':
        $hashboleto=$value5;
        break;
        	
        	  }     	
        	
		}
        break;
        
        
        
}
}


	
}

if($opcaoboleto=="Imprimir"){
	$ori=$_SERVER['HTTP_REFERER'];
	echo "<a href='$ori'><img src='http://ocv.net.br/gi/icon-voltar.png' width='110'></a><br />
	<iframe id='printar' src='http://ocv.net.br/gi/boleto.php?hashboleto=$hashboleto&cadskygfsdrt345sh4rtoddofgdvcboifhbr8ty43nfkdhfg9043ckn3094f=$bId' style='border:none;' width='100%' name='printar' height='2000'></iframe>
	
         ";
	//$bol=file_get_contents($lb);
	
	/*$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-sandbox.pulsarpay.com/api/boleto/visualizar?p=$hashboleto&i=$bId",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);

echo $response;
*/	
	
	
		
	
}



// Gera arquivo com link do boleo na pulsar

$arquivo = fopen("$idboleto.txt",'w');
if ($arquivo == false) die('Não foi possível criar o arquivo.');
$conteudo = "$bId";
fwrite($arquivo, $conteudo);
fclose($arquivo);




?><script type="text/javascript">
	// Usar quando todos os arquivos estiverem no mesmo host
	
	function imprimir(){
		var objFra = document.getElementById('printar');
        objFra.contentWindow.focus();
       objFra.contentWindow.print();
       alert('oi');
	}

	</script>

<!-- -
<input type="button" value="imprimir" onclick="imprimir()"> -->
