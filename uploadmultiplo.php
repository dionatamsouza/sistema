<?php 
$fotos= $_FILES['foto_imagens']['tmp_name'];


foreach ($fotos as $chave=>$valor){ 
	
	$hash=md5(uniqid(rand(), true));
	 
	    $nome = "$hash";
	 
	    copy($valor,"uploadteste/$nome.jpg");
	    
	    echo $valor;
	
	 }

?>