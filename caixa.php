<?php include_once("includes/head.php"); ?>

<!DOCTYPE html>
<html lang="en">



<!--HEAD ADICIONADO POR LAURO -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link href="calendario/css/bootstrap-datepicker.css" rel="stylesheet"/>
		<script src="calendario/js/bootstrap-datepicker.min.js"></script> 
		<script src="calendario/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
		
		
		<script>
            		function tiraRelatorio(){
            			
            			var ini = document.getElementById("datainicio").value;
            			
                     			
}	
            	</script>
		
<!--FIM DO HEAD ADICIONADO POR LAURO -->
<?php include_once("funcoes.php"); ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once("includes/sidebar.php"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once("includes/topbar.php"); ?>
        <div class="container-fluid">
        	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            	<h1 class="h3 mb-0 text-gray-800">Caixa atual</h1>
            	</div>
            	
            	
            	
   <h2>Escolha um período para ver o relatório:</h2> 
   <div class="row">
            	<form action="caixa.php" method="POST">
              		<div class="card shadow mb-4">
                		<div class="card-body" style="width: 500px; height: 42px;padding: 2px;" >
   <div class="form-group row">
    <div class="col-sm-6" style="width: 30px !important;">	
							<input type="text" class="form-control form-control-user" id="datainicio" name="datainicio" placeholder="Início" autocomplete="off" >
							
							</div>
							
							<div class="col-sm-6">	
							<input type="text" class="form-control form-control-user" id="datafinal" name="datafinal" placeholder="Final" autocomplete="off" >
							
							
							<script type="text/javascript">
			$('#datainicio').datepicker({	
				format: "dd/mm/yyyy",	
				language: "pt-BR",
				startDate: '-38600d',
			});
			
			
			
			$('#datafinal').datepicker({	
				format: "dd/mm/yyyy",	
				language: "pt-BR",
				startDate: '-38600d',
			});
		</script>        
							</div>
							
							
       	</div>
       	
       
       	</div>
       	
       		
        	</div>
        		 <div class="col-sm-6">	
								<input type="submit" name="cadastrar-conta" class="btn btn-primary btn-user btn-block" value="Ver Relatório" ></div>
        	
        	
        	</form>
        	</div>
        	
        	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Valor</th>
      <th scope="col">Quem</th>
      <th scope="col">Tipo</th>
      
    </tr>
    
    

    
  </thead>
  <tbody>
  
 <?php listarcaixa(); ?>
 

        	
   </tbody>
</table>     	
        	
        	
        	
        </div>
      </div>
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
  <?php include_once("includes/end.php"); ?>
</body>
</html>