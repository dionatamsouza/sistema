<?php header('Access-Control-Allow-Origin: *');  
include_once("includes/head.php");
include_once("funcoes.php");


$clientegerenciador=$_POST['cliente'];
$clientepulsar=$_POST['cliente'];
$vencimento=$_POST['data'];
$descricao='Aluguel';
$opcao=$_POST['opcaobleto'];
$vencimentop = implode('/', array_reverse(explode('/', $vencimento)));
$locador="0";

$idboletopulsarpay='0';
$imovel='0';

$status='Aguardando';







$selecionar = "SELECT * FROM financeiro_alugueis WHERE imobiliaria_creci='$lgnimobiliaria_creci' ORDER BY id ASC";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      
                  
      foreach($loop as $linha) {
        $idcliente = $linha['cliente'];
        $vencimentoboleto=$linha['vencimento'];
        $imovel=$linha['imovel'];
        $vencimentopadrao=str_replace("/","-",$vencimentoboleto);
        
        
        
      buscaCliente($idcliente); 
      
      
      echo "nome cliente $clicli";
        
        buscaimovel($imovel); 
        
       
        echo " kkk $valor nnnn nomeimovel $nomeimovel";
        
        $valoraluguel=valorimovel;
        
        
$inserir = "INSERT INTO financeiro_boletos(imobiliaria_creci,locador,locatario,pagador,id_boleto_pulsarpay,imovel,valor,vencimento,descricao,status) VALUES(:imobiliaria_creci, :locador, :locatario, :pagador, :id_boleto_pulsarpay, :imovel, :valor, :vencimento, :descricao, :status)";



 try {
 	
 	$acao = $bdd->prepare($inserir);
$acao->bindParam(':imobiliaria_creci',$lgnimobiliaria_creci);
$acao->bindParam(':locador',$locador);
$acao->bindParam(':locatario',$idcliente);
$acao->bindParam(':pagador',$idcliente);
$acao->bindParam(':id_boleto_pulsarpay',$idboletopulsarpay);
$acao->bindParam(':imovel',$imovel);
$acao->bindParam(':valor',$valoraluguel);
$acao->bindParam(':vencimento',$vencimentopadrao);
$acao->bindParam(':descricao',$descricao);
$acao->bindParam(':status',$status);



$acao->execute();

$cadcontar = $acao->rowCount();
      if($cadcontar > 0) {
       // echo "Sucesso!";
        ?>
        
        <script>
        alert("Boleto Cadastado com sucesso!");
       // window.location = "incluir-cliente.php";
        
        </script>
        
        
        <?php
        
      }
    }
    catch(PDOException $e) {
      echo $e;
    }


 	
	$selecionar = "SELECT * FROM financeiro_boletos ORDER BY id DESC LIMIT 1";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
        $resultado->execute();
    $entcontados = $resultado->rowCount();
        if($entcontados > 0) {
      $loop = $resultado->fetchAll();
            foreach($loop as $linha) {
        $controle = $linha['id'];
       
                
}
}

}

catch(PDOException $e) {
    echo $e;
  }
		


$url="https://ocv.net.br/gi/geraboleto-ocv.php?valor=&cliente=$clientepulsar&data=$vencimentopadrao&valor=$valoraluguel&opcaoboleto=$opcao&descricao=$descricao&controle=$controle";
$result=file_get_contents($url);
echo $result;



$urlbuscar="http://ocv.net.br/gi/$controle.txt";
$conteudo=file_get_contents($urlbuscar);

 	try {
  	 global $bdd;
  		 global $bId;
  	
  	/* Atualização de dados 
	$atlifsedit = $bdd->prepare("UPDATE financeiro_contas set status = ? WHERE id = ?");
	$atlifsedit->execute($statusnovo, $idaalterar);
	/**/
	
	$alterar = $bdd->prepare("UPDATE financeiro_boletos set id_boleto_pulsarpay = ? WHERE id = ?");
	$alterar->bindParam(1,$conteudo );
$alterar->bindParam(2,$controle);
$alterar->execute();
	
	}
  catch(PDOException $e) {
    echo $e;
  }

        
        
        
        
        
        
        
        
        
}
}

}

catch(PDOException $e) {
    echo $e;
  }
		



?>