<?php include_once("includes/head.php"); 

//$con = new PDO('mysql:host=localhost;dbname=u831509106_gnr;charset=utf8', 'u831509106_gnr', 'gerenciador2020'); 

$quem =  $_POST['quem'] ;
$descricao =  $_POST['descricao'] ;


$valor =  $_POST['valor'] ;

$tiraponto = array(".");
$trocarvirgula = array(",");

$valor = str_replace($tiraponto, "", "$valor");
$valor = str_replace($trocarvirgula, ".", "$valor");


$data = $_POST['data'] ;
$data = implode('/', array_reverse(explode('/', $data)));




$inserir = "INSERT INTO caixa(data,valor,tipo,imobiliaria,descricao) VALUES(:data, :valor, :tipo, :imobiliaria,:descricao)";


$tipo='Saída';



 try {
 	
 	$acao = $bdd->prepare($inserir);
$acao->bindParam(':data',$data);
$acao->bindParam(':valor',$valor);

$acao->bindParam(':tipo',$tipo);
$acao->bindParam(':imobiliaria',$lgnimobiliaria_creci);

$acao->bindParam(':descricao',$descricao);

$acao->execute();

$cadcontar = $acao->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
        ?>
        
        <script>
        alert("Cadastado com sucesso!");
        window.location = "incluir-entrada.php";
        
        </script>
        
        
        <?php
        
      }
    }
    catch(PDOException $e) {
      echo $e;
    }


/*
$insert = "INSERT INTO financeiro_contas(tipo) VALUES(:tipo)";



 try {
 $acao = $bdd->prepare($insert);
$acao->bindParam(':tipo' , $tipo , PDO::PARAM_STR);
$acao->execute();
 $cadcontar = $acao->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }

*/

?>