<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="calendario/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script src="calendario/js/bootstrap-datepicker.min.js"></script> 
<script src="calendario/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
<?php include_once("includes/head.php"); ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once("includes/sidebar.php"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once("includes/topbar.php"); ?>
        <div class="container-fluid">
        	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            	<h1 class="h3 mb-0 text-gray-800">Incluir conta</h1>
        	</div>
        	<div class="row">
            	<div class="col-lg-6">
<?php
                  if(isset($msgsucess)) {
?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="Fechar">×</a>
                      <strong>Sucesso!</strong> <?php echo $msgsucess; ?>
                    </div>
<?php
                  }
?>
              		<div class="card shadow mb-4">
                		<div class="card-body">
                			<form class="user" method="POST" enctype="multipart/form-data" action="inclui-conta.php">
                				<div class="form-group row">
				                  	<div class="col-sm-6 mb-3 mb-sm-0">
				                    	<input type="text" class="form-control form-control-user" placeholder="Descrição" name="descricao" required>
				                  	</div>
				                  	<div class="col-sm-6">
				                    	<input type="text" class="form-control form-control-user" placeholder="Valor" name="valor" type="number" required>
				                    </div>
				                </div>
				                <div class="form-group row">
				                	<div class="col-sm-6">
				                		<input type="text" class="form-control form-control-user" placeholder="Recebedor ou Pagador" name="quem" required>
				                	</div>
				                	<div class="col-sm-6">
				                		<input type="text" class="form-control form-control-user" id="data" name="data" placeholder="Data">
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
				              		<div class="col-sm-6 mb-3 mb-sm-0">
					                	<select class="form-control form-control-user select" name="tipodeconta" required>
					                		<option value="">Tipo de conta</option>
					                		<option value="1">Conta a Receber</option>
											<option value="2">Conta a Pagar</option>
					                	</select>
					                </div>
					                <div class="col-sm-6">
					                	<input type="file" class="form-control form-control-user select" name="arquivodaconta" >
					                </div>
				              	</div>
				              	<input type="submit" name="cadastrar-conta" class="btn btn-primary btn-user btn-block" value="Incluir conta">
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