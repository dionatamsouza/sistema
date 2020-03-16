<?php include_once("includes/head.php"); 

//$con = new PDO('mysql:host=localhost;dbname=u831509106_gnr;charset=utf8', 'u831509106_gnr', 'gerenciador2020'); 




$cliente =  $_POST['cliente'] ;
$imovel =  $_POST['imovel'] ;
$vencimento =  $_POST['vencimento'];



$tiraponto = array(".");
$trocarvirgula = array(",");
$valor = str_replace($tiraponto, "", "$valor");
$valor = str_replace($trocarvirgula, ".", "$valor");
$data = $_POST['data'] ;
 $vencimento = implode('/', array_reverse(explode('/', $vencimento)));

$inserir = "INSERT INTO financeiro_alugueis(cliente,imovel,vencimento,imobiliaria_creci) VALUES(:cliente, :imovel, :vencimento, :imobiliaria_creci)";



 try {
 	
 	$acao = $bdd->prepare($inserir);
$acao->bindParam(':cliente',$cliente);
$acao->bindParam(':imovel',$imovel);

$acao->bindParam(':vencimento',$vencimento);
$acao->bindParam(':imobiliaria_creci',$lgnimobiliaria_creci);

$acao->execute();

$cadcontar = $acao->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
        ?>
        
        <script>
        alert("Imóvel alugado com sucesso!");
        window.location = "alugar-imovel.php";
        
        </script>
        
        
        <?php
        
      }
    }
    catch(PDOException $e) {
      echo $e;
    }



?>