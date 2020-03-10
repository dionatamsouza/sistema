<?php include_once("includes/head.php"); 

//$con = new PDO('mysql:host=localhost;dbname=u831509106_gnr;charset=utf8', 'u831509106_gnr', 'gerenciador2020'); 




$nome =  $_POST['nome'] ;
$documento =  $_POST['cpfcnpj'] ;
$data_nascimento =  $_POST['datanascimento'];

$endereco_rua =  $_POST['endereco_rua'];
$endereco_bairro =  $_POST['endereco_bairro'];
$endereco_numero =  $_POST['endereco_numero'];
$endereco_complemento=  $_POST['endereco_complemento'];

$telefone=  $_POST['telefone'];
$codigo_ibge=  $_POST['codigo_ibge'];
$cep=  $_POST['cep'];
$email=  $_POST['email'];
$whatsapp=  $_POST['whatsapp'];

$tiraponto = array(".");
$trocarvirgula = array(",");
$valor = str_replace($tiraponto, "", "$valor");
$valor = str_replace($trocarvirgula, ".", "$valor");
$data = $_POST['data'] ;
 $data = implode('/', array_reverse(explode('/', $data)));

$inserir = "INSERT INTO financeiro_clientes(nome,documento,data_nascimento,endereco_bairro,endereco_rua,endereco_numero,endereco_complemento,telefone,cep,codigo_ibge,imobiliaria_creci) VALUES(:nome, :documento, :data_nascimento, :endereco_bairro, :endereco_rua, :endereco_numero, :endereco_complemento, :telefone, :cep, :codigo_ibge, :imobiliaria_creci)";



 try {
 	
 	$acao = $bdd->prepare($inserir);
$acao->bindParam(':nome',$nome);
$acao->bindParam(':documento',$documento);

$acao->bindParam(':data_nascimento',$data_nascimento);
$acao->bindParam(':endereco_bairro',$endereco_bairro);
$acao->bindParam(':endereco_numero',$endereco_numero);
$acao->bindParam(':endereco_rua',$endereco_rua);
$acao->bindParam(':endereco_complemento',$endereco_complemento);
$acao->bindParam(':telefone',$telefone);
$acao->bindParam(':cep',$cep);
$acao->bindParam(':codigo_ibge',$codigo_ibge);
$acao->bindParam(':imobiliaria_creci',$lgnimobiliaria_creci);


$acao->execute();

$cadcontar = $acao->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
        ?>
        
        <script>
        alert("Cliente Cadastado com sucesso!");
        window.location = "incluir-cliente.php";
        
        </script>
        
        
        <?php
        
      }
    }
    catch(PDOException $e) {
      echo $e;
    }



?>