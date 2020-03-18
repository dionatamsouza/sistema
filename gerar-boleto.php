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
            	<h1 class="h3 mb-0 text-gray-800">Gerar Boleto avulso</h1>
        	</div>
        	<div class="row">
            	<div class="col-lg-6">
              		<div class="card shadow mb-4">
                		<div class="card-body">
                			<form class="user" method="POST" enctype="multipart/form-data" action="geraboleto.php">
                				
				                  
				              	<div class="form-group row">
				              		
					              
		
				  
				  <div class="col-sm-6">
				<?php selectCliente(); ?>
				  </div>	
				  
				  
				  
				    <div class="col-sm-6">	
							<input type="text" class="form-control form-control-user date" id="data" name="data" placeholder="Data de vencimento" autocomplete="off" maxlength="10">
							
								<span class="glyphicon glyphicon-th"></span>
						
						
								
				            <script type="text/javascript">
			$('#data').datepicker({	
				format: "dd/mm/yyyy",	
				language: "pt-BR",
				startDate: '+0d',
			});
		</script>        		
				                    		
				                  </div>
				              	</div>
				              	


  	<div class="form-group row">				  
				  
				  
				  
				   <div class="col-sm-6">	
							<input type="text" class="form-control form-control-user money" id="valor" name="valor" placeholder="Valor" autocomplete="off" >
				  
				  
				  </div>
				  
				  
				  			  
				  <div class="col-sm-6">
					<input type="text" class="form-control form-control-user" id="descricao" name="descricao" placeholder="Descrição" autocomplete="off" >
				  </div>
				  </div>				              	
				  
		<div class="form-group row">				  
				  <div class="col-sm-6">
		<input type="radio" id="imprimir" name="opcaobleto" value="Imprimir">
<label for="imprimir">Imprimir</label><br>
<input type="radio" id="email" name="opcaobleto" value="email">
<label for="email">Enviar por e-mail &nbsp &nbsp &nbsp</label>
				  </div> 
				  </div>		    		  	          	
				              	<input type="hidden" value="<?php echo $idclientegerenciador?>">
				              	<input type="submit" name="cadastrar-conta" class="btn btn-primary btn-user btn-block" value="Gerar boleto">
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