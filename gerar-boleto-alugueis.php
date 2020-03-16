<!DOCTYPE html>
<html lang="en">

<!--HEAD ADICIONADO POR LAURO -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link href="calendario/css/bootstrap-datepicker.css" rel="stylesheet"/>
		<script src="calendario/js/bootstrap-datepicker.min.js"></script> 
		<script src="calendario/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
<!--FIM DO HEAD ADICIONADO POR LAURO -->


<?php include_once("includes/head.php"); ?>
<?php include_once("funcoes.php"); ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once("includes/sidebar.php"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once("includes/topbar.php"); ?>
        <div class="container-fluid">
        	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            	<h1 class="h3 mb-0 text-gray-800">Gerar boletos de alugueis</h1>
        	</div>
        	<div class="row">
            	Clique no botão abaixo para gerar automaticamente os boletos de alugueis para todos os inquilinos da imobiliária, os boletos serão enviados para o email de cada Inquilino e ficarão disponíveis para impressão em Listar Boletos.
            	<form action="geraboletosalugueis.php">
				              	<input type="submit" name="gerarboletosalugueis" class="btn btn-primary btn-user btn-block" value="Gerar boletos">
				            </form>
				        </div>
              		</div>
            	</div>
          	</div>
        </div>
      </div>
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
  <?php include_once("includes/end.php"); ?>
</body>
</html>